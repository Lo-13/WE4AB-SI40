阶段总结报告：核心业务开发与团队框架修复
本报告主要概述了将前端静态 HTML 页面完整转换为 MVC 架构（PHP 后端动态数据驱动）的开发工作，以及在此系统集成过程中，成功排查并修复的从其他队友处继承的关键系统级 Bug。

🚀 新功能开发 (New Implementations)
本次开发主要在底层 MVC 架构（user.php 模型和 
db.php
 连接）的基础上开始拔高，将剩余的关键功能真正赋予了动态灵魂。针对以下 5 个核心模块，我们完成了底层的逻辑打通：

1. 房间列表动态下发 (
rooms.php
)
后端: 添加了 PDO 查询 SELECT * FROM room WHERE status = 'available'，动态拉取可用房间数据。
前端: 清理了原本反复粘贴硬编码的 3 个房间 HTML 卡片，替换为了 PHP foreach ($rooms as $room) 遍历生成模式。并且将“查看详情”按钮修改为了携带自身属性的真实锚点 (如 room-detail?id=1)。
2. 详情页根据 ID 精确展现 (
room-detail.php
)
后端: 编写传参拦截，精准拦截 $_GET['id'] 查询特定房间 room 的详情；若缺失则强行重定向以防止查询挂起报错。
前端: 对照拿到的 $room 变量，动态呈现对应房间的价格、支持的人数上限、以及房间介绍文本。
3. 最复杂业务网关：预定系统下行 (
reservation.php
)
数据组合: 处理了表单 POST 数据并严谨地组合出了 MySQL 需要的 DateTime 原生格式 (date_begin 和 date_end)。
金融结算: 调用了 PHP 的 DateTime->diff()，系统会自动核算出客户租用的总游戏滞留小时数，并将其与数据库房间每小时实时基准单价（hourly_rate）做乘法，得出 total_price。
提交判定: 在检测到合法 POST 会话后，执行 INSERT INTO reservation，安全向数据库插入新订单，并立即将用户送回自己的历史订单流界面。
4. 客户个人主页流 (
my-reservations.php
)
后端: 读取用户全局的 Session Key：$_SESSION['user']->id，安全地限制 SQL 搜索范围，将 reservation 与 room 表实施了连表（JOIN）查询，只抽出他自己的订单。
前端: 利用原生三元运算符 ? :，依据此张订单目前的状态（1 审核通过 或 0 等待审核中），自动在前端呈现不同的视觉警示色（绿色 Confirm / 黄色 Pending）。
5. 一百叶窗：管理员大盘看板 (
dashboard.php
)
身份拦截: 在第一行压入基于身份判断的验证网 $_SESSION['user']->role !== 'admin'，将一切非超管企图直接重定向出境。
宏观查询: 提炼出关键聚合数据 COUNT(*)（房间总数，注册总数，预约单总量）。并且分别执行 ORDER BY id DESC LIMIT 5 获取所有用户的最新近况以呈现列表。
🛠️ 团队协同排雷修复 (Bug Fixes)
本次除了执行自身的本职开发，额外地、提前地规避或攻克了因前期他人代码不严谨导致的两个系统性致命缺陷：

Bug 1: PHP Session 反序列化灾难 (“Incomplete Object”)
现象：当新用户尝试着登录并通过鉴权，在流转到其他子站时，页面完全崩盘，抛出极难理解的错误 The script tried to access a property on an incomplete object。
原因溯源：在队友负责分工的部分，于所有 Controller 第一行直接执行了 session_start();。由于系统在此刻试图从会话还原（unserialize） User 对象时，发现自己竟然还没 require 那个 user.php 定义类文件。失去类参照的 PHP 只能迫不得已抛出一个残缺结构。
斩断方案：撰写了全盘覆盖性质的新正则脚本 
fix_session.php
。执行了一次针对所有 controllers 目录的重构行动，将所有调用强行提拔至 session_start() 首行之前，从根本上终结这枚定时炸弹。
Bug 2: 致命丢失的 POST 流向配置 (404 Fatal Error)
现象：用户在填写完美的房间预订后，无论怎么点击“确认”，都在控制台收到 404 No path 或者无情重载 404 Fatal Error 界面。
原因溯源：查阅队友 
index.php
 路由器实现时，发现他在分离针对表单流提交（if ($method == 'POST')）与常规访问的时候，在内部硬编码的白名单 switch 组内，唯独彻底漏写了针对提交动作本身 (reservation) 的通行分发逻辑。数据流走向了 default 黑洞。
斩断方案：快速切入项目根部路由器 
index.php
，为 POST 栈打上了紧急补丁，追加针对 $contextUrl/reservation 的分发规则跳转线代码，疏通了表单落入数据库前的咽喉道路。
在修复了以上这两个历史遗留问题之后，“选房→下订→计算→呈现”的完整链路已经达到了生产发版的通畅度。