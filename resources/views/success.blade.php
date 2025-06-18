@extends('layouts.sucess_page')

@section('content')
<div class="container mt-4">
    <div class="alert alert-success">
        <h4>Registration Successful!</h4>
        <p>The mule owner and mule details have been saved successfully.</p>
        <a href="{{ route('owners.list') }}" class="btn btn-primary">View All Owners</a>
    </div>
</div>
@endsection
