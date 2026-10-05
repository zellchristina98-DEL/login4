<!DOCTYPE html>
<html lang="en">
<head>
    <title>EDIT</title>
</head>
<body>

<h2>EDIT</h2>

<form method="POST" action="/edit/{{ $user->id }}">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $user->name }}" required><br>

    <label for="email">Email:</label>
    <input type="text" name="email" value="{{ $user->email }}" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" value="{{ $user->password }}" required><br>

    <button type="submit">Save</button>
</form>

</body>
</html>