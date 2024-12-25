<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Kontak</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 2rem;
        }

        .navbar .btn-light {
            margin-left: 30%;
        }

        main {
            padding: 20px;
        }

        .footer {
            background-color: #f1f1f1;
            border-top: 1px solid #eaeaea;
        }

        .footer .text-muted {
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url('kontak') ?>">Web Kontak Code Igniter 3</a>
            <button onclick="confirmLogout()" class="btn btn-light ml-auto">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </div>
    </nav>

    <main class="flex-grow-1">
        <?php $this->load->view($content); ?>
    </main>

    <footer class="footer mt-auto py-3 bg-light text-center">
        <div class="container">
            <span class="text-muted">&copy; <?= date('Y') ?> Web Kontak</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    function confirmLogout() {
        Swal.fire({
            title: "Yakin ingin logout?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, logout!",
            cancelButtonText: "Batal",
            draggable: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= site_url('auth/logout') ?>';
            }
        });
    }
    </script>
</body>
</html>