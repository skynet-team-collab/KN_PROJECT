@extends('layouts.mule_owner_reg')

@section('content')
<div class="form-container">
<h2>Mule Owner Registration</h2>
  
  <form id="muleOwnerForm">
    <label for="name">Owner Name:</label>
    <input type="text" id="name" required>

    <label for="name">Age:</label>
    <input type="text" id="name" required>

    <label for="name">Address:</label>
    <input type="text" id="name" required>

    <label for="photo_upload">Photo:</label>
    <input type="file" id="photo_upload" accept="image/*" required>

    <label for="Aadhaar">Aadhaar number:</label>
    <input type="text" id="Aadhaar" required>

    <label>Live Capture:</label>
    <video id="video" autoplay></video>
    <button type="button" class="btn" onclick="capturePhoto()">Capture Photo</button>
    <canvas id="canvas" style="display:none;"></canvas>
    <img id="capturedImage" class="preview-image" src="#" alt="Captured Image" style="display:none;"/>

    <label for="police verification">Police verification certificate:</label>
    <input type="file" id="police_verification" accept="image/*" required>

    <label for="contact">Mobile Number:</label>
    <input type="text" id="contact" required>

    <button type="submit" class="btn">Submit</button>
  </form>
</div>
@endsection