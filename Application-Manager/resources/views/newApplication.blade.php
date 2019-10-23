@extends('layouts.main')

@section('title')
    New Application
@endsection

@section('content')
{{-- <span>	{{  Auth()->user()->id }}</span> --}}

        <script>
                //remember extra photos
                var extras = 0;

                //add an input for an extra photo
                function addExtraPhoto(caller) {
                //show an extra input and increment extras
                if (extras < 4) {
                        ++extras;
                        $('#wrapperExtra'+extras).show();
                }
                //hide button when all extras are shown
                if (extras === 4) $(caller).hide();
                }

                //preview the uploaded photo
                function previewPhoto(caller, event) {
                var img = document.getElementById('img-'+caller.id);
                img.src = URL.createObjectURL(event.target.files[0]);
                };
        </script>

	<div class="container text-center">
		<form action="/applications/new" enctype="multipart/form-data" method="POST">
		@csrf
                <div class="input-group">
                        <div class="input-group-prepend">
                                <span class="input-group-text d-block new_talent_subscription_form">First Name:</span>
                        </div>
                        <input type="text" class="form-control" name="firstName" value=" {{ old('firstName') }}">
                </div> 
        <div  class="mb-3 pl-3"><span class='text-danger'>{{ $errors->first('firstName') }}</span></div>
                <div class="input-group">
                        <div class="input-group-prepend">
                                <span class="input-group-text d-block new_talent_subscription_form">Last Name:</span>
                        </div>
                        <input type="text" class="form-control" name="lastName" value=" {{ old('lastName') }}">
                </div>
                <div  class="mb-3 pl-3"><span class='text-danger'>{{ $errors->first('lastName') }}</span></div>
                        <div class="input-group">
                                <div class="input-group-prepend" onclick="convertLength()" style="cursor: pointer;" >
                                        <span class="input-group-text d-block new_talent_subscription_form"><i class="fa fa-info-circle text-dark" data-toggle="tooltip" title="Please click to convert cm to ft!"></i>&nbsp;Height:</span>
                                </div>
                                <select class="form-control" name="height_feet" id="height_feet">
                                        <option value="" selected disabled id='ft'>Select Feet</option>
                                        <option value="3" id='3ft'>3 feet</option>
                                        <option value="4" id='4ft'>4 feet</option>
                                        <option value="5" id='5ft'>5 feet</option>
                                        <option value="6" id='6ft'>6 feet</option>
                                        <option value="7" id='7ft'>7 feet</option>
                                </select>
                                <select class="form-control" name="height_inches" id="height_inches">
                                        <option value="" selected disabled id='in'>Select Inches</option>
                                        <option value="0" id='004in'>0 inch</option>
                                                <option value="0.25" id='014in'>&nbsp;&nbsp;&nbsp;&nbsp; 1/4 inch</option>
                                                <option value="0.5" id='024in'>&nbsp;&nbsp;&nbsp;&nbsp; 1/2 inch</option>
                                                <option value="0.75" id='034in'>&nbsp;&nbsp;&nbsp;&nbsp; 3/4 inch</option>
                                                <option value="1" id='104in'>1 inch</option>
                                                <option value="1.25" id='114in'>&nbsp;&nbsp;&nbsp;&nbsp; 1 1/4 inch</option>
                                                <option value="1.5" id='124in'>&nbsp;&nbsp;&nbsp;&nbsp; 1 1/2 inch</option>
                                                <option value="1.75" id='134in'>&nbsp;&nbsp;&nbsp;&nbsp; 1 3/4 inch</option>
                                                <option value="2" id='204in'>2 inches</option>
                                                <option value="2.25" id='214in'>&nbsp;&nbsp;&nbsp;&nbsp; 2 1/4 inch</option>
                                                <option value="2.5" id='224in'>&nbsp;&nbsp;&nbsp;&nbsp; 2 1/2 inch</option>
                                                <option value="2.75" id='234in'>&nbsp;&nbsp;&nbsp;&nbsp; 2 3/4 inch</option>
                                                <option value="3" id='304in'>3 inches</option>
                                                <option value="3.25" id='314in'>&nbsp;&nbsp;&nbsp;&nbsp; 3 1/4 inch</option>
                                                <option value="3.5" id='324in'>&nbsp;&nbsp;&nbsp;&nbsp; 3 1/2 inch</option>
                                                <option value="3.75" id='334in'>&nbsp;&nbsp;&nbsp;&nbsp; 3 3/4 inch</option>
                                                <option value="4" id='404in'>4 inches</option>
                                                <option value="4.25" id='414in'>&nbsp;&nbsp;&nbsp;&nbsp; 4 1/4 inch</option>
                                                <option value="4.5" id='424in'>&nbsp;&nbsp;&nbsp;&nbsp; 4 1/2 inch</option>
                                                <option value="4.75" id='434in'>&nbsp;&nbsp;&nbsp;&nbsp; 4 3/4 inch</option>
                                                <option value="5" id='504in'>5 inches</option>
                                                <option value="5.25" id='514in'>&nbsp;&nbsp;&nbsp;&nbsp; 5 1/4 inch</option>
                                                <option value="5.5" id='524in'>&nbsp;&nbsp;&nbsp;&nbsp; 5 1/2 inch</option>
                                                <option value="5.75" id='534in'>&nbsp;&nbsp;&nbsp;&nbsp; 5 3/4 inch</option>
                                                <option value="6" id='604in'>6 inches</option>
                                                <option value="6.25" id='614in'>&nbsp;&nbsp;&nbsp;&nbsp; 6 1/4 inch</option>
                                                <option value="6.5" id='624in'>&nbsp;&nbsp;&nbsp;&nbsp; 6 1/2 inch</option>
                                                <option value="6.75" id='634in'>&nbsp;&nbsp;&nbsp;&nbsp; 6 3/4 inch</option>
                                                <option value="7" id='704in'>7 inches</option>
                                                <option value="7.25" id='714in'>&nbsp;&nbsp;&nbsp;&nbsp; 7 1/4 inch</option>
                                                <option value="7.5" id='724in'>&nbsp;&nbsp;&nbsp;&nbsp; 7 1/2 inch</option>
                                                <option value="7.75" id='734in'>&nbsp;&nbsp;&nbsp;&nbsp; 7 3/4 inch</option>
                                                <option value="8" id='804in'>8 inches</option>
                                                <option value="8.25" id='814in'>&nbsp;&nbsp;&nbsp;&nbsp; 8 1/4 inch</option>
                                                <option value="8.5" id='824in'>&nbsp;&nbsp;&nbsp;&nbsp; 8 1/2 inch</option>
                                                <option value="8.75" id='834in'>&nbsp;&nbsp;&nbsp;&nbsp; 8 3/4 inch</option>
                                                <option value="9" id='904in'>9 inches</option>
                                                <option value="9.25" id='914in'>&nbsp;&nbsp;&nbsp;&nbsp; 9 1/4 inch</option>
                                                <option value="9.5" id='924in'>&nbsp;&nbsp;&nbsp;&nbsp; 9 1/2 inch</option>
                                                <option value="9.75" id='934in'>&nbsp;&nbsp;&nbsp;&nbsp; 9 3/4 inch</option>
                                                <option value="10" id='1004in'>10 inches</option>
                                                <option value="10.25" id='1014in'>&nbsp;&nbsp;&nbsp;&nbsp; 10 1/4 inch</option>
                                                <option value="10.5" id='1024in'>&nbsp;&nbsp;&nbsp;&nbsp; 10 1/2 inch</option>
                                                <option value="10.75" id='1034in'>&nbsp;&nbsp;&nbsp;&nbsp; 10 3/4 inch</option>
                                                <option value="11" id='1104in'>11 inches</option>
                                                <option value="11.25" id='1114in'>&nbsp;&nbsp;&nbsp;&nbsp; 11 1/4 inch</option>
                                                <option value="11.5" id='1124in'>&nbsp;&nbsp;&nbsp;&nbsp; 11 1/2 inch</option>
                                                <option value="11.75" id='1134in'>&nbsp;&nbsp;&nbsp;&nbsp; 11 3/4 inch</option>
                                </select>
                    <script>
                        document.getElementById('{{ old('height_feet')?old('height_feet'):''  }}ft').selected = true;
                        document.getElementById('{{ old('height_inches')? old('height_inches'): ''}}in').selected = true;
                    </script>
                </div>
                <div  class="mb-3 pl-3"><span  class='text-danger'>{{ $errors->first('height_feet') }} {{ $errors->first('height_inches') }} </span></div>

				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text d-block new_talent_subscription_form">Phone:</span>
					</div>
					<input type="text" class="form-control" name='phone' value=" {{ old('phone') }}">
                </div>
                <div  class="mb-3 pl-3"><span  class='text-danger'>{{ $errors->first('phone') }}</span></div>

				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text d-block new_talent_subscription_form">Email:</span>
					</div>
					<input type="text" class="form-control" name='email' value=" {{ old('email') }}">
                </div>
                <div  class="mb-3 pl-3"><span  class='text-danger'>{{ $errors->first('email') }}</span></div>

				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text new_talent_subscription_form"><span class="w-100 text-center">Remark:</span></div>
					</div>
					<textarea class="form-control" rows="5" name='remark'>{{ old('remark') }}</textarea>
                </div>
                <div  class="mb-3 pl-3"><span  class='text-danger'>{{ $errors->first('remark') }}</span></div>

                <!-- Photos -->
                <div class="my-2">
                    <img id='img-faceshot' class="img-fluid" src="/img/ex_faceshot.jpg" alt="faceshot">
                    <input id="faceshot" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none" name='faceshot'>
                    <label for="faceshot" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Face Shot</label>
                </div>
                <div  class="mb-3 pl-3"><span  class='text-danger'>{{ $errors->first('faceshot') }}</span></div>

                <div class="my-2 ">
                    <img id='img-profile' class="img-fluid" src="/img/ex_profile.jpg" alt="profile">
                    <input id="profile" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none" name='profile'>
                    <label for="profile" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Profile</label>
                </div>
                <div  class="mb-3 pl-3"><span  class='text-danger'>{{ $errors->first('profile') }}</span></div>

                <div class="my-2">
                    <img id='img-waistup' class="img-fluid" src="/img/ex_waistup.jpg" alt="waistup">
                    <input id="waistup" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none" name='waistup'>
                    <label for="waistup" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Waist Up</label>
                </div>
                <div  class="mb-3 pl-3"><span  class='text-danger'>{{ $errors->first('waistup') }}</span></div>

                <div class="my-2">
                    <img id='img-headtotoes' class="img-fluid" src="/img/ex_headtotoes.jpg" alt="headtotoes">
                    <input id="headtotoes" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none" name='headtotoes'>
                    <label for="headtotoes" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Head To Toes</label>
                </div>
                <div  class="mb-3 pl-3"><span  class='text-danger'>{{ $errors->first('headtotoes') }}</span></div>

                <!-- EXTRA PHOTOS -->
                <div id="wrapperExtra1" class="my-2 collapse">
                    <img id='img-extra1' class="img-fluid" src="/img/extra.jpg">
                    <input id="extra1" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none" name='extra1'>
                    <label for="extra1" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Extra</label>
                </div>

                <div id="wrapperExtra2" class="my-2 collapse">
                    <img id='img-extra2' class="img-fluid" src="/img/extra.jpg">
                    <input id="extra2" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none" name='extra2'>
                    <label for="extra2" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Extra</label>
                </div>

                <div id="wrapperExtra3" class="my-2 collapse">
                    <img id='img-extra3' class="img-fluid" src="/img/extra.jpg">
                    <input id="extra3" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none" name='extra3'>
                    <label for="extra3" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Extra</label>
                </div>

                <div id="wrapperExtra4" class="my-2 collapse">
                    <img id='img-extra4' class="img-fluid" src="/img/extra.jpg">
                    <input id="extra4" accept='image/*' onchange="previewPhoto(this, event)" type="file" class="d-none" name='extra4'>
                    <label for="extra4" class="btn btn-primary my-4"><i class="fa fa-upload mr-2"></i>Upload Extra</label>
                </div>

                <!-- END EXTRA PHOTOS -->
                <div onclick="addExtraPhoto(this)" class='btn btn-block btn-secondary my-2'><i class='fa fa-plus mx-2'></i>Add Extra Photo<i class='fa fa-plus mx-2'></i></div>
				<div class="input-group">
					<input type="submit" class="btn btn-success col-sm-4 mr-auto my-1" value="submit">
					<input type="reset" class="btn btn-danger col-sm-4 ml-auto my-1" value="cancel">
				</div>
		</form>
	</div>

        {{--  The Modal for showing the height converter --}}
<div class="modal" id="heightConverter">
  <div class="modal-dialog" style="overflow-y: initial !important;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info">
        <h5 class="modal-title">Height converter</h5>
        <button type="button" class="close crossbtn" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body bg-light" style="max-height: 600px; overflow-y: auto;">
        <div class="input-group my-1">
          <div class="input-group-prepend">
            <span class="input-group-text d-block new_talent_subscription_form">Height in Cm:</span>
          </div>
          <input type="number" name="number" class="form-control" placeholder="Please enter the height in centi meters...">
        </div>
        <span class="btn btn-info w-100 my-2" onclick="calculateFT()">Convert</span>
      </div>
    </div>
  </div>
</div>

<script>
//This funciton will show the height convert Modal
function convertLength(){
  $('#heightConverter').show();
}

//This function will convert the cm to ft and in and return the values in relevant height section in form (selecting the correct option)
function calculateFT(){
  var cm = $("input[name='number']").val();
  //30.48 is the cm to in convesion factor
  // 2.54 is cm to in conversion factor
  var ft = Math.floor(cm/30.48);
  var inch = Math.floor((cm - (ft * 30.48))/2.54);
  var remainder = Math.floor(((cm - ((ft * 30.48) + (inch * 2.54)))/2.54)*4);
  // console.log("feet: "+ft);
  // console.log("Inches: "+inch);
  // console.log("Remainder: "+remainder);
  $("#"+ft+"ft").prop("selected", true);
  $("#"+inch+""+remainder+"4in").prop("selected", true);
  $('#heightConverter').hide();
}
</script>
@endsection