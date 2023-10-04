<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <form action="SignupApi.php" method="post">
        <input type="text" name="fullname" placeholder="Full Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="tel" name="phone" placeholder="Phone" required><br>
        <input type="text" name="address" placeholder="Address" required><br>
        <input type="text" name="country" placeholder="Country" required><br>
        <input type="text" name="region" placeholder="Region" required><br>
        <input type="text" name="city" placeholder="City" required><br>
        <input type="text" name="zipcode" placeholder="Zip Code" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>