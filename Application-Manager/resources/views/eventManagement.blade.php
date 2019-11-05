@extends('layouts.main')

@section('title')
	Event Management
@endsection

@section('content')
<div id='eventResults' class='text-center'>
</div>

<script>
var src = '';

$(document).ready(function(){
        $.ajax({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/events/getAllEvents",
                method: 'GET',
                beforeSend: function(xhr){ //before starting the Ajax call
                        $('#eventResults').empty();
                        $('#eventResults').append('<div class="spinner-grow text-success"></div>');

                },
                success: function(result){ //after receiving the repsonse successfully
                        var test = JSON.parse(result);
                        $('#eventResults').empty();
                        if(test.length == 0){
                                $('#eventResults').append(
                                        "<div class='alert alert-danger alert-dismissible'>"+
                                                "<button type='button' class='close' data-dismiss='alert'>&times;</button>"+
                                                "<strong>Oops!</strong> No result found!..."+
                                        "</div>"
                                ); 
                        }
                        $.each(test, function(index, event){
                                $('#eventResults').append(
                                        "<fieldset class='border rounded border-dark p-2 pr-3 my-1'>"+
                                                "<legend class='p-2 my-2 w-50'>"+event.name+":</legend>"+
                                                "<div class='d-inline-block'>"+
                                                        "<img onmouseover='showImage(this)'' height='150' width='150' id='"+event.id+"' class='img-fluid img-thumbnail m-1' src='/storage/"+event.id+"/thumbnail.png' alt='event_image'>"+
                                                "</div>"+
                                                "<div class='input-group m-1'>"+
                                                        "<div class='input-group-prepend'>"+
                                                                "<span class='input-group-text d-block new_talent_subscription_form'>Description:</span>"+
                                                        "</div>"+
                                                        "<textarea class='form-control' name='description' rows='5' disabled>"+event.desc+"</textarea>"+
                                                "</div>"+
                                                "<div class='input-group m-1'>"+
                                                        "<div class='input-group-prepend'>"+
                                                                "<span class='input-group-text d-block new_talent_subscription_form'>From:</span>"+
                                                        "</div>"+
                                                        "<input type='date' class='form-control' name='from' disabled value='"+(event.hasOwnProperty('from')? event.from : '')+"'>"+
                                                        "<div class='input-group-prepend'>"+
                                                                "<span class='input-group-text d-block new_talent_subscription_form'>To:</span>"+
                                                        "</div>"+
                                                        "<input type='date' class='form-control' name='to' disabled value='"+(event.hasOwnProperty('to')? event.to : '')+"'>"+
                                                "</div>"+
                                                "<div class='input-group m-1'>"+
                                                        "<div class='input-group-prepend'>"+
                                                                "<span class='input-group-text d-block new_talent_subscription_form'>Notes:</span>"+
                                                        "</div>"+
                                                        "<textarea class='form-control' name='notes' rows='5' disabled>"+(event.hasOwnProperty('notes')? event.notes : '')+"</textarea>"+
                                                "</div>"+
                                        "</fieldset>"
                                );
                        });

                },
                error: function(xhr, ajaxOptions, thrownError){
                        console.log("an Error Occured!..." + xhr.responseText + " | "+ ajaxOptions+" | "+ thrownError);
                },
        });
});

function showImage(event){
        var src = $(event).attr('src');
        $('#image').attr('src', src);
        $('#myModal').fadeIn();

}

function closeModal(){
        $('#myModal').fadeOut(500);
}
</script>

<div class="modal" id="myModal" onmouseout="closeModal()">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
      <img id='image' class='img-fluid' alt='event_image'>
      </div>
    </div>
  </div>
</div>
@endsection
