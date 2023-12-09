document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("calendar");

  var calendar = new FullCalendar.Calendar(calendarEl, {
    editable: false,
    eventLimit: true,
    dayMaxEventRows: 4,
    displayEventTime: this.displayEventTime,
    locale: "pt-br",
    timeFormat: "HH:mm",
    allDayText: "24 horas",
    columnFormat: "dddd",

    buttonText: {
      prev: "Anterior",
      next: "Próximo",
      prevYear: "Ano anterior",
      nextYear: "Próximo ano",
      year: "Ano",
      today: "Hoje",
      month: "Mês",
      week: "Semana",
      day: "Dia",
      list: "Lista",
    },

    buttonHints: {
      prev: "$0 Anterior",
      next: "Próximo $0",
      today(buttonText) {
        return buttonText === "Dia"
          ? "Hoje"
          : (buttonText === "Semana" ? "Esta" : "Este") +
              " " +
              buttonText.toLocaleLowerCase();
      },
    },

    viewHint(buttonText) {
      return (
        "Visualizar " +
        (buttonText === "Semana" ? "a" : "o") +
        " " +
        buttonText.toLocaleLowerCase()
      );
    },

    weekText: "Sm",
    weekTextLong: "Semana",
    allDayText: "dia inteiro",

    moreLinkText(n) {
      return "mais +" + n;
    },

    moreLinkHint(eventCnt) {
      return `Mostrar mais ${eventCnt} eventos`;
    },

    noEventsText: "Não há Agendamentos para mostrar",
    navLinkHint: "Ir para $0",
    closeHint: "Fechar",
    timeHint: "A hora",
    eventHint: "Evento",
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
    },

    fixedWeekCount: true,
    navLinks: true, // can click day/week names to navigate views
    selectable: true,

    select: function (info) {
      var dataSelecionada = info.start.toISOString().substring(0, 10);
      $("#modalAgendamento #dataAgendamento").val(dataSelecionada);
    },

    dateClick: function (info) {
      var dataClicada = info.date;
      var diaDaSemana = dataClicada.getDay();
      var nomesDiasSemana = [
        "Domingo",
        "Segunda-feira",
        "Terça-feira",
        "Quarta-feira",
        "Quinta-feira",
        "Sexta-feira",
        "Sábado",
      ];
      var nomeDia = nomesDiasSemana[diaDaSemana];

      if (nomeDia === "Domingo" || nomeDia === "Sábado") {
        return false;
      }
      if (info.view.type === "dayGridMonth") {
        var dataHoje = new Date();

        if (dataClicada.getTime() >= dataHoje.getTime() || dataHoje.getDay() == dataClicada.getDay()) {
          $("#modalAgendamento").modal("show");
          
          $(".step").hide();
          $("#step1").show();

          var dataFormatada = dataClicada.toISOString().split("T")[0];

          $("#modalAgendamento #agendamentoForm #data").val(dataFormatada);
          console.log(dataFormatada);
        }
      }
      // Adicionando um ouvinte de evento para o evento de mudança
    },

    eventClick: function (info) {
      info.jsEvent.preventDefault(); // don't let the browser navigate
      $("#modalEditarAgendamento").modal("show");

      colocaDadosFormEditaAgendamento(info.event.id);
    },

    businessHours: [
      {
        // Defina os horários comerciais para segunda a sexta-feira
        daysOfWeek: [1, 2, 3, 4, 5, 6, 0], // 1 = segunda-feira, 2 = terça-feira, etc.
        startTime: "07:00", // Hora de início das horas comerciais
        endTime: "18:00",
      },
    ],

    events: function (info, successCallback, failureCallback) {
      carregaAgendamentosAJAX(info, successCallback, failureCallback);
    },
  });

  calendar.render();
  calendar.handleWindowResize();
  calendar.updateSize();
});

function carregaAgendamentosAJAX(info, successCallback, failureCallback) {
  $.ajax({
    url: "/marcia_rocha/controllers/agendamento/controller_listar_agenda.php",
    type: "GET",
    data: { acao: "listaAgendamento" },
    dataType: "json",
    success: function (response) {
      successCallback(response);
       
    },
    error: function () {
      failureCallback("Houve um erro ao buscar os Agendamentos pelo Ajax."); // Trata erros
    },
  });
}

function colocaDadosFormEditaAgendamento(id) {
  var agendamentoID = id;

  $.ajax({
    url: "/marcia_rocha/controllers/agendamento/controller_carregarPorID.php",
    type: "GET",
    data: {  id: agendamentoID },
    dataType: "json",
    success: function (data) {
     console.log(data[0]);
      $('#modalEditarAgendamento #formEditarAgendamento #id').val(data[0].id);
      $('#modalEditarAgendamento #formEditarAgendamento #tipo').val(data[0].tipo);
      $('#modalEditarAgendamento #formEditarAgendamento #paciente').val(data[0].paciente.nome);
      $('#modalEditarAgendamento #formEditarAgendamento #idPaciente').val(data[0].paciente.id);
      $('#modalEditarAgendamento #formEditarAgendamento #funcionario').val(data[0].funcionario.id);
      const dataFormatada = moment(data[0].start).format("YYYY-MM-DD");
      $('#modalEditarAgendamento #formEditarAgendamento #data').val(dataFormatada);
      $('#modalEditarAgendamento #formEditarAgendamento #time').val(data[0].time);
      $('#modalEditarAgendamento #formEditarAgendamento #status').val(data[0].status);
      $('#modalEditarAgendamento #formEditarAgendamento #idTipo').val(data[0].objeto.id);
      $('#modalEditarAgendamento #formEditarAgendamento #cor').val(data[0].cor);

    },
    error: function () {
      failureCallback(
        "Houve um erro ao colocar os dados no formulario de edição de Agendamentos pelo Ajax."
      ); // Trata erros
    },
  });
}
