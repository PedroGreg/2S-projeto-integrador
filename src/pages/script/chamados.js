let expand = document.querySelectorAll('.expand');
let chamados = document.querySelectorAll('.chamados');
expand.forEach((button) => {
    button.addEventListener('click', () => {
        const divP = button.closest('.chamado');
        const divF = divP.querySelector('.chamados');
        const extra = divP.querySelector('.extra');
        divP.classList.toggle('ativo');
        divF.classList.toggle('ativo');
        extra.classList.toggle('ativo');
        const seta = button.querySelector('.seta');
        seta.classList.toggle('girar');
    })
})