<html>
<head>
    <title></title>
</head>
<body>
<form method="POST" action="{{ route('user.login') }}">
    @csrf
    <input type="text" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <button type="submit">Login</button>
</form>
</body>
</html>