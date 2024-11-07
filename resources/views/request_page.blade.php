<style>
    .modal-lg {
        max-width: 80%; /* Or any percentage you prefer */
    }
    .modal-body {
        max-height: 90vh; /* Adjust as necessary */
        overflow-y: auto; /* Add scroll if content overflows */
    }
    @media (max-width: 768px) {
            .modal-lg {
            max-width: 100%; /* Or any percentage you prefer */
        }
    }
</style>
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
                <div class="table-responsive">
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
                                    <td>{{$request->phone_model}}</td>
                                    <td>{{$request->phone_color}}</td>
                                    <td>{{$request->lost_date}}</td>
                                    <td>{{$request->lost_location}}</td>
                                    <td>{{$request->address}}</td>
                                    <td>{{$request->status}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
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
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="requestModalLabel">Lost Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/request_register') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="row mb-3">
                            <h5>Select Device</h5>
                            <div class="col-6 col-md-2">                                
                                @foreach ($devices->take(ceil($devices->count() / 2)) as $index => $device)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="device" id="device_{{ $device->id }}" value="{{ $device->id }}" data-device-id="{{ $device->id }}" required onchange="updateBrands()" 
                                            {{ $index === 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="device_{{ $device->id }}">
                                            {{ $device->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-6 col-md-2">                                
                                @foreach ($devices->skip(ceil($devices->count() / 2)) as $index => $device)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="device" id="device_{{ $device->id }}" value="{{ $device->id }}" data-device-id="{{ $device->id }}" required onchange="updateBrands()">
                                        <label class="form-check-label" for="device_{{ $device->id }}">
                                            {{ $device->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="mb-3 col-12 col-md-6"> <!-- Changed to col-12 for mobile -->
                                <label for="brand_id" class="form-label">Phone Brand</label>
                                <select id="brandSelect" class="form-select" aria-label="Select Phone Brand" name="brand_id" required onchange="updateModels()">
                                    <option selected disabled>Open this select menu</option>
                                    @foreach ($brands as $brand)
                                        <option data-device-id="{{ $brand->device_id }}" value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-12 col-md-6"> <!-- Changed to col-12 for mobile -->
                                <label for="phone_model" class="form-label">Phone Model</label>
                                <select id="modelSelect" class="form-select" aria-label="Select Phone Model" name="phone_model" required>
                                    <option selected disabled>Open this select menu</option>
                                    @foreach ($models as $model)
                                        <option data-brand-id="{{ $model->brand_id }}" value="{{ $model->model }}">{{ $model->model }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="phone_color" class="form-label">Phone Color</label>
                                <select id="colorSelect" class="form-select" aria-label="Select Phone Color" name="phone_color" required>
                                    <option selected disabled>Open this select menu</option>
                                </select>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="imei_number" class="form-label">IMEI Number</label>
                                <input type="number" class="form-control" name="imei_number" required>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="lost_date" class="form-label">Lost Date</label>
                                <input type="date" class="form-control" name="lost_date" required>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="lost_time" class="form-label">Lost Time</label>
                                <input type="time" class="form-control" name="lost_time" required>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="lost_location" class="form-label">Lost Location</label>
                                <input type="text" class="form-control" name="lost_location" required>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="contact_number" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" name="contact_number" required>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="contact_email" class="form-label">Contact Email</label>
                                <input type="email" class="form-control" name="contact_email" required>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="social_url" class="form-label">Social Link</label>
                                <input type="text" class="form-control" name="social_url">
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="message" class="form-label">Message</label>
                                <input type="text" class="form-control" name="message" required>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" required>
                            </div>

                            <div class="mb-3 col-12">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" class="form-control"></textarea>
                            </div>
                        </div>                       
                        <div class="d-flex justify-content-around">
                            <button type="submit" class="btn btn-primary col-4">Request</button>
                            <button type="button" id="clear_data" class="btn btn-danger col-4" onclick="clearFormData()">Clear Data</button>
                        </div>                        
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
<script>
    function updateBrands() {
        const selectedDeviceId = document.querySelector('input[name="device"]:checked').getAttribute('data-device-id');
        const brandSelect = document.getElementById('brandSelect');
        const options = brandSelect.options;

        // Loop through options and show/hide based on the selected device
        for (let i = 0; i < options.length; i++) {
            const option = options[i];
            if (option.value) { // Only check options that have a value
                option.style.display = option.getAttribute('data-device-id') === selectedDeviceId ? 'block' : 'none';
            }
        }

        // Reset to the first option (if any) to avoid invalid selection
        brandSelect.selectedIndex = 0;

        // Call updateModels to filter the models based on the selected brand
        updateModels();
    }

    // Function to update the phone models based on selected brand
    function updateModels() {
        const selectedBrandId = document.getElementById('brandSelect').value;
        const modelSelect = document.getElementById('modelSelect');
        const options = modelSelect.options;

        // Loop through options and show/hide based on the selected brand
        for (let i = 0; i < options.length; i++) {
            const option = options[i];
            if (option.value) { // Only check options that have a value
                option.style.display = option.getAttribute('data-brand-id') === selectedBrandId ? 'block' : 'none';
            }
        }

        // Reset to the first option (if any) to avoid invalid selection
        modelSelect.selectedIndex = 0;
    }

    $(document).on('change', '#modelSelect', function() {
        let model_id = $(this).val(); // Get the selected model ID
        let color_select = $('#colorSelect'); // Find the color select element

        // AJAX call to fetch colors based on model_id
        $.ajax({
            type: 'POST',
            url: "{{ route('get.color') }}",
            data: {
                _token: "{{ csrf_token() }}",
                model: model_id,
            },
            success: function(colors) {
                // Clear existing options
                console.log(colors[0]);
                color_select.empty();
                // Add a default option
                color_select.append('<option selected disabled>Open this select menu</option>');
                // $('.customer_datas').html($(response).find('.customer_datas').html());
                let get_colors = colors[0].color;
                // Loop through the colors array and append each color as an option
                $.each(get_colors, function(index, color) {
                    color_select.append('<option value="' + color + '">' + color + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.log('Error:', error); // Log any errors
            }
        });
    });

    // Call updateBrands when the page loads
    window.onload = updateBrands;    


    function clearFormData() {
        // Reset all input fields
        const inputs = document.querySelectorAll('input[type="text"], input[type="number"], input[type="email"], input[type="date"], input[type="time"], input[type="file"], textarea');
        inputs.forEach(input => {
            input.value = '';
        });

        // Reset all select elements
        const selects = document.querySelectorAll('select');
        selects.forEach(select => {
            select.selectedIndex = 0; // Reset to the first option (usually the default "Open this select menu")
        });

        // Reset radio buttons (uncheck them)
        const radioButtons = document.querySelectorAll('input[type="radio"]');
        radioButtons.forEach(radio => {
            radio.checked = false;
        });
    }
</script>

@endsection
