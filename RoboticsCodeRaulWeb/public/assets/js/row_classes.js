$(document).ready(function () {
    $('.select2').select2();
});

function adicionarTurma() {
    const container = document.getElementById('turmas-container');

    const novaTurma = document.createElement('div');
    novaTurma.classList.add('row', 'align-items-end', 'turma-group', 'mb-2');

    novaTurma.innerHTML = `
        <div class="col-md-3">
            <input type="text" name="class[]" class="form-control" placeholder="Letra da Turma" required>
        </div>
        <div class="col-md-1 text-end">
            <button type="button" class="btn btn-remove btn-sm" onclick="removerTurma(this)">−</button>
        </div>
    `;

    container.appendChild(novaTurma);
}

function removerTurma(button) {
    const grupo = button.closest('.turma-group');
    grupo.remove();
}
