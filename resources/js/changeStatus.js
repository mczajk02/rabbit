$(document).ready(function() {
    $.ajaxSetup({
            headers:
         { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });


    $('.done-button').on('click', function() {
   
        var id = $(this).data("id");
        // var route = "{{route('changeStatus', ['notification' => 'notification_id'])}}".replace('notification_id', id)
        // var route = '/notification/' + id + '/done';
        var route = $("#change-status-route").attr('href').replace('notification_id', id)
        
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
    
    setInterval(function(){
        var maxId = $('#lastNotificationId').attr('data-id');
        
        var route = $("#last-message-route").attr('href').replace('lastNotificationId', maxId)
        console.log(route);

        $.ajax({
            url: route, // Replace with your endpoint URL
            type: 'GET',
            success: function(response) {
                // Handle your response here
           console.log(response);
                
           
           if(Array.isArray(response) && response.length > 0){
            let lastitem = response[response.length -1];

               $('#lastNotificationId').attr('data-id', lastitem.id);

               $.each(response, function(index, item) {
                var tbody = $('#tableBody');
                var create = item.created_at;
                
                var newRow = '<tr><td>' + item.id + '</td><td>' + item.status + '</td><td>' + item.type + '</td><td>' + item.body + '</td><td>'+ create.slice(0, -17) +'</td><td><button type="button" class="btn btn-success done-button" data-id="' + item.id + '">Change ststus</button></td>></tr>';
                console.log(newRow);
                
                tbody.append(newRow);

            });

           }
           
            },
            error: function(error) {
            // Handle any errors here
            console.error('Error:', error);
         }
    });
        
    },10000);
});