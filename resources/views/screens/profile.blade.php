@extends('layouts.master' ,['page_title' => 'Profile'])
@section('css')
<style>
    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 50px auto;
    }

    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }

    .avatar-upload .avatar-edit input {
        display: none;
    }

    .avatar-upload .avatar-edit input+label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #ffffff;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }

    .avatar-upload .avatar-edit input+label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }

    .avatar-upload .avatar-edit input+label:after {
        content: "\f040";
        font-family: "FontAwesome";
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }

    .avatar-upload .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #f8f8f8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }

    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    /** Switch
 -------------------------------------*/

    .switch input {
        position: absolute;
        opacity: 0;
    }

    /**
 * 1. Adjust this to size
 */

    .switch {
        display: inline-block;
        font-size: 20px;
        /* 1 */
        height: 1em;
        width: 2em;
        background: #BDB9A6;
        border-radius: 1em;
    }

    .switch div {
        height: 1em;
        width: 1em;
        border-radius: 1em;
        background: #FFF;
        box-shadow: 0 0.1em 0.3em rgba(0, 0, 0, 0.3);
        -webkit-transition: all 300ms;
        -moz-transition: all 300ms;
        transition: all 300ms;
    }

    .switch input:checked+div {
        background: #3CB371;
        -webkit-transform: translate3d(100%, 0, 0);
        -moz-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0);
    }

    #message {
        display: none;
        background: #f1f1f1;
        color: #000;
        position: relative;
        padding: 12px;
    }

    #message p {
        padding: 0px 35px;
        font-size: 18px;
    }

    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
        color: green;
    }

    .valid:before {
        position: relative;
        left: -35px;
        content: "✔";
    }

    /* Add a red text color and an "x" when the requirements are wrong */
    .invalid {
        color: red;
    }

    .invalid:before {
        position: relative;
        left: -35px;
        content: "✖";
    }

    .progressBar {
        margin-bottom: 26px;
        margin-bottom: 1.66em;
        position: relative;

    }

    .progressBar h4 {
        font-size: 16px;
        text-transform: none;
        margin-bottom: 7px;
        margin-bottom: .33em;
        color: #2E1437;
    }

    .progressBarcontainer {
        width: 100%;
        height: 10px;
        background: #E1E1E1 !important;
        overflow: hidden;
        border-radius: 0.3em;
    }

    .progressBarValue {
        height: 10px;
        float: left;
        border-radius: 0.3em;
        background: #e55d87;
        /* Old browsers */
        background: -moz-linear-gradient(-45deg, #e55d87 0%, #5fc3e4 100%);
        background: -webkit-linear-gradient(-45deg, #e55d87 0%, #5fc3e4 100%);
        background: linear-gradient(135deg, #e55d87 0%, #5fc3e4 100%);
    }

    .speech-bubble {
        font-size: 0.75em;
        line-height: 2em;
        position: absolute;
        top: -0.60em;
        text-align: center;
        min-width: 3em;
        border-radius: 0.3em;
        color: white;
        display: none;
    }

    .speech-bubble:after {
        border: 0.5em solid transparent;
        content: "";
        margin-left: -0.5em;
        position: absolute;
        bottom: -50%;
        left: 50%;
    }

    .html {
        left: calc(88.5% - 1.5em);
    }

    .css {
        left: calc(78.5% - 1.5em);
    }

    .javascript {
        left: calc(58.5% - 1.5em);
    }

    .react {
        left: calc(48.5% - 1.5em);
    }

    .jquery {
        left: calc(58.5% - 1.5em);
    }

    .html,
    .css,
    .javascript,
    .react,
    .jquery {
        background: #a487b2;
    }

    .html:after {
        border-top-color: #a487b2;
    }

    .css:after {
        border-top-color: #a487b2;
    }

    .javascript:after {
        border-top-color: #a487b2;
    }

    .react:after {
        border-top-color: #a487b2;
    }

    .jquery:after {
        border-top-color: #a487b2;
    }
</style>
@endsection
@section('content')
<section id="profileBanner">
    <div class="text-center">
        <h3>Complete Profile</h3>
    </div>
</section>
<section id="profileDiv">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="progressBar">
                    <h4>Profile Strength ({{round(count(auth::user()->mark_profile_section ?? [])/auth::user()->total_profile_section*100,0)}}%)</h4>
                    <div class="progressBarcontainer">
                        <div class="speech-bubble html">{{round(count(auth::user()->mark_profile_section ?? [])/auth::user()->total_profile_section*100,0)}}%</div>
                        <div class="progressBarValue profileprogress "></div>
                    </div>
                </div>

                <div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tabDiv">
                    <!-- active inactive cuttent tab -->
                    @php
                    $factive='';
                    $statusactive='';
                    $generaltab='';
                    $resumetab='';
                    $languages='';
                    $voiceover='';
                    $softwarestab='';
                    $specializationtab='';
                    $service_rate_tab='';
                    $change_pass_tab='';
                    if(session()->get('currtab')=='status'){
                    $statusactive='active';
                    }
                    elseif(session()->get('currtab')=='generaltab'){
                    $generaltab='active';
                    }
                    elseif(session()->get('currtab')=='resume')
                    {
                    $resumetab='active';
                    }
                    elseif(session()->get('currtab')=='languages')
                    {
                    $languages='active';
                    }
                    elseif(session()->get('currtab')=='voiceover')
                    {
                    $voiceover='active';
                    }
                    elseif(session()->get('currtab')=='specialization')
                    {
                    $specializationtab='active';
                    }
                    elseif(session()->get('currtab')=='softwares')
                    {
                    $softwarestab='active';
                    }
                    elseif(session()->get('currtab')=='service_rates')
                    {
                    $service_rate_tab='active';
                    }
                    elseif(session()->get('currtab')=='changepass')
                    {
                    $change_pass_tab="active";
                    }
                    else
                    {
                    $factive='active';
                    }
                    @endphp
                    <ul class="nav nav-pills" role="tablist">

                        <!-- <li class="nav-item">
                            <a href="#status" class="nav-link {{$statusactive}}" data-toggle="pill"><span>Status</span> </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="#general" class="nav-link generaltab {{$generaltab}}" data-toggle="pill"><span>General</span> </a>
                        </li>
                        @if(!empty(auth::user()->user_status) && auth::user()->user_status=="Freelancer")
                        <li class="nav-item">
                            <a href="#resume" class="nav-link {{$resumetab}}" data-toggle="pill"><span>Resume</span> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#self-promotion"><span>Premium Member</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="#language" class="nav-link {{$languages}}" data-toggle="pill"><span>Languages</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="#service" class="nav-link {{$service_rate_tab}}" data-toggle="pill"><span>Services & Rates</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="#voice-Over" class="nav-link {{$voiceover}}" data-toggle="pill"><span>Voice-Over</span> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$specializationtab}}" data-toggle="pill" href="#specialization"><span>Specialization</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="#software" class="nav-link {{$softwarestab}}" data-toggle="pill"><span>Software</span> </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#files" class="nav-link" data-toggle="pill"><span>Files</span> </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link {{$factive}}" data-toggle="pill" href="#profile"><span>My Profile</span> </a>
                        </li>

                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="actionDiv">
            <div class="row">
                <div class="col-lg-12">
                    <ul>
                        <!-- <li>VT Forums Settings </li>
                        <li>VT Teams Settings </li> -->
                        <li class="change-email" role="button">Change Email</li>
                        <li><a style="color:#212529" href="{{route('change-pass')}}">Change Password</a></li>
                        <li class="Deleteprofile" role="button">Delete Profile</li>
                        <form action="{{route('profile-delete')}}" method="post" id="delete-profile-form">
                            @csrf

                        </form>
                    </ul>
                </div>
            </div>
        </div>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="tab-content">
            <div id="profile" class="container tab-pane {{$factive}}">
                <div class="commonDiv">
                    <h3>My Profile</h3>
                    <div class="text-center">
                        <p class="mainHeading">Profile Management</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">

                            <form class="form-group" action="{{route('change-profile-photo')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" name="profilephoto" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url('{{asset('profile-images/').'/'.auth::user()->profile_photo ?? ''}}');">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-12" style="margin-top:-40px">
                                    <center>
                                        <button type="submit" class="btn btn-danger changeProfileBtn" style="width: 55%;padding:5px;float:none">Change Profile Photo</button>
                                    </center>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 otherBtn" align="center" style="padding-top:253px">
                            <a href="{{route('view-user-profile')}}" class="btn btn-info p-2 " style="width: 55%;padding:5px;float:none" target="_blank">For Other</a>
                        </div>
                    </div>
                    <div class="box" style="margin-top:20px">
                        <p>Use the <b>Profile Editing Menu</b> above to edit you profile and preference</p>
                        <p>You are logged on and therefore you can see on your profile page all available Information
                            including your cover letter, full address, rates and the profile editing menu.
                        </p>
                    </div>
                    <div class="box" style="margin-top:20px">
                        <p><b>Link to your profile page:</b> <a href="{{route('view-user-profile')}}">{{auth::user()->fname}}</a> (you may use it, for example
                            on your business card; please note that it must be without <b>"www"</b>)</p>
                    </div>
                    <div class="text-center" style="margin-top:20px">
                        <p class="mainHeading">Availability</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <h4><b>Availability</b></h4>
                            <label class="switch"><input type="checkbox" class="togglebtn" data-type="availability" @if(auth::user()->status=='1'){{'checked'}}@endif/><div></div>
                            </label>
                        </div>
                    </div>
                    <p>Translator's Availability is displayed <a href="">at the top right corner of your profile page.</a>
                        Busy members are shown at the end of the search results.
                    </p>
                    <p>Click or tap the <b>Disable</b> button to hide your availability status.</p>
                    <div class="text-center" style="margin-top:20px">
                        <p class="mainHeading">Availability</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="text-center privacy-box">
                                <h4><b>Profile</b></h4>
                                <p>
                                    @if(auth::user()->private_information=='1')
                                    <i class="fa fa-unlock privateicon"></i>
                                    @else
                                    <i class="fa fa-lock privateicon"></i>
                                    @endif
                                </p>
                                <label class="switch"><input type="checkbox" class="togglebtn" data-type="profile" @if(auth::user()->private_information=='1'){{'checked'}}@endif/><div></div>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-center privacy-box">
                                <h4><b>Contact Info</b></h4>
                                <p>
                                    @if(auth::user()->display_contact_info=='1')
                                    <i class="fa fa-eye visibleicon"></i>
                                    @else
                                    <i class="fa fa-eye-slash visibleicon"></i>
                                    @endif
                                </p>
                                <label class="switch"><input type="checkbox" class="togglebtn" data-type="ContactInfo" @if(auth::user()->display_contact_info=='1'){{'checked'}}@endif/><div></div>
                                </label>
                            </div>
                        </div>
                        @if(auth::user()->user_status=="Freelancer")
                        <div class="col-lg-4">
                            <div class="text-center privacy-box">
                                <h4><b>Rates</b></h4>
                                <p>
                                    @if(auth::user()->show_rated_users=='1')
                                    <i class="fa fa-eye rateicon"></i>
                                    @else
                                    <i class="fa fa-eye-slash rateicon"></i>
                                    @endif
                                </p>
                                <label class="switch"><input type="checkbox" class="togglebtn" data-type="Rates" @if(auth::user()->show_rated_users=='1'){{'checked'}}@endif/><div></div>
                                </label>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="text-center" style="margin-top:20px">
                        <p class="mainHeading">Email Notification</p>
                    </div>
                    <div class="row">
                        @if(auth::user()->user_status=="Freelancer")
                        <div class="col-lg-4">
                            <div class="text-center privacy-box">
                                <h4><b>Job Notification</b></h4>
                                <p>
                                    @if(auth::user()->jobsnotification=='1')
                                    <i class="fa fa-bell jobnotifyicon" aria-hidden="true"></i>
                                    @else
                                    <i class="fa fa-bell-slash jobnotifyicon"></i>
                                    @endif
                                </p>
                                <label class="switch"><input type="checkbox" class="togglebtn" data-type="JobNotification" @if(auth::user()->jobsnotification=='1'){{'checked'}}@endif/><div></div>
                                </label>
                                <p><b>Block Countries</b></p>
                            </div>
                        </div>
                        @endif
                        <!-- <div class="col-lg-4">
                            <div class="text-center privacy-box">
                                <h4><b>News Notification</b></h4>
                                <p>
                                    @if(auth::user()->news_notification=='1')
                                    <i class="fa fa-bell newsnotifyicon" aria-hidden="true"></i>
                                    @else
                                    <i class="fa fa-bell-slash newsnotifyicon"></i>
                                    @endif
                                </p>
                                <label class="switch"><input type="checkbox" class="togglebtn" data-type="NewsNotification" @if(auth::user()->news_notification=='1'){{'checked'}}@endif/><div></div>
                                </label>
                            </div>
                        </div> -->
                        <div class="col-lg-4">
                            <div class="text-center privacy-box">
                                <h4><b>Forums Notification</b></h4>
                                <p>Diabaled</p>
                                <label class="switch"><input type="checkbox" class="togglebtn" data-type="ForumsNotification" />
                                    <div></div>
                                </label>
                            </div>
                        </div>
                        <!-- <div
                             class="col-lg-3">
                                <div class="text-center privacy-box">
                                    <h4><b>TCTTerms Notification</b></h4>
                                    <p>Enable</p>
                                    <label class="switch"><input type="checkbox" /><div></div>
                                    </label>
                                </div>
                            </div> -->
                    </div>
                    <div class="userInfo">
                        <div class="row" style="margin-bottom:20px">
                            <div class="col-lg-3">
                                <div class="important-note">
                                    <p>
                                        If you want your profile to be
                                        more exposed, consider submitting your photograph
                                        or logo. The site statistics show that profiles with photos are viewed 6.1 times more
                                        frequently (profiles with a photograph in average 1472 times, without a photograph
                                        only 241 times).
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <h4>
                                    {{$userData[0]->usergeneralinfo->first_name ?? ''}} {{ $userData[0]->usergeneralinfo->last_name ?? ''}}
                                </h4>
                                <p>{{$userData[0]->usergeneralinfo->advertising_slogan ?? ''}}</p>
                                <p>{{$userData[0]->usergeneralinfo->company_name ?? ''}}</p>
                                <p><b>Pakistan</b></p>
                                <p>Mother Tongues:</p>
                                <p>
                                    @foreach($userData[0]->usermotherlanguages as $lng)
                                    {{$lng->mother_language}}
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        <a href="{{$userData[0]->usergeneralinfo->website ?? ''}}"><b>{{$userData[0]->usergeneralinfo->website ?? ''}}</b></a>
                    </div>
                    <!-- <p><b>TCTerms Score 0</b> [disable]</p> -->
                    <div class="text-left" style="margin-top:20px">
                        <p class="mainHeading">Contact Information @if(isset($userData[0]->usergeneralinfo->display_contact_info) && $userData[0]->usergeneralinfo->display_contact_info=='0'){{"(Visible)"}} else {{"(Invisible)" }}@endif</p>
                    </div>
                    <p>
                        <b>Address:</b>{{$userData[0]->usergeneralinfo->address ?? ''}}
                    </p>
                    <p>
                        <b>Phone:</b>
                        {{$userData[0]->usergeneralinfo->telephone ?? ''}},
                        <b>Fax:</b> {{$userData[0]->usergeneralinfo->fax ?? ''}},
                        <b>Cell Phone:</b> {{$userData[0]->usergeneralinfo->mobile_phone ?? ''}}
                    </p>
                    <p>Joined: {{$userData[0]->created_at}}, last update: {{$userData[0]->updated_at}} </p>
                    <p>
                        <b>
                            Preferred E-mail of {{$userData[0]->usergeneralinfo->first_name ?? ''}} {{ $userData[0]->usergeneralinfo->last_name ?? ''}}: {{ $userData[0]->usergeneralinfo->gemail ?? ''}}
                        </b>
                    </p>
                    @if(auth::user()->user_status=="Freelancer")
                    <div class="text-left" style="margin-top:20px">
                        <p class="mainHeading">Working Language Pairs</p>
                    </div>
                    <p>

                        @foreach($userData[0]->userlanguages as $lng)
                        {{$lng->from_languages .'>>'. $lng->to_languages}}
                        @endforeach
                    </p>
                    <div class="text-left" style="margin-top:20px">
                        <p class="mainHeading">Services and Rates</p>
                    </div>
                    <p>Rates are
                        @if(isset($userData[0]->usergeneralinfo->show_rated_users)){{"visible"}}@else{{"invisible"}}@endif
                    </p>
                    <p>Other, Subtitling</p>
                    <p>Preferred currency: <b>$</b></p>
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="width: 30%;">Service</th>
                                <th>Language</th>
                                <th style="width: 70%;">Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userData[0]->usersevices as $service)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$service->service}}</td>
                                @php
                                $pairlanguage=\App\Models\UserLanguages::where('id',$service->pair_language)->first();
                                @endphp
                                <td>{{$pairlanguage->from_languages.">>".$pairlanguage->to_languages}}</td>
                                <td>{{"Min rate per word is ".$service->min_rate_per_word." $ Min rate per minute is ".$service->min_rate_per_minute." $"}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- rates and statistics -->
                    <div class="text-left" style="margin-top:20px">
                        <p class="mainHeading">Subject Areas</p>
                    </div>
                    <p>
                        @foreach($userData[0]->userspicialize->spicializations ?? [] as $spcialize)
                        {{$spcialize}},
                        @endforeach
                    </p>
                    <div class="text-left" style="margin-top:20px">
                        <p class="mainHeading">Voice-Over</p>
                    </div>
                    <!-- voic over -->
                    <p>
                        <b>Voice Languages:</b>
                        @foreach($userData[0]->uservoicover as $voiclng)
                        {{$voiclng->language}},
                        @endforeach
                    </p>
                    <p><b>Voice Gender: </b>Female Voice</p>
                    <p><b>Voice Ages:</b> Young Adult, Middle Age Adult</p>
                    <p><b>Type of Recording: </b>Audio Books, Character Voices, Commercials, Documentaries, e-Learning, Imaging, Infomercials, Interactive Voice Response Telecom Applications (IVR), Narration, On
                        Camera Recordings, Political, Promos</p>
                    <div class="text-center">
                        <p>
                            <b>Detailed Description and Voice Samples</b>
                        </p>
                    </div>

                    <!-- Cover Letter -->
                    <div class="text-left" style="margin-top:20px">
                        <p class="mainHeading">Cover Letter (not visible for everybody)</p>
                    </div>
                    <p>
                        {{$userData[0]->usergeneralinfo->cover_letter ?? ''}}
                    </p>
                    <div class="text-left" style="margin-top:20px">
                        <p class="mainHeading">Background (Your Presentation Page, Résumé or CV)</p>
                    </div>
                    <div class="box" style="display: flex;justify-content: space-between;">
                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                        <p><b>@if(auth::user()->resume)<a target="_blank" href="{{asset('files/resume').'/'.auth::user()->resume}}">View Resume</a>@else{{"(No Resume Uploaded)"}}@endif</b></p>
                    </div>

                    <!-- software areas -->
                    <div class="text-left" style="margin-top:20px">
                        <p class="mainHeading">Software</p>
                    </div>
                    <ul style="padding-left:30px; list-style:disc;">
                        @foreach($userData[0]->usersoftwares->software_tools ?? [] as $soft)
                        <li>{{$soft}}</li>
                        @endforeach
                    </ul>

                    <!-- platform and hardware -->
                    <div class="text-left" style="margin-top:20px">
                        <p class="mainHeading">Platform & hardware</p>
                    </div>
                    <p>
                        {{$userData[0]->usergeneralinfo->platform_hardware ?? ''}}
                    </p>
                    <!-- user files -->
                    <div class="text-left" style="margin-top:20px">
                        <p class="mainHeading">Files</p>
                    </div>
                    <p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>File Name</th>
                                <th>File Purpose</th>
                                <th>Comments</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userData[0]->userfiles as $file)
                            <tr>
                                <td>
                                    {{$file->file_title}}
                                </td>
                                <td>{{$file->purpose}}</td>
                                <td>{{$file->comments}}</td>
                                <td><a href="{{asset('files/userfiles').'/'.$file->file}}">View File</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </p>
                    @endif
                    <!-- Membership -->
                    <div class="text-left" style="margin-top:20px">
                        <p class="mainHeading">Membership</p>
                    </div>
                    <p>
                        {{$userData[0]->usergeneralinfo->membership_professional_associations ?? ''}}
                    </p>
                    <div class="text-left" style="margin-top:20px">
                        <p class="mainHeading">Payment Options</p>
                    </div>
                    <p>If you accept payments through several payment processors, their logos can be shown on your profile page. If your clients click or tap a payment processor logo on your profile, they will be redirected to the site of this payment processor. If you want to show payment processors through which you accept payments on your profile page (in this place), click or tap the Edit button above and enter your email addresses for corresponding payment processors in the form.
                        If you are not registered with any of the payment processors below, please click or tap the corresponding button below and sign up for PayPal or Skrill. After that you will enter your e-mail address on the profile form.</p>
                </div>
            </div>
            <!-- <div id="status" class="container tab-pane {{$statusactive}}">
                <div class="commonDiv">
                    <h3>Select Status</h3>
                    <span>User Name: <b>{{auth::user()->username}}</b></span>
                    <span>Current Status: <b>{{auth::user()->user_status}}</b></span>
                    <form action="{{route('change-status')}}" method="post">
                        @csrf
                        <p>Please select your status:</p>
                        <fieldset>
                            <div class="radioBtnDiv">
                                <input type="radio" value="Translator" name="user_status" required="required" @if(auth::user()->user_status=='Translator'){{'checked'}}@endif>

                                <div class="optionInfo">
                                    <h4>Translator</h4>
                                    <p>If you are a freelance translator, interpreter or other language professional and do not own an agency, please select translator.</p>
                                </div>
                            </div>
                            <div class="radioBtnDiv">
                                <input type="radio" value="Employer" name="user_status" @if(auth::user()->user_status=='Employer'){{'checked'}}@endif>
                                <div class="optionInfo">
                                    <h4>Employer</h4>
                                    <p>If yo are looking for a traslator, interpreter then select employer. The supplementary agency information form will be provided later.</p>
                                </div>
                            </div>
                        </fieldset>
                        <input type="hidden" name="currtab" value="status">
                        <button class="commonBtn">Save</button>
                    </form>
                </div>
            </div> -->
            <div id="general" class="container tab-pane {{$generaltab}}">
                <div id="profile" class="container tab-pane active">
                    <div class="commonDiv">
                        <h3>General</h3>
                        <p class="notice"><b>Important:</b> Please fill in all fields marked with an asterisk (*) before you attempt to send this form. Please use plain text. You can use any language.</p>
                        <p>Please note that the period of waiting for your input is limited on all Web sites. It is set to 30 minutes here. If you are not ready to fill out all fields, then first fill out only the required fields and save the form. After saving, enter your information in other fields or only in one field and save again. You can use this technique for completing any forms on the Internet. Because sometimes your session ends unexpectedly, sometimes errors happen. So to save your time, save often.</p>
                        <h4 class="font-weight-600">General Information</h4>
                        <div class="infoDiv">
                            <span>User Name: <b>{{auth::user()->username}}</b></span>
                            <span>Current Status: <b>{{auth::user()->user_status}}</b></span>
                            <span>
                                <a href="">Click or tap to change</a>
                            </span>
                        </div>
                        <h4 class="font-weight-600">Contact Information</h4>
                        <form action="{{route('save-general-info')}}" method="post">
                            @csrf
                            <div class="inputDiv">
                                <label for="">Title:<span class="text-danger">*</span></label>
                                <div class="inputSpan">
                                    <input type="text" name="title" id="title" required="required" value="{{ $userData[0]->usergeneralinfo->title ?? '' }}">
                                    <p>Mr., Ms., Dr., etc.</p>
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">First Name (Given):<span class="text-danger">*</span></label>
                                <div class="inputSpan">
                                    <input type="text" name="fname" id="fname" required="required" value="{{auth::user()->fname ?? '' }}">
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Last Name (Family):<span class="text-danger">*</span></label>
                                <div class="inputSpan">
                                    <input type="text" name="lname" id="lname" required="required" value="{{auth::user()->lname ?? '' }}">
                                    <p>Please make sure your first, last and middle names begin with a capital letter and do not use all capital letters. </p>
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">E-Mail Address:<span class="text-danger">*</span></label>
                                <div class="inputSpan">
                                    <input type="email" name="email" id="email" required="required" value="{{auth::user()->email ?? '' }}">
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Postal Code (Zip):</label>
                                <div class="inputSpan">
                                    <input type="text" name="zipcode" id="zipcode" value="{{auth::user()->zipcode ?? '' }}">
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Address:<span class="text-danger">*</span></label>
                                <div class="inputSpan">
                                    <textarea name="address" id="address" cols="30" rows="4" required="required">{{$userData[0]->usergeneralinfo->address ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Country:<span class="text-danger">*</span></label>
                                <div class="inputSpan">
                                    <select name="country_id" id="country_id" required="required">
                                        <option value="">Select Country</option>
                                        @foreach( $countries as $country)
                                        @php
                                        $selected='';
                                        if(auth::user()->country_id == $country->id)
                                        {
                                        $selected='selected';
                                        }
                                        @endphp
                                        <option value="{{$country->id}}" {{$selected}}>{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">State/Region:<span class="text-danger">*</span></label>
                                <div class="inputSpan">
                                    <select name="state" id="state" required="required">
                                        @if(isset($userData[0]->usergeneralinfo->state) && $userData[0]->usergeneralinfo->state!='')
                                        <option value="{{$userData[0]->usergeneralinfo->state ?? '' }}" selected>{{$userData[0]->usergeneralinfo->state ?? '' }}</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">City:<span class="text-danger">*</span></label>
                                <div class="inputSpan">
                                    <select name="city" id="city" required="required">
                                        @if(isset($userData[0]->usergeneralinfo->city) && $userData[0]->usergeneralinfo->city!='')
                                        <option value="{{$userData[0]->usergeneralinfo->city ?? '' }}" selected>{{$userData[0]->usergeneralinfo->city ?? '' }}</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Telephone:</label>
                                <div class="inputSpan">
                                    <input type="text" name="telephone" id="telephone" value="{{$userData[0]->usergeneralinfo->telephone ?? '' }}">
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Fax:</label>
                                <div class="inputSpan">
                                    <input type="text" name="fax" id="fax" value="{{$userData[0]->usergeneralinfo->fax ?? '' }}">
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Mobile Phone:<span class="text-danger">*</span></label>
                                <div class="inputSpan">
                                    <input type="text" name="mobile_phone" id="mobile_phone" required="required" value="{{$userData[0]->usergeneralinfo->mobile_phone ?? '' }}">
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Second Email:</label>
                                <div class="inputSpan">
                                    <input type="email" name="second_email" id="second_email" value="{{$userData[0]->usergeneralinfo->second_email ?? '' }}">
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Website:</label>
                                <div class="inputSpan">
                                    <input type="text" name="website" id="website" value="{{$userData[0]->usergeneralinfo->website ?? '' }}">
                                    <p>Please enter only one URL and check how it works after submitting. Please do not use this field for links to your profile in other directories — such links will not be shown.</p>
                                </div>
                            </div>
                            <!-- <div class="inputDiv">
                                    <label for="">My Profile in social networks and other services </label>
                                    <div class="inputSpan">
                                        <p class="notice">
                                            Expand your contacts by adding links to your profiles in other social networks like Facebook or services like Skype or YouTube channels. Here we call them external profiles.
                                        </p>
                                        <div class="addProfile">
                                            <button><i class="fa fa-plus-square" aria-hidden="true"></i></button>
                                            <span>Add a networking profile</span>
                                        </div>
                                    </div>
                                </div> -->
                            <hr>
                            <div class="inputDiv">
                                <label for="">Company Name:</label>
                                <div class="inputSpan">
                                    <input type="text" name="company_name" id="company_name" value="{{$userData[0]->usergeneralinfo->company_name ?? '' }}">
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Position:</label>
                                <div class="inputSpan">
                                    <input type="text" name="position" id="position" value="{{$userData[0]->usergeneralinfo->position ?? '' }}">
                                </div>
                            </div>
                            <h4 class="font-weight-600">Password Reset Question</h4>
                            <div class="inputDiv">
                                <label for="">Secret Question:</label>
                                <div class="inputSpan">
                                    <input type="text" name="secret_question" id="secret_question" value="{{$userData[0]->usergeneralinfo->secret_question ?? '' }}">
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Answer To Your
                                    Secret Question</label>
                                <div class="inputSpan">
                                    <input type="text" name="secret_answer" id="secret_answer" value="{{$userData[0]->usergeneralinfo->secret_answer ?? '' }}">
                                    <p>Please enter a question and a one-word answer that is easy for you to remember (e.g., What is the name of your cat?). If you forget your password, click or tap Forgot Your Password? on the Member Log On screen. You will see this question and may enter your answer. These fields are not required.</p>
                                    <p>Your secret question and answer allow to change your password in case you forget it.
                                        Tip. Choose a question that:</p>
                                    <ul>
                                        <li>Does not have an obvious answer</li>
                                        <li>You can answer easily</li>
                                        <li>Will be difficult for others to guess.</li>
                                    </ul>
                                    <a href="" class="font-weight-600">Change Password</a>
                                </div>
                            </div>
                            <!--  <hr>
                            <h4 class="font-weight-600">Password Reset Question</h4>
                            <div class="inputDiv">
                                <label for="">Payment Processors:</label>
                                <div class="inputSpan">
                                    <input type="text" name="" id="">
                                    <p>If you are registered with one of the payment processors shown above, enter e-mail  addresses of your payment processors and select corresponding Enable check boxes. You will be able to test the payment processor buttons from your profile page later. If you are not registered, please click or tap the PayPal or Skrill buttons above and sign up.</p>
                                    <p class="warningText">Warning: Email addresses you enter in PayPal and Skrill fields above will be exposed on your profile page and you will start receiving spam messages.
                                    </p>
                                    <p>To remove a payment processor logo from your profile, clear the corresponding check 
                                        boxes and click or tap the Save button at the bottom of this page.</p>
                                </div>
                            </div> -->
                            <hr>
                            <div class="inputDiv">
                                <label for="">Specialization
                                    Keywords:</label>
                                <div class="inputSpan">
                                    <textarea name="special_keywords" id="special_keywords" cols="30" rows="4">{{$userData[0]->usergeneralinfo->special_keywords ?? '' }}</textarea>
                                    <p>Used in addition to the subject areas selected on the Specialization page.
                                        Max. 500 characters, including spaces.</p>
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Accreditations:</label>
                                <div class="inputSpan">
                                    <textarea name="accreditations" id="accreditations" cols="30" rows="4">{{$userData[0]->usergeneralinfo->accreditations ?? '' }}</textarea>
                                    <p>For example, accreditation in courts.
                                        Max. 500 characters, including spaces.</p>
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Membership in
                                    professional
                                    associations:</label>
                                <div class="inputSpan">
                                    <textarea name="membership_professional_associations" id="membership_professional_associations" cols="30" rows="4">
                                    {{$userData[0]->usergeneralinfo->membership_professional_associations ?? '' }}
                                    </textarea>
                                    <p>Only professional translator associations like ATA or ITI.
                                        Max. 500 characters, including spaces.</p>
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Platform & hardware:</label>
                                <div class="inputSpan">
                                    <textarea name="platform_hardware" id="platform_hardware" cols="30" rows="4">
                                    {{$userData[0]->usergeneralinfo->platform_hardware ?? '' }}
                                    </textarea>
                                    <p>Max. 500 characters, including spaces.</p>
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Cover Letter:</label>
                                <div class="inputSpan">
                                    <textarea name="cover_letter" id="cover_letter" cols="30" rows="4">
                                    {{$userData[0]->usergeneralinfo->cover_letter ?? '' }}
                                    </textarea>
                                    <p>Please use plain text. You may copy text from your word processor and paste it. You will use this cover letter only when sending e-mail to your potential clients. No one except you will be able to see it. Max. 2000 characters, including spaces, any language.</p>
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Resume:</label>
                                <div class="inputSpan">
                                    <p>You will submit your résumé or presentation page later using the Edit Résumé button in the Control Panel of your profile or if you select Résumé from the profile menu above.</p>
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Advertisong Slogan:</label>
                                <div class="inputSpan">
                                    <textarea name="advertising_slogan" id="advertising_slogan" cols="30" rows="4">
                                    {{$userData[0]->usergeneralinfo->advertising_slogan ?? '' }}
                                    </textarea>
                                    <p>For example, “Reliable, high-quality translation and subtitling”,
                                        Max. 150 characters, including spaces. HTML is not allowed.</p>
                                </div>
                            </div>
                            <hr>
                            <div class="inputDiv">
                                <label for="">Private Information:</label>
                                <div class="inputSpan">
                                    <div class="checkBox">
                                        @php
                                        $privatechecked='';
                                        $disallowchecked='';
                                        $displaycontchecked='';
                                        $news_notificationchecked='';
                                        $jobsnotification_checked='';
                                        $show_rated_users_checked='';
                                        if(auth::user()->private_information==1)
                                        {
                                        $privatechecked='checked';
                                        }
                                        if(auth::user()->disallow_indexing==1)
                                        {
                                        $disallowchecked='checked';
                                        }
                                        if(auth::user()->display_contact_info==1)
                                        {
                                        $displaycontchecked='checked';
                                        }
                                        if(auth::user()->news_notification==1)
                                        {
                                        $news_notificationchecked='checked';
                                        }
                                        if(auth::user()->jobsnotification==1)
                                        {
                                        $jobsnotification_checked='checked';
                                        }
                                        if(auth::user()->show_rated_users==1)
                                        {
                                        $show_rated_users_checked='checked';
                                        }
                                        @endphp
                                        <input type="checkbox" name="private_information" id="private_information" {{$privatechecked}}>
                                        <label for="">Make All Your Information Private</label>
                                    </div>
                                    <p>If you select this check box, your profile will not be shown to the site users and search engines. Your name will not appear in the search results. However, your name will always be shown if you decide to post messages in TranslatorsCafe.com forums or ask questions in TCTerms. Another exception is job posting. If you consider posting a job on the Job Board, your profile will be accessible from the Selected Job page to members having a full profile.</p>
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Disallow Indexing:</label>
                                <div class="inputSpan">
                                    <div class="checkBox">
                                        <input type="checkbox" name="disallow_indexing" id="disallow_indexing" {{$disallowchecked}}>
                                        <label for="">Disallow search engines to index your profile</label>
                                    </div>
                                    <p>If you select this check box and your profile is public, the meta tag on your profile page will tell search engines not to index this page. Well-behaved search engines will obey, others will not. Therefore, if you want to keep a secret, do not publish it! See Disallow Search Engines to Index Your Profile for more information.</p>
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Display Contact Info:</label>
                                <div class="inputSpan">
                                    <div class="checkBox">
                                        <input type="checkbox" name="display_contact_info" id="display_contact_info" {{$displaycontchecked}}>
                                        <label for="">Display your contact information on your Profile Page. </label>
                                    </div>
                                    <p>If you select this check box and your profile is public, the meta tag on your profile page will tell search engines not to index this page. Well-behaved search engines will obey, others will not. Therefore, if you want to keep a secret, do not publish it! See Disallow Search Engines to Index Your Profile for more information.</p>
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">News notification:</label>
                                <div class="inputSpan">
                                    <div class="checkBox">
                                        <input type="checkbox" name="news_notification" id="news_notification" {{$news_notificationchecked}}>
                                        <label for="">Can we send you news and updates about Ve Translate.com?
                                            Please check if Yes.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Jobs notification:</label>
                                <div class="inputSpan">
                                    <div class="checkBox">
                                        <input type="checkbox" name="jobsnotification" id="jobsnotification" {{$jobsnotification_checked}}>
                                        <label for="">Can we send you new jobs from the Job Board? Please check if Yes.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="inputDiv">
                                <label for="">Show rated users:</label>
                                <div class="inputSpan">
                                    <div class="checkBox">
                                        <input type="checkbox" name="show_rated_users" id="show_rated_users" {{$show_rated_users_checked}}>
                                        <label for="">Show the list of all outsourcers and service providers rated by you
                                            on your profile page.

                                        </label>
                                    </div>
                                </div>
                            </div>
                            <p>When you have completed filling out this form, please click or tap the Save button. Please note that the recent changes made
                                in your profile will not appear immediately in the search results</p>
                            <input type="hidden" name="currtab" value="generaltab">
                            <button type="submit" class="commonBtn">Save & Next</button>
                        </form>
                    </div>
                </div>
            </div>
            @if(!empty(auth::user()->user_status) && auth::user()->user_status=="Freelancer")
            <div id="resume" class="container tab-pane {{$resumetab}}">
                <div id="contactDiv" class="padd-100">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-12">
                                <div id="resumeContent" class="commonDiv">
                                    <h3>Resume</h3>
                                    <p class="warning">Upload Your Resume</p>
                                    <!-- <p><a href="{{asset('files/resume/'.auth::user()->resume ?? '')}}" target="_blank">{{auth::user()->resume ?? ''}}</a></p> -->
                                    <form action="{{route('upload-resume')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="control-group">
                                            <div class="controls bootstrap-timepicker">
                                                <div class="input-images"></div>
                                                <!-- <input type="file" name="resume[]" accept="application/pdf,application/ms-word" class="control " id="customFile" required="required" multiple /> -->
                                            </div>
                                        </div>

                                        <div class="multiBtn text-center">
                                            <input type="hidden" name="currtab" value="resume">
                                            <button class="commonBtn">Submit</button>
                                            <button type="button" class="commonBtn resumenextbtn">Next</button>
                                        </div>

                                    </form>
                                    <br>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>S-no</th>
                                                <th>Resume Files/Images</th>
                                                <th>Created Date</th>
                                                <!-- <th>Actions</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($userData[0]->resumee)
                                            @foreach($userData[0]->resumee as $resume)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td><a href="{{asset('files/resume/'.$resume->file ?? '')}}" target="_blank">{{$resume->file}}</a></td>
                                                <td>{{$resume->created_at}}</td>
                                                <!-- <td></td> -->
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="4" class="text-danger text-center"><strong>No Resume Uplaoded!</strong></td>
                                            </tr>
                                            @endif
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="self-promotion" class="container tab-pane fade">
                <section id="contactDiv" class="padd-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="commonDiv">
                                    <h3>Self Promotion-Premium Member </h3>
                                    <ol>
                                        <li>If you become premium member you’ll get the job notification instantly immediate to job get posted. </li>
                                        <li>If not you’ll get the notification post 3 hours.</li>
                                        <li>If you are a member your profile is going to visible on top of the <b>Home Page.</b> </li>
                                        <li>Your profile is going to be considered on the top 20 freelancers. </li>
                                        <li>Membership is just going to be <b>50 USD</b> ,but we have a promotion going on so we are giving membership free of cost use Coupon Code XYZ.</li>
                                    </ol>
                                    <button type="button" class="btn btn-danger pramiumnextbtn">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div id="language" class="container tab-pane {{$languages}}">
                <div id="contactDiv" class="padd-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="commonDiv">
                                    <h3>Language</h3>
                                    <p class="warningself">You can select only Two Mother and Five Pair languages from below</p>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="{{route('mother-languages')}}" method="post">
                                                @csrf
                                                <table>
                                                    <thead>
                                                        <th>Mother languages</th>
                                                    </thead>
                                                    <tbody>
                                                        <td class="text-center ml-5">
                                                            <select id="mother_language" name="mother_language" required>
                                                                <option value="">Select Language</option>
                                                                <option value="af">Afrikaans</option>
                                                                <option value="sq">Albanian - shqip</option>
                                                                <option value="am">Amharic - አማርኛ</option>
                                                                <option value="ar">Arabic - العربية</option>
                                                                <option value="an">Aragonese - aragonés</option>
                                                                <option value="hy">Armenian - հայերեն</option>
                                                                <option value="ast">Asturian - asturianu</option>
                                                                <option value="az">Azerbaijani - azərbaycan dili</option>
                                                                <option value="eu">Basque - euskara</option>
                                                                <option value="be">Belarusian - беларуская</option>
                                                                <option value="bn">Bengali - বাংলা</option>
                                                                <option value="bs">Bosnian - bosanski</option>
                                                                <option value="br">Breton - brezhoneg</option>
                                                                <option value="bg">Bulgarian - български</option>
                                                                <option value="ca">Catalan - català</option>
                                                                <option value="ckb">Central Kurdish - کوردی (دەستنوسی عەرەبی)</option>
                                                                <option value="zh">Chinese - 中文</option>
                                                                <option value="zh-HK">Chinese (Hong Kong) - 中文（香港）</option>
                                                                <option value="zh-CN">Chinese (Simplified) - 中文（简体）</option>
                                                                <option value="zh-TW">Chinese (Traditional) - 中文（繁體）</option>
                                                                <option value="co">Corsican</option>
                                                                <option value="hr">Croatian - hrvatski</option>
                                                                <option value="cs">Czech - čeština</option>
                                                                <option value="da">Danish - dansk</option>
                                                                <option value="nl">Dutch - Nederlands</option>
                                                                <option value="en">English</option>
                                                                <option value="en-AU">English (Australia)</option>
                                                                <option value="en-CA">English (Canada)</option>
                                                                <option value="en-IN">English (India)</option>
                                                                <option value="en-NZ">English (New Zealand)</option>
                                                                <option value="en-ZA">English (South Africa)</option>
                                                                <option value="en-GB">English (United Kingdom)</option>
                                                                <option value="en-US">English (United States)</option>
                                                                <option value="eo">Esperanto - esperanto</option>
                                                                <option value="et">Estonian - eesti</option>
                                                                <option value="fo">Faroese - føroyskt</option>
                                                                <option value="fil">Filipino</option>
                                                                <option value="fi">Finnish - suomi</option>
                                                                <option value="fr">French - français</option>
                                                                <option value="fr-CA">French (Canada) - français (Canada)</option>
                                                                <option value="fr-FR">French (France) - français (France)</option>
                                                                <option value="fr-CH">French (Switzerland) - français (Suisse)</option>
                                                                <option value="gl">Galician - galego</option>
                                                                <option value="ka">Georgian - ქართული</option>
                                                                <option value="de">German - Deutsch</option>
                                                                <option value="de-AT">German (Austria) - Deutsch (Österreich)</option>
                                                                <option value="de-DE">German (Germany) - Deutsch (Deutschland)</option>
                                                                <option value="de-LI">German (Liechtenstein) - Deutsch (Liechtenstein)</option>
                                                                <option value="de-CH">German (Switzerland) - Deutsch (Schweiz)</option>
                                                                <option value="el">Greek - Ελληνικά</option>
                                                                <option value="gn">Guarani</option>
                                                                <option value="gu">Gujarati - ગુજરાતી</option>
                                                                <option value="ha">Hausa</option>
                                                                <option value="haw">Hawaiian - ʻŌlelo Hawaiʻi</option>
                                                                <option value="he">Hebrew - עברית</option>
                                                                <option value="hi">Hindi - हिन्दी</option>
                                                                <option value="hu">Hungarian - magyar</option>
                                                                <option value="is">Icelandic - íslenska</option>
                                                                <option value="id">Indonesian - Indonesia</option>
                                                                <option value="ia">Interlingua</option>
                                                                <option value="ga">Irish - Gaeilge</option>
                                                                <option value="it">Italian - italiano</option>
                                                                <option value="it-IT">Italian (Italy) - italiano (Italia)</option>
                                                                <option value="it-CH">Italian (Switzerland) - italiano (Svizzera)</option>
                                                                <option value="ja">Japanese - 日本語</option>
                                                                <option value="kn">Kannada - ಕನ್ನಡ</option>
                                                                <option value="kk">Kazakh - қазақ тілі</option>
                                                                <option value="km">Khmer - ខ្មែរ</option>
                                                                <option value="ko">Korean - 한국어</option>
                                                                <option value="ku">Kurdish - Kurdî</option>
                                                                <option value="ky">Kyrgyz - кыргызча</option>
                                                                <option value="lo">Lao - ລາວ</option>
                                                                <option value="la">Latin</option>
                                                                <option value="lv">Latvian - latviešu</option>
                                                                <option value="ln">Lingala - lingála</option>
                                                                <option value="lt">Lithuanian - lietuvių</option>
                                                                <option value="mk">Macedonian - македонски</option>
                                                                <option value="ms">Malay - Bahasa Melayu</option>
                                                                <option value="ml">Malayalam - മലയാളം</option>
                                                                <option value="mt">Maltese - Malti</option>
                                                                <option value="mr">Marathi - मराठी</option>
                                                                <option value="mn">Mongolian - монгол</option>
                                                                <option value="ne">Nepali - नेपाली</option>
                                                                <option value="no">Norwegian - norsk</option>
                                                                <option value="nb">Norwegian Bokmål - norsk bokmål</option>
                                                                <option value="nn">Norwegian Nynorsk - nynorsk</option>
                                                                <option value="oc">Occitan</option>
                                                                <option value="or">Oriya - ଓଡ଼ିଆ</option>
                                                                <option value="om">Oromo - Oromoo</option>
                                                                <option value="ps">Pashto - پښتو</option>
                                                                <option value="fa">Persian - فارسی</option>
                                                                <option value="pl">Polish - polski</option>
                                                                <option value="pt">Portuguese - português</option>
                                                                <option value="pt-BR">Portuguese (Brazil) - português (Brasil)</option>
                                                                <option value="pt-PT">Portuguese (Portugal) - português (Portugal)</option>
                                                                <option value="pa">Punjabi - ਪੰਜਾਬੀ</option>
                                                                <option value="qu">Quechua</option>
                                                                <option value="ro">Romanian - română</option>
                                                                <option value="mo">Romanian (Moldova) - română (Moldova)</option>
                                                                <option value="rm">Romansh - rumantsch</option>
                                                                <option value="ru">Russian - русский</option>
                                                                <option value="gd">Scottish Gaelic</option>
                                                                <option value="sr">Serbian - српски</option>
                                                                <option value="sh">Serbo-Croatian - Srpskohrvatski</option>
                                                                <option value="sn">Shona - chiShona</option>
                                                                <option value="sd">Sindhi</option>
                                                                <option value="si">Sinhala - සිංහල</option>
                                                                <option value="sk">Slovak - slovenčina</option>
                                                                <option value="sl">Slovenian - slovenščina</option>
                                                                <option value="so">Somali - Soomaali</option>
                                                                <option value="st">Southern Sotho</option>
                                                                <option value="es">Spanish - español</option>
                                                                <option value="es-AR">Spanish (Argentina) - español (Argentina)</option>
                                                                <option value="es-419">Spanish (Latin America) - español (Latinoamérica)</option>
                                                                <option value="es-MX">Spanish (Mexico) - español (México)</option>
                                                                <option value="es-ES">Spanish (Spain) - español (España)</option>
                                                                <option value="es-US">Spanish (United States) - español (Estados Unidos)</option>
                                                                <option value="su">Sundanese</option>
                                                                <option value="sw">Swahili - Kiswahili</option>
                                                                <option value="sv">Swedish - svenska</option>
                                                                <option value="tg">Tajik - тоҷикӣ</option>
                                                                <option value="ta">Tamil - தமிழ்</option>
                                                                <option value="tt">Tatar</option>
                                                                <option value="te">Telugu - తెలుగు</option>
                                                                <option value="th">Thai - ไทย</option>
                                                                <option value="ti">Tigrinya - ትግርኛ</option>
                                                                <option value="to">Tongan - lea fakatonga</option>
                                                                <option value="tr">Turkish - Türkçe</option>
                                                                <option value="tk">Turkmen</option>
                                                                <option value="tw">Twi</option>
                                                                <option value="uk">Ukrainian - українська</option>
                                                                <option value="ur">Urdu - اردو</option>
                                                                <option value="ug">Uyghur</option>
                                                                <option value="uz">Uzbek - o‘zbek</option>
                                                                <option value="vi">Vietnamese - Tiếng Việt</option>
                                                                <option value="wa">Walloon - wa</option>
                                                                <option value="cy">Welsh - Cymraeg</option>
                                                                <option value="fy">Western Frisian</option>
                                                                <option value="xh">Xhosa</option>
                                                                <option value="yi">Yiddish</option>
                                                                <option value="yo">Yoruba - Èdè Yorùbá</option>
                                                                <option value="zu">Zulu - isiZulu</option>
                                                            </select>
                                                        </td>
                                                    </tbody>
                                                </table>
                                                <div class="multiBtn text-center pt-5">
                                                    <input type="hidden" name="currtab" value="languages">
                                                    @if(count($userData[0]->usermotherlanguages)<'2') <button type="submit" class="commonBtn">Save Mother Language</button>
                                                        @endif
                                                </div>
                                            </form>
                                            <br>
                                            <div class="pt-5">
                                                <table class="table table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:30%">No:</th>
                                                            <th style="width:60%">Mother Languages</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($userData[0]->usermotherlanguages as $lang)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$lang->mother_language}}</td>
                                                            <td>
                                                                <form action="{{route('delete.mother.languages')}}" method="post" id="delete-mlanguage-form">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$lang->id}}">
                                                                    <button type="button" class="btn delete-mother-language">
                                                                        <span class="fa fa-trash"></span>
                                                                    </button>
                                                                </form>

                                                            </td>
                                                        </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <form action="{{route('save-languages')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-5">
                                                <table class="table-responsive">
                                                    <thead>
                                                        <th>languages</th>
                                                    </thead>
                                                    <tbody>
                                                        <td class="text-center ml-5">
                                                            <select id="from_languages" name="from_languages" required>
                                                                <option value="">Select Language</option>
                                                                <option value="af">Afrikaans</option>
                                                                <option value="sq">Albanian - shqip</option>
                                                                <option value="am">Amharic - አማርኛ</option>
                                                                <option value="ar">Arabic - العربية</option>
                                                                <option value="an">Aragonese - aragonés</option>
                                                                <option value="hy">Armenian - հայերեն</option>
                                                                <option value="ast">Asturian - asturianu</option>
                                                                <option value="az">Azerbaijani - azərbaycan dili</option>
                                                                <option value="eu">Basque - euskara</option>
                                                                <option value="be">Belarusian - беларуская</option>
                                                                <option value="bn">Bengali - বাংলা</option>
                                                                <option value="bs">Bosnian - bosanski</option>
                                                                <option value="br">Breton - brezhoneg</option>
                                                                <option value="bg">Bulgarian - български</option>
                                                                <option value="ca">Catalan - català</option>
                                                                <option value="ckb">Central Kurdish - کوردی (دەستنوسی عەرەبی)</option>
                                                                <option value="zh">Chinese - 中文</option>
                                                                <option value="zh-HK">Chinese (Hong Kong) - 中文（香港）</option>
                                                                <option value="zh-CN">Chinese (Simplified) - 中文（简体）</option>
                                                                <option value="zh-TW">Chinese (Traditional) - 中文（繁體）</option>
                                                                <option value="co">Corsican</option>
                                                                <option value="hr">Croatian - hrvatski</option>
                                                                <option value="cs">Czech - čeština</option>
                                                                <option value="da">Danish - dansk</option>
                                                                <option value="nl">Dutch - Nederlands</option>
                                                                <option value="en">English</option>
                                                                <option value="en-AU">English (Australia)</option>
                                                                <option value="en-CA">English (Canada)</option>
                                                                <option value="en-IN">English (India)</option>
                                                                <option value="en-NZ">English (New Zealand)</option>
                                                                <option value="en-ZA">English (South Africa)</option>
                                                                <option value="en-GB">English (United Kingdom)</option>
                                                                <option value="en-US">English (United States)</option>
                                                                <option value="eo">Esperanto - esperanto</option>
                                                                <option value="et">Estonian - eesti</option>
                                                                <option value="fo">Faroese - føroyskt</option>
                                                                <option value="fil">Filipino</option>
                                                                <option value="fi">Finnish - suomi</option>
                                                                <option value="fr">French - français</option>
                                                                <option value="fr-CA">French (Canada) - français (Canada)</option>
                                                                <option value="fr-FR">French (France) - français (France)</option>
                                                                <option value="fr-CH">French (Switzerland) - français (Suisse)</option>
                                                                <option value="gl">Galician - galego</option>
                                                                <option value="ka">Georgian - ქართული</option>
                                                                <option value="de">German - Deutsch</option>
                                                                <option value="de-AT">German (Austria) - Deutsch (Österreich)</option>
                                                                <option value="de-DE">German (Germany) - Deutsch (Deutschland)</option>
                                                                <option value="de-LI">German (Liechtenstein) - Deutsch (Liechtenstein)</option>
                                                                <option value="de-CH">German (Switzerland) - Deutsch (Schweiz)</option>
                                                                <option value="el">Greek - Ελληνικά</option>
                                                                <option value="gn">Guarani</option>
                                                                <option value="gu">Gujarati - ગુજરાતી</option>
                                                                <option value="ha">Hausa</option>
                                                                <option value="haw">Hawaiian - ʻŌlelo Hawaiʻi</option>
                                                                <option value="he">Hebrew - עברית</option>
                                                                <option value="hi">Hindi - हिन्दी</option>
                                                                <option value="hu">Hungarian - magyar</option>
                                                                <option value="is">Icelandic - íslenska</option>
                                                                <option value="id">Indonesian - Indonesia</option>
                                                                <option value="ia">Interlingua</option>
                                                                <option value="ga">Irish - Gaeilge</option>
                                                                <option value="it">Italian - italiano</option>
                                                                <option value="it-IT">Italian (Italy) - italiano (Italia)</option>
                                                                <option value="it-CH">Italian (Switzerland) - italiano (Svizzera)</option>
                                                                <option value="ja">Japanese - 日本語</option>
                                                                <option value="kn">Kannada - ಕನ್ನಡ</option>
                                                                <option value="kk">Kazakh - қазақ тілі</option>
                                                                <option value="km">Khmer - ខ្មែរ</option>
                                                                <option value="ko">Korean - 한국어</option>
                                                                <option value="ku">Kurdish - Kurdî</option>
                                                                <option value="ky">Kyrgyz - кыргызча</option>
                                                                <option value="lo">Lao - ລາວ</option>
                                                                <option value="la">Latin</option>
                                                                <option value="lv">Latvian - latviešu</option>
                                                                <option value="ln">Lingala - lingála</option>
                                                                <option value="lt">Lithuanian - lietuvių</option>
                                                                <option value="mk">Macedonian - македонски</option>
                                                                <option value="ms">Malay - Bahasa Melayu</option>
                                                                <option value="ml">Malayalam - മലയാളം</option>
                                                                <option value="mt">Maltese - Malti</option>
                                                                <option value="mr">Marathi - मराठी</option>
                                                                <option value="mn">Mongolian - монгол</option>
                                                                <option value="ne">Nepali - नेपाली</option>
                                                                <option value="no">Norwegian - norsk</option>
                                                                <option value="nb">Norwegian Bokmål - norsk bokmål</option>
                                                                <option value="nn">Norwegian Nynorsk - nynorsk</option>
                                                                <option value="oc">Occitan</option>
                                                                <option value="or">Oriya - ଓଡ଼ିଆ</option>
                                                                <option value="om">Oromo - Oromoo</option>
                                                                <option value="ps">Pashto - پښتو</option>
                                                                <option value="fa">Persian - فارسی</option>
                                                                <option value="pl">Polish - polski</option>
                                                                <option value="pt">Portuguese - português</option>
                                                                <option value="pt-BR">Portuguese (Brazil) - português (Brasil)</option>
                                                                <option value="pt-PT">Portuguese (Portugal) - português (Portugal)</option>
                                                                <option value="pa">Punjabi - ਪੰਜਾਬੀ</option>
                                                                <option value="qu">Quechua</option>
                                                                <option value="ro">Romanian - română</option>
                                                                <option value="mo">Romanian (Moldova) - română (Moldova)</option>
                                                                <option value="rm">Romansh - rumantsch</option>
                                                                <option value="ru">Russian - русский</option>
                                                                <option value="gd">Scottish Gaelic</option>
                                                                <option value="sr">Serbian - српски</option>
                                                                <option value="sh">Serbo-Croatian - Srpskohrvatski</option>
                                                                <option value="sn">Shona - chiShona</option>
                                                                <option value="sd">Sindhi</option>
                                                                <option value="si">Sinhala - සිංහල</option>
                                                                <option value="sk">Slovak - slovenčina</option>
                                                                <option value="sl">Slovenian - slovenščina</option>
                                                                <option value="so">Somali - Soomaali</option>
                                                                <option value="st">Southern Sotho</option>
                                                                <option value="es">Spanish - español</option>
                                                                <option value="es-AR">Spanish (Argentina) - español (Argentina)</option>
                                                                <option value="es-419">Spanish (Latin America) - español (Latinoamérica)</option>
                                                                <option value="es-MX">Spanish (Mexico) - español (México)</option>
                                                                <option value="es-ES">Spanish (Spain) - español (España)</option>
                                                                <option value="es-US">Spanish (United States) - español (Estados Unidos)</option>
                                                                <option value="su">Sundanese</option>
                                                                <option value="sw">Swahili - Kiswahili</option>
                                                                <option value="sv">Swedish - svenska</option>
                                                                <option value="tg">Tajik - тоҷикӣ</option>
                                                                <option value="ta">Tamil - தமிழ்</option>
                                                                <option value="tt">Tatar</option>
                                                                <option value="te">Telugu - తెలుగు</option>
                                                                <option value="th">Thai - ไทย</option>
                                                                <option value="ti">Tigrinya - ትግርኛ</option>
                                                                <option value="to">Tongan - lea fakatonga</option>
                                                                <option value="tr">Turkish - Türkçe</option>
                                                                <option value="tk">Turkmen</option>
                                                                <option value="tw">Twi</option>
                                                                <option value="uk">Ukrainian - українська</option>
                                                                <option value="ur">Urdu - اردو</option>
                                                                <option value="ug">Uyghur</option>
                                                                <option value="uz">Uzbek - o‘zbek</option>
                                                                <option value="vi">Vietnamese - Tiếng Việt</option>
                                                                <option value="wa">Walloon - wa</option>
                                                                <option value="cy">Welsh - Cymraeg</option>
                                                                <option value="fy">Western Frisian</option>
                                                                <option value="xh">Xhosa</option>
                                                                <option value="yi">Yiddish</option>
                                                                <option value="yo">Yoruba - Èdè Yorùbá</option>
                                                                <option value="zu">Zulu - isiZulu</option>
                                                            </select>

                                                        </td>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <span class="arrow">===></span>
                                            <div class="col-md-5 ">
                                                <table class="table-responsive">
                                                    <thead>
                                                        <th>languages</th>
                                                    </thead>
                                                    <tbody>
                                                        <td class="text-center ml-5">
                                                            <select id="to_languages" name="to_languages" required>
                                                                <option value="">Select Language</option>
                                                                <option value="af">Afrikaans</option>
                                                                <option value="sq">Albanian - shqip</option>
                                                                <option value="am">Amharic - አማርኛ</option>
                                                                <option value="ar">Arabic - العربية</option>
                                                                <option value="an">Aragonese - aragonés</option>
                                                                <option value="hy">Armenian - հայերեն</option>
                                                                <option value="ast">Asturian - asturianu</option>
                                                                <option value="az">Azerbaijani - azərbaycan dili</option>
                                                                <option value="eu">Basque - euskara</option>
                                                                <option value="be">Belarusian - беларуская</option>
                                                                <option value="bn">Bengali - বাংলা</option>
                                                                <option value="bs">Bosnian - bosanski</option>
                                                                <option value="br">Breton - brezhoneg</option>
                                                                <option value="bg">Bulgarian - български</option>
                                                                <option value="ca">Catalan - català</option>
                                                                <option value="ckb">Central Kurdish - کوردی (دەستنوسی عەرەبی)</option>
                                                                <option value="zh">Chinese - 中文</option>
                                                                <option value="zh-HK">Chinese (Hong Kong) - 中文（香港）</option>
                                                                <option value="zh-CN">Chinese (Simplified) - 中文（简体）</option>
                                                                <option value="zh-TW">Chinese (Traditional) - 中文（繁體）</option>
                                                                <option value="co">Corsican</option>
                                                                <option value="hr">Croatian - hrvatski</option>
                                                                <option value="cs">Czech - čeština</option>
                                                                <option value="da">Danish - dansk</option>
                                                                <option value="nl">Dutch - Nederlands</option>
                                                                <option value="en">English</option>
                                                                <option value="en-AU">English (Australia)</option>
                                                                <option value="en-CA">English (Canada)</option>
                                                                <option value="en-IN">English (India)</option>
                                                                <option value="en-NZ">English (New Zealand)</option>
                                                                <option value="en-ZA">English (South Africa)</option>
                                                                <option value="en-GB">English (United Kingdom)</option>
                                                                <option value="en-US">English (United States)</option>
                                                                <option value="eo">Esperanto - esperanto</option>
                                                                <option value="et">Estonian - eesti</option>
                                                                <option value="fo">Faroese - føroyskt</option>
                                                                <option value="fil">Filipino</option>
                                                                <option value="fi">Finnish - suomi</option>
                                                                <option value="fr">French - français</option>
                                                                <option value="fr-CA">French (Canada) - français (Canada)</option>
                                                                <option value="fr-FR">French (France) - français (France)</option>
                                                                <option value="fr-CH">French (Switzerland) - français (Suisse)</option>
                                                                <option value="gl">Galician - galego</option>
                                                                <option value="ka">Georgian - ქართული</option>
                                                                <option value="de">German - Deutsch</option>
                                                                <option value="de-AT">German (Austria) - Deutsch (Österreich)</option>
                                                                <option value="de-DE">German (Germany) - Deutsch (Deutschland)</option>
                                                                <option value="de-LI">German (Liechtenstein) - Deutsch (Liechtenstein)</option>
                                                                <option value="de-CH">German (Switzerland) - Deutsch (Schweiz)</option>
                                                                <option value="el">Greek - Ελληνικά</option>
                                                                <option value="gn">Guarani</option>
                                                                <option value="gu">Gujarati - ગુજરાતી</option>
                                                                <option value="ha">Hausa</option>
                                                                <option value="haw">Hawaiian - ʻŌlelo Hawaiʻi</option>
                                                                <option value="he">Hebrew - עברית</option>
                                                                <option value="hi">Hindi - हिन्दी</option>
                                                                <option value="hu">Hungarian - magyar</option>
                                                                <option value="is">Icelandic - íslenska</option>
                                                                <option value="id">Indonesian - Indonesia</option>
                                                                <option value="ia">Interlingua</option>
                                                                <option value="ga">Irish - Gaeilge</option>
                                                                <option value="it">Italian - italiano</option>
                                                                <option value="it-IT">Italian (Italy) - italiano (Italia)</option>
                                                                <option value="it-CH">Italian (Switzerland) - italiano (Svizzera)</option>
                                                                <option value="ja">Japanese - 日本語</option>
                                                                <option value="kn">Kannada - ಕನ್ನಡ</option>
                                                                <option value="kk">Kazakh - қазақ тілі</option>
                                                                <option value="km">Khmer - ខ្មែរ</option>
                                                                <option value="ko">Korean - 한국어</option>
                                                                <option value="ku">Kurdish - Kurdî</option>
                                                                <option value="ky">Kyrgyz - кыргызча</option>
                                                                <option value="lo">Lao - ລາວ</option>
                                                                <option value="la">Latin</option>
                                                                <option value="lv">Latvian - latviešu</option>
                                                                <option value="ln">Lingala - lingála</option>
                                                                <option value="lt">Lithuanian - lietuvių</option>
                                                                <option value="mk">Macedonian - македонски</option>
                                                                <option value="ms">Malay - Bahasa Melayu</option>
                                                                <option value="ml">Malayalam - മലയാളം</option>
                                                                <option value="mt">Maltese - Malti</option>
                                                                <option value="mr">Marathi - मराठी</option>
                                                                <option value="mn">Mongolian - монгол</option>
                                                                <option value="ne">Nepali - नेपाली</option>
                                                                <option value="no">Norwegian - norsk</option>
                                                                <option value="nb">Norwegian Bokmål - norsk bokmål</option>
                                                                <option value="nn">Norwegian Nynorsk - nynorsk</option>
                                                                <option value="oc">Occitan</option>
                                                                <option value="or">Oriya - ଓଡ଼ିଆ</option>
                                                                <option value="om">Oromo - Oromoo</option>
                                                                <option value="ps">Pashto - پښتو</option>
                                                                <option value="fa">Persian - فارسی</option>
                                                                <option value="pl">Polish - polski</option>
                                                                <option value="pt">Portuguese - português</option>
                                                                <option value="pt-BR">Portuguese (Brazil) - português (Brasil)</option>
                                                                <option value="pt-PT">Portuguese (Portugal) - português (Portugal)</option>
                                                                <option value="pa">Punjabi - ਪੰਜਾਬੀ</option>
                                                                <option value="qu">Quechua</option>
                                                                <option value="ro">Romanian - română</option>
                                                                <option value="mo">Romanian (Moldova) - română (Moldova)</option>
                                                                <option value="rm">Romansh - rumantsch</option>
                                                                <option value="ru">Russian - русский</option>
                                                                <option value="gd">Scottish Gaelic</option>
                                                                <option value="sr">Serbian - српски</option>
                                                                <option value="sh">Serbo-Croatian - Srpskohrvatski</option>
                                                                <option value="sn">Shona - chiShona</option>
                                                                <option value="sd">Sindhi</option>
                                                                <option value="si">Sinhala - සිංහල</option>
                                                                <option value="sk">Slovak - slovenčina</option>
                                                                <option value="sl">Slovenian - slovenščina</option>
                                                                <option value="so">Somali - Soomaali</option>
                                                                <option value="st">Southern Sotho</option>
                                                                <option value="es">Spanish - español</option>
                                                                <option value="es-AR">Spanish (Argentina) - español (Argentina)</option>
                                                                <option value="es-419">Spanish (Latin America) - español (Latinoamérica)</option>
                                                                <option value="es-MX">Spanish (Mexico) - español (México)</option>
                                                                <option value="es-ES">Spanish (Spain) - español (España)</option>
                                                                <option value="es-US">Spanish (United States) - español (Estados Unidos)</option>
                                                                <option value="su">Sundanese</option>
                                                                <option value="sw">Swahili - Kiswahili</option>
                                                                <option value="sv">Swedish - svenska</option>
                                                                <option value="tg">Tajik - тоҷикӣ</option>
                                                                <option value="ta">Tamil - தமிழ்</option>
                                                                <option value="tt">Tatar</option>
                                                                <option value="te">Telugu - తెలుగు</option>
                                                                <option value="th">Thai - ไทย</option>
                                                                <option value="ti">Tigrinya - ትግርኛ</option>
                                                                <option value="to">Tongan - lea fakatonga</option>
                                                                <option value="tr">Turkish - Türkçe</option>
                                                                <option value="tk">Turkmen</option>
                                                                <option value="tw">Twi</option>
                                                                <option value="uk">Ukrainian - українська</option>
                                                                <option value="ur">Urdu - اردو</option>
                                                                <option value="ug">Uyghur</option>
                                                                <option value="uz">Uzbek - o‘zbek</option>
                                                                <option value="vi">Vietnamese - Tiếng Việt</option>
                                                                <option value="wa">Walloon - wa</option>
                                                                <option value="cy">Welsh - Cymraeg</option>
                                                                <option value="fy">Western Frisian</option>
                                                                <option value="xh">Xhosa</option>
                                                                <option value="yi">Yiddish</option>
                                                                <option value="yo">Yoruba - Èdè Yorùbá</option>
                                                                <option value="zu">Zulu - isiZulu</option>
                                                            </select>

                                                        </td>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="multiBtn text-center pt-5">
                                            <input type="hidden" name="currtab" value="languages">
                                            @if(count($userData[0]->userlanguages)<'5') <button type="submit" class="commonBtn">Submit</button>
                                                <button type="button" class="commonBtn" id="languagenext">Next</button>

                                                @endif
                                        </div>
                                    </form>

                                    <div class="pt-5">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th style="width:10%">No:</th>
                                                    <th style="width:10%">Language ==> Language</th>
                                                    <th style="width:10%">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($userData[0]->userlanguages as $lang)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$lang->from_languages."==>".$lang->to_languages}}</td>
                                                    <td>
                                                        <form action="{{route('delete.user.languages')}}" method="post" id="delete-language-form">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$lang->id}}">
                                                            <button type="button" class="btn delete-language">
                                                                <span class="fa fa-trash"></span>
                                                            </button>
                                                        </form>

                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="service" class="container tab-pane {{$service_rate_tab}}">
                <div id="contactDiv" class="padd-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="commonDiv">
                                    <h3>Services & Rates</h3>
                                    <p>View Your Profile (Services & Rates)</p>
                                    <p>The Service was added to your profile. Now you can add rates for this service.</p>
                                    <p>Please enter your minimum <b>translation</b> rates here. They will be used to filter out job notifications having rate less than yours. You may
                                        makes rates invisible on your profile page if you clear the <b>Your rates are visible</b> check box.
                                    </p>
                                    <p>The services, click or tap the <b>Add Service</b> button; to add rates for your services, click the <b>Add Rates</b> button.</p>
                                    <p><b>Note:</b> Job notifications will be sent according to the services selected on this page. Please do not forget to complete <a href="">your Voice-Over profile</a> if you selected it here.</p>

                                    <!--    <div class="box">
                                                <div class="inputDiv">
                                                    <label for="">Preferred Currency</label>
                                                    <select name="preferred_currency" id="preferred_currency">
                                                        <option value="PKR">Pakistani ruppes (PKR)</option>
                                                    </select>
                                                    <label for=""><b>1 USD = 164.08 PKR</b></label>
                                                </div>
                                                <p><b>Note:</b> The exchange rate above is for reference only</p>
                                                <div class="inputDiv">
                                                    <input type="checkbox" name="notify" id="notify">
                                                    <label for="">Notify about Jobs for non-profit or charitable organizations.</label><br>
                                                    <input type="checkbox" name="rates_visible" id="rates_visible">
                                                    <label for="">Your rates are visible on your profile page.</label>
                                                </div>
                                                <a href="#"><b>Currency Converter</b></a>
                                                <div class="text-center">
                                                    <button type="submit" class="commonBtn">Save</button>
                                                    <button class="commonBtn">Cancel</button>
                                                </div>
                                        </div> -->
                                    <div class="box" style="margin:20px 0px;">
                                        <form action="{{route('save-services-rates')}}" method="post" class="form-inline">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group ">
                                                    <select name="service" class="form-control p-0" required="required">
                                                        <option value="">Select Service</option>
                                                        <option value='Closed captioning'>Closed captioning</option>
                                                        <option value='Copywriting'>Copywriting</option>
                                                        <option value='Desktop publishing'>Desktop publishing</option>
                                                        <option value='Editing'>Editing</option>
                                                        <option value='Interpreting'>Interpreting</option>
                                                        <option value='Interpreting – conference'>Interpreting – conference</option>
                                                        <option value='Interpreting – court/legal'>Interpreting – court/legal</option>
                                                        <option value='Interpreting – medical'>Interpreting – medical</option>
                                                        <option value='Interpreting – phone'>Interpreting – phone</option>
                                                        <option value='Interpreting – sign language'>Interpreting – sign language</option>
                                                        <option value='Localization'>Localization</option>
                                                        <option value='Other'>Other</option>
                                                        <option value='Project management'>Project management</option>
                                                        <option value='Proofreading'>Proofreading</option>
                                                        <option value='Research'>Research</option>
                                                        <option value='Subtitling'>Subtitling</option>
                                                        <option value='Teaching'>Teaching</option>
                                                        <option value='Technical Review'>Technical Review</option>
                                                        <option value='Technical writing'>Technical writing</option>
                                                        <option value='Terminology research'>Terminology research</option>
                                                        <option value='Transcription'>Transcription</option>
                                                        <option value='Translation'>Translation</option>
                                                        <option value='Typesetting'></option>
                                                        <option value='Voice-over'>Voice-over</option>
                                                    </select>
                                                </div>
                                                <div class="form-group ">
                                                    <select class="form-control p-0" name="pair_language" required="required">
                                                        <option value="">Select Language Pair</option>
                                                        @foreach($userData[0]->userlanguages as $lng)
                                                        <option value="{{$lng->id}}">{{$lng->from_languages."==>".$lng->to_languages}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="min_rate_per_word" placeholder="Min rate Per Word(USD)" required="required">
                                                </div>
                                                <div class="form-group ">
                                                    <input class="form-control" type="text" name="min_rate_per_minute" placeholder="Minrate Per Hoaur(USD)">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="text-center">
                                        <input type="hidden" name="currtab" value="service_rates">
                                        <button type="submit" class="commonBtn addservicebtn">save</button>
                                        <button type="submit" class="commonBtn servicenextbtn">Next</button>
                                    </div>
                                    </form>
                                    <br>
                                    <table class="table-responsive voiceOverTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><b>Service</b></th>
                                                <th><b>Pair Language</b></th>
                                                <th><b>Min rate per word</b></th>
                                                <th><b>Min rate per minte</b></th>
                                                <th><b>Actions</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($userData[0]->usersevices as $service)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$service->service}}</td>
                                                @php
                                                $pairlanguage=\App\Models\UserLanguages::where('id',$service->pair_language)->first();

                                                @endphp
                                                <td>{{ $pairlanguage->from_languages ?? ''}}>>{{$pairlanguage->to_languages ?? ''}}</td>
                                                <td>{{$service->min_rate_per_word." $"}}</td>
                                                <td>{{$service->min_rate_per_minute." $"}}</td>
                                                <td>
                                                    <form action="{{route('delete.service.rates')}}" method="post" id="delete-servicerates-form">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$service->id}}">
                                                        <span class="btn delete-service-rate fa fa-trash"></span>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="voice-Over" class="container tab-pane {{$voiceover}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="commonDiv">
                                <h3>Voice-Over</h3>
                                <label for="">Choose Language</label>
                                <div class="inputDiv">
                                    <form action="{{route('save-voice-over')}}" method="post">
                                        @csrf
                                        <select name="language" id="language" required="required">
                                            <option value="">Select Language</option>
                                            <option value="af">Afrikaans</option>
                                            <option value="sq">Albanian - shqip</option>
                                            <option value="am">Amharic - አማርኛ</option>
                                            <option value="ar">Arabic - العربية</option>
                                            <option value="an">Aragonese - aragonés</option>
                                            <option value="hy">Armenian - հայերեն</option>
                                            <option value="ast">Asturian - asturianu</option>
                                            <option value="az">Azerbaijani - azərbaycan dili</option>
                                            <option value="eu">Basque - euskara</option>
                                            <option value="be">Belarusian - беларуская</option>
                                            <option value="bn">Bengali - বাংলা</option>
                                            <option value="bs">Bosnian - bosanski</option>
                                            <option value="br">Breton - brezhoneg</option>
                                            <option value="bg">Bulgarian - български</option>
                                            <option value="ca">Catalan - català</option>
                                            <option value="ckb">Central Kurdish - کوردی (دەستنوسی عەرەبی)</option>
                                            <option value="zh">Chinese - 中文</option>
                                            <option value="zh-HK">Chinese (Hong Kong) - 中文（香港）</option>
                                            <option value="zh-CN">Chinese (Simplified) - 中文（简体）</option>
                                            <option value="zh-TW">Chinese (Traditional) - 中文（繁體）</option>
                                            <option value="co">Corsican</option>
                                            <option value="hr">Croatian - hrvatski</option>
                                            <option value="cs">Czech - čeština</option>
                                            <option value="da">Danish - dansk</option>
                                            <option value="nl">Dutch - Nederlands</option>
                                            <option value="en">English</option>
                                            <option value="en-AU">English (Australia)</option>
                                            <option value="en-CA">English (Canada)</option>
                                            <option value="en-IN">English (India)</option>
                                            <option value="en-NZ">English (New Zealand)</option>
                                            <option value="en-ZA">English (South Africa)</option>
                                            <option value="en-GB">English (United Kingdom)</option>
                                            <option value="en-US">English (United States)</option>
                                            <option value="eo">Esperanto - esperanto</option>
                                            <option value="et">Estonian - eesti</option>
                                            <option value="fo">Faroese - føroyskt</option>
                                            <option value="fil">Filipino</option>
                                            <option value="fi">Finnish - suomi</option>
                                            <option value="fr">French - français</option>
                                            <option value="fr-CA">French (Canada) - français (Canada)</option>
                                            <option value="fr-FR">French (France) - français (France)</option>
                                            <option value="fr-CH">French (Switzerland) - français (Suisse)</option>
                                            <option value="gl">Galician - galego</option>
                                            <option value="ka">Georgian - ქართული</option>
                                            <option value="de">German - Deutsch</option>
                                            <option value="de-AT">German (Austria) - Deutsch (Österreich)</option>
                                            <option value="de-DE">German (Germany) - Deutsch (Deutschland)</option>
                                            <option value="de-LI">German (Liechtenstein) - Deutsch (Liechtenstein)</option>
                                            <option value="de-CH">German (Switzerland) - Deutsch (Schweiz)</option>
                                            <option value="el">Greek - Ελληνικά</option>
                                            <option value="gn">Guarani</option>
                                            <option value="gu">Gujarati - ગુજરાતી</option>
                                            <option value="ha">Hausa</option>
                                            <option value="haw">Hawaiian - ʻŌlelo Hawaiʻi</option>
                                            <option value="he">Hebrew - עברית</option>
                                            <option value="hi">Hindi - हिन्दी</option>
                                            <option value="hu">Hungarian - magyar</option>
                                            <option value="is">Icelandic - íslenska</option>
                                            <option value="id">Indonesian - Indonesia</option>
                                            <option value="ia">Interlingua</option>
                                            <option value="ga">Irish - Gaeilge</option>
                                            <option value="it">Italian - italiano</option>
                                            <option value="it-IT">Italian (Italy) - italiano (Italia)</option>
                                            <option value="it-CH">Italian (Switzerland) - italiano (Svizzera)</option>
                                            <option value="ja">Japanese - 日本語</option>
                                            <option value="kn">Kannada - ಕನ್ನಡ</option>
                                            <option value="kk">Kazakh - қазақ тілі</option>
                                            <option value="km">Khmer - ខ្មែរ</option>
                                            <option value="ko">Korean - 한국어</option>
                                            <option value="ku">Kurdish - Kurdî</option>
                                            <option value="ky">Kyrgyz - кыргызча</option>
                                            <option value="lo">Lao - ລາວ</option>
                                            <option value="la">Latin</option>
                                            <option value="lv">Latvian - latviešu</option>
                                            <option value="ln">Lingala - lingála</option>
                                            <option value="lt">Lithuanian - lietuvių</option>
                                            <option value="mk">Macedonian - македонски</option>
                                            <option value="ms">Malay - Bahasa Melayu</option>
                                            <option value="ml">Malayalam - മലയാളം</option>
                                            <option value="mt">Maltese - Malti</option>
                                            <option value="mr">Marathi - मराठी</option>
                                            <option value="mn">Mongolian - монгол</option>
                                            <option value="ne">Nepali - नेपाली</option>
                                            <option value="no">Norwegian - norsk</option>
                                            <option value="nb">Norwegian Bokmål - norsk bokmål</option>
                                            <option value="nn">Norwegian Nynorsk - nynorsk</option>
                                            <option value="oc">Occitan</option>
                                            <option value="or">Oriya - ଓଡ଼ିଆ</option>
                                            <option value="om">Oromo - Oromoo</option>
                                            <option value="ps">Pashto - پښتو</option>
                                            <option value="fa">Persian - فارسی</option>
                                            <option value="pl">Polish - polski</option>
                                            <option value="pt">Portuguese - português</option>
                                            <option value="pt-BR">Portuguese (Brazil) - português (Brasil)</option>
                                            <option value="pt-PT">Portuguese (Portugal) - português (Portugal)</option>
                                            <option value="pa">Punjabi - ਪੰਜਾਬੀ</option>
                                            <option value="qu">Quechua</option>
                                            <option value="ro">Romanian - română</option>
                                            <option value="mo">Romanian (Moldova) - română (Moldova)</option>
                                            <option value="rm">Romansh - rumantsch</option>
                                            <option value="ru">Russian - русский</option>
                                            <option value="gd">Scottish Gaelic</option>
                                            <option value="sr">Serbian - српски</option>
                                            <option value="sh">Serbo-Croatian - Srpskohrvatski</option>
                                            <option value="sn">Shona - chiShona</option>
                                            <option value="sd">Sindhi</option>
                                            <option value="si">Sinhala - සිංහල</option>
                                            <option value="sk">Slovak - slovenčina</option>
                                            <option value="sl">Slovenian - slovenščina</option>
                                            <option value="so">Somali - Soomaali</option>
                                            <option value="st">Southern Sotho</option>
                                            <option value="es">Spanish - español</option>
                                            <option value="es-AR">Spanish (Argentina) - español (Argentina)</option>
                                            <option value="es-419">Spanish (Latin America) - español (Latinoamérica)</option>
                                            <option value="es-MX">Spanish (Mexico) - español (México)</option>
                                            <option value="es-ES">Spanish (Spain) - español (España)</option>
                                            <option value="es-US">Spanish (United States) - español (Estados Unidos)</option>
                                            <option value="su">Sundanese</option>
                                            <option value="sw">Swahili - Kiswahili</option>
                                            <option value="sv">Swedish - svenska</option>
                                            <option value="tg">Tajik - тоҷикӣ</option>
                                            <option value="ta">Tamil - தமிழ்</option>
                                            <option value="tt">Tatar</option>
                                            <option value="te">Telugu - తెలుగు</option>
                                            <option value="th">Thai - ไทย</option>
                                            <option value="ti">Tigrinya - ትግርኛ</option>
                                            <option value="to">Tongan - lea fakatonga</option>
                                            <option value="tr">Turkish - Türkçe</option>
                                            <option value="tk">Turkmen</option>
                                            <option value="tw">Twi</option>
                                            <option value="uk">Ukrainian - українська</option>
                                            <option value="ur">Urdu - اردو</option>
                                            <option value="ug">Uyghur</option>
                                            <option value="uz">Uzbek - o‘zbek</option>
                                            <option value="vi">Vietnamese - Tiếng Việt</option>
                                            <option value="wa">Walloon - wa</option>
                                            <option value="cy">Welsh - Cymraeg</option>
                                            <option value="fy">Western Frisian</option>
                                            <option value="xh">Xhosa</option>
                                            <option value="yi">Yiddish</option>
                                            <option value="yo">Yoruba - Èdè Yorùbá</option>
                                            <option value="zu">Zulu - isiZulu</option>
                                        </select>
                                        <input type="file" name="voice" accept="audio/mp3,audio/wav" />
                                        <input type="hidden" name="currtab" value="voiceover">
                                        <br>
                                        <button type="submit" class="addLanguageBtn commonBtn" style="margin-top:10px">Save</button>
                                        <button type="button" class="voiceovernextbtn commonBtn" style="margin-top:10px">Next</button>
                                    </form>
                                </div>
                                <table class="table table-hover  voiceOverTable">
                                    <thead>
                                        <tr>
                                            <th><b>Selected Language</b></th>
                                            <th><b>Action</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($userData[0]->uservoicover as $voicelng)
                                        <tr>
                                            <td>{{$voicelng->language}}</td>
                                            <td>
                                                <form action="{{route('delete.voiceover.languages')}}" method="post" id="delete-voicelng-form">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$voicelng->id}}">
                                                    <span class="btn delete-voicelng fa fa-trash"></span>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="specialization" class="container tab-pane {{$specializationtab}}">
                <div id="contactDiv" class="padd-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="commonDiv">
                                    <h3>Specialization</h3>
                                    <p>View Your Profile (Specialization)</p>
                                    <p>Please select your subject areas adn click ot tab to <b>Save</b> Button</p>
                                    <form action="{{route('save-specilizations')}}" method="post">
                                        @csrf
                                        @include("screens.includes.specializtioncheckbox")
                                        <div class="multiBtn pt-5">
                                            <input type="hidden" name="currtab" value="specialization">
                                            <button type="submit" class="commonBtn">Submit & Next</button>
                                        </div>

                                    </form>
                                    <p style="margin-top:20px" class="notice"><b>Note:</b> Job notification will be send according to the subject areas selected on this page.</p>
                                    <p><b>Hint:</b> Do not forget to select a general specialization if you selected a narrow one. For example, if you selected Aerospace Engineering, select also Engineering. See the <a href="">Subject Index</a> for more information</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="software" class="container tab-pane {{$softwarestab}}">
                <div id="contactDiv" class="padd-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="commonDiv">
                                    <h3>Software</h3>
                                    <p>View Your Profile (Specialization)</p>
                                    <p>Please select your subject areas adn click ot tab to <b>Save</b> Button</p>
                                    <form action="{{route('save-software-tools')}}" method="post">
                                        @csrf
                                        @include('screens.includes.softwarecheckbox')
                                        <p style="margin-top:20px" class="notice"><b>Note:</b> Job notification will be send according to the subject areas selected on this page.</p>
                                        <p><b>Other Software</b> (Max. 500 characters, including spaces)</p>
                                        <div class="inputDiv">
                                            <div class="inputSpan">
                                                <textarea name="other_tools" id="" cols="30" rows="4">{{$userData[0]->usersoftwares->other_tools ?? ''}}</textarea>
                                            </div>
                                        </div>
                                        <div class="multiBtn pt-5">
                                            <input type="hidden" name="currtab" value="softwares">
                                            <button class="commonBtn">Submit & Next</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div id="files" class="container tab-pane fade">
                <div id="contactDiv" class="padd-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="commonDiv">
                                    <h3>Files</h3>
                                    <p>View Automatically Inserted Links to You Files:</p>
                                    <a href="">On Your Profile</a>
                                    <a href="">On Your Voice Page</a>
                                    <p>As a regular, you can upload on the TranslatorCafe.com. Web server several files up to <b>2,048</b> KB. Master Members can upload up to <b>10,240</b> KB.</p>
                                    <p>Example of Such File are:</p>
                                    <ul style="padding: 0px 40px; list-style: disc;">
                                        <li>Your detailed presentation page or resourcebundle_get_error_message</li>
                                        <li>Your transaction samples (doc or pdf format)</li>
                                        <li>Your voice welcome message (only flv, vp6, mp3 or mp4 audio or video format)</li>
                                        <li>Your voice-over demo files (only flv, vp6, mp3 or mp4 audio or video format)</li>
                                        <li>Your electronic business card vCard (vcf format)</li>
                                        <li>Images showing you interpreting at a conference (gif, jpeg or png format)</li>
                                    </ul>
                                    <p>Using HTML images tags and link to files.</p>
                                    <p>You have total 42,42 Kb Uploaded and <b>2,005.76</b> KB for free space. The limit is 2,048 KB.</p>
                                    <form action="{{route('delete.user.files')}}" method="post" id="delete-files-form">
                                        @csrf
                                        <table>
                                            <thead>
                                                <th></th>
                                                <th>File Name and Link</th>
                                                <th>File Size</th>
                                                <th>Download Count</th>
                                            </thead>
                                            <tbody>
                                                @foreach($userData[0]->userfiles as $files)
                                                <tr>
                                                    <td>
                                                        <div class="checkBoxDiv">
                                                            <input type="checkbox" name="user_files[]" value="{{$files->id}}">

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="contentDiv">
                                                            <p><b>{{$files->file_title}}</b></p>
                                                            <p>{{$files->purpose}}</p>
                                                            <p><b>Link to File:</b><a href="{{asset('files/userfiles/'.$files->file)}}">{{$files->file}}</a></p>
                                                        </div>
                                                    </td>
                                                    <td>{{$files->file_size}}</td>
                                                    <td>0</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <br>
                                        <button type="button" class="deleteSelected">Delete Selected</button>
                                    </form>
                                    <form action="{{route('user.save.files')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <p><b>Upload File</b></p>
                                        <div class="inputDiv">
                                            <label for="">File Title:</label>
                                            <div class="inputSpan">
                                                <input type="text" name="file_title" id="file_title" required="required">
                                            </div>
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">File:</label>
                                            <div class="inputSpan">
                                                <input type="file" name="file" id="file" required="required">
                                            </div>
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Purpose:</label>
                                            <div class="inputSpan">
                                                <select name="purpose" id="purpose" required="required">
                                                    <option value="">Select File Type</option>
                                                    <option value="Resumes File">Resumes File</option>
                                                    <option value="Project File">Project File</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Language:</label>
                                            <div class="inputSpan">
                                                <select name="language" id="language" required="required">
                                                    <option value="">Select Language</option>
                                                    <option value="1">English</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Comments:</label>
                                            <div class="inputSpan">
                                                <textarea name="comments" id="comments" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <p><b>Instruction :</b></p>
                                        <ul style="padding: 0px 30px;list-style: disc;">
                                            <li>Files Must be less than <b>1,024</b> KB.</li>
                                            <li>Non-Latin and accented character are not accepted in file names.</li>
                                            <li>Please select the language of the file content. do not select the language if the content is language-neutral, for example for images files.</li>
                                            <li>You can enter Optional File title and comments on the file in any language.</li>
                                            <li>Link to your Uploaded resume files along with the title and comments will be automatically shown under your resume on your profile page (Background)
                                                <b>only if you submitted your resume in HTML or text-only format. If your resume is absent, </b>
                                            </li>
                                            <li>Do not include common verification data such as <b>your or your mother's maiden name, date of birth and marital status.</b> Your potential client do not need it. At the same time, this information can be <b>used by someone to impersonate you.</b></li>
                                            <li>If you made a mistake and want to edit you comments, language or purpose, click or tap the Edit link near the file name.</li>
                                            <li>Links to your uploded voice-over flv, vp6, mp3 or mp4 files along with file titles
                                                will be automatically shown on your Voice-Over Profile page. Files are displayed according to the
                                                file title. If you want your files to be displayed in a particular order, start their titles with number.
                                            </li>
                                            <li>Links to the <b>TC Player</b>, which will play your uploaded flv, vp6, mp3 or mp4 video or audio files, can be posted on any Web page.</li>
                                            <li>Links to your uploaded <b>General Purpose files</b> will not be automatically shown anywhere in your profile. However, you can insert
                                                links to these elsewhere in your profile, for example in your resume.
                                            </li>
                                            <li>If you encounter <b>too fast or too slow playback of an MP3 file</b>, your MP3 file contains variable bit rate according. Flash isn't very good at handling these, it's best to stick to constant bit
                                                rate encoding. Also make sure to stick to a sampling frequency that is a multitude of 11.025 kHz (that is, use 11.025, 22,050, 44100 kHz do not use, for example, 48 kHz, which phose problems). The free <a href="">iTunes software</a>
                                                has a basic, decent MP3 encoder.
                                            </li>
                                        </ul>
                                        <center><button type="submit" class="btn btn-primary">Upload</button></center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            @endif

            <div id="change-pass" class="container tab-pane {{$change_pass_tab}}">
                <div id="contactDiv" class="padd-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="commonDiv">
                                    <h3>Change Password</h3>
                                    <form action="{{route('change-pass')}}" method="post">
                                        @csrf
                                        <div class="inputDiv">
                                            <label for="old_pass">Old Password:</label>
                                            <div class="inputSpan w-100">
                                                <input type="password" class="form-control" name="old_password" id="old_pass" placeholder="Enter Old Password" required="required">
                                            </div>
                                        </div>
                                        <div class="inputDiv">
                                            <label for="new_pass">New Password</label>
                                            <div class="inputSpan w-100">
                                                <input type="password" class="form-control" name="new_password" id="new_pass" placeholder="New Password" required="required">
                                            </div>
                                        </div>
                                        <div class="inputDiv">
                                            <label for="conf_pass">Confirm Password</label>
                                            <div class="inputSpan w-100">
                                                <input type="password" class="form-control" name="confirm_password" id="conf_pass" placeholder="Confirm Password" required="required">
                                            </div>
                                        </div>
                                        <div id="message">
                                            <h5>Password must contain the following:</h5>
                                            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                            <p id="number" class="invalid">A <b>number</b></p>
                                            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                        </div>
                                        <center><button type="submit" class="btn btn-primary change_password_btn">Change Password</button></center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
    $(".delete-language").click(function(e) {
        Swal.fire({
            title: 'Do you want to Delete the language?',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Yes, Delete it',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Delete!', '', 'success')
                $("#delete-language-form").submit();
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
    });

    $(".delete-mother-language").click(function(e) {
        Swal.fire({
            title: 'Do you want to Delete the Mother language?',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Yes, Delete it',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Delete!', '', 'success')
                $("#delete-mlanguage-form").submit();
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
    });

    $(".delete-service-rate").click(function(e) {
        Swal.fire({
            title: 'Do you want to Delete the Service?',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Yes, Delete it',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Delete!', '', 'success')
                $("#delete-servicerates-form").submit();
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
    });

    $(".delete-voicelng").click(function() {
        Swal.fire({
            title: 'Do you want to Delete the language?',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Yes, Delete it!',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Delete!', '', 'success')
                $("#delete-voicelng-form").submit();
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
    })

    $(".deleteSelected").click(function() {
        //get input checkbox array if is not empty
        if ($("input[name='user_files[]']:checked").length <= 0) {
            swal.fire('Please Select One checkbox', '', 'error');
            return false;
        }

        Swal.fire({
            title: 'Do you want to Delete the Files?',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Yes, Delete it!',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Delete!', '', 'success')
                $("#delete-files-form").submit();
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
    })
</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });

    //change profile button checked
    $(".togglebtn").change(function() {
        type = $(this).attr('data-type');
        if ($(this).is(":checked")) {
            status = 1;
        } else {
            status = 0;
        }
        //change font awesome when clck
        if (type == "profile") {
            if (status == 1) {
                $(".privateicon").removeClass('fa-lock').addClass('fa-unlock');
            } else {
                $(".privateicon").removeClass('fa-unlock').addClass('fa-lock');
            }
        } else if (type == "ContactInfo") {
            if (status == 1) {
                $(".visibleicon").removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                $(".visibleicon").removeClass('fa-eye').addClass('fa-eye-slash');
            }
        } else if (type == "Rates") {
            if (status == 1) {
                $(".rateicon").removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                $(".rateicon").removeClass('fa-eye').addClass('fa-eye-slash');
            }
        } else if (type == "JobNotification") {
            if (status == 1) {
                $(".jobnotifyicon").removeClass('fa-bell-slash').addClass('fa-bell');
            } else {
                $(".jobnotifyicon").removeClass('fa-bell').addClass('fa-bell-slash');
            }
        } else if (type == "NewsNotification") {
            if (status == 1) {
                $(".newsnotifyicon").removeClass('fa-bell-slash').addClass('fa-bell');
            } else {
                $(".newsnotifyicon").removeClass('fa-bell').addClass('fa-bell-slash');
            }
        }

        $.ajax({
            url: "{{route('change-user-status')}}",
            method: 'get',
            data: {
                status: status,
                type: type
            },
            success: function(res) {
                if (res == "success") {
                    // Swal.fire('Status Changed Successfully!', '', 'success');
                } else {
                    Swal.fire('Oops!', '', 'error');
                }
            }
        })
    })
</script>
<script>
    $(".change-email").on('click', function() {
        $(".nav-link").removeClass('active');
        $(".generaltab").addClass('active');
        $(".tab-pane").removeClass('active');
        $("#general").addClass('active');
    })

    //change password script here
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");
    var myInput = document.getElementById("new_pass");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
    }
    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if (myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if (myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }

    //Delete Profile
    $(".Deleteprofile").on('click', function() {
        Swal.fire({
            title: 'Do you want to Delete Profile?',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Yes, Delete it!',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Delete!', '', 'success')
                $("#delete-profile-form").submit();
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
    })

    //profile progress bar
    var skillbar = $(".profileprogress");

    skillbar.animate({
            width: '{{round(count(auth::user()->mark_profile_section ?? [])/auth::user()->total_profile_section*100,0)}}' + "%"
        },
        3000,
        function() {
            $(".speech-bubble").fadeIn();
        }
    );
</script>

<script>
    $("#country_id").on('change', function() {
        country_id = $(this).val();
        $.ajax({
            url: '{{route("get-states")}}',
            method: "get",
            data: {
                id: country_id,
                type: 'state',
            },
            success: function(res) {
                $("#state").html(res);
            }
        })
    })
    $("#state").on('change', function() {
        state_id = $(this).find(':selected').attr('data-id');
        $.ajax({
            url: '{{route("get-states")}}',
            method: "get",
            data: {
                id: state_id,
                type: 'city',
            },
            success: function(res) {
                $("#city").html(res);
            }
        })
    })
</script>

<script>
    $("#languagenext").on('click', function() {
        $("#profileDiv .tabDiv ul li a").removeClass("active");
        $("a[href='#service']").addClass('active');
        $(".tab-content>.tab-pane").removeClass('active show');
        $("#service").addClass('active show');

    })

    $(".servicenextbtn").on('click', function() {
        $("#profileDiv .tabDiv ul li a").removeClass("active");
        $("a[href='#voice-Over']").addClass('active');
        $(".tab-content>.tab-pane").removeClass('active show');
        $("#voice-Over").addClass('active show');

    })

    $(".voiceovernextbtn").on('click', function() {
        $("#profileDiv .tabDiv ul li a").removeClass("active");
        $("a[href='#specialization']").addClass('active');
        $(".tab-content>.tab-pane").removeClass('active show');
        $("#specialization").addClass('active show');

    })

    $(".pramiumnextbtn").on('click', function() {
        $("#profileDiv .tabDiv ul li a").removeClass("active");
        $("a[href='#language']").addClass('active');
        $(".tab-content>.tab-pane").removeClass('active show');
        $("#language").addClass('active show');

    })

    $(".resumenextbtn").on('click', function() {
        $("#profileDiv .tabDiv ul li a").removeClass("active");
        $("a[href='#self-promotion']").addClass('active');
        $(".tab-content>.tab-pane").removeClass('active show');
        $("#self-promotion").addClass('active show');

    })
</script>
@endsection