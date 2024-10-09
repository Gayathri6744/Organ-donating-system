@extends('user.user_header')
@section('content')

<style>
    .container {
        margin-top: 80px; /* Space from the top */
    }

    .card {
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); /* Shadow effect */
    }

    .card-header {
        border-radius: 10px 10px 0 0; /* Round top corners */
        background-color: #007bff; /* Header color */
        color: white; /* Header text color */
        font-size: 1.5rem; /* Larger header text */
        text-align: center;
        padding: 20px;
    }

    .form-group label {
        font-size: 1.25rem; /* Larger label text */
        font-weight: bold; /* Bold labels */
    }

    .form-control {
        font-size: 1.2rem; /* Larger input text */
        padding: 15px; /* Increase padding for better touch targets */
    }

    .form-check-label {
        font-size: 1.1rem; /* Larger radio button label text */
    }

    .btn-primary {
        font-size: 1.2rem; /* Larger button text */
        padding: 10px 20px; /* Increase button padding */
        border-radius: 5px; /* Round button corners */
    }

    .alert {
        font-size: 1rem; /* Larger alert text */
    }
</style>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Register</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success mt-5" style="width: 100%; max-width: 100%; height: 70px; margin-right: 40px; background-color: #dff0d8; color: #3c763d; font-size: 14px; line-height: 1.5;">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('storereg') }}">
                        @csrf
                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        
                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        
                        <!-- Role (Hidden) - User -->
                        <input type="hidden" name="role" value="user">
                        
                        <!-- Type (Donor or Patient) -->
                        <div class="form-group">
                            <label>Are you a:</label><br>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="type" value="donor" class="form-check-input" required> 
                                <label class="form-check-label">Donor</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="type" value="patient" class="form-check-input" required> 
                                <label class="form-check-label">Patient</label>
                            </div>
                        </div>
                        
                        <!-- Gender -->
                        <div class="form-group">
                            <label for="gender">Gender:</label><br>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="gender" value="male" class="form-check-input" required> 
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="gender" value="female" class="form-check-input" required> 
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="gender" value="other" class="form-check-input" required> 
                                <label class="form-check-label" for="other">Other</label>
                            </div>
                        </div>

                        <!-- Blood Group -->
                        <div class="form-group">
                            <label for="blood_group">Blood Group:</label>
                            <select name="blood_group" id="blood_group" class="form-control" required>
                                <option value="">Select Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                        
                        <!-- Phone Number -->
                        <div class="form-group">
                            <label for="phone_number">Phone Number:</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control">
                        </div>
                        
                        <!-- Address -->
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea name="address" id="address" class="form-control"></textarea>
                        </div>
                        
                        <!-- Date of Birth -->
                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth:</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
                        </div>
                        
                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>Already have an account? <a href="{{ route('logindisplay') }}">Login here</a></p>
            </div>
        </div>
    </div>
</div>

@endsection
