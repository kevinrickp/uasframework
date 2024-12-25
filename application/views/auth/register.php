<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { 
            background-image: url('https://i0.wp.com/mahasiswaupdate.com/wp-content/uploads/2024/05/akreditasi-upnv-jatim.webp?fit=1920%2C1082&ssl=1'); /* Ganti dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .register-card {
            width: 100%;
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 1rem;
            font-size: 1.5rem;
        }

        .card-body {
            padding: 2rem;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .alert {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="register-card card">
        <div class="card-header">
            <h4 class="mb-0">Register</h4>
        </div>
        <div class="card-body">
            <?= validation_errors('<div class="alert alert-danger">', '</div>') ?>
            
            <?= form_open('auth/register') ?>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
                <div class="text-center mt-3">
                    <label>Sudah punya akun?</label> <a href="<?= site_url('auth/login') ?>">Login</a>
                </div>
            <?= form_close() ?>
        </div>
    </div>
</body>
</html>