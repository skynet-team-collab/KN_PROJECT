<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mule Owners List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f2f2f2;
  background-image: url('../images/main_background.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
}
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Mule Owners</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Address</th>
            <th>Aadhaar</th>
            <th>Phone</th>
            <th>Show Mules</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mule_owners as $owner)
            <tr>
                <td>{{ $owner->id }}</td>
                <td>{{ $owner->name }}</td>
                <td>{{ $owner->age }}</td>
                <td>{{ $owner->address }}</td>
                <td>{{ $owner->aadhaar_number }}</td>
                <td>{{ $owner->mobile_number }}</td>
                <td>
                    <button class="btn btn-sm btn-info" type="button" data-bs-toggle="collapse"
                            data-bs-target="#mules-{{ $owner->id }}">
                        View Mules
                    </button>
                </td>
            </tr>
            <tr class="collapse" id="mules-{{ $owner->id }}">
                <td colspan="7">
                    @if(isset($mules_by_owner[$owner->id]))
                        <table class="table table-sm table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Breed</th>
                                <th>Age</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mules_by_owner[$owner->id] as $mule)
                                <tr>
                                    <td>{{ $mule->name }}</td>
                                    <td>{{ $mule->breed }}</td>
                                    <td>{{ $mule->age }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No mules found for this owner.</p>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
