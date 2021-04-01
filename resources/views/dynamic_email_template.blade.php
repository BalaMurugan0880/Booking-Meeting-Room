<!DOCTYPE html>
<html>
<head>
    <title>Booking Meeting Room</title>
</head>
<body>

    <div class="container">
        <h2>You Have Booked As Below Information</h2>
        <h2>Name : {{ $data['name'] }}</h2>
        <h2>Email : {{ $data['email'] }}</h2>
        <h2>Location : {{ $data['location'] }}</h2>
        <h2>Date : {{ $data['date'] }}</h2>
        <h2>Hours : {{ $data['hours'] }}</h2>

    </div>

</body>
</html>