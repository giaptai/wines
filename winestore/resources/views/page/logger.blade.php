<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    <style>
        body {
            overflow: hidden;
        }

        .register-form {
            opacity: 0;
        }
    </style>
    <script>
        let login = document.querySelector(' .register-form')
    </script>
    <div class="bg-light vh-100" style="display: flex;align-items: center;justify-content: center">
        <div class="d-flex bg-white shadow" style="width: 60em; height: 35em;">
            <img class="" style="width: 50%; object-fit: fill"
                src="https://assets.vogue.in/photos/601bcfda3514c40d2b37e57b/master/w_1800,h_2250,c_limit/The%20Source%20Grenache%20Ros%C3%A9%20by%20Sula%20Vineyards.jpg">
            <div class="p-3 m-auto" style="width: 20rem; height: 25rem;">
                <form class="login-form">
                    <h3 class="mb-3 fw-normal">Đăng nhập</h3>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control " id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control form-control-sm" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Đăng nhập</button>
                </form>

                <form class="register-form">
                    <h3 class="mb-3 fw-normal">Đăng ký</h3>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control " id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Họ và tên</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control " id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control form-control-sm" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Quay lại đăng ký
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
