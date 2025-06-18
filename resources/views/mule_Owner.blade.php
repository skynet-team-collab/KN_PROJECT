@extends('layouts.mule_owner_reg')

@section('content')

<div class="form-container">
    <h2>Mule Owner Registration</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mule.owner.next') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name">Owner Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="{{ old('age') }}" required min="0">

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{ old('address') }}" required>

        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo" accept="image/*" required>

        <label for="aadhaar">Aadhaar Number:</label>
        <input type="text" id="aadhaar" name="aadhaar" value="{{ old('aadhaar') }}" required>

        <label for="police_verification">Police Verification Certificate:</label>
        <input type="file" id="police_verification" name="police_verification" accept="image/*">

        <label for="mobile_number">Mobile Number:</label>
        <input type="text" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" required>

       {{-- Webcam Section --}}
<label>Capture Photo from Webcam (Optional):</label>
<video id="webcam" autoplay playsinline></video>
<canvas id="canvas" style="display: none;"></canvas>
<br>
<button type="button" id="capture-btn" class="btn" style="margin-top: 10px;">Capture</button>
<input type="hidden" id="webcam_photo" name="webcam_photo">
<img id="preview" style="margin-top: 10px; max-width: 100px; display: none;" />


        <button type="submit" class="btn">Submit</button>
    </form>
</div>

@endsection
