let button = document.querySelectorAll('.botao');
button.forEach((button) => {
    button.addEventListener('click', () => {
        switch (button.textContent) {
            case 'ACEITAR CHAMADO':
                window.location.href = 'finalizar_chamado.html'
                break;
            case 'RECUSAR CHAMADO':
                window.location.href = 'chamados_abertos.html'
                break;
            case 'CONCLUIR CHAMADO':
                window.location.href = 'chamado_concluido.html'
                break;
            case 'FINALIZAR CHAMADO':
                window.location.href = 'conclusao_chamado.html'
                break;
            case 'CHAMADOS ABERTOS':
                window.location.href = 'chamados_abertos.html'
                break;
            case 'DETALHES':
                window.location.href = 'detalhes_chamado.html'
                break;
            case '+ NOVO CHAMADO':
                window.location.href = 'abertura_chamado.html'
                break;
            case 'REALIZAR CHAMADO':
                window.location.href = 'chamado_aberto.html'
                break;
            case 'MEUS CHAMADOS ABERTOS':
                window.location.href = 'usr_meus_chamados.html'
                break;
        }
    })
});

