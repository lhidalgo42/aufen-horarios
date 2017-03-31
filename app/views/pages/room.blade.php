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
       .fc-time{
            font-size: 1.7em;
            text-align: center;
        }
        .fc-title{
            font-size: 2.2em;
            text-align: center;
        }
        .fc-content >.fc-time{
            font-size: 1.7em;
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
<div style="text-align: center"><iframe width="560" height="315" src="https://www.youtube.com/embed/f8ALdaXPuPE?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
</div>
</body>
</html>