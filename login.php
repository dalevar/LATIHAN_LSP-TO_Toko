<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Siqhtyl - Login</title>
    <link rel="stylesheet" href="resource/css/bootstrap.min.css">
    <link rel="stylesheet" href="resource/css/style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="col pt-lg-5 pb-lg-5">
                    <div class="card shadow-sm">
                        <div class="text-center">
                            <img src="resource/img/logo.png" alt="Logo" class="rounded w-50 img-thumbnail mt-5">
                            <h3 class="my-3">Welcome to our clinic</h3>
                            <p class="text-secondary">Please <b>Login</b> for access our online clinic</p>

                        </div>
                        <div class="card-body">
                            <hr>
                            <form method="POST" class="p-lg-5">
                                <div class="input-group">
                                    <span class="input-group-text">Username</span>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="John dale">
                                </div>
                                <div class="input-group mt-4">
                                    <span class="input-group-text">Password</span>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" name="login" class="btn btn-sm btn-outline-primary px-5 mb-5 w-50">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    session_start(); //inisiasi session untuk menyimpan data pengguna yang login

    if (isset($_POST['login'])) {
        if ($_POST['username'] == "userlsp" && $_POST['password'] == "smkisfibjm") {
            // Simpan data pengguna ke dalam session
            $_SESSION['username'] = $_POST['username'];
            // Redirect ke halaman beranda
            header("Location: index.php");
        } else { // Jika username atau password salah
            echo "
        <script>
            alert('Username atau Password salah!');
        </script>";
        }
    }
    ?>
    <script src="resource/js/bootstrap.bundle.min.js"></script>
</body>

</html>