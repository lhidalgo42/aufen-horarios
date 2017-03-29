@extends('layouts.master')
@section('content')
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>Nombre</th>
            <th>Horario</th>
        </tr>
        @foreach($schedules as $schedule)
            <tr>
                <td rowspan="2">{{$schedule->name}}</td>
                <td>{{$schedule->start}}</td>
            </tr>
            <tr>
                <td>{{$schedule->end}}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection