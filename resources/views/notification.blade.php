@extends('layout')
@section('title', 'Krowa i byk')
@section('content')
<h1>Notification</h1>
<table class="table table-striped table-dark">
    <thead class="thead-dark">
        <th scope="col">#</th>
        <th scope="col">Status</th>
        <th scope="col">Type</th>
        <th scope="col">Body</th>
        <th scope="col">Time</th>
        <th scope="col">Action</th>
    </thead>
    @csrf
    <tbody class="table-striped" id="tableBody">
        @foreach ($notifications as $not)
        <tr id="row-{{$not->id}}">
            <td class='maxId'>{{$not->id}}</td>
            <td>{{$not->status}}</td>
            <td>{{$not->type}}</td>
            <td>{{$not->body}}</td>
            <td>{{$not->created_at}}</td>
            <td><button type="button" class="btn btn-success done-button" data-id="{{$not->id}}">Change ststus</button></td>

</tr>

@endforeach
    </tbody>
</table>
<a id="change-status-route"  href={{route('changeStatus', ['notification' => 'notification_id'])}} hidden></a> 
<a id="last-message-route"  href={{route('reciveNew', ['id' => 'lastNotificationId'])}} hidden></a> 
<div id="lastNotificationId" data-id="{{$lastNotificationId->id}}" ></div>
@endsection

@vite('resources/js/changeStatus.js');
@section('additionalScript')

@endsection