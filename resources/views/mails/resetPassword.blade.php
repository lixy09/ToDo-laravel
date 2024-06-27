<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
</head>
<body>
<p>You are receiving this email because we received a password reset request for your account.</p>
<p>Click the link below to reset your password:</p>
<a href="{{ url('reset-password/'.$token) }}">Reset Password</a>
</body>
</html>
