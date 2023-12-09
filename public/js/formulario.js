// Formulario
document.getElementById('cadastro').addEventListener('submit', function (event) {
    event.preventDefault();

    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const itens = document.getElementById('itens').value;
    const telefone = document.getElementById('telefone').value;
    const message = document.getElementById('message').value;
    console.log(nome + "/" + email + "/" + itens + "/" + telefone + "/" + message + "/");
    const urlWhatsApp = `https://wa.me/5561984275435?text=Olá, meu nome é ${nome}.%0A%0AMeu email é ${email} e meu telefone é ${telefone}.%0A%0AGostaria de fazer ${itens}!%0A%0A${message}`;

    window.open(urlWhatsApp, '_blank');
});
// Formulario
