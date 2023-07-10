<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            var calendar = $('#calendar');
            let loading = document.getElementById('loading');
            let eventModal = $('#eventModal');
            $.ajax({
                url: '/api/events',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var events = response.events.map(function(event) {
                        return {
                            title: event.name,
                            start: moment(event.start_date + ' ' + event.start_time, 'DD-MM-YYYY HH:mm').format(),
                            end: moment(event.end_date + ' ' + event.end_time, 'DD-MM-YYYY HH:mm').format(),
                            description: event.description,
                            price: event.price,
                            number_of_participants: event.number_of_participants,
                            horaire: event.start_time + ' - ' + event.end_time,
                            id: event.id,
                            type: event.type,
                        };
                    });


                    loading.style.display = 'none';
                    calendar.html('');
                    calendar.fullCalendar({
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                        },
                        defaultView: 'month',
                        events: events,
                        /*themeSystem: 'bootstrap5',*/
                        eventClick: function(calEvent, jsEvent, view) {
                            eventModal.find('.modal-title').text(calEvent.title);
                            eventModal.find('#eventDescription').text(calEvent.description);
                            eventModal.find('#eventPrice').text(calEvent.price);
                            switch(calEvent.type) {
                                case 'tastingEvent':
                                    eventModal.find('#eventType').text('Dégustation');
                                    break;
                                case 'professionalFormation':
                                    eventModal.find('#eventType').text('Formation professionnelle');
                                    break;
                                case 'onlineWorkshop':
                                    eventModal.find('#eventType').text('Atelier en ligne');
                                    break;
                                case 'meetingEvent':
                                    eventModal.find('#eventType').text('Réunion');
                                    break;
                                case 'homeWorkshop':
                                    eventModal.find('#eventType').text('Atelier à domicile');
                                    break;
                                default:
                                    eventModal.find('#eventType').text('Type inconnu');
                            }
                            eventModal.find('#eventHeures').text(calEvent.horaire);
                            eventModal.find('a').attr('href', '/event/' + calEvent.id);
                            eventModal.modal('show');
                        },

                    });
                }
            });
        });
    </script>
    <style>
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

        .loading-image {
            height: 50vh;
            width: 50vw;
            text-align: center;
        }


    </style>
</head>
<body>
@include('layouts.navbar')
<br>
<div style="text-align: center">
    <img id="loading" src="{{ asset('reload.gif') }}" alt="Loading..." class="loading-image" />
</div>
<br>
<br>
<div id="calendar"></div>

<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="eventDescription"></p>
                <p><i class="fa-solid fa-tag"></i> <strong>{{__('calendar.price')}}</strong> <span id="eventPrice"></span>€</p>
                <p><i class="fa-solid fa-circle-info"></i> <strong>{{__('calendar.type')}}</strong> <span id="eventType"></span></p>
                <p><i class="fa-solid fa-clock"></i> <strong>{{__('calendar.hours')}}</strong> <span id="eventHeures"></span></p>
                <a href="" class="btn btn-primary">{{__('calendar.show_event')}}</a>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
</body>
</html>
