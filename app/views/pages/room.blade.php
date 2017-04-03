<!doctype html>
<html lang="en">
<head>
    <!-- <meta http-equiv="refresh" content="5"> -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/fullcalendar.min.css"/>
    <link rel="stylesheet" media="print" href="/css/fullcalendar.print.css"/>
    <script src="/js/moment.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/fullcalendar.min.js"></script>
    <script src="/js/locale/es-do.js"></script>
    <style>
        body .fc {
        / / font-size: 1.5 em;
        }

        .fc-time {
            font-size: 1.7em;
            text-align: center;
        }

        .fc-toolbar, .fc-header-toolbar > .fc-center {
            text-transform: uppercase;
            font-weight: bold;
        }

        .fc-today {
            text-transform: uppercase;
        }

        .fc-title {
            font-size: 2.6em;
            text-align: center;
        }

        .fc-content > .fc-time {
            font-size: 1.7em;
        }

        .fc-day-header {
            font-size: 1.7em;
        }

        .container {
            margin: auto;
        }

        body {
            background-color: white;
        }
    </style>
</head>
<body onload="updateClock(); setInterval('updateClock()', 1000 )">
<div class="col-md-12">
    <div class="col-sm-9">
        <img src="/img/logo.JPG" alt="" style="width: 100%">
    </div>
    <div class="col-sm-3">
        <div class="col-md-12">
            <span id="clock" style="width: 100%;font-size: 70px">&nbsp;</span>
        </div>
        <div class="col-md-12">
            <span id="date" style="width: 100%;font-size: 50px">&nbsp;</span>
        </div>
    </div>
</div>
<div class="col-md-12" style="text-align: center">
    <span style="font-size: 50px;font-weight: bold">Sala de Reuniones : {{$room}}</span>
</div>
<div class="col-md-12">
    {{ $calendar->calendar() }}
    {{ $calendar->script() }}
</div>
<script>
    function updateClock() {
        var currentTime = new Date();

        var currentHours = currentTime.getHours();
        var currentMinutes = currentTime.getMinutes();
        // Pad the minutes and seconds with leading zeros, if required
        currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
        // Convert an hours component of "0" to "12"
        currentHours = ( currentHours == 0 ) ? 12 : currentHours;
        // Choose either "AM" or "PM" as appropriate
        var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";
        // Compose the string for display
        // Convert the hours component to 12-hour format if needed
        currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
        var currentTimeString = currentHours + ":" + currentMinutes+ ":"+ timeOfDay;
        // Update the time display
        document.getElementById("clock").firstChild.nodeValue = currentTimeString;
    }
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd;
    }
    if(mm<10){
        mm='0'+mm;
    }
    var today = dd+'-'+mm+'-'+yyyy;
    document.getElementById("date").firstChild.nodeValue = today;

    // -->
</script>
</body>
</html>