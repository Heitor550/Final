<div>
    <div id="calendar"></div>
</div>

@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script>
    document.addEventListener('livewire:load', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: @json($events),
            eventClick: function(info) {
                alert('Manutenção: ' + info.event.title + '\nTipo: ' + info.event.extendedProps.type + '\nDescrição: ' + info.event.extendedProps.description);
            }
        });
        calendar.render();
    });
</script>
@endpush