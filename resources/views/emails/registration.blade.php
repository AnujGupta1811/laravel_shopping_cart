<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
    <h1>Welcome, {{ $user->firstname }}!</h1>
    <p>Thank you for registering on our platform.</p>
    <p>Your verification code is: <strong>{{ $verificationCode }}</strong></p>
    <p>Please use this code to verify your email address.</p>
</body>
</html>
