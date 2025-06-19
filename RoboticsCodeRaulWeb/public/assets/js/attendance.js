document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('attendanceForm');
    const checkbox = document.getElementById('attendanceCheckbox');
    const submitBtn = form.querySelector('button[type="submit"]');
    const messageDiv = document.getElementById('timeRestrictionMessage');

    // Verificar horário permitido em tempo real
    function checkAllowedTime() {
        const now = new Date();
        const dayOfWeek = now.getDay(); // 0-6 (0=Domingo)
        const hours = now.getHours();
        const minutes = now.getMinutes();

        // Quartas-feiras (11:50-13:20)
        if (dayOfWeek === 3) {
            const start = (11 * 60) + 50; // 11:50 em minutos
            const end = (13 * 60) + 20;   // 13:20 em minutos
            const current = (hours * 60) + minutes;

            if (current < start || current > end) {
                messageDiv.textContent = 'Fora do horário permitido: Quartas das 11:50 às 13:20';
                messageDiv.classList.remove('d-none');
                return false;
            }
        }
        // Sextas-feiras (13:35-16:00)
        else if (dayOfWeek === 5) {
            const start = (13 * 60) + 35; // 13:35 em minutos
            const end = (16 * 60);       // 16:00 em minutos
            const current = (hours * 60) + minutes;

            if (current < start || current > end) {
                messageDiv.textContent = 'Fora do horário permitido: Sextas das 13:35 às 16:00';
                messageDiv.classList.remove('d-none');
                return false;
            }
        }
        else {
            messageDiv.textContent = 'Presenças só podem ser marcadas às Quartas ou Sextas';
            messageDiv.classList.remove('d-none');
            return false;
        }

        messageDiv.classList.add('d-none');
        return true;
    }

    // Validar antes de enviar
    form.addEventListener('submit', function (e) {
        if (!checkbox.checked) {
            e.preventDefault();
            alert('Por favor, marque a checkbox para confirmar presença');
            return false;
        }

        if (!checkAllowedTime()) {
            e.preventDefault();
            return false;
        }

        return true;
    });

    // Verificar periodicamente o horário (opcional)
    setInterval(checkAllowedTime, 60000); // Verifica a cada minuto
});