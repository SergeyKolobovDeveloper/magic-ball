document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const inputQuestion = document.querySelector('.input-question');
    const ballOuter = document.querySelector('.ball-container');
    const windowElement = document.querySelector('.window');

    if (!form) return;

    form.addEventListener('submit', async (e) => {
        if (!inputQuestion.value.trim()) return;

        e.preventDefault();

        // Примусово перезапускаємо анімацію струшування
        ballOuter.classList.remove('shaking');
        void ballOuter.offsetWidth; 
        ballOuter.classList.add('shaking');

        const formData = new FormData(form);

        try {
            const response = await fetch('magic-ball.php', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            setTimeout(async () => {
                const html = await response.text();
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                
                // 1. Оновлюємо віконце кулі
                const newWindow = doc.querySelector('.window');
                if (newWindow) {
                    windowElement.className = newWindow.className;
                    windowElement.innerHTML = newWindow.innerHTML;
                }

                // 2. Оновлюємо вміст форми (щоб з'явилися нові кнопки), 
                // зберігаючи можливість введення нового питання або скидання
                const newForm = doc.querySelector('form');
                if (newForm) {
                    form.innerHTML = newForm.innerHTML;
                }

                // Вимикаємо тряску після завершення
                ballOuter.classList.remove('shaking');
            }, 800);

        } catch (error) {
            console.error('Помилка при отриманні відповіді:', error);
            ballOuter.classList.remove('shaking');
        }
    });
});