@extends('layouts.mule_reg')

@section('content')
<div class="form-container">
<h2>Mule Registration</h2>
  
  <form id="muleOwnerForm">
    <label for="name">Mule Name (Optional):</label>
    <input type="text" id="name" required>

    <label for="name">Age:</label>
    <input type="text" id="name" required>

    <label for="name">Owner name:</label>
    <input type="text" id="name" required>

    <label for="Health_cer">Health certificate:</label>
    <input type="file" id="Health_cer" accept="image/*" required>

    <button type="submit" class="btn">Submit</button>
  </form>
</div>
@endsection