<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>Dulcedo Management</title>
    <!-- Favicon -->
    <link href="/favicon.png" rel="icon" type="image/x-icon" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>
body {
    background-image: url('/img/dulcedo-invite-background.gif');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
}
</style>

<script>
    //change YES to NO and vice versa
    function toggleLegalCanada() {
        if($('#legalcanada').is(":checked")) {
            $('#legal-yes-no').text('@lang('form.yes')');
            $('#legal-yes-no').attr('class', 'text-success');
        } else {
            $('#legal-yes-no').text('@lang('form.no')');
            $('#legal-yes-no').attr('class', 'text-danger');
        }
    }

    //calculate age of a person from birthdate
    function getAge(birthdate) {
        var date = birthdate;
        var day = new Date(date);
        age = ~~ ((Date.now() - day) / (31557600000));
        return age;
    }

    //verify the age
    function verifyAge() {
        var date = new Date($('#birthdate').val());
        var age = getAge(date);

        if(age < 18) {
            $('#g-card').attr('class', 'expand card m-2');
            underage = true;
        } else {
            $('#g-card').attr('class', 'collapse card m-2');
            underage = false;
        }
    }
</script>

<body>
    <div style="max-width:600px" class="container">

        <!-- FORM WRAPPER -->
        <div class="justify-content-center">

        <!-- ERROR AND VALIDATION MESSAGES -->
        <div id="error" class="hide alert alert-danger text-center font-weight-bold"></div>
        <div id="success" class="hide alert alert-succes text-center font-weight-bold"></div>

            <form id="inviteForm" action="#" method="POST">
                @csrf
                <!-- WELCOME CARD -->
                <div class="card my-2">
                    <img class="card-img-top" src="/img/dulcedo-black-logo.jpg" alt="dulcedo">
                    <hr>
                    <div class="card-body">
                        <h5 class="card-title text-center font-weight-bold">@lang('invite.welcome.title')</h5>
                        <p class="card-text font-weight-bold">@lang('invite.welcome.text')</p>
                    </div>
                </div>

                <!-- INFO CARD -->          
                <div class="card my-2">
                    <div class="card-body">
                        <h5 class="card-title text-center font-weight-bold">@lang('invite.info.title')</h5>
                        <p class="card-text">
                            <input name="firstname" type="text" class="form-control m-2" placeholder="@lang('form.fn')">
                            <input name="lastname" type="text" class="form-control m-2" placeholder="@lang('form.ln')">
                            <input name="phone1" type="text" class="form-control m-2" placeholder="@lang('form.phone')">
                            <input name="phone2" type="text" class="form-control m-2" placeholder="@lang('form.phoneadd')">
                            <input name="email" type="email" class="form-control m-2" placeholder="@lang('form.email')">
                            <input name="address" type="text" class="form-control m-2" placeholder="@lang('form.address')">
                            <input name="city" type="text" class="form-control m-2" placeholder="@lang('form.city')">
                            <input name="postcode" type="text" class="form-control m-2" placeholder="@lang('form.postcode')">
                            <select id="countries" name="country" class="form-control m-2">
                                @php
                                    $countries = App\Models\Country::all();
                                @endphp
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}"
                                    <?php if($country->id == "CAN") echo "selected"; ?>
                                    >{{ $country->$lang }}</option>
                                @endforeach
                            </select>
                            <hr>
                            <div class="input-group m-2">
                                <span class="input-group-prepend"><span class="input-group-text">@lang('form.citizenship')</span></span>
                                <select id="citizenship" name="citizenship" class="form-control">
                                    <option value="" disabled selected>--</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->$lang }}</option>
                                    @endforeach
                                </select>
                                <select id="citizenship" name="citizenship" class="form-control">
                                    <option value="" selected>--</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->$lang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div onclick="toggleLegalCanada()" class="form-check m-4 text-center">
                                <input name="can_work_in_canada" class="form-check-input" type="checkbox" id="legalcanada">
                                <label class="form-check-label" for="legalcanada">@lang('form.can_work_in_canada') : <span id="legal-yes-no" class="text-danger">@lang('form.no')</span></label>
                            </div>
                            <hr>
                            <div class="input-group m-2">
                                <span class="input-group-prepend"><span class="input-group-text">@lang('form.bday')</span></span>
                                <input onchange="verifyAge()" id='birthdate' name="birthdate" type="date" class="form-control">
                            </div>
                            <div id='g-card' class="collapse card m-2">
                                <div class="card-header text-danger">@lang('invite.under18')</div>
                                <div class="card-body">
                                    <input name="g-firstname" type="text" class="form-control m-2" placeholder="@lang('form.fn')">
                                    <input name="g-lastname" type="text" class="form-control m-2" placeholder="@lang('form.ln')">
                                    <select id="g-relation" name="g-relation" class="form-control m-2">
                                        <option value=""selected disabled>Relation</option>
                                        <option value="father">@lang('form.guardian.father')</option>
                                        <option value="mother">@lang('form.guardian.mother')</option>
                                        <option value="guardian">@lang('form.guardian.other')</option>
                                    </select>
                                    <input name="g-phone1" type="text" class="form-control m-2" placeholder="@lang('form.phone')">
                                    <input name="g-phone2" type="text" class="form-control m-2" placeholder="@lang('form.phoneadd')">
                                    <input name="g-email" type="email" class="form-control m-2" placeholder="@lang('form.email')">
                                    <input name="g-address" type="text" class="form-control m-2" placeholder="@lang('form.address')">
                                    <input name="g-city" type="text" class="form-control m-2" placeholder="@lang('form.city')">
                                    <input name="g-postcode" type="text" class="form-control m-2" placeholder="@lang('form.postcode')">
                                    <select id="countries" name="g-country" class="form-control m-2">
                                        @php
                                            $countries = App\Models\Country::all();
                                        @endphp
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}"
                                            <?php if($country->id == "CAN") echo "selected"; ?>
                                            >{{ $country->$lang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </p>
                    </div>
                </div>

                <!-- SOCIAL CARD -->
                <div class="card my-2">
                    <div class="card-body">
                        <h5 class="card-title text-center font-weight-bold">@lang('invite.social.title')</h5>
                        <p class="card-text">
                            <input class="form-control m-2" type="text" id="facebook" name="facebook" placeholder="Facebook">
                            <input class="form-control m-2" type="text" id="instagram" name="instagram" placeholder="Instagram">
                            <input class="form-control m-2" type="text" id="twitter" name="twitter" placeholder="Twitter">
                            <hr>
                            <select onchange="revealDiscoveryMore()" id="discovery" name="source" class="form-control m-2">
                                <option value="" selected disabled>@lang('invite.social.source')</option>
                                @php
                                    $sources = App\Models\Source::all();
                                @endphp
                                @foreach($sources as $source)
                                    <option value="{{ $source->id }}">{{ $source->$lang }}</option>
                                @endforeach
                            </select>
                            <input id="discovery-more" name="source_comment" class='collapse form-control m-2' placeholder="@lang('invite.social.source-more')">
                        </p>
                    </div>
                </div>

                <!-- ABOUT YOU CARD -->
                <div class="card my-2">
                    <div class="card-body">
                        <h5 class="card-title text-center font-weight-bold">@lang('invite.about.title')</h5>
                        <p class="card-text">
                            <span class="font-weight-bold">@lang('invite.about.text')</span>
                            <hr>
                            @php
                                $questions = App\Models\Question::all();
                                $nb = 0;
                            @endphp
                            @foreach($questions as $question)
                                <textarea name="q-{{ $nb++ }}" type="text" class="form-control m-2" placeholder="{{ $question->$lang }}"></textarea>
                            @endforeach
                        </p>
                    </div>
                </div>

                <div class="card my-2">
                    <input type="submit" class="btn btn-success m-4" value="@lang('form.submit')">  
                </div>

            </form>
        </div>
    </div>
</body>
</html>