@extends('layouts.main')

@section('title')
	Create an event
@endsection

@section('content')
@if($errors->any())
   <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{$errors->first()}}</strong>
   </div>
@endif

<form action="/events/manage" method="POST" enctype="multipart/form-data" class='text-center'>
@csrf
        <div class="d-inline-block">
                <img id='img-event_blank' class="img-fluid img-thumbnail m-1" src="/img/blank_event.jpg" alt="event_image">
                <input accept='image/*' onchange="previewPhoto(event)" type="file" class="d-none" name='eventImg' id='eventImg'>
                <label for="eventImg" class="btn btn-primary my-auto m-1"><i class="fa fa-upload mr-2"></i>Upload the event image (optional)</label>
        </div>
        <div class="input-group m-1">
                        <div class="input-group-prepend">
                                <span class="input-group-text d-block new_talent_subscription_form">Event name:</span>
                        </div>
                        <input type="text" class="form-control" name='name' value=" {{ old('name') }}">
        </div>
        <div class="input-group m-1">
                        <div class="input-group-prepend">
                                <span class="input-group-text d-block new_talent_subscription_form">Description:</span>
                        </div>
                        <textarea class="form-control" name='description' rows='5'></textarea>
        </div>
        <div class="input-group m-1">
                        <div class="input-group-prepend">
                                <span class="input-group-text d-block new_talent_subscription_form">From:</span>
                        </div>
                        <input type="date" class="form-control" name='from' value=" {{ old('from') }}">
                        <div class="input-group-prepend">
                                <span class="input-group-text d-block new_talent_subscription_form">To:</span>
                        </div>
                        <input type="date" class="form-control" name='to' value=" {{ old('to') }}">
        </div>
        <div class="input-group m-1">
                        <div class="input-group-prepend">
                                <span class="input-group-text d-block new_talent_subscription_form">Notes:</span>
                        </div>
                        <textarea class="form-control" name='notes' rows='5'></textarea>
        </div>
        <div class="input-group d-inline-block">
                <input type="submit" class="btn btn-success col-sm-4 mr-auto my-1" value="submit">
        </div>

</form>


<script>
        //preview the uploaded photo
        function previewPhoto(event) {
                if(URL.createObjectURL(event.target.files[0])){
                        $('#img-event_blank').attr('src', URL.createObjectURL(event.target.files[0]));
                }
        };
</script>
@endsection
