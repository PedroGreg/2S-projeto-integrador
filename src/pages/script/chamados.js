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
/*const form = document.querySelectorAll('.form');
let responder = document.querySelectorAll('.responder');
let conversa = document.getElementById('conversa');
responder.forEach((response) => {
    response.addEventListener('click', () => {
        response.classList.add('clicked');
        if (conversa) {
            conversa.classList.add('ativo');
        } else {
            // Opcional: Logar se a conversa não foi encontrada
            console.log("A div #conversa não existe para este chamado.");
        }
        form.forEach(f => f.classList.add('ativo'));
        // const divP = document.querySelector('.mensagem');
        // const divInput = document.createElement('div');
        // divInput.setAttribute('id', 'divInput');
        // const quebra = document.createElement('br');
        //const form = document.createElement('form');
        // form.setAttribute('id', 'form');
        // form.setAttribute('method', 'POST');
        // form.setAttribute('action', '../php/usr_retornar_pendencia.php');
        // const formlabel = document.createElement('label');
        // formlabel.textContent = 'Responder pendência: '
        // formlabel.setAttribute('for', 'resposta');
        // formlabel.setAttribute('id', 'label')
        // const forminput = document.createElement('textarea');
        // forminput.setAttribute('type', 'textarea');
        // forminput.setAttribute('name', 'resposta');
        // forminput.setAttribute('id', 'resposta');
        // forminput.setAttribute('required', '');
        // forminput.setAttribute('rows', '3');
        // forminput.setAttribute('cols', '50');
        // const formsubmit = document.createElement('button');
        // formsubmit.setAttribute('type', 'submit');
        // formsubmit.setAttribute('name', 'submit');
        // formsubmit.setAttribute('id', 'submit');
        // formsubmit.textContent = 'Enviar resposta'
        // formsubmit.classList.add('button-cian')
        // divInput.appendChild(formlabel);
        // divInput.appendChild(forminput);
        // form.appendChild(divInput);
        // form.appendChild(quebra);
        // form.appendChild(formsubmit);
        // divP.appendChild(form);
    })
})*/
const responder = document.querySelectorAll('.responder');

responder.forEach((responseButton) => {
    responseButton.addEventListener('click', () => {
        // Encontra o elemento pai mais próximo que contém todo o chamado (ex: a div principal)
        // Assumindo que o chamado inteiro está em uma div ou elemento pai.
        // Vou usar o pai do botão como ponto de partida (A div com a classe 'mensagem' ou similar).
        // Se a estrutura for mais complexa, ajuste o 'closest'.
        const parentChamado = responseButton.closest('.mensagem') || responseButton.parentElement.parentElement; 
        
        // Agora, encontre os elementos específicos DENTRO desse chamado pai
        const conversa = parentChamado.querySelector('.conversa');
        const form = parentChamado.querySelector('.form');
        
        responseButton.classList.add('clicked');
        
        // Verifica se a div .conversa existe e a ativa
        if (conversa) {
            conversa.classList.add('ativo');
        } else {
            console.log("A div .conversa não existe para este chamado.");
        }
        
        // Verifica se o formulário existe e o ativa
        if (form) {
            form.classList.add('ativo');
        } else {
            console.log("O formulário .form não existe para este chamado.");
        }
    });
});