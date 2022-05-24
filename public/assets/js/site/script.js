
const timeElapsed = Date.now();
const today = new Date(timeElapsed);
var data = today.toISOString().split('T')[0];





(function(win, doc){
    'use strict';
    let calendarEl = doc.querySelector('.calendar');
    let calendar = new FullCalendar.Calendar(calendarEl, {
        height: "auto",
        locale: 'pt-br',
        timeZone: 'America/Sao_Paulo',
        showNonCurrentDates: false,
        fixedWeekCount: false,

        weekends: false,                // fim de semana desativado
        initialView: 'timeGridWeek',    // inicia com o visualizador da semana
        slotMinTime: '08:00:00',        // horario inicial do atendimento
        slotMaxTime: '17:00:00',        // horario final do atendimento
        slotDuration: '00:30:00',
        allDaySlot: false,
        slotLabelFormat: {
            hour: 'numeric',
            minute: '2-digit',
            omitZeroMinute: false,
            // meridiem: false
        },
        headerToolbar: {
            start: 'today prev,next' ,
            center: 'title',
            end:  'dayGridMonth, timeGridWeek, timeGridDay', 
        },
        buttonText: {
            today:    'Hoje',
            month:    'Mês',
            week:     'Semana',
            day:      'Dia',
            list:     'Lista',
        },
        validRange: {
            // o calendario começará do dia atual
            start: data
        },
        events: {
            url: "http://127.0.0.1:8000/api/eventos"
        },
        eventClick: function(info) {
            alert('Event: ' + info.event.id);
            alert('Event: ' + info.event.title);
            
            // change the border color just for fun
            info.el.style.borderColor = 'red';
          },
        dateClick: function(info) {

            

            if(info.dateStr.split('T')[0] == "2022-05-30"){
                alert('esse dia foi desativado');
                info.dayEl.style.backgroundColor = 'gray';
                return false
            }

            if(info.view.type == 'dayGridMonth'){
                calendar.changeView('timeGridDay', info.dateStr)
                return false;
            }


            let arr = info.dateStr.split('T')[0].split('-');
            let data = info.dateStr.split('T')[0];
            let dataBr = arr[2] +"/"+ arr[1] +"/"+ arr[0];
            let horario = info.dateStr.split('T')[1];

            doc.getElementById('btnModal').click();
            doc.getElementById('dataBr').value = dataBr;
            doc.getElementById('data').value = data;
            doc.getElementById('horario').value = horario;

        },

    });
    calendar.render()

    // adicionando responsividade.
    doc.querySelector('.fc-header-toolbar').classList.add(['d-flex'], ['flex-lg-row'], ['flex-column']);
    doc.querySelector('.fc-toolbar-title').classList.add(['fs-4'],['fs-lg-1'])
    doc.querySelectorAll('.fc-toolbar-chunk')[1].classList.add(['my-3']);
    let calendarDayHeader = doc.querySelectorAll('.fc-scrollgrid-sync-inner')
    for(let i=0; i<=calendarDayHeader.length; i++){
        // calendarDayHeader[i].classList.add(['fs-6'], ['fw-light'])
    }

})(window, document);

