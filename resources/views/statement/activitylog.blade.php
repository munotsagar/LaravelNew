@extends('app')
@section('content')
    <h1>Activity Log</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Sr. No</th>
            <th>Actor Name</th>
            <th>Actor mbox</th>
            <th>Object Type</th>
            <th>Verb</th>
            <th>Object Id</th>
            <th>Recoreded Date</th>
        </tr>
        </thead>
        <tbody>
        @set('i', $page)
        @foreach($statements as $statement)
            <tr class="success">
                <td>{{$i}}</td>
                <td><a href="{{ url('/xapi/activitylog/'.$statement->_id) }}"> {{ $statement->statement['actor']['name'] }}</a></td>
                <td>{{ $statement->statement['actor']['mbox'] }}</td>
                <td><a href="{{ url('/xapi/activitylog/'.$statement->_id) }}"> {{ $statement->statement['object']['objectType'] }}</a></td>
                <td>{{ $statement->statement['verb']['display']['en-US'] }}</td>
                <td>{{ $statement->statement['object']['id'] }}</td>
                <td>{{ $statement->created_at }}</td>

            </tr>
            @set('i', $i+1)
        @endforeach
        </tbody>
    </table>
    <div class="pagination"> {{ $statements->render() }} </div>

@stop

@section('footer')

@stop