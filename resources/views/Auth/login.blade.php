<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        .login-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .img-container {
            text-align: center;
            margin-bottom: 1rem;
        }
        .avatar {
            border-radius: 50%;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #4e73df;
        }
        .btn-primary {
            background-color: #4e73df;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2e59d9;
        }
        .cancelbtn {
            background-color: #d9534f;
            border: none;
        }
        .cancelbtn:hover {
            background-color: #c9302c;
        }
        .psw a {
            color: #4e73df;
        }
        .psw a:hover {
            color: #2e59d9;
        }
    </style>
</head>
<body>
  <div class="login-container">
    <div class="img-container">
      <img src="" alt="trisco" class="trisco">
    </div>

    <form action="{{route('login.post')}}" method="post">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label"><b>Email</b></label>
        <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label"><b>Password</b></label>
        <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
      </div>

      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>

      <div class="text-center mt-3">
        <p>Belum punya akun? <a href="{{route('register')}}">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>
 