document.getElementById('formulario').addEventListener('submit', function (event) {
    event.preventDefault();

    const nome_1 = document.getElementById('nome_1').value;
    const email_1 = document.getElementById('email_1').value;
    const numer = document.getElementById('numer').value;
    const message_1 = document.getElementById('message_1').value;
    const urlWhatsApp = `https://wa.me/5561984275435?text=Olá, meu nome é ${nome_1}.%0A%0AMeu email é ${email_1} e meu telefone é ${numer} Gostaria de falar sobre..%0A%0A${message_1}`;

    window.open(urlWhatsApp, '_blank');
});