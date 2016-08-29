@extends('app')
@section('content')
    <h1>Activity Log Detail</h1>
    <div><a href="javascript:window.history.back();">Back to Activity Log</a> </div>
    <?php
    echo "<pre>";
    $json_string = json_encode($statement, JSON_PRETTY_PRINT);
    echo stripcslashes($json_string);
    ?>
    {{--{{ Response::json($statement, 200, array(), JSON_PRETTY_PRINT) }}--}}
@stop

@section('footer')

@stop