<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    @include('layout.menubar')
    <div class="container" style="width: 80%">
        <div class="pt-4 border-top">
            <div class="row row-cols-md-2 row-cols-1 gy-4 justify-content-between">
                @include('layout.sidebar_client')

                <div class="col-md-9 col-12">
                    <div class=" p-3 row row-cols-1 row-cols-md-4">
                        <div class="col-md-auto"><input type="radio" class="btn-check" name="btnradio" id="btnradio1"
                                autocomplete="off" value="Tổng đơn"><label class="btn btn-outline-primary btn-sm"
                                for="btnradio1">Tổng đơn <span class="badge bg-danger"
                                    id="badge_tongdon">14</span></label></div>
                        <div class="col-md-auto"><input type="radio" class="btn-check" name="btnradio" id="btnradio2"
                                autocomplete="off" value="Chờ xác nhận"><label class="btn btn-outline-primary btn-sm"
                                for="btnradio1">Chờ xác nhận <span class="badge bg-danger"
                                    id="badge_tongdon">14</span></label></div>
                        <div class="col-md-auto"><input type="radio" class="btn-check" name="btnradio" id="btnradio2"
                                autocomplete="off" value="Chờ xác nhận"><label class="btn btn-outline-primary btn-sm"
                                for="btnradio1">Đã xác nhận <span class="badge bg-danger"
                                    id="badge_tongdon">14</span></label></div>
                        <div class="col-md-auto"><input type="radio" class="btn-check" name="btnradio" id="btnradio2"
                                autocomplete="off" value="Chờ xác nhận"><label class="btn btn-outline-primary btn-sm"
                                for="btnradio1">Đã hủy <span class="badge bg-danger"
                                    id="badge_tongdon">14</span></label></div>
                        <div class="col-md-auto">
                            <div class="input-group"><input type="text" class="form-control form-control-sm"
                                    placeholder="Search"><button class="btn btn-sm btn-success"
                                    type="submit">Go</button></div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle ">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Mã đơn</th>
                                    <th scope="col">Ngày đặt</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">12</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">13</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">14</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">15</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">16</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">17</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">18</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">19</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row">20</th>
                                    <td>20220517103447</td>
                                    <td>17-05-2022 10:34:47</td>
                                    <td>12,040,000 đ</td>
                                    <td>Chờ xác nhận</td>
                                    <td><i class="bi bi-x-lg text-danger"> </i><i
                                            class="bi bi-exclamation-circle-fill text-primary"></i></td>
                                </tr>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-sm justify-content-end">
                                <li class="page-item disabled"><a class="page-link">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footerbar')
</body>

</html>
