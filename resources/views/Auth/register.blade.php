<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <title>Register</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('https://source.unsplash.com/featured/?nature,water') no-repeat center center;
            background-size: cover;
            font-family: 'Arial', sans-serif;
        }
        .register-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            width: 100%;
            max-width: 400px;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #4e73df;
        }
        .input-group-text {
            background-color: #4e73df;
            color: #fff;
            border: none;
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
<div class="register-container">
<style>
    .avatar {
        width: 100px;
        height: 100px;
        border-radius: 60%;
        object-fit: cover; /* Memastikan gambar tidak terdistorsi */
    }
</style>
    <div class="img-container text-center mb-3">
        <img src="data:image/png;base64,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" alt="Logo" class="avatar">
    </div>

    <form action="{{ route('register.post') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="nik" class="form-label">Nik</label>
            <select class="form-select" id="nik" name="nik" onchange="updateFields()" required>
                <option value="" disabled selected>Select a Nik</option>
                @foreach($users as $user)
                    <option value="{{ $user->nik }}" 
                            data-name="{{ $user->name }}"
                            data-role="{{ $user->role }}"
                            data-email="{{ $user->email }}">
                        {{ $user->nik }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2"><i class="bi bi-envelope"></i></span>
            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3"><i class="bi bi-lock"></i></span>
            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon4"><i class="bi bi-lock-fill"></i></span>
            <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                <option value="" disabled selected>Select a role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
        <div class="psw mt-3 text-center">
            <a href="#">Forgot password?</a>
        </div>
    </form>
</div>

<script>
    function updateFields() {
        var nikSelect = document.getElementById('nik');
        var selectedOption = nikSelect.options[nikSelect.selectedIndex];
        
        document.getElementById('name').value = selectedOption.getAttribute('data-name');
        document.getElementById('email').value = selectedOption.getAttribute('data-email');
        document.getElementById('role').value = selectedOption.getAttribute('data-role');
    }
</script>

</body>
</html>
