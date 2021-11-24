<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- CSS Lainnya -->
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/body.css">

    <title>Welcome</title>
</head>

<body>

    <!-- navbar menu -->

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h1 class="text-info">Presensi</h1>
            </a>
            <button class="navbar-toggler mb-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="nav nav-pills">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link link tebel-sedang" href="{{ route('home') }}">Home &nbsp;&nbsp;</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link active tebel-sedang rounded-pill bg-ungu shadow" href="{{ route('login') }}">Sign In</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- konten -->

    <div class="container">

        <div class="row mt-5 mb-5">

            <div class="col-12 col-lg-5">
                <h1 class="text-info"><b>Login</b></h1>

                <div class="form-signin mt-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf                  
                        <div class="form-floating">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email">
                            <label for="floatingInput">Email address</label>
                            <div class="invalid-feedback fw-bold mb-1">
                                @error('email') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
                            <label for="floatingPassword">Password</label>
                            <div class="invalid-feedback fw-bold mb-1">
                                @error('password') {{ $message }} @enderror
                            </div>
                        </div>
                    
                        <div class="checkbox mt-2 mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="w-100 badge tebel-sedang rounded-pill bg-ungu shadow border-0 py-3 fs-4" type="submit">Sign In</button>
                    </form>
                </div>
            </div>

            <div class="col-12 col-lg-7">
                <img src="assets/img/vector-content.png" class="img">
            </div>

        </div>

    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>