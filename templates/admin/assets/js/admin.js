document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('modalConfirmarExclusao');

    if (modal) {
        modal.addEventListener('show.bs.modal', function (evento) {
            var botao = evento.relatedTarget;
            var url = botao.getAttribute('data-url');
            document.getElementById('linkConfirmarExclusao').setAttribute('href', url);
        });
    }
});
