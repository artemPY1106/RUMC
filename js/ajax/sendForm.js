document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('consultantForm');
    const submitBtn = document.getElementById('submitBtn');
    const formMessage = document.getElementById('formMessage');
    
    if (!form) return;
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        formMessage.style.display = 'none';
        formMessage.className = 'form-message';
        
        // Блокируем кнопку
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
                // Успех
                formMessage.textContent = data.message;
                formMessage.classList.add('success');
                formMessage.style.display = 'block';
                
                form.reset();
                
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
            }
        })
        .catch(error => {
            console.error('Error:', error);
            formMessage.textContent = 'Ошибка соединения с сервером';
            formMessage.classList.add('error');
            formMessage.style.display = 'block';
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<span>Отправить</span> <i class="fa-solid fa-paper-plane"></i>';
        });
    });
}); 