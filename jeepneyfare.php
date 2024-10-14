<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeepney Fare Calculator</title>
</head>
<body>

<h2>Jeepney Fare Calculator</h2>
<form method="POST" action="">
    <label for="distance">Distance (km):</label>
    <input type="number" step="0.01" name="distance" id="distance" required>
    <br><br>
    <label for="passenger_type">Passenger Type:</label>
    <select name="passenger_type" id="passenger_type" required>
        <option value="regular">Regular</option>
        <option value="student_elderly">Student/Elderly</option>
    </select>
    <br><br>
    <input type="submit" name="submit" value="Calculate Fare">
</form>

<?php
if (isset($_POST['submit'])) {
    $distance = $_POST['distance'];
    $passenger_type = $_POST['passenger_type'];

    // Constants
    $base_fare = 13.00;
    $additional_fare_per_km = 1.75;
    $discount = 0.20;
    $base_km_limit = 5;

    // Calculate fare
    if ($distance <= $base_km_limit) {
        $total_fare = $base_fare;
    } else {
        $extra_km = $distance - $base_km_limit;
        $total_fare = $base_fare + ($extra_km * $additional_fare_per_km);
    }

    // Apply discount for student/elderly
    if ($passenger_type == 'student_elderly') {
        $total_fare = $total_fare - ($total_fare * $discount);
    }

    // Display the result
    echo "<h3>Total Fare: Php " . number_format($total_fare, 2) . "</h3>";
}
?>

</body>
</html>
