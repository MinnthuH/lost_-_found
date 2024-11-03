@extends('index')


@section('main')

<div class="container">
    <div class="row align-items-center m-0">
        <div class="col-lg-8">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Mashead text and app badges-->
            <div class="mb-5 mt-3 mb-lg-0 text-center text-lg-start">
                <h3 class="display-1 lh-1 mb-3">Running Process..</h3>
                <table class="table table-dark table-hover">                    
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Phone Name</th>
                            <th>Phone Color</th>
                            <th>Lost Date</th>
                            <th>Lost Location</th>
                            <th>Address</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($request_datas as $request)
                            <tr>
                                @foreach($users as $user)
                                    @if($request->user_id == $user->id)
                                        <td>{{$user->name}}</td>
                                    @endif
                                @endforeach
                                <td>{{$request->name}}</td>
                                <td>{{$request->phone_color}}</td>
                                <td>{{$request->lost_date}}</td>
                                <td>{{$request->lost_location}}</td>
                                <td>{{$request->address}}</td>
                                <td>{{$request->status}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex flex-column flex-lg-row align-items-center">
                    <button type="button" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0"
                        data-bs-toggle="modal" data-bs-target="#requestModal">
                        Request
                    </button>
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
                </svg><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                        transform="translate(120.42 -49.88) rotate(45)"></rect>
                    <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                        transform="translate(-49.88 120.42) rotate(-45)"></rect>
                </svg><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50" cy="50" r="50"></circle>
                </svg>
                <div class="device-wrapper">
                    <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                        <div class="screen bg-black">
                            <!-- PUT CONTENTS HERE:-->
                            <!-- * * This can be a video, image, or just about anything else.-->
                            <!-- * * Set the max width of your media to 100% and the height to-->
                            <!-- * * 100% like the demo example below.-->
                            <video muted="muted" autoplay="" loop=""
                                style="max-width: 100%; height: 100%">
                                <source src="assets/img/demo-screen.mp4" type="video/mp4" />
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- request modal --}}

<div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="requestModalLabel">Lost Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/request_register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="Name" class="form-label">Phone Brand</label>
                        <select class="form-select" aria-label="Default select example" name="brand_id">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                    </div>
                    <div class="mb-3">
                        <label for="Name" class="form-label">Phone Model</label>
                        <select class="form-select" aria-label="Default select example" name="name">
                            <option selected>Open this select menu</option>
                            <option value="one">One</option>
                            <option value="two">Two</option>
                            <option value="three">Three</option>
                          </select>
                    </div>
                    <div class="mb-3">
                        <label for="Name" class="form-label">Phone Color</label>
                        <select class="form-select" aria-label="Default select example" name="phone_color">
                            <option selected>Open this select menu</option>
                            <option value="one">One</option>
                            <option value="two">Two</option>
                            <option value="three">Three</option>
                          </select>
                    </div>

                    <div class="mb-3">
                        <label for="Phone Number" class="form-label">IMEI Number</label>
                        <input type="number" class="form-control" name="imei_number"  required>
                    </div>

                    <div class="mb-3">
                        <label for="Name" class="form-label">Lost Date</label>
                        <input type="date" class="form-control" name="lost_date"  required>
                    </div>

                    <div class="mb-3">
                        <label for="Name" class="form-label">Lost Time</label>
                        <input type="time" class="form-control" name="lost_time"  required>
                    </div>

                    <div class="mb-3">
                        <label for="Name" class="form-label">Lost Location</label>
                        <input type="text" class="form-control" name="lost_location"  required>
                    </div>

                    <div class="mb-3">
                        <label for="Name" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" name="contact_number"  required>
                    </div>

                    <div class="mb-3">
                        <label for="Name" class="form-label">Contact Email</label>
                        <input type="email" class="form-control" name="contact_email"  required>
                    </div>

                    <div class="mb-3">
                        <label for="Name" class="form-label">Social Link</label>
                        <input type="text" class="form-control" name="social_url">
                    </div>

                    <div class="mb-3">
                        <label for="Name" class="form-label">Message</label>
                        <input type="text" class="form-control" name="message"  required>
                    </div>

                    <div class="mb-3">
                        <label for="Name" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image"  required>
                    </div>

                    <div class="mb-3">
                        <label for="Name" class="form-label">Address </label>
                        <!-- <input type="text" class="form-control" name="address"  required> -->
                         <textarea name="address" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Request</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
