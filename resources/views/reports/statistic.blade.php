@extends('app')
@section('content')
    <h1>Course Launch Statistic </h1>
    <div><a href="javascript:window.history.back();">Back to Reports</a> </div>
    <table class="table">
        <thead>
        <tr class="success">
            <th>Launched in Video Mode : {{ $completionVideoCount }}</th>

        </tr>

            <tr class="success">
                <th>Launched in Text Mode : {{ $completionTextCount }}</th>

            </tr>
    </thead>

    </table>


@stop

@section('footer')

@stop