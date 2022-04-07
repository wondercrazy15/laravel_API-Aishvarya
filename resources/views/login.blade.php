<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Login demo</title>
</head>
<body>

    <form action="users" class="form-group" style="width:40%; margin-left:15%;" method="post">
        @csrf    
        <h3>Login Demo</h3>
        <label for="username">User Name:</label>
        <input type="text" name="username" id="username" class="form-control">
        <span style="color:red">@error('username'){{$message}}@enderror</span><br>
        <label for="userpwd">Password:</label>
        <input type="password" name="userpwd" id="userpwd" class="form-control">
        <span style="color:red">@error('userpwd'){{$message}}@enderror</span><br>
        <button type="submit" class="btn btn-info">Login</button>
    </form>
    
</body>
</html>