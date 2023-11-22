window.onload = function() {
  // Inicializar os cards fechados
  document.querySelectorAll('.cont_modal').forEach(function(card) {
      card.classList.remove('cont_modal_active');
  });
}

function open_close(cardId) {
  var card = document.getElementById(cardId);

  if (card.classList.contains('cont_modal_active')) {
      card.classList.remove('cont_modal_active');
  } else {
      // Fechar outros cards abertos antes de abrir este
      document.querySelectorAll('.cont_modal_active').forEach(function(openCard) {
          openCard.classList.remove('cont_modal_active');
      });

      card.classList.add('cont_modal_active');
  }
}
