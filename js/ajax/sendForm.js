document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('consultantForm');
    const submitBtn = document.getElementById('submitBtn');
    const formMessage = document.getElementById('formMessage');
    
    if (!form) return;

    const nameInput = document.getElementById('userName');
    const emailInput = document.getElementById('userEmail');
    const messageInput = document.getElementById('userMessage');

    
    function validateName(name) {
        if (name.trim() === '') {
            return 'Введите ваше имя';
        }
        return '';
    }
    
    function validateEmail(email) {
        if (email.trim() === '') {
            return 'Введите ваш email';
        }
        return '';
    }
    
    function validateMessage(message) {
        if (message.trim() === '') {
            return 'Введите сообщение';
        }
        return '';
    }
    
    function showError(input, message) {
        const formGroup = input.closest('.form-group');
        
        const oldError = formGroup.querySelector('.field-error');
        if (oldError) oldError.remove();
        
        formGroup.classList.add('has-error');
        formGroup.classList.remove('has-success');

        const errorDiv = document.createElement('div');
        errorDiv.className = 'field-error';
        errorDiv.textContent = message;
        formGroup.appendChild(errorDiv);
    }
    
    function showSuccess(input) {
        const formGroup = input.closest('.form-group');
        const oldError = formGroup.querySelector('.field-error');
        if (oldError) oldError.remove();
        
        formGroup.classList.remove('has-error');
        formGroup.classList.add('has-success');
    }
    
    function clearValidation(input) {
        const formGroup = input.closest('.form-group');
        const oldError = formGroup.querySelector('.field-error');
        if (oldError) oldError.remove();
        
        formGroup.classList.remove('has-error', 'has-success');
    }
    
    nameInput.addEventListener('input', function() {
        if (this.value.trim() !== '') {
            const error = validateName(this.value);
            if (error) {
                showError(this, error);
            } else {
                showSuccess(this);
            }
        } else {
            clearValidation(this);
        }
    });
    
    emailInput.addEventListener('input', function() {
        if (this.value.trim() !== '') {
            const error = validateEmail(this.value);
            if (error) {
                showError(this, error);
            } else {
                showSuccess(this);
            }
        } else {
            clearValidation(this);
        }
    });
    
    messageInput.addEventListener('input', function() {
        if (this.value.trim() !== '') {
            const error = validateMessage(this.value);
            if (error) {
                showError(this, error);
            } else {
                showSuccess(this);
            }
        } else {
            clearValidation(this);
        }
    });
    
    nameInput.addEventListener('blur', function() {
        const error = validateName(this.value);
        if (error) {
            showError(this, error);
        } else if (this.value.trim() !== '') {
            showSuccess(this);
        }
    });
    
    emailInput.addEventListener('blur', function() {
        const error = validateEmail(this.value);
        if (error) {
            showError(this, error);
        } else if (this.value.trim() !== '') {
            showSuccess(this);
        }
    });
    
    messageInput.addEventListener('blur', function() {
        const error = validateMessage(this.value);
        if (error) {
            showError(this, error);
        } else if (this.value.trim() !== '') {
            showSuccess(this);
        }
    });

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        formMessage.style.display = 'none';
        formMessage.className = 'form-message';
        
        const nameError = validateName(nameInput.value);
        const emailError = validateEmail(emailInput.value);
        const messageError = validateMessage(messageInput.value);
        
        let hasErrors = false;
        
        if (nameError) {
            showError(nameInput, nameError);
            hasErrors = true;
        } else {
            showSuccess(nameInput);
        }
        
        if (emailError) {
            showError(emailInput, emailError);
            hasErrors = true;
        } else {
            showSuccess(emailInput);
        }
        
        if (messageError) {
            showError(messageInput, messageError);
            hasErrors = true;
        } else {
            showSuccess(messageInput);
        }
        
        if (hasErrors) {
            const firstError = form.querySelector('.has-error');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            return;
        }
        
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span>Отправка...</span> <i class="fa-solid fa-spinner fa-spin"></i>';
        
        const formData = new FormData(form);
        
        fetch('php/sendForm.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                formMessage.textContent = data.message;
                formMessage.classList.add('success');
                formMessage.style.display = 'block';   
                form.reset();
                [nameInput, emailInput, messageInput].forEach(input => {
                    clearValidation(input);
                });
                formMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                setTimeout(() => {
                    formMessage.style.display = 'none';
                }, 5000);
            } else {
                if (data.errors) {
                    formMessage.innerHTML = data.errors.join('<br>');
                } else {
                    formMessage.textContent = data.message || 'Произошла ошибка';
                }
                formMessage.classList.add('error');
                formMessage.style.display = 'block';
                formMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            formMessage.textContent = 'Ошибка соединения с сервером. Попробуйте позже.';
            formMessage.classList.add('error');
            formMessage.style.display = 'block';
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<span>Отправить</span> <i class="fa-solid fa-paper-plane"></i>';
        });
    });
});