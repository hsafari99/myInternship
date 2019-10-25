@extends('layouts.main')

@section('title')
    View Application Profile
@endsection

@section('content')
{{-- Header part --}}
<div class='container text-left'>
        <h3 id="flName" class='text-dark'></h3>
        &emsp;<h5 class='text-dark font-weight-normal text-capitalize d-inline-block' style="text-shadow: none;">Scouted At: &nbsp;</h5><span id="scouteOffice"></span><br/>
        &emsp;<h5 class='text-dark font-weight-normal text-capitalize d-inline-block' style="text-shadow: none;">Scouted By:&nbsp;</h5><span id="scoutedBy"></span><br/>
        <hr/>
</div>
{{-- Images --}}
<div class='row'>
        <div class='col-sm-3 my-1 rounded'><img class="img-fluid" alt="Face Shot Image" id='faceShot' onclick="magnify(event)" data-toggle="modal" data-target="#myModal"></div>
        <div class='col-sm-3 my-1 rounded'><img class="img-fluid" src="" alt="Profile Image" id='profile' onclick="magnify(event)" data-toggle="modal" data-target="#myModal"></div>
        <div class='col-sm-3 my-1 rounded'><img class="img-fluid" src="" alt="Waist Up Image" id='waisteUp' onclick="magnify(event)" data-toggle="modal" data-target="#myModal"></div>
        <div class='col-sm-3 my-1 rounded'><img class="img-fluid" src="" alt="Head To Toe Image" id='headToToe' onclick="magnify(event)" data-toggle="modal" data-target="#myModal"></div>
</div>

{{-- Extra images --}}
<div class='row' id='extraPhotos' hidden>
        <div class='col-sm-3 my-1 rounded'><img class="img-fluid" src="" alt="Other Image 1" id='others0' onclick="magnify(event)" data-toggle="modal" data-target="#myModal"></div>
        <div class='col-sm-3 my-1 rounded'><img class="img-fluid" src="" alt="Other Image 2" id='others1' onclick="magnify(event)" data-toggle="modal" data-target="#myModal"></div>
        <div class='col-sm-3 my-1 rounded'><img class="img-fluid" src="" alt="Other Image 3" id='others2' onclick="magnify(event)" data-toggle="modal" data-target="#myModal"></div>
        <div class='col-sm-3 my-1 rounded'><img class="img-fluid" src="" alt="Other Image 4" id='others3' onclick="magnify(event)" data-toggle="modal" data-target="#myModal"></div>
</div>
<button class='btn w-100 mt-3' onclick="showExtraPhotos()" id='showMore' style="background-color: #ccfff1">
        <i class="fa fa-chevron-down text-dark" style="font-size: 25px;"></i>
        Show more photos
</button>

{{-- Personal Information --}}
<div class='row my-3'>
        <div class='col-sm-4 my-1 rounded'>
        <h4 id="flName" class='text-dark'>Personal Information:</h4>
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Gender:</span>
                        </div>
                        <span class="form-control text-capitalize" id="gender">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Age:</span>
                        </div>
                        <span class="form-control text-capitalize" id="age">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Birthday:</span>
                        </div>
                        <span class="form-control text-capitalize" id="dob">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Citizenships:</span>
                        </div>
                        <span class="form-control text-capitalize" id="citizenships">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Work Permit:</span>
                        </div>
                        <span class="form-control text-capitalize" id="canWorkInCanada">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Talents:</span>
                        </div>
                        <span class="form-control text-capitalize" id="talents">
                        </div> 
</div>

{{-- Contact Information --}}
<div class='col-sm-5 my-1 rounded'>
        <h4 id="flName" class='text-dark'>Contact Information</h4>
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Address:</span>
                        </div>
                        <span class="form-control text-capitalize" id="address">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">City:</span>
                        </div>
                        <span class="form-control text-capitalize" id="city">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Province:</span>
                        </div>
                        <span class="form-control text-capitalize" id="province">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Postal Code:</span>
                        </div>
                        <span class="form-control text-capitalize" id="postal">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Email:</span>
                        </div>
                        <span class="form-control small text-lowercase text-capitalize" id="email">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Networks:</span>
                        </div>
                        <span class="form-control text-capitalize" id="networks">
                        </div> 
</div>

{{-- Measurements Information --}}
<div class='col-sm-3 my-1 rounded'>
        <h4 id="flName" class='text-dark'>Measurements</h4>
                <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Height:</span>
                        </div>
                        <span class="form-control text-capitalize" id="height">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Hips:</span>
                        </div>
                        <span class="form-control text-capitalize" id="hips">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Waist:</span>
                        </div>
                        <span class="form-control text-capitalize" id="waist">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Shoe Size:</span>
                        </div>
                        <span class="form-control text-capitalize" id="shoe">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Inseam:</span>
                        </div>
                        <span class="form-control text-capitalize" id="inseam">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Hair:</span>
                        </div>
                        <span class="form-control text-capitalize" id="hair">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Eyes:</span>
                        </div>
                        <span class="form-control text-capitalize" id="eyes">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Neck:</span>
                        </div>
                        <span class="form-control text-capitalize" id="neck">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Jacket:</span>
                        </div>
                        <span class="form-control text-capitalize" id="jacket">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Sleeve:</span>
                        </div>
                        <span class="form-control text-capitalize" id="sleeve">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Bust:</span>
                        </div>
                        <span class="form-control text-capitalize" id="bust">
                        </div> 
        <div class="input-group my-1">
                <div class="input-group-prepend">
                        <span class="input-group-text d-block font-weight-bold new_talent_subscription_form">Dress Size:</span>
                        </div>
                        <span class="form-control text-capitalize" id="dress">
                        </div>
</div>

{{-- Answers --}}
<div class='container text-lowercase' id="qas">
        <hr/>
        <h5 class='text-dark'>Questions and Answers:</h5>
</div>

{{-- Modal section for showing the zoomed images --}}
<div class="modal" id="myModal" style="height: 900px; weight: 300px;">
  <div class="modal-dialog">
    <div class="modal-content">
        <img class="w-100 h-100 img-thumbnail rounded" id="showPhoto"/>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
        let id = {{ $id}};
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/getApplicationInfo",
            method: 'POST',
            data: {
                id: id,
            },
            success: function (result) {
                var test = JSON.parse(result);
                if(test){
                                let countries = '';
                                let talents = '';
                                let networks = ''
                                let qa = '';
                                if(test && test.personalInfo){
                                        if(test.personalInfo.citizenships){
                                                for(var i=0; i<test.personalInfo.citizenships.length; i++){
                                                        countries += '<li>'+test.personalInfo.citizenships[i]+'</li>';
                                                }
                                        }

                                        if(test.personalInfo.talents){
                                                for(var i=0; i<test.personalInfo.talents.length; i++){
                                                        talents += '<li>'+test.personalInfo.talents[i]+'</li>';
                                                }
                                        }
                                }
                                if (test && test.contactInfo){
                                        if(test.contactInfo.networks){
                                                for(var i=0; i<test.contactInfo.networks.length; i++){
                                                        networks += '<ul class="pl-0" style="list-style-type: none;"><li><i class="fa fa-'+test.contactInfo.networks[i].network+' text-dark" style="font-size: 25px;"></i>&nbsp;&nbsp;<span class="font-weight-bold text-capitalize">'+test.contactInfo.networks[i].network+':</span><ul><li><span class="font-weight-bold">ID:&nbsp;&nbsp; </span>'+test.contactInfo.networks[i].id+'</li><li><span class="font-weight-bold">Followers:&nbsp;&nbsp; </span>'+test.contactInfo.networks[i].followers+'</li></ul></li></ul>';
                                                }
                                        }
                                }

                                        if(test.questions && test.answers && (test.questions.length === test.answers.length)){
                                                for(var j=0; j<test.questions.length; j++){
                                                        let qaBlock = '<div class="w-100 my-2 text-lowercase"><h5 class="text-dark font-weight-bold text-capitalize" style="text-shadow: none;"><span class="badge '+((test.answers[j] === '') ? 'badge-danger' : 'badge-dark')+'">Question '+(j+1)+':</span><span class="text-lowercase">&nbsp;<span>&nbsp;'+test.questions[j]+': &nbsp;</p></h5>&emsp;&emsp;<span class="badge badge-success">Answer:</span><p class="ml-5 pl-5 text-justify '+((test.answers[j] === "")? "bg-warning" : "")+'">'+((test.answers[j] === "")? "Not responded by applicant!" : test.answers[j])+'</p><hr/></div>';
                                                        $('#qas').append(qaBlock);
                                                }
                                        }else{
                                                let results = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error Code 101: </strong>Ooops! Somthing went wrong! Please try again.</div>';
                                                $('#qas').append(results);
                                        } 

                {{-- Header --}}
                                $('#flName').text(test.fName + ' '+ test.lName);
                                $('#scouteOffice').text(test.scouteOffice+ ' office');
                                $('#scoutedBy').text(test.scoutedBy);

                {{-- Images and Extra images --}}
                                (test.paths.faceShot)  ? ($('#faceShot').attr('src', test.paths.faceShot))   : ($('#faceShot').attr('hidden', true));
                                (test.paths.profile)   ? ($('#profile').attr('src', test.paths.profile))     : ($('#profile').attr('hidden', true));
                                (test.paths.waistUp)   ? ($('#waisteUp').attr('src', test.paths.waistUp))    : ($('#waisteUp').attr('hidden', true));
                                (test.paths.headToToe) ? ($('#headToToe').attr('src', test.paths.headToToe)) : ($('#headToToe').attr('hidden', true));
                                (test.paths.others0)   ? ($('#others0').attr('src', test.paths.others0))     : ($('#others0').attr('hidden', true));
                                (test.paths.others1)   ? ($('#others1').attr('src', test.paths.others1))     : ($('#others1').attr('hidden', true));
                                (test.paths.others2)   ? ($('#others2').attr('src', test.paths.others2))     : ($('#others2').attr('hidden', true));
                                (test.paths.others3)   ? ($('#others3').attr('src', test.paths.others3))     : ($('#others3').attr('hidden', true)); 

                {{-- Personal information --}}
                                $('#gender').text(test.personalInfo.gender);
                                $('#age').text(test.personalInfo.age);
                                $('#dob').text(test.personalInfo.dob);
                                $('#citizenships').append(countries);
                                $('#citizenships').css('height', 'auto');
                                $('#canWorkInCanada').append(test.personalInfo.can_work_in_ca? 'Has work permit&nbsp;&nbsp;<i class="fa fa-check text-success" style="font-size: 25px;"></i>' : 'Doesn\'t have work Permit &nbsp;&nbsp;<i class="fa fa-times text-danger" style="font-size: 25px;"></i>');
                                (test.personalInfo.can_work_in_ca) ? $('#canWorkInCanada').css('background-color', '#ccfff1') : $('#canWorkInCanada').css('background-color', '#ffddd6');
                                $('#talents').append(talents);
                                $('#talents').css('height', 'auto');

                {{-- Contact information --}}
                                $('#address').text(test.contactInfo.address);
                                $('#city').text(test.contactInfo.city);
                                $('#province').text(test.contactInfo.province);
                                $('#country').text(test.contactInfo.country);
                                $('#postal').text(test.contactInfo.postal);
                                $('#email').append('<i class="fa fa-envelope text-primary" style="font-size: 20px;"></i>&nbsp;<a href="mailto:'+test.contactInfo.email+'" class=" text-lowercase">'+test.contactInfo.email+'</a>');
                                $('#networks').append(networks);
                                $('#networks').css('height', 'auto');

                {{-- Measurements --}}
                                $('#height').text(test.measurements.height);
                                (test.measurements.height === 'N/A') ? $('#height').css('background-color', '#ffddd6') : '';
                                $('#hips').text(test.measurements.hips);
                                (test.measurements.hips === 'N/A') ? $('#hips').css('background-color', '#ffddd6') : '';
                                $('#waist').text(test.measurements.waist);
                                (test.measurements.waist === 'N/A') ? $('#waist').css('background-color', '#ffddd6') : '';
                                $('#shoe').text(test.measurements.shoe);
                                (test.measurements.shoe === 'N/A') ? $('#shoe').css('background-color', '#ffddd6') : '';
                                $('#inseam').text(test.measurements.inseam);
                                (test.measurements.inseam === 'N/A') ? $('#inseam').css('background-color', '#ffddd6') : '';
                                $('#hair').text(test.measurements.hair);
                                (test.measurements.hair === 'N/A') ? $('#hair').css('background-color', '#ffddd6') : '';
                                $('#eyes').text(test.measurements.eyes);
                                (test.measurements.eyes === 'N/A') ? $('#eyes').css('background-color', '#ffddd6') : '';
                                $('#neck').text(test.measurements.neck);
                                (test.measurements.neck === 'N/A') ? $('#neck').css('background-color', '#ffddd6') : '';
                                $('#jacket').text(test.measurements.jacket);
                                (test.measurements.jacket === 'N/A') ? $('#jacket').css('background-color', '#ffddd6') : '';
                                $('#sleeve').text(test.measurements.sleeve);
                                (test.measurements.sleeve === 'N/A') ? $('#sleeve').css('background-color', '#ffddd6') : '';
                                $('#bust').text(test.measurements.bust);
                                (test.measurements.bust === 'N/A') ? $('#bust').css('background-color', '#ffddd6') : '';
                                $('#dress').text(test.measurements.dress);
                                (test.measurements.dress === 'N/A') ? $('#dress').css('background-color', '#ffddd6') : '';
                        } // for global checkign if there any result returned?
                } //for success
        });
});

{{-- function for showing the other 4 extra photos (max.) an application may have --}}
function showExtraPhotos(){
console.log()
        if($('#extraPhotos').is(":hidden")) {
                $('#extraPhotos').attr('hidden', false);
                $('#showMore').empty();
                $('#showMore').css('background-color', '#ffddd6');
                $('#showMore').append('<i class="fa fa-chevron-up text-dark" style="font-size: 25px;"></i>&nbsp;&nbsp;Show Less Photos');
                
        }else{
                $('#extraPhotos').attr('hidden', true);
                $('#showMore').empty();
                $('#showMore').append('<i class="fa fa-chevron-down text-dark" style="font-size: 25px;"></i>&nbsp;&nbsp;Show More Photos');
                $('#showMore').css('background-color', '#ccfff1');
        }
}

//This function is for showing the selected photo bigger in modal 
function magnify(event){
        $('#showPhoto').attr('src', event.target.src);
}
</script>

@endsection

<?php

// TITLE : NAME

// OTHER APPLICATIONS RELATED TO THIS CONTACT (mini-list)

// PHOTOS : Small pictures, clickable to see full

/**
 * Module : editModule
 * Who : Scout
 * When : TEM
 * Btn : Edit(TEM), Delete(DEL), Complete and send(SCT)
 */

/**
 * Module : approvalModule
 * Who : Headscout
 * When : SCT
 * Btn : Disapprove(DIS), Approve(APR)
 */

/**
 * Module : inviteModule
 * Who : Inviter
 * When : APR
 * Btn : Don't invite(NIN), Invite(INV)
 */

/**
 * Module : scheduleModule
 * Who : Assistant, Inviter
 * When : INV, RIV
 * Btn : Schedule(SCH)
 */

/**
 * Module : welcomeModule
 * Who : Assistant
 * When : SCH
 * Btn : Attend(PRE), Did not attend(MIA)
 */

/**
 * Module : measurementModule
 * Who : Assistant
 * When : PRE
 * Btn : Complete(VOT)
 */

/**
 * Module : votingModule
 * Who : Voter
 * When : VOT
 * 
 * Voting System
 * Close Polls when everyone voted
 */

/**
 * Module : decisionModule
 * Who : Inviter
 * When : VOT, VOX
 * Btn : Hire(WAN), Reinvite(RIV), Refuse(REF)
 */

/**
 * Module : contractModule
 * Who : Contractor
 * When : WAN
 * Btn : Did Not Sign(NOC), Signed(CON)
 */

// SOURCE : "Scouted by %name%"

// PERSONAL INFO : Gender, Age, Birthday, Citizenship, Work

// GUARDIAN INFO : Name, Relation, Email, Phone, Address

// CONTACT INFO : Address, City, Postcode, Phones, Email

// NETWORK : Social Medias

// MEASUREMENTS : Hair, Eye, Height, Hips, Waist, Shoe, Neck, Jacket, Sleeve, Bust, Dress

// TRIVIA QUESTIONS

?>