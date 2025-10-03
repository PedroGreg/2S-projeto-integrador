// Captura o formulário e o elemento de feedback
// Localize o item formulário e o item onde são exibidas as mensagens
// const formulario =  //[COMPLETE O CÓDIGO]
// const feedbackMensagem = //[COMPLETE O CÓDIGO]

// Função de validação que lança exceções
function validarFormulario(nome, email, senha) {

// Valide 3 Regras
// Regra 1: Campos obrigatórios
    // [IMPLEMENTE A REGRA PARA VALIDAR SE TODOS OS CAMPOS FORAM PREENCHIDOS E LANCE UM ERRO CASO NÃO ESTEJAM]
    // DICA: Use o operador de negação para veriricar se o campo foi preenchido. Ex: if(!email)
// Regra 2: E-mail válido (validação simples)
    // [IMPLEMENTE A REGRA PARA VALIDAR SE FOI DIGITADO UM EMAIL VÁLIDO  E LANCE UM ERRO CASO NÃO SEJA]
    // DICA: verifique se o campo email tem um caracter @ com o método includes('@')
// Regra 3: Senha com no mínimo 6 caracteres
    // [VERIFIQUE SE A SENHA TEM NO MÍNIMO 6 CARACTERES E LANCE UM ERRO CASO NÃO TENHA]
    // DICA: Utilize o método length

  // Se tudo estiver OK, não lança erro
  return true;
}

// O único event listener, usando delegação no formulário
formulario.addEventListener('submit', (event) => {
  // Previne o comportamento padrão de recarregar a página
  event.preventDefault();

  // Limpa a mensagem de feedback anterior
  feedbackMensagem.textContent = '';
  feedbackMensagem.className = 'mensagem';

  // Captura os valores dos campos
  const nome = document.getElementById('nome').value;
  // [Capture também email e senha]
  

  // Usa try...catch para tratar as exceções
  try {
    // Tenta validar os dados
    validarFormulario(nome, email, senha);

    // Se chegar aqui, significa que a validação foi um sucesso
    // [Atualize a mensagem de feedbank para "Usuário cadastrado com sucesso!]
    feedbackMensagem.
    // [Complete o código abaixo. Usando classlist adicione a classe 'erro' do css]
    feedbackMensagem.
    console.log("Usuário cadastrado:", { nome, email });

  } catch (error) {
    // Se um erro for lançado, ele será capturado aqui
    feedbackMensagem.textContent = "Erro: " + error.message;
    // [Complete o código abaixo. Usando classlist adicione a classe 'erro' do css]
    feedbackMensagem.
    console.error("Erro no cadastro:", error.message);
  }
});