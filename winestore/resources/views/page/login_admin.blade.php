<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/18b3e0af24.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 vh-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <form action="{{ route('client-login') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <h3 class="mb-3">Admin</h3>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="emaillogin" placeholder="name@example.com">
                                    <label for="floatingInput">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="passlogin">
                                    <label for="floatingInput">Mật khẩu</label>
                                </div>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Trang WineHub
                                    <a href="{{ route('home') }}"class="link-primary">Chuyển tới</a>
                                </p>
                                <hr class="my-4">
                                <input type="text" class="form-control" name="loginadmin" value="loginadmin" hidden>
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
