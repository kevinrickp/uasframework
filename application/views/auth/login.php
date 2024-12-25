<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            overflow: hidden;
            position: relative;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('https://i0.wp.com/mahasiswaupdate.com/wp-content/uploads/2024/05/akreditasi-upnv-jatim.webp?fit=1920%2C1082&ssl=1');
            background-size: cover;
            background-position: center;
        }


        .login-card {
            width: 100%;
            max-width: 400px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
            z-index: 1;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 1rem;
            font-size: 1.5rem;
            z-index: 1;
        }

        .card-body {
            padding: 2rem;
            z-index: 1;
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
    <div class="login-card">
        <div class="card-header">
            <h4 class="mb-0">Login</h4>
        </div>
        <div class="card-body">
            <?php if ($this->session->flashdata('error')): ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Gagal!',
                        text: '<?= $this->session->flashdata('error') ?>',
                        confirmButtonText: 'OK'
                    });
                </script>
            <?php endif; ?>
            
            <?= form_open('auth/login', ['id' => 'loginForm']) ?>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
                <div class="text-center mt-3">
                    <label>Belum punya akun?</label> <a href="<?= site_url('auth/register') ?>">Register</a>
                </div>
            <?= form_close() ?>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const form = this;

            const inputs = form.querySelectorAll('input');
            inputs.forEach(input => input.classList.remove('is-invalid'));

            fetch(form.action, {
                method: 'POST',
                body: new FormData(form)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Berhasil!',
                        text: 'Selamat datang, ' + data.username,
                        position: 'center',
                        confirmButtonText: 'OK',
                        scrollbarPadding: false
                    }).then(() => {
                        // Redirect ke halaman kontak
                        window.location.href = "<?= site_url('kontak') ?>";
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Gagal!',
                        text: data.message,
                        position: 'center',
                        confirmButtonText: 'OK',
                        scrollbarPadding: false
                    });

                    if (data.message.includes('Username')) {
                        form.querySelector('input[name="username"]').classList.add('is-invalid');
                    }
                    if (data.message.includes('Password')) {
                        form.querySelector('input[name="password"]').classList.add('is-invalid');
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Silahkan refresh halaman.',
                    position: 'center',
                    confirmButtonText: 'OK',
                    scrollbarPadding: false
                });
            });
        });
    </script>
</body>
</html>
