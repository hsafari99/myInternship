<?php
    if (!isset($max)) $max = 4;
    $types = ["faceshot", "profile", "waistup", "headtotoes"];
?>

<script>
    //remember extra photos
    var extras = 0;

    //add an input for an extra photo
    function addExtraPhoto(caller) {
        //show an extra input and increment extras
        if (extras < {{ $max }}) {
            ++extras;
            $('#wrapperExtra'+extras).show();
        }
        //hide button when all extras are shown
        if (extras === {{ $max }}) $(caller).hide();
    }

    //preview the uploaded photo
    function previewPhoto(caller, event) {
        var img = document.getElementById('img-'+caller.id);
        img.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<!-- MAIN PHOTOS -->
@foreach($types as $type)
    <label for="{{ $type }}" class="btn btn-primary card my-2" style="max-width:75%">
        <img id='img-{{ $type }}' class="card-img-top mt-1" src="/img/ex_{{ $type }}.jpg" alt="{{ $type }}">
        <input id="{{ $type }}" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="hide" name='{{ $type }}'>
        <span class="h5 mt-3"><i class="fa fa-upload mr-2"></i>Upload</span>
    </label>
@endforeach

<!-- EXTRA PHOTOS -->
@for($i = 1; $i <= $max; $i++)
    <label for="extra{{ $i }}" id="wrapperExtra{{ $i }}" class="btn btn-secondary card my-2" style="max-width:75%; display:none">
        <img id='img-extra{{ $i }}' class="card-img-top mt-1" src="/img/extra.jpg">
        <input id="extra{{ $i }}" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="hide" name='extra{{ $i }}'>
        <span class="h5 mt-3"><i class="fa fa-upload mr-2"></i>Upload</span>
    </label>
@endfor

<div style="max-width:50%" onclick="addExtraPhoto(this)" class='btn btn-block btn-secondary my-2'><i class='fa fa-plus mx-2'></i>Add Extra Photo<i class='fa fa-plus mx-2'></i></div>