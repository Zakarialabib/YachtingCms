<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $book->user->name }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <style>
        .thankyou-page ._header {
            background-color: #209cee;
            padding: 100px 30px;
            text-align: center;
        }
        .thankyou-page ._header .logo {
            max-width: 200px;
            margin: 0 auto 50px;
        }
        .thankyou-page ._header .logo img {
            width: 100%;
        }
        .thankyou-page ._header h1 {
            font-size: 65px;
            font-weight: 800;
            color: white;
            margin: 0;
        }
        .thankyou-page ._body {
            margin: -70px 0 30px;
        }
        .thankyou-page ._body ._box {
            margin: auto;
            max-width: 80%;
            padding: 50px;
            background: white;
            border-radius: 3px;
            box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
            -moz-box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
            -webkit-box-shadow: 0 0 35px rgba(10, 10, 10,0.12);
        }
        .thankyou-page ._body ._box h2 {
            font-size: 32px;
            font-weight: 600;
            color: #4ab74a;
        }
        .thankyou-page ._footer {
            text-align: center;
            padding: 50px 30px;
        }

        .thankyou-page ._footer .btn {
            color: white;
            border: 0;
            font-size: 14px;
            font-weight: 600;
            border-radius: 5px;
            letter-spacing: 0.8px;
            padding: 20px 33px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="_body">
                <div class="_box">

                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <img class="w-100 text-center" src="{{ asset('assets/images/icons/logo-primary.svg') }}" alt="" />
                        </div>

                        <div class="col-md-12 offset-md-0 mt-4">
                            <div class="card w-100 border-0" style="box-shadow: 0 0px 2px rgb(0 0 0 / 35%);">
                                <img class="card-img-top" src="{{ asset('assets/images/boat') }}/{{ $book->boat->photo_path }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><span class="material-icons text-primary position-relative" style="top:5px;">sailing</span> {{ $book->boat->name }}</h5>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal p-2" style="box-shadow: 0 0px 1px rgb(0 0 0 / 35%);">
                                        <div class="form-group row mb-2 mt-2">
                                            <div class="col-md-2">
                                                <div class="card border-0" style="width:200px">
                                                    <a href="" class="">
                                                        <img class="card-img-top rounded-circle w-50 ml-3" src="{{ asset('assets/images/profile/avatar.png') }}" alt="Card image">
                                                        <p class="text-muted">{{ $book->user->name }}</p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 ml-5">
                                                <p class="text-muted"><span class="material-icons text-success position-relative" style="top:5px;">bookmarks</span> Number of booking valid : {{ 0 }}</p>
                                                <p class="text-muted"><span class="material-icons text-danger position-relative" style="top:5px;">bookmark_remove</span> Number of booking not valid : {{ 0 }}</p>
                                                <p class="text-muted"><span class="material-icons text-primary position-relative" style="top:5px;">watch_later</span> {{ $book->created_at }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2 mt-2">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"><span class="material-icons text-primary position-relative" style="top:5px;">watch_later</span> Date Start</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control form-control-sm" id="colFormLabelSm" value="{{$book->date_start}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2 mt-2">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"><span class="material-icons text-primary position-relative" style="top:5px;">update</span> Date end</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control form-control-sm" id="colFormLabelSm" value="{{$book->date_end}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2 mt-2">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"><span class="material-icons text-primary position-relative" style="top:5px;">av_timer</span> From</label>
                                            <div class="col-sm-9">
                                                <input type="time" class="form-control form-control-sm" id="colFormLabelSm" value="{{$book->from}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2 mt-2">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"><span class="material-icons text-primary position-relative" style="top:5px;">timer_off</span> To</label>
                                            <div class="col-sm-9">
                                                <input type="time" class="form-control form-control-sm" id="colFormLabelSm" value="{{$book->to}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2 mt-2">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"><span class="material-icons text-primary position-relative" style="top:5px;">pin</span> No Of Guests</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" value="{{$book->noOfGuests}}" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6 offset-md-5 mt-4">
                            {{ $qrCode }}
                        </div>
                    </div>

                </div>
                </div>
            </div>

    </div>

</div>


</body>
</html>
