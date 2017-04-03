<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/fullcalendar.min.css"/>
    <link rel="stylesheet" media="print" href="/css/fullcalendar.print.css"/>
    <script src="/js/moment.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/fullcalendar.min.js"></script>
    <script src="/js/locale/es-do.js"></script>
    <style>
        body .fc {
        //font-size: 1.5em;
        }
       .fc-time{
            font-size: 1.7em;
            text-align: center;
        }
        .fc-title{
            font-size: 2.6em;
            text-align: center;
        }
        .fc-content >.fc-time{
            font-size: 1.7em;
        }
        .fc-day-header{
            font-size: 1.7em;
        }
        .container{
            margin: auto;
        }

        body{
            background-color: white;
        }
    </style>
</head>
<body onload="updateClock(); setInterval('updateClock()', 1000 )">
<div class="col-md-12">
    <div class="col-sm-10">
        <img src="/img/logo.JPG" alt="" style="width: 100%">
    </div>
    <div class="col-sm-2">
        <span id="clock" style="width: 100%;font-size: 80px">&nbsp;</span>
    </div>
    {{ $calendar->calendar() }}
    {{ $calendar->script() }}
</div>
<script>
function updateClock ( )
{
var currentTime = new Date ( );

var currentHours = currentTime.getHours ( );
var currentMinutes = currentTime.getMinutes ( );
// Pad the minutes and seconds with leading zeros, if required
currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;

// Convert an hours component of "0" to "12"
currentHours = ( currentHours == 0 ) ? 12 : currentHours;

// Compose the string for display
var currentTimeString = currentHours + ":" + currentMinutes;

// Update the time display
document.getElementById("clock").firstChild.nodeValue = currentTimeString;
}

// -->
</script>
</body>
</html>