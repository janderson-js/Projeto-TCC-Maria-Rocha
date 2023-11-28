<script src="/projeto-tcc-maria-rocha/view/administracao/js/app.js"></script>
<script src="/projeto-tcc-maria-rocha/view/administracao/js/preview_img.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    // Adiciona a classe "active" ao item de menu correspondente à página atual
    document.addEventListener('DOMContentLoaded', function () {
      var currentPage = window.location.href;
      var menuItems = document.querySelectorAll('.sidebar-item a');

      menuItems.forEach(function (item) {
        if (currentPage.includes(item.getAttribute('href'))) {
          item.parentElement.classList.add('active');
        }
      });
    });
  </script>