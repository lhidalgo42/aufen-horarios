<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/fullcalendar.min.css"/>
    <link rel="stylesheet" media="print" href="/css/fullcalendar.print.css"/>
    <script src="/js/moment.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/fullcalendar.min.js"></script>
    <style>
        body .fc {
        //font-size: 1.5em;
        }
        .fc-title,.fc-time{
            font-size: 1.7em;
            text-align: center;
        }
        .fc-day-header{
            font-size: 1.7em;
        }

        body{
            background-color: white;
        }
    </style>
</head>
<body>
{{ $calendar->calendar() }}
{{ $calendar->script() }}
</body>
</html>