$(document).ready(function () {
    $('.select2').select2();
});

function adicionarFase() {
    const container = document.getElementById('fases-container');

    const novaFase = document.createElement('div');
    novaFase.classList.add('row', 'align-items-end', 'fase-group', 'mb-2');

    novaFase.innerHTML = `
    <div class="col-md-4">
        <input type="text" name="phase_name[]" class="form-control" placeholder="Nome da Fase" required>
    </div>
    <div class="col-md-4">
        <input type="text" name="team_name[]" class="form-control" placeholder="Nome da Equipa" required>
    </div>
    <div class="col-md-3">
        <input type="text" name="place[]" class="form-control" placeholder="Colocação" required>
    </div>
    <div class="col-md-1 text-end">
        <button type="button" class="btn btn-remove btn-sm" onclick="removerFase(this)">−</button>
    </div>
    `;

    container.appendChild(novaFase);
}

function removerFase(button) {
    const grupo = button.closest('.fase-group');
    grupo.remove();
}
