let button = document.querySelectorAll('.botao');
button.forEach((button) => {
    button.addEventListener('click', () => {
        switch (button.textContent) {
            case 'ACEITAR CHAMADO':
                window.location.href = 'finalizar_chamado.php'
                break;
            case 'RECUSAR CHAMADO':
                window.location.href = 'chamados_abertos.php'
                break;
            case 'CONCLUIR CHAMADO':
                window.location.href = 'chamado_concluido.php'
                break;
            case 'FINALIZAR CHAMADO':
                window.location.href = 'conclusao_chamado.php'
                break;
            case 'CHAMADOS ABERTOS':
                window.location.href = 'chamados_abertos.php'
                break;
            case 'DETALHES':
                window.location.href = 'detalhes_chamado.php'
                break;
            case '+ NOVO CHAMADO':
                window.location.href = 'usr_abertura_chamado.php'
                break;
            case 'REALIZAR CHAMADO':
                window.location.href = 'usr_chamado_aberto.php'
                break;
            case 'MEUS CHAMADOS ABERTOS':
                window.location.href = 'usr_meus_chamados.php'
                break;
        }
    })
});

