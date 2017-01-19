$(document).ready(function() {

    var current_date_time = new Date();

    $('#calendar').fullCalendar({
        header: { // Contenu du header
            left: 'month, agendaWeek',
            center: 'title',
            right: 'today prev, next'
        },
        lang: 'fr',
        defaultView: 'month', // vue par default
        views: { // format d'affichage de la date en fonction des vue
            month: {
                titleFormat: 'MMMM YYYY'
            },
            agenda:{
                titleFormat: 'D MMM YYYY'
            }
        },

        firstDay: 1, // jour ou l'agenda commentce 1 = lundi, 2 = mardi , etc...
        weekNumbers: true, // affichage du numéro de la semaine en cour
        businessHours: { // heure de travail
            start: '09:00',
            end: '18:00',
            dow: [1, 2, 3, 4, 5]
        },
        handleWindowResize: true, // redimenssionne auto du calendrier en fonction de la width du navigateur
        weekends: true, // affichage des weekends
        allDaySlot: false, // recapitulatif de la journée en haut du calendar
        slotLabelFormat: 'HH:mm', // format de l'heure sur les slots
        timeFormat: 'HH:mm',
        minTime: "08:00:00", // heure de début du calendar
        maxTime: '20:00:00', // heure de fin du calendar
        scrollTime: '09:00:00', // heure sur laquelle le calendar pointe par default
        slotEventOverlap: false, // Les évènements ne se chevauchent pas
        height: 'auto',
        forceEventDuration: true, // on oblige le user à mettre une heure de fin à l'evenement

        events: Routing.generate('events'),
        dayClick: function(date) {
            console.log(roles);
            if (date._d >= current_date_time && roles != null){
                window.location = Routing.generate('events') + date.format() + '/new';
            }
        },

        eventRender: function(event, element, view) {
            var editEvent = Routing.generate('events') + event.title+ '/edit';
            element.each(function() {
                if (!!event.salle) {
                    element.append(
                        '</br>' +
                        '<strong>' +
                        event.salle +
                        '</strong>'
                    );
                    if(event.salle == 'Salle de réunion')
                        $(element).css("backgroundColor", "red");
                    if(event.salle == 'Restaurant du personnel')
                        $(element).css("backgroundColor", "blue");
                    if(event.salle == 'Cuisine Thérapeutique')
                        $(element).css("backgroundColor", "green");
                    if(event.salle == 'Restaurant C.P.')
                        $(element).css("backgroundColor", "orange");
                    if(event.salle == 'Restaurant O.B.')
                        $(element).css("backgroundColor", "yellow");
                    if(event.salle == 'CAJA')
                        $(element).css("backgroundColor", "pink");
                    if(event.salle == 'PASA')
                        $(element).css("backgroundColor", "brown");
                }
                if (!!event.voiture) {
                    element.append(
                        '</br>' +
                        '<strong>' +
                        event.voiture +
                        '</strong>'
                    );
                    if(event.voiture == 'Clio')
                        $(element).css("backgroundColor", "red");
                    if(event.voiture == '407')
                        $(element).css("backgroundColor", "blue");
                    if(event.voiture == 'Voiture du SIAD')
                        $(element).css("backgroundColor", "green");
                    if(event.voiture == 'Boxer')
                        $(element).css("backgroundColor", "orange");
                    if(event.voiture == 'Mini-bus')
                        $(element).css("backgroundColor", "yellow");
                }
                if (!!event.evenement) {
                    element.append(
                        '</br>' +
                        '<strong>' +
                        event.evemement +
                        '</strong>'
                    );
                    if(event.evenement == 'Instances')
                        $(element).css("backgroundColor", "red");
                    if(event.evenement == 'Animations')
                        $(element).css("backgroundColor", "blue");
                    if(event.evenement == 'Interventions techniques')
                        $(element).css("backgroundColor", "green");
                    if(event.evenement == 'Interventions extérieures')
                        $(element).css("backgroundColor", "orange");
                    if(event.evenement == 'Cérémonies')
                        $(element).css("backgroundColor", "yellow");
                    if(event.evenement == 'Autres')
                        $(element).css("backgroundColor", "pink");
                }
            })
        },

        eventClick: function(calEvent){
            var day = moment(calEvent.start._d).format("dddd Do MMMM YYYY");
            var ponctuation = ' de ';
            var startTime = moment(calEvent.start._i).format('HH:mm à ');
            var endTime = moment(calEvent.end._i).format("HH:mm");
            var Time = 'Le ' + day + ponctuation + startTime + endTime;
            var editEvent = Routing.generate('events') + calEvent.id + '/edit';
            var deleteEvent = Routing.generate('events') + calEvent.id + '/delete';

            $('#modalTime').html(Time);
            $('#modalTitle').html( calEvent.titre );
            $('#modalBody').html(calEvent.contenu);
            console.log(calEvent);
            if (calEvent.images.url != null){
                $('#imgevent').html( '<img src="' + asset + calEvent.images.webPath + '" alt="' + calEvent.images.alt +'"/>' );
            }
            $('#fullCalModal').modal();

            $('#delete_event').show();
            $('#delete_event').attr('href', deleteEvent);
            $('#edit_event').show();
            $('#edit_event').attr('href', editEvent);

        }
    });
});