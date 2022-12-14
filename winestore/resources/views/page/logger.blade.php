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
        /* body {
            overflow: hidden;
        } */

        /* .chua2form {
            left: 50%;
            right: 50%;
        } */

        .login-form {
            position: absolute;
            left: 50%;
            right: 50%;
            width: 450px;
            height: 400px;
            transform: translate(-50%, 40%);
            transition: 1s;
            opacity: 1;
            /* display: block */
        }

        .register-form {
            position: absolute;
            width: 450px;
            height: 400px;
            left: 50%;
            right: 50%;
            transform: translate(50%, 40%);
            transition: 1s;
            opacity: 0;
            /* display: none */
        }

        .transtion-btn {
            position: absolute;
            z-index: 2;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            text-align: center;
        }
    </style>


    <div class="container-fluid vh-100 p-0">
        <div class="d-flex p-5 h-100 position-relative"
            style="background-image: url('https://img5.goodfon.com/wallpaper/nbig/5/36/vino-probki-bokaly-butylki.jpg'); background-size: 100% 100%">
            <div class="transtion-btn">
                <button class="btn btn-secondary" onclick="crushminhthu()">Đăng kí</button>
                <button class="btn btn-secondary" onclick="yeuminhthu()">Đăng nhập</button>
            </div>
            {{-- form đăng nhập --}}
            <form id="formLogin" class="login-form" enctype="multipart/form-data">
                @csrf
                <h3 class="mb-3 fw-normal text-white">Đăng nhập</h3>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="emaillogin" placeholder="name@example.com"
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="bao gồm @">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="passlogin" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                {{-- <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div> --}}
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="loginOK">Đăng nhập</button>
            </form>

            {{-- form đăng ký --}}
            <form class="register-form" method="POST" action="{{ route('client-signup') }}"
                enctype="multipart/form-data">
                @csrf
                <h3 class="mb-3 fw-normal text-white">Đăng ký</h3>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control form-control-lg" id="lastname" name="lastname"
                            placeholder="Họ" pattern="/[a-Z]/{1,20}" title="Chỉ gồm chữ cái">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control form-control-lg " id="firstname" name="firstname"
                            placeholder="Tên" pattern="/[a-Z]/{1,20}" title="Chỉ gồm chữ cái">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="email" class="form-control form-control-lg" id="email" name="email"
                            placeholder="name@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="tel" class="form-control form-control-lg" id="phone" name="phone"
                            placeholder="Số điện thoại" pattern="[0-9]{10,11}$">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="password" class="form-control form-control-lg" name="password" id="password"
                            pattern="{8,20}" placeholder="Password">
                    </div>
                </div>

                <div class="checkbox mb-3">
                    <label>Quay lại đăng ký</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Đăng ký</button>
            </form>
        </div>
    </div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Thông báo</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toast-logger">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
</script>
<script>
    let loginform = document.querySelector('.login-form');
    let registerform = document.querySelector('.register-form');

    function crushminhthu() {
        loginform.style.left = '-50%';
        loginform.style.opacity = 0
        registerform.style.opacity = 1;
        registerform.style.left = '20%';
    }

    function yeuminhthu() {
        loginform.style.left = '50%'
        loginform.style.opacity = 1
        registerform.style.opacity = 0;
        registerform.style.left = '-35%';
    }

    function ToastMess(mess) {
        const toastLiveExample = document.getElementById('liveToast');
        document.getElementById('toast-logger').innerHTML = mess;
        const toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
    }

    // đăng nhập
    // function login() {
        let formEl = document.getElementById('formLogin');
        formLogin.addEventListener('submit', (event) => {
            event.preventDefault();
            var xhttp = new XMLHttpRequest();
            let formData = new FormData(formEl);
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    let res = JSON.parse(this.responseText);
                    if (res.status == 1) {
                        //     document.getElementById('quanlysanpham').innerHTML = JSON.parse(this.responseText)
                        //         .response;
                        ToastMess(res.message);
                        setTimeout(() => {
                            window.location.href="/";
                        }, 3000);
                    } else ToastMess(res.message);
                }
            };
            xhttp.open("POST", '/account/my-account/login', true);
            xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
            xhttp.send(
                formData
            );
        })
    // }
</script>

</html>
