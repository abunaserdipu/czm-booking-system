<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <title>CZM</title>
</head>

<body>
  <div class="container">
    <h1>CZM Booking System</h1>
    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    @if (session('book'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong> {{ session('book') }}
      </div>
    @elseif(session('pre-book'))
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Sorry!</strong> {{ session('pre-book') }}
      </div>
      {{-- <div class="alert"></div> --}}
    @endif
    <form action="{{ route('booking.store') }}" method="post">
      @csrf
      <table class="table">
        <thead>
          <tr>
            <th>Booking Name</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="text" class="form-control" id="name" placeholder="Booking Name" name="name">
            </td>
            <td><input type="date" class="form-control" name="date" id="date"></td>
            <td><input type="time" class="form-control" name="start_time" id="start-time"></td>
            <td><input type="time" class="form-control" name="end_time" id="end-time"></td>
          </tr>
        </tbody>
      </table>
      {{-- <div class="mb-3 mt-3">
        <label for="name" class="form-label">Booking Name:</label>
        
      </div>
      <div class="mb-3">
        <label for="date" class="form-label">Date:</label>
        
      </div>
      <div class="mb-3">
        <label for="start-time" class="form-label">Start Time:</label>
        
      </div>
      <div class="mb-3">
        <label for="end-time" class="form-label">End Time:</label>
        
      </div> --}}
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>

</html>
