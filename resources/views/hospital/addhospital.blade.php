@extends('admin.admin_header') <!-- Assuming you're using a layout file -->

@section('content')
<div class="container" style="margin-top: 60px; max-width: 800px;">
    <div class="card shadow-lg p-5" style="background: linear-gradient(135deg, #e0f7fa, #fff); border-radius: 15px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
        <h2 class="mb-4 text-center" style="font-weight: bold; color: #007bff; letter-spacing: 1px;">Add Hospital Details</h2>
        @if (session('success'))
        <div class="alert alert-success mt-5" style="width: 100%; max-width: 100%; height: 70px; margin-right: 40px; background-color: #dff0d8; color: #3c763d; font-size: 14px; line-height: 1.5;">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('store_hospital') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Hospital Name -->
            <div class="mb-3">
                <label for="name" class="form-label" style="font-weight: bold; color: #555;">Hospital Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Hospital Name" required style="border-radius: 10px; padding: 10px;">
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label" style="font-weight: bold; color: #555;">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Hospital Email" required style="border-radius: 10px; padding: 10px;">
            </div>

           

            <!-- Address -->
            <div class="mb-3">
                <label for="address" class="form-label" style="font-weight: bold; color: #555;">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Hospital Address" required style="border-radius: 10px; padding: 10px;"></textarea>
            </div>

            <!-- Phone Number -->
            <div class="mb-3">
                <label for="phone_number" class="form-label" style="font-weight: bold; color: #555;">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" required style="border-radius: 10px; padding: 10px;">
            </div>

            <!-- Places -->
            <div class="mb-3">
                <label for="mainPlaces" class="form-label" style="font-weight: bold; color: #555;">Places</label>
                <input type="text" class="form-control" id="mainPlaces" name="place" placeholder="Enter Place" style="border-radius: 10px; padding: 10px;">
            </div>

            <!-- Latitude and Longitude (Hidden Inputs) -->
            <input type="hidden" id="lattitude" name="lattitude" />
            <input type="hidden" id="longitude" name="longitude" />

            <!-- District -->
            <div class="mb-3">
                <label for="defaultSelect" class="form-label" style="font-weight: bold; color: #555;">District</label>
                <select class="form-select" name="district" id="defaultSelect" style="border-radius: 10px; padding: 10px;">
                    <option selected>Select District</option>
                    <option value="alappuzha">Alappuzha</option>
                    <option value="ernakulam">Ernakulam</option>
                    <option value="idukki">Idukki</option>
                    <option value="kannur">Kannur</option>
                    <option value="kasaragod">Kasaragod</option>
                    <option value="kollam">Kollam</option>
                    <option value="kottayam">Kottayam</option>
                    <option value="kozhikode">Kozhikode</option>
                    <option value="malappuram">Malappuram</option>
                    <option value="palakkad">Palakkad</option>
                    <option value="pathanamthitta">Pathanamthitta</option>
                    <option value="thiruvananthapuram">Thiruvananthapuram</option>
                    <option value="thrissur">Thrissur</option>
                    <option value="wayanad">Wayanad</option>
                </select>
            </div>

            <!-- Image -->
            <div class="mb-3">
                <label for="image" class="form-label" style="font-weight: bold; color: #555;">Hospital Image (optional)</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" style="border-radius: 10px; padding: 10px;">
            </div>


             <!-- Password -->
             <div class="mb-3">
                <label for="password" class="form-label" style="font-weight: bold; color: #555;">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required style="border-radius: 10px; padding: 10px;">
            </div>

            
            <!-- Submit Button -->
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-primary" style="font-weight: bold; padding: 12px; background: linear-gradient(45deg, #007bff, #00c6ff); border: none; border-radius: 10px; box-shadow: 0 6px 10px rgba(0, 123, 255, 0.3);" value="Save">
            </div>
        </form>
    </div>
</div>

<!-- Google Maps and Places API -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWED24ut0NZVXBKwkiynWByxmjj__fVcw&libraries=places"></script>
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', function() {
        var places = new google.maps.places.Autocomplete(document.getElementById('mainPlaces'));
        google.maps.event.addListener(places, 'place_changed', function() {
            var place = places.getPlace();
            if (place.geometry) {
                var lattitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();

                document.getElementById('lattitude').value = lattitude;
                document.getElementById('longitude').value = longitude;
            } else {
                alert("No details available for the selected place.");
            }
        });
    });
</script>
@endsection
