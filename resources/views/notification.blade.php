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
    <tbody class="table-striped">
        @foreach ($notifiactions as $not)
        <tr id="row-{{$not->id}}">
            <td>{{$not->id}}</td>
            <td>{{$not->status}}</td>
            <td>{{$not->type}}</td>
            <td>{{$not->body}}</td>
            <td>{{$not->created_at}}</td>
            <td><button type="button" class="btn btn-success done-button" data-id="{{$not->id}}">Change ststus</button></td>

</tr>

@endforeach
    </tbody>
</table>
@endsection

@section('additionalScript')
<script>
$(document).ready(function() {
            $.ajaxSetup({
                    headers:
                 { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });


            $('.done-button').on('click', function() {
           
                var id = $(this).data("id");
                var route = "{{route('changeStatus', ['notification' => 'notification_id'])}}".replace('notification_id', id)

                $.ajax({
                    url: route, // Replace with your endpoint URL
                    type: 'POST',
                    success: function(response) {
                        // Handle your response here
                    $("#row-"+ id).hide();


                    },
                    error: function(error) {
                    // Handle any errors here
                    console.error('Error:', error);
                 }
            });
            })
        });
</script>
@endsection