<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="5">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/fullcalendar.min.css"/>
    <link rel="stylesheet" media="print" href="/css/fullcalendar.print.css"/>
    <script src="/js/moment.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/fullcalendar.min.js"></script>
    <script src="/js/locale/es-do.js"></script>
    <style>
        body .fc {
        / / font-size: 2.6em;
        }

        .fc-time {
            font-size: 2.4em;
            text-align: center;
        }

        .fc-toolbar, .fc-header-toolbar > .fc-center {
            text-transform: uppercase;
            font-weight: bold;

        }

        .fc-day-header, .fc-widget-header, .fc-mon {
            text-transform: uppercase;
            font-size: 1.3em;
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
<body>
<div class="col-md-12">
    <div class="col-sm-9">
        <img src="/img/logo.JPG" alt="" style="width: 100%">
    </div>
    <div class="col-sm-3">
        <div class="col-md-12">
            <span id="clock" style="width: 100%;font-size: 50px">{{date('h:i A')}}</span>
        </div>
        <div class="col-md-12">
            <span id="date" style="width: 100%;font-size: 35px">{{date('d-m-y')}}</span>
        </div>
    </div>
</div>
<div class="col-md-12" style="text-align: center;padding-top: 50px;padding-bottom: 50px">
    <span style="font-size: 50px;font-weight: bold">Sala de Reuniones : {{$room}}</span>
</div>
<div class="col-md-12">
    {{ $calendar->calendar() }}
    {{ $calendar->script() }}
</div>
</body>
</html>