<!-- <script src="/marcia_rocha/administracao/js/app.js"></script>  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="/marcia_rocha/administracao/js/app.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/dd27afdffd.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Adiciona a classe "active" ao item de menu correspondente à página atual
  document.addEventListener('DOMContentLoaded', function() {
    var currentPage = window.location.href;
    var menuItems = document.querySelectorAll('.sidebar-item a');

    menuItems.forEach(function(item) {
      if (currentPage.includes(item.getAttribute('href'))) {
        item.parentElement.classList.add('active');
      }
    });
  });
</script>