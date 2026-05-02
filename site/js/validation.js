document.addEventListener('DOMContentLoaded', function() {
    // 1. Password Visibility Toggle
    const togglePasswordButtons = document.querySelectorAll('.toggle-password');
    togglePasswordButtons.forEach(button => {
        button.addEventListener('click', function() {
            const inputId = this.getAttribute('data-target');
            const input = document.getElementById(inputId);
            if (input) {
                if (input.type === 'password') {
                    input.type = 'text';
                    this.textContent = '🙈'; // Eye closed icon
                } else {
                    input.type = 'password';
                    this.textContent = '👁️'; // Eye open icon
                }
            }
        });
    });

    // 2. Real-time Password Match and Strength (Sign-up page)
    const passwordInput = document.getElementById('password-input');
    const confirmInput = document.getElementById('password-confirm');
    const matchErrorText = document.getElementById('password-match-error');
    const submitBtn = document.getElementById('signup-submit');
    
    // Password strength elements
    const strengthBar = document.getElementById('password-strength-bar');
    const strengthText = document.getElementById('password-strength-text');

    function checkPasswordMatch() {
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
            // Reset if empty
            confirmInput.classList.remove('border-red-500', 'focus:border-red-500', 'border-green-500', 'focus:border-green-500');
            matchErrorText.classList.add('hidden');
            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    }

    function evaluatePasswordStrength(password) {
        if (!strengthBar || !strengthText) return;

        let strength = 0;
        if (password.length >= 8) strength += 1;
        if (password.match(/[A-Z]/)) strength += 1;
        if (password.match(/[a-z]/)) strength += 1;
        if (password.match(/[0-9]/)) strength += 1;

        // Reset classes
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
});
