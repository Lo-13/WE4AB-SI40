/*
 * Script JavaScript principal du site.
 * Il gere la verification du formulaire d'inscription
 * et le chargement dynamique du calendrier admin.
 */
document.addEventListener('DOMContentLoaded', function() {
    // Meme script pour deux usages : validation du formulaire d'inscription et calendrier admin.
    const togglePasswordButtons = document.querySelectorAll('.toggle-password');
    togglePasswordButtons.forEach(button => {
        button.addEventListener('click', function() {
            const inputId = this.getAttribute('data-target');
            const input = document.getElementById(inputId);
            if (input) {
                if (input.type === 'password') {
                    input.type = 'text';
                    this.textContent = 'masquer';
                } else {
                    input.type = 'password';
                    this.textContent = 'voir';
                }
            }
        });
    });

    const passwordInput = document.getElementById('password-input');
    const confirmInput = document.getElementById('password-confirm');
    const matchErrorText = document.getElementById('password-match-error');
    const submitBtn = document.getElementById('signup-submit');
    
    const strengthBar = document.getElementById('password-strength-bar');
    const strengthText = document.getElementById('password-strength-text');

    function checkPasswordMatch() {
        // Si les deux champs ne correspondent pas, on bloque l'envoi du formulaire.
        if (!passwordInput || !confirmInput || !matchErrorText || !submitBtn) return;

        if (confirmInput.value.length > 0) {
            if (passwordInput.value === confirmInput.value) {
                confirmInput.classList.remove('border-red-500', 'focus:border-red-500');
                confirmInput.classList.add('border-green-500', 'focus:border-green-500');
                matchErrorText.classList.add('hidden');
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            } else {
                confirmInput.classList.remove('border-green-500', 'focus:border-green-500');
                confirmInput.classList.add('border-red-500', 'focus:border-red-500');
                matchErrorText.classList.remove('hidden');
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            }
        } else {
            confirmInput.classList.remove('border-red-500', 'focus:border-red-500', 'border-green-500', 'focus:border-green-500');
            matchErrorText.classList.add('hidden');
            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    }

    function evaluatePasswordStrength(password) {
        // Verification simple de la robustesse du mot de passe.
        if (!strengthBar || !strengthText) return;

        let strength = 0;
        if (password.length >= 8) strength += 1;
        if (password.match(/[A-Z]/)) strength += 1;
        if (password.match(/[a-z]/)) strength += 1;
        if (password.match(/[0-9]/)) strength += 1;

        strengthBar.className = 'h-full transition-all duration-300 rounded-full w-0';

        if (password.length === 0) {
            strengthText.textContent = '';
            strengthBar.style.width = '0%';
        } else if (strength < 3) {
            strengthBar.classList.add('bg-red-500');
            strengthBar.style.width = '33%';
            strengthText.textContent = 'Faible';
            strengthText.className = 'text-xs mt-1 text-red-500';
        } else if (strength === 3) {
            strengthBar.classList.add('bg-yellow-500');
            strengthBar.style.width = '66%';
            strengthText.textContent = 'Moyen';
            strengthText.className = 'text-xs mt-1 text-yellow-500';
        } else if (strength >= 4) {
            strengthBar.classList.add('bg-green-500');
            strengthBar.style.width = '100%';
            strengthText.textContent = 'Fort';
            strengthText.className = 'text-xs mt-1 text-green-500';
        }
    }

    if (passwordInput && confirmInput) {
        confirmInput.addEventListener('input', checkPasswordMatch);
        passwordInput.addEventListener('input', () => {
            checkPasswordMatch();
            evaluatePasswordStrength(passwordInput.value);
        });
    }

    const calendarDateInput = document.getElementById('admin-calendar-date');
    const calendarList = document.getElementById('admin-calendar-list');

    function formatReservationDate(value, mode) {
        const date = new Date(value.replace(' ', 'T'));
        return mode === 'date'
            ? date.toLocaleDateString('fr-FR')
            : date.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });
    }

    function getStatusBadge(status) {
        const normalizedStatus = String(status);

        if (normalizedStatus === '1') {
            return { text: 'Confirme', classes: 'bg-green-900 text-green-400' };
        }
        if (normalizedStatus === '2') {
            return { text: 'Refuse', classes: 'bg-red-900 text-red-400' };
        }
        return { text: 'En attente', classes: 'bg-yellow-900 text-yellow-400' };
    }

    function renderCalendarReservations(reservations) {
        // Reconstruit la liste HTML a partir du JSON renvoye par le controleur PHP.
        if (!calendarList) return;

        calendarList.textContent = '';

        if (!reservations.length) {
            const empty = document.createElement('p');
            empty.className = 'text-gray-500 text-sm';
            empty.textContent = 'Aucune reservation pour cette date.';
            calendarList.appendChild(empty);
            return;
        }

        reservations.forEach(reservation => {
            const card = document.createElement('article');
            card.className = 'bg-gray-800 rounded-lg p-4 border border-gray-700';

            const row = document.createElement('div');
            row.className = 'flex justify-between items-start gap-4';

            const content = document.createElement('div');

            const title = document.createElement('h4');
            title.className = 'font-semibold';
            title.textContent = reservation.room_name;

            const dateLine = document.createElement('p');
            dateLine.className = 'text-gray-400 text-sm';
            dateLine.textContent = `${formatReservationDate(reservation.date_begin, 'date')} - ${formatReservationDate(reservation.date_begin, 'time')} a ${formatReservationDate(reservation.date_end, 'time')}`;

            const details = document.createElement('p');
            details.className = 'text-gray-500 text-sm';
            details.textContent = `${reservation.user_name} ${reservation.user_last_name} - ${reservation.nb_player} joueurs`;

            const badgeData = getStatusBadge(reservation.status);
            const badge = document.createElement('span');
            badge.className = `${badgeData.classes} text-xs px-3 py-1 rounded-full whitespace-nowrap`;
            badge.textContent = badgeData.text;

            content.append(title, dateLine, details);
            row.append(content, badge);
            card.appendChild(row);
            calendarList.appendChild(card);
        });
    }

    async function loadCalendarReservations(date) {
        if (!calendarList) return;

        calendarList.innerHTML = '<p class="text-gray-500 text-sm">Chargement du calendrier...</p>';

        try {
            // L'espace admin recharge uniquement la liste des reservations de la date choisie.
            const response = await fetch(`dashboard?ajax=calendar&date=${encodeURIComponent(date)}`, {
                headers: { 'Accept': 'application/json' }
            });

            if (!response.ok) {
                throw new Error('Reponse serveur invalide');
            }

            const reservations = await response.json();
            renderCalendarReservations(reservations);
        } catch (error) {
            calendarList.innerHTML = '<p class="text-red-400 text-sm">Impossible de charger les reservations.</p>';
        }
    }

    if (calendarDateInput && calendarList) {
        try {
            renderCalendarReservations(JSON.parse(calendarList.dataset.initialReservations || '[]'));
        } catch (error) {
            renderCalendarReservations([]);
        }

        calendarDateInput.addEventListener('change', () => {
            loadCalendarReservations(calendarDateInput.value);
        });
    }
});

