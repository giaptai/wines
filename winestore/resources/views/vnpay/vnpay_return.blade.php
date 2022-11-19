<!DOCTYPE html>
<html>

<head>
    <title>Thông tin thanh toán</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <script src="{{ url('./bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ url('./bootstrap/dist/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">
    <style>
        .container {
            margin: 2rem auto;
        }

        .header {
            margin-bottom: 2rem;
            text-align: center;
            border-bottom: 1px solid grey;
        }

        .footer {
            border-top: 1px solid grey;
            text-align: center;
            margin-top: 7rem;
        }

        .form-group {
            margin-bottom: 0.4rem;
        }
    </style>
    <div class="container bg-light">

        <div class="p-1">

            <div class="m-auto card p-4 rounded-0 shadow" style="width:35rem">
                <div class="header clearfix">
                    <h2 class="text-muted">Thông tin giao dịch</h2>
                </div>
                <div class="mb-2 row">
                    <label for="staticEmail" class="col-md-6 col-form-label fw-semibold">Mã đơn hàng:</label>
                    <div class="col-md-6">
                        <input type="text" readonly class="form-control-plaintext" value="{{ $vnp_TxnRef }}">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="staticEmail" class="col-md-6 col-form-label fw-semibold">Tổng số tiền:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control-plaintext" readonly
                            value="{{ number_format($vnp_Amount / 100) }}">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="staticEmail" class="col-md-6 col-form-label fw-semibold">Nội dung thanh toán:</label>
                    <div class="col-md-6">
                        <input type="text" readonly class="form-control-plaintext" value="{{ $vnp_OrderInfo }}">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="staticEmail" class="col-md-6 col-form-label fw-semibold">Mã phản hồi:</label>
                    <div class="col-md-6">
                        <input type="text" readonly class="form-control-plaintext" value="{{ $vnp_ResponseCode }}">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="staticEmail" class="col-md-6 col-form-label fw-semibold">Mã giao dịch VNPAY:</label>
                    <div class="col-md-6">
                        <input type="text" readonly class="form-control-plaintext" value="{{ $vnp_TransactionNo }}">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="staticEmail" class="col-md-6 col-form-label fw-semibold">Mã Ngân hàng:</label>
                    <div class="col-md-6">
                        <input type="text" readonly class="form-control-plaintext" value="{{ $vnp_BankCode }}">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="staticEmail" class="col-md-6 col-form-label fw-semibold">Thời gian thanh toán:</label>
                    <div class="col-md-6">
                        <input type="text" readonly class="form-control-plaintext"
                            value="{{ date('d-m-Y h:i:s', strtotime($vnp_PayDate)) }}">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="staticEmail" class="col-md-6 col-form-label fw-semibold">Người thanh toán:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control-plaintext" readonly
                            value="{{ $fullname }}">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="staticEmail" class="col-md-6 col-form-label fw-semibold">Kết quả: </label>
                    <div class="col-md-6">
                        <input type="text" readonly class="form-control-plaintext {!! $vnp_ResponseCode == '00' ? 'text-success fw-bold' : 'text-danger fw-bold' !!}"
                            value="{{ $Result }}">
                    </div>
                </div>
                <a href="{{ route('home') }}" class="btn btn-primary rounded-0">Quay lại</a>
            </div>

        </div>
        <footer class="footer mt-5">
            <p>&copy; Trang web bán rượu trực tuyến {!! date('Y') !!}</p>
        </footer>
    </div>
</body>

</html>
