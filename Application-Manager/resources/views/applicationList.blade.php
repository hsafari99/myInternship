@extends('layouts.main')

@section('title')
	List of Applications
@endsection

@section('content')
{{-- Return error if no option selected for application status --}}
@if($errors->any())
   <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{$errors->first()}}</strong>
   </div>
@endif

<div class="container-fluid">
        <div class="input-group mb-2">
                <div class="input-group-prepend">
                        <span class="input-group-text">Results per page:</span>
                </div>
                <select onchange="changeNoOfResultsPerPage(this.value)" class="form-control" id='pages'>
                        <option value='10' selected >10 (default)</option>
                        <option value='20'>20</option>
                        <option value='50'>50</option>
                </select>
        </div>
        <div class="d-flex justify-content-center">
                <div class='d-inline-flex' id='showPages'>
                </div>
        </div>
        <table class="table table-dark mt-3 table-hover table-striped table-responsive" id="applications">
                <thead class="thead-dark">
                        <tr class='text-center'>
                                <th>Image</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Age</th>
                                <th>Height</th>
                                <th>Applied</th>
                                <th>Office</th>
                                <th>City,Country</th>
                                <th>Votes</th>
                                <th>networks</th>
                                <th width='5%'>Actions</th>
                        </tr>
                </thead>
                <tbody id='applicationsPerPage'>
                        <tr id='4'class='text-center'>
                                <td><img width='100' height='120' class="rounded img-thumbnail" src="/img/ex_profile.jpg" alt="Profile Image"></td>
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Age</td>
                                <td>Height</td>
                                <td>Applying date</td>
                                <td>Office</td>
                                <td>Residence</td>
                                <td>Votes</td>
                                <td>
                                        <span class='font-weight-bold'>Social 1</span><br/>
                                        &emsp;
                                        <i class="fa fa-thumbs-up text-success" style='font-size: 25px;'></i>
                                        <span class='text-success'> 1</span>
                                </td>
                                <td  width='5%'>
                                        <button id='4' class='btn btn-success w-100 my-1' onclick='viewProfile(this.id)'>View</button>
                                        <button class='btn btn-warning w-100 my-1' onclick=''>Vote</button>
                                        <button class='btn btn-danger w-100 my-1' onclick=''>Delete</button>
                                </td>
                        </tr>
                </tbody>
        </table>

</div>


<script>
//load main function while loading the page
$(document).ready(function(){
        populatePages();
        getApplications(10,0);
        
});

//
function viewProfile(id){
        let url = "/applications/profile/"+id;
        window.location.href = url;
}

//This function will get total number of pages th result has
function populatePages(){
        $('#showPages').empty();
        $.ajax({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/totalResults",
                method: 'POST',
                success: function(result){
                        var test = JSON.parse(result);
                        let numberOfResultsPerPage = $('#pages').children("option:selected").val();
                        let total = test;
                        let totalPages = Math.ceil(total/numberOfResultsPerPage);

                        for(var i = 0; i< totalPages; i++){
                                $('#showPages').append("<span class='border border-dark rounded py-1 px-2 mx-1 pageSelector' id='"+i+"' onclick='changeColor(this.id)'>"+(i+1)+"</span>");
                        }
                        applyChanges(0);
                }  
        });
}

// Function for getting the desired number of results per page
// value is the number of the pages the user selected. 
function changeNoOfResultsPerPage(value){
        populatePages();
        getApplications(value , 0);
}

//Function for changing the color of the clicked page and change the color of the rest of pages to light gray
function changeColor(value){
        let val = parseInt(value);
        let noOfResultsPerPage = $('#pages').children("option:selected").val();
        applyChanges(val);
        getApplications(noOfResultsPerPage , val);
}

//Function taking care of changing the color of the clicked page
function applyChanges(val){
        {{-- console.log("In apply change"); --}}
        let pages = $('.pageSelector');
        $.each(pages, function(index, page){               
                if(index === val){
                        $(page).removeClass('bg-light');
                        $(page).addClass('bg-success'); 
                }else{
                        $(page).removeClass('bg-success');
                        $(page).addClass('bg-light');
                }
        });       
}

//Function for returning the specific number of results from the specific number specified by user. 
function getApplications(noOfApplications, from){
                {{-- const response = await fetch(url, { //url -> ajax call destination
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                mode: 'cors', // no-cors, *cors, same-origin
                cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                credentials: 'same-origin', // include, *same-origin, omit
                headers: {
                'Content-Type': 'application/json'
                // 'Content-Type': 'application/x-www-form-urlencoded',
                },
                redirect: 'follow', // manual, *follow, error
                referrer: 'no-referrer', // no-referrer, *client
                body: JSON.stringify(data) // body data type must match "Content-Type" header
                });
                return await response.json(); // parses JSON response into native JavaScript objects
                } 
                Note: To cause browsers to send a request with credentials included, even for a cross-origin call, add credentials: 
                'include' to the init the object you pass to the fetch() method.
                ---> If you only want to send credentials if the request URL is on the same origin 
                as the calling script, add credentials: 'same-origin'.
                ---> To instead ensure browsers don’t include credentials in the request, use credentials: 'omit'.


                =================== Post Method =========================================
                const response = await fetch(url, {
                method: 'POST', // or 'PUT'
                body: JSON.stringify(data), // data can be `string` or {object}!
                headers: {
                'Content-Type': 'application/json'
                }
                });
                const json = await response.json();
                console.log('Success:', JSON.stringify(json));
                } catch (error) {
                console.error('Error:', error);
                }
                --}}

                // Make a request for a user with a given ID
                {{-- axios.get('/user?ID=12345')
                .then(function (response) {
                console.log(response);
                })
                .catch(function (error) {
                console.log(error);
                }); --}}

         $.ajax({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/getApplications",
                method: 'POST',
                data: {
                        qty: noOfApplications,
                        from: from,
                },
                {{-- dataType: "json", --}}
                beforeSend: function(){ //before starting the Ajax call
                        {{-- console.log("In Ajax before send section..."); --}}
                        $('#applicationsPerPage').empty();
                        $('#applicationsPerPage').append('<tr class="text-center bg-light"><td colspan="11"><div class="spinner-grow text-success"></div></td></tr>');

                },
                success: function(result){ //after receiving the repsonse successfully
                        var test = JSON.parse(result);
                        $('#applicationsPerPage').empty();

                        $.each(test, function(index, application){
                                let media = '';
                                $.each(test[index].medias, function(tag, network){
                                        media += "<span class='font-weight-bold'>"+network.name+"</span><br/>"+
                                        "&emsp;<i class='fa fa-thumbs-up' style='font-size: 20px;'></i>"+
                                        "<span>&nbsp;"+((network.followers)? network.followers :'N/A')+"</span><br/>";
                                });

                                $('#applicationsPerPage').append(
                                        "<tr id='4'class='text-center text-dark' style=\"background-color: "+((index % 2) ? '#f2f2f2' : '#dcdcdc')+"\">"+
                                                "<td><img width='100' height='120' class='rounded img-thumbnail' src='/img/ex_profile.jpg' alt='Profile Image'></td>"+
                                                "<td>"+application.firstname+"</td>"+
                                                "<td>"+application.lastname+"</td>"+
                                                "<td>"+application.age+"</td>"+
                                                "<td>"+application.height+"</td>"+
                                                "<td>"+application.applied+"</td>"+
                                                "<td>"+application.office+"</td>"+
                                                "<td>"+application.residence+"</td>"+
                                                "<td>"+application.votes+"</td>"+
                                                "<td><ul>"+media+"</ul></td>"+
                                                "<td  width='5%'>"+
                                                        "<button id='4' class='btn btn-success w-100 my-1' onclick='viewProfile(this.id)'>View</button>"+
                                                        "<button class='btn btn-warning w-100 my-1' onclick=''>Vote</button>"+
                                                        "<button class='btn btn-danger w-100 my-1' onclick=''>Delete</button>"+
                                                "</td>"+
                                        "</tr>"
                                );
                        });

                },
                error: function(xhr, ajaxOptions, thrownError){
                        console.log("an Error Occured!..." + xhr.responseText + " | "+ ajaxOptions+" | "+ thrownError);
                },
                complete: function(){ //after completion of the Ajax call
                        {{-- console.log("In Ajax Completed section..."); --}}
                }  
        });
}

</script>
@endsection
