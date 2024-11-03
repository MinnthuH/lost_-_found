@extends('index')

@section('main')
<div class="container">
    <div class="row align-items-center m-0">
        <div class="col-lg-8">
            @if ($errors->any())
                <div class="alert alert-dismissible fade show bg-danger text-white" role="alert">
                    <strong>Error!</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="mb-3 mt-3">
                <a href="{{ url('/request-page') }}" class="btn btn-primary rounded-pill"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
            </div>
            <!-- Mashead text and app badges-->
            <div class="mb-5 mt-5 mb-lg-0 text-center text-lg-start">
                <h3 class="display-1 lh-1 mb-3">Thanks For Your Rqeuest...</h3>
                <!-- Card Column -->
                <div class="col-lg-8 mx-auto"> <!-- Center the card by using mx-auto -->
                    <div class="card border-success">
                        <div class="card-header">Your Request is review...</div>
                        <div class="card-body text-success">
                            <h5 class="card-title">Job ID : demo 123456</h5>
                            <p class="card-text">အမြန်ဆုံးရှာဖွေတွေ့ရှိနိုင်အောင်ဆောင်ရွက်နေပါတယ်ခင်ဗျာ...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Masthead device mockup feature-->
            <div class="masthead-device-mockup">
                <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                            <stop class="gradient-start-color" offset="0%"></stop>
                            <stop class="gradient-end-color" offset="100%"></stop>
                        </linearGradient>
                    </defs>
                    <circle cx="50" cy="50" r="50"></circle>
                </svg>
                <svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">
                    <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(120.42 -49.88) rotate(45)"></rect>
                    <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(-49.88 120.42) rotate(-45)"></rect>
                </svg>
                <svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50" cy="50" r="50"></circle>
                </svg>
                <div class="device-wrapper">
                    <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                        <div class="screen bg-black">
                            <!-- PUT CONTENTS HERE:-->
                            <video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%">
                                <source src="assets/img/demo-screen.mp4" type="video/mp4" />
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
