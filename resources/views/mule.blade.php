@extends('layouts.mule_reg')

@section('content')

<div class="form-container">
    <h2>Mule Registration</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('mule.submit') }}" method="POST">
        @csrf

        <label for="mule_count">How many mules do you own?</label>
        <input type="number" name="mule_count" id="mule_count" min="1" max="10" required>

        <button type="button" onclick="generateMuleFields()">Add Mule Details</button>

        <div id="mule-fields"></div>

        <button type="submit" class="btn">Submit</button>
    </form>
</div>
@endsection
