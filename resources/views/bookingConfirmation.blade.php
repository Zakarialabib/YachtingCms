<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <style type="text/css" media="all">
        /*! CSS Used from: http://127.0.0.1:8000/assets/css/styles.css ; media=all */
        @media all{
            *,::after,::before{box-sizing:border-box;}
            h5{margin-top:0;margin-bottom:.5rem;}
            p{margin-top:0;margin-bottom:1rem;}
            a{color:#007bff;text-decoration:none;background-color:transparent;-webkit-text-decoration-skip:objects;}
            a:hover{color:#0056b3;text-decoration:underline;}
            img{vertical-align:middle;border-style:none;}
            label{display:inline-block;margin-bottom:.5rem;}
            input{margin:0;font-family:inherit;font-size:inherit;line-height:inherit;}
            input{overflow:visible;}
            input[type=date],input[type=time]{-webkit-appearance:listbox;}
            h5{margin-bottom:.5rem;font-family:inherit;font-weight:500;line-height:1.2;color:inherit;}
            h5{font-size:1.25rem;}
            .container{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto;}
            @media (min-width:576px){
                .container{max-width:540px;}
            }
            @media (min-width:768px){
                .container{max-width:720px;}
            }
            @media (min-width:992px){
                .container{max-width:960px;}
            }
            @media (min-width:1200px){
                .container{max-width:1140px;}
            }
            .row{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px;}
            .col-lg-12,.col-md-12,.col-md-2,.col-md-6,.col-md-8,.col-sm-3,.col-sm-8,.col-sm-9{position:relative;width:100%;min-height:1px;padding-right:15px;padding-left:15px;}
            @media (min-width:576px){
                .col-sm-3{-webkit-box-flex:0;-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%;}
                .col-sm-8{-webkit-box-flex:0;-ms-flex:0 0 66.666667%;flex:0 0 66.666667%;max-width:66.666667%;}
                .col-sm-9{-webkit-box-flex:0;-ms-flex:0 0 75%;flex:0 0 75%;max-width:75%;}
            }
            @media (min-width:768px){
                .col-md-2{-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%;max-width:16.666667%;}
                .col-md-6{-webkit-box-flex:0;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%;}
                .col-md-8{-webkit-box-flex:0;-ms-flex:0 0 66.666667%;flex:0 0 66.666667%;max-width:66.666667%;}
                .col-md-12{-webkit-box-flex:0;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%;}
                .offset-md-0{margin-left:0;}
                .offset-md-3{margin-left:25%;}
                .offset-md-5{margin-left:41.666667%;}
            }
            @media (min-width:992px){
                .col-lg-12{-webkit-box-flex:0;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%;}
            }
            .form-control{display:block;width:100%;padding:.375rem .75rem;font-size:1rem;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out;}
            .form-control::-ms-expand{background-color:transparent;border:0;}
            .form-control:focus{color:#495057;background-color:#fff;border-color:#80bdff;outline:0;box-shadow:0 0 0 .2rem rgba(0,123,255,.25);}
            .form-control::-webkit-input-placeholder{color:#6c757d;opacity:1;}
            .form-control::-moz-placeholder{color:#6c757d;opacity:1;}
            .form-control:-ms-input-placeholder{color:#6c757d;opacity:1;}
            .form-control::-ms-input-placeholder{color:#6c757d;opacity:1;}
            .form-control::placeholder{color:#6c757d;opacity:1;}
            .form-control:disabled{background-color:#e9ecef;opacity:1;}
            .col-form-label{padding-top:calc(.375rem + 1px);padding-bottom:calc(.375rem + 1px);margin-bottom:0;font-size:inherit;line-height:1.5;}
            .col-form-label-lg{padding-top:calc(.5rem + 1px);padding-bottom:calc(.5rem + 1px);font-size:1.25rem;line-height:1.5;}
            .col-form-label-sm{padding-top:calc(.25rem + 1px);padding-bottom:calc(.25rem + 1px);font-size:.875rem;line-height:1.5;}
            .form-control-sm{padding:.25rem .5rem;font-size:.875rem;line-height:1.5;border-radius:.2rem;}
            .form-group{margin-bottom:1rem;}
            .card{position:relative;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:1px solid rgba(0,0,0,.125);border-radius:.25rem;}
            .card-body{-webkit-box-flex:1;-ms-flex:1 1 auto;flex:1 1 auto;padding:1.25rem;}
            .card-title{margin-bottom:.75rem;}
            .card-img-top{width:100%;border-top-left-radius:calc(.25rem - 1px);border-top-right-radius:calc(.25rem - 1px);}
            .border-0{border:0!important;}
            .rounded-circle{border-radius:50%!important;}
            .justify-content-center{-webkit-box-pack:center!important;-ms-flex-pack:center!important;justify-content:center!important;}
            .position-relative{position:relative!important;}
            .w-50{width:50%!important;}
            .w-100{width:100%!important;}
            .mt-2{margin-top:.5rem!important;}
            .mb-2{margin-bottom:.5rem!important;}
            .mt-3{margin-top:1rem!important;}
            .ml-3{margin-left:1rem!important;}
            .mt-4{margin-top:1.5rem!important;}
            .ml-5{margin-left:3rem!important;}
            .p-2{padding:.5rem!important;}
            .p-3{padding:1rem!important;}
            .text-center{text-align:center!important;}
            .text-primary{color:#007bff!important;}
            .text-success{color:#28a745!important;}
            .text-danger{color:#dc3545!important;}
            .text-muted{color:#6c757d!important;}
            @media print{
                *,::after,::before{text-shadow:none!important;box-shadow:none!important;}
                a:not(.btn){text-decoration:underline;}
                img{page-break-inside:avoid;}
                p{orphans:3;widows:3;}
                .container{min-width:992px!important;}
            }
        }
        /*! CSS Used from: https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css ; media=all */
        @media all{
            *,::after,::before{box-sizing:border-box;}
            h5{margin-top:0;margin-bottom:.5rem;font-weight:500;line-height:1.2;}
            h5{font-size:1.25rem;}
            p{margin-top:0;margin-bottom:1rem;}
            a{color:#0d6efd;text-decoration:underline;}
            a:hover{color:#0a58ca;}
            img{vertical-align:middle;}
            label{display:inline-block;}
            input{margin:0;font-family:inherit;font-size:inherit;line-height:inherit;}
            ::-moz-focus-inner{padding:0;border-style:none;}
            .container{width:100%;padding-right:var(--bs-gutter-x,.75rem);padding-left:var(--bs-gutter-x,.75rem);margin-right:auto;margin-left:auto;}
            @media (min-width:576px){
                .container{max-width:540px;}
            }
            @media (min-width:768px){
                .container{max-width:720px;}
            }
            @media (min-width:992px){
                .container{max-width:960px;}
            }
            @media (min-width:1200px){
                .container{max-width:1140px;}
            }
            @media (min-width:1400px){
                .container{max-width:1320px;}
            }
            .row{--bs-gutter-x:1.5rem;--bs-gutter-y:0;display:flex;flex-wrap:wrap;margin-top:calc(var(--bs-gutter-y) * -1);margin-right:calc(var(--bs-gutter-x)/ -2);margin-left:calc(var(--bs-gutter-x)/ -2);}
            .row>*{flex-shrink:0;width:100%;max-width:100%;padding-right:calc(var(--bs-gutter-x)/ 2);padding-left:calc(var(--bs-gutter-x)/ 2);margin-top:var(--bs-gutter-y);}
            @media (min-width:576px){
                .col-sm-3{flex:0 0 auto;width:25%;}
                .col-sm-8{flex:0 0 auto;width:66.6666666667%;}
                .col-sm-9{flex:0 0 auto;width:75%;}
            }
            @media (min-width:768px){
                .col-md-2{flex:0 0 auto;width:16.6666666667%;}
                .col-md-6{flex:0 0 auto;width:50%;}
                .col-md-8{flex:0 0 auto;width:66.6666666667%;}
                .col-md-12{flex:0 0 auto;width:100%;}
                .offset-md-0{margin-left:0;}
                .offset-md-3{margin-left:25%;}
                .offset-md-5{margin-left:41.6666666667%;}
            }
            @media (min-width:992px){
                .col-lg-12{flex:0 0 auto;width:100%;}
            }
            .col-form-label{padding-top:calc(.375rem + 1px);padding-bottom:calc(.375rem + 1px);margin-bottom:0;font-size:inherit;line-height:1.5;}
            .col-form-label-lg{padding-top:calc(.5rem + 1px);padding-bottom:calc(.5rem + 1px);font-size:1.25rem;}
            .col-form-label-sm{padding-top:calc(.25rem + 1px);padding-bottom:calc(.25rem + 1px);font-size:.875rem;}
            .form-control{display:block;width:100%;padding:.375rem .75rem;font-size:1rem;font-weight:400;line-height:1.5;color:#212529;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;-webkit-appearance:none;-moz-appearance:none;appearance:none;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out;}
            @media (prefers-reduced-motion:reduce){
                .form-control{transition:none;}
            }
            .form-control:focus{color:#212529;background-color:#fff;border-color:#86b7fe;outline:0;box-shadow:0 0 0 .25rem rgba(13,110,253,.25);}
            .form-control::-moz-placeholder{color:#6c757d;opacity:1;}
            .form-control::placeholder{color:#6c757d;opacity:1;}
            .form-control:disabled,.form-control:read-only{background-color:#e9ecef;opacity:1;}
            .form-control-sm{min-height:calc(1.5em + .5rem + 2px);padding:.25rem .5rem;font-size:.875rem;border-radius:.2rem;}
            .card{position:relative;display:flex;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:1px solid rgba(0,0,0,.125);border-radius:.25rem;}
            .card-body{flex:1 1 auto;padding:1rem 1rem;}
            .card-title{margin-bottom:.5rem;}
            .card-img-top{width:100%;}
            .card-img-top{border-top-left-radius:calc(.25rem - 1px);border-top-right-radius:calc(.25rem - 1px);}
            .position-relative{position:relative!important;}
            .border-0{border:0!important;}
            .w-50{width:50%!important;}
            .w-100{width:100%!important;}
            .justify-content-center{justify-content:center!important;}
            .mt-2{margin-top:.5rem!important;}
            .mt-3{margin-top:1rem!important;}
            .mt-4{margin-top:1.5rem!important;}
            .mb-2{margin-bottom:.5rem!important;}
            .p-2{padding:.5rem!important;}
            .p-3{padding:1rem!important;}
            .text-center{text-align:center!important;}
            .text-primary{color:#0d6efd!important;}
            .text-success{color:#198754!important;}
            .text-danger{color:#dc3545!important;}
            .text-muted{color:#6c757d!important;}
            .rounded-circle{border-radius:50%!important;}
        }
        /*! CSS Used from: https://fonts.googleapis.com/css2?family=Material+Icons ; media=all */
        @media all{
            .material-icons{font-family:'Material Icons';font-weight:normal;font-style:normal;font-size:24px;line-height:1;letter-spacing:normal;text-transform:none;display:inline-block;white-space:nowrap;word-wrap:normal;direction:ltr;-webkit-font-feature-settings:'liga';-webkit-font-smoothing:antialiased;}
        }
        /*! CSS Used fontfaces */
        @font-face{font-family:'Material Icons';font-style:normal;font-weight:400;src:url(https://fonts.gstatic.com/s/materialicons/v111/flUhRq6tzZclQEJ-Vdg-IuiaDsNc.woff2) format('woff2');}
    </style>
</head>
<body>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-8 p-3">
    <div class="thankyou-page">
        <div class="_body">
            <div class="_box">

                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <img class="w-100 text-center" src="{{ asset('assets/images/icons/logo-primary.svg') }}" alt="" />
                    </div>

                    <div class="col-md-12 offset-md-0 mt-4">
                        <div class="card w-100 border-0" style="box-shadow: 0 0px 2px rgb(0 0 0 / 35%);">
                            <img class="card-img-top" src="{{ asset('assets/images/boat') }}/{{ $viewData['image'] }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><span class="material-icons text-primary position-relative" style="top:5px;">sailing</span> {{ $viewData['name'] }}</h5>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal p-2" style="box-shadow: 0 0px 1px rgb(0 0 0 / 35%);">
                                    <div class="form-group row mb-2 mt-2">
                                        <div class="col-md-2">
                                            <div class="card border-0" style="width:200px">
                                                <a href="" class="">
                                                    <img class="card-img-top rounded-circle w-50 ml-3" src="/assets/images/profile/avatar.png" alt="Card image">
                                                    <p class="text-muted">{{ $viewData['user_name'] }}</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 ml-5">
                                            <p class="text-muted"><span class="material-icons text-success position-relative" style="top:5px;">bookmarks</span> Number of booking valid : {{ 0 }}</p>
                                            <p class="text-muted"><span class="material-icons text-danger position-relative" style="top:5px;">bookmark_remove</span> Number of booking not valid : {{ 0 }}</p>
                                            <p class="text-muted"><span class="material-icons text-primary position-relative" style="top:5px;">watch_later</span> {{ $viewData['created_at'] }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2 mt-2">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"><span class="material-icons text-primary position-relative" style="top:5px;">watch_later</span> Date Start</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control form-control-sm" id="colFormLabelSm" value="{{ $viewData['date_start'] }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2 mt-2">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"><span class="material-icons text-primary position-relative" style="top:5px;">update</span> Date end</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control form-control-sm" id="colFormLabelSm" value="{{ $viewData['date_end'] }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2 mt-2">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"><span class="material-icons text-primary position-relative" style="top:5px;">av_timer</span> From</label>
                                        <div class="col-sm-9">
                                            <input type="time" class="form-control form-control-sm" id="colFormLabelSm" value="{{ $viewData['from'] }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2 mt-2">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"><span class="material-icons text-primary position-relative" style="top:5px;">timer_off</span> To</label>
                                        <div class="col-sm-9">
                                            <input type="time" class="form-control form-control-sm" id="colFormLabelSm" value="{{ $viewData['to'] }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2 mt-2">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"><span class="material-icons text-primary position-relative" style="top:5px;">pin</span> No Of Guests</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm" value="{{ $viewData['noOfGuests'] }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2 mt-3">
                                        <label for="colFormLabelSm" class="col-lg-12 col-form-label col-form-label-lg">
                                            <span class="material-icons text-primary position-relative" style="top:5px;">location_on</span>
                                            {{ $viewData['address'] }}
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 offset-md-5 mt-4">
                        {{ $viewData['qrCode'] }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>

</body>
</html>
