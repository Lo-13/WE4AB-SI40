<?php
require_once __DIR__ . '/../models/user.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/common/db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']->role !== 'super_admin') {
    if (isset($_GET['ajax'])) {
        http_response_code(401);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['error' => 'Non autorise']);
        exit;
    }

    header('Location: sign-in');
    exit;
}

$adminMessage = $_GET['message'] ?? null;
$adminError = $_GET['error'] ?? null;


$nbRes = $db->query("SELECT COUNT(*) FROM reservation")->fetchColumn();
$nbRooms = $db->query("SELECT COUNT(*) FROM room")->fetchColumn();
$nbAvailableRooms = $db->query("SELECT COUNT(*) FROM room WHERE status = 'available'")->fetchColumn();
$nbUsers = $db->query("SELECT COUNT(*) FROM user WHERE role = 'user'")->fetchColumn();
$nbAdmins = $db->query("SELECT COUNT(*) FROM user WHERE role = 'admin'")->fetchColumn();

$adminRoleRequestQuery = $db->query("
    SELECT request.*, user.name as user_name, user.last_name as user_last_name, room.name as room_name
    FROM admin_role_request request
    JOIN user ON request.user_id = user.id
    JOIN room ON request.room_id = room.id
    WHERE request.request_status = 'pending'"
    );
$adminRoleRequests = $adminRoleRequestQuery->fetchAll(PDO::FETCH_ASSOC);  

$adminManagementQuery = $db->query("
    SELECT user.name as user_name, user.last_name as user_last_name, user.id as user_id, room.name as room_name
    FROM room_administrator
    JOIN user ON room_administrator.user_id = user.id
    JOIN room ON room_administrator.room_id = room.id
    WHERE user.role = 'admin'
");

$adminManagement = $adminManagementQuery->fetchAll(PDO::FETCH_ASSOC);  

$availableRoomsQuery = $db->query("
    SELECT id, name, address, capacity, hourly_rate, description
    FROM room
    WHERE status = 'available'
    ORDER BY hourly_rate ASC, capacity DESC
");
$availableRooms = $availableRoomsQuery->fetchAll(PDO::FETCH_ASSOC);

$clientsQuery = $db->query("
    SELECT id, name, last_name, email, age, registration_date
    FROM user
    WHERE role = 'user'
    ORDER BY registration_date DESC
");

$clients = $clientsQuery->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminRoleRequestId = $_POST['request_id'] ?? null;
    $decision = $_POST['request_decision'] ?? null;
    $room = $_POST['room_id'] ?? null;

    if ($adminRoleRequestId && $decision) {
        $adminRoleRequestQuery = $db->prepare("UPDATE admin_role_request SET request_status = :status WHERE request_id = :id");
        $adminRoleRequestQuery->execute([':status' => $decision, ':id' => $adminRoleRequestId]);

        $getUserQuery = $db->prepare("SELECT user_id FROM admin_role_request WHERE request_id = :id");
        $getUserQuery->execute([':id' => $adminRoleRequestId]);
        $userId = $getUserQuery->fetchColumn();

        if ($decision === 'accepted') {
            $updateUser = $db->prepare("UPDATE user SET role = 'admin' WHERE id = :id");
            $updateUser->execute([':id' => $userId]);

            $updateAdminRoom = $db->prepare("INSERT INTO room_administrator VALUES (:room_id, :user_id)");
            $updateAdminRoom->execute([':room_id' => $room, ':user_id' => $userId]);
        }
        header('Location: dashboard_superadmin');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminId = $_POST['am_user_id'] ?? null;

    if ($adminId) {
        $adminManagementRequestQuery = $db->prepare("UPDATE user SET role = 'user' WHERE id = :id");
        $adminManagementRequestQuery->execute([':id' => $adminId]);

        $updateAdminRoom = $db->prepare("DELETE FROM room_administrator WHERE user_id = :user_id");
        $updateAdminRoom->execute([':user_id' => $adminId]);
            
        header('Location: dashboard_superadmin');
        exit;
        }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clientUserId = $_POST['client_user_id'] ?? null;

    if ($clientUserId) {

        $deleteUser = $db->prepare("DELETE FROM user WHERE id = :user_id");
        $deleteUser->execute([':user_id' => $clientUserId]);
            
        header('Location: dashboard_superadmin');
        exit;
        }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $managementRoomId = $_POST['management_room_id'] ?? null;

    if ($managementRoomId) {

        $deleteRoom = $db->prepare("DELETE FROM room WHERE id = :room_id");
        $deleteRoom->execute([':room_id' => $managementRoomId]);
            
        header('Location: dashboard_superadmin');
        exit;
        }
}




require __DIR__ . '/../views/dashboard_superadmin.php';
?>

