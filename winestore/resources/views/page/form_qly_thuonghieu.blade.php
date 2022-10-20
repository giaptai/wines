<div class="p-3 row row-cols-1 row-cols-md-3 sticky-top bg-light justify-content-between">
    <div class="col-md-auto d-flex">
        <div class="col-md-auto">
            <input type="radio" class="btn-check" autocomplete="off" value="Tổng đơn">
            <label class="btn btn-outline-primary btn-sm" for="btnradio1">Tổng thương hiệu <span
                    class="badge bg-danger" id="badge_tongdon"> <?php echo $pagin; ?></span></label>
        </div>
        <div class="col-md-auto">
            <a class="btn btn-primary btn-sm" href="{{ route('add-product') }}">Thêm thương hiệu </a>
        </div>
    </div>

    <div class="col-md-auto">
        <div class="input-group">
            <input type="text" class="form-control form-control-sm" value=""
                placeholder="Tên..." id="search_id">

            <button class="btn btn-sm btn-primary" onclick="searched(this.parentElement)"
                type="button">Search</button>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table align-middle ">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody id="show-product">
            @foreach ($brandArray as $item)
            <tr>
                <th scope="row"><?php echo $item->id; ?></th>
                <th scope="row"><?php echo $item->name; ?></th>
                <td><?php echo $item->description; ?></td>
                <td>
                    <button type="button" class="btn" data-bs-toggle="modal"
                        data-bs-target="#minhthu<?php echo $item->id; ?>" id="<?php echo $item->id; ?>">
                        <i class="bi bi-eye text-primary"> </i>
                    </button>
                    <button value="<?php echo $item->id; ?>"
                        class="delete-btn btn btn-sm bi bi-x-lg text-danger" type="button"
                        onclick="deleted(<?php echo $item->id; ?>)">
                    </button>
                </td>
            </tr>
            <div class="modal fade" id="minhthu<?php echo $item->id; ?>" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Sửa thương hiệu</h5>
                            <button type="lbutton" class="btn-close" data-bs-dismiss="modal"
                                aria-labe="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center justify-content-around">
                                <div class="col-md-12">
                                    <div class="row col-md-auto">
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" disabled
                                                    value="<?php echo $item->id; ?>">
                                                <label for="floatingInput">Mã</label>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-floating mb-3">
                                                <input
                                                    name="name-brand-modal-<?php echo $item->id; ?>"
                                                    id="name-brand-modal-<?php echo $item->id; ?>"
                                                    class="form-control"
                                                    value="<?php echo $item->name; ?>">
                                                <label for="floatingInput">Tên thương hiệu</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="desc-brand-modal-{{$item->id}}" placeholder="Mô tả gì đó"
                                                style="height: 120px;">{{$item->description}}</textarea>
                                                <label for="floatingInput">Mô tả</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary"
                                data-bs-dismiss="modal"
                                onclick="edit(<?php echo $item->id; ?>)">Sửa</button>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
    {!! $brandArray !!}
</div>
{{-- <nav aria-label="Page navigation example">
    <ul class="pagination pagination-sm justify-content-end" id="phantrang">
        <li class="page-item disabled"><a class="page-link">Previous</a></li> --}}
        <?php
        // for ($i = 0; $i < ceil($pagin / 10); $i++) {
        //     if ($i == 0) {
        //         echo '<li class="page-item"><a class="page-link active">' . ($i + 1) . '</a></li>';
        //     } else {
        //         echo '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
        //     }
        // }
        ?>
        {{-- <li class="page-item"><a class="page-link">Next</a></li>
    </ul>
</nav> --}}
<script>
    function deleted(ele) {
        console.log(ele);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };

        xhttp.open("DELETE", '/admin/brands/' + ele, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
        xhttp.send();
    }

    function edit(ele) {
        var name =document.getElementById('name-brand-modal-'+ele).value;
        var desc =document.getElementById('desc-brand-modal-'+ele).value;

        var ss1 =document.getElementById(ele).parentElement.parentElement;
        console.log(ele, name, desc, ss1);
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                ss1.children[1].innerHTML=name;
                ss1.children[2].innerHTML=desc;
            }
        };
        xhttp.open("PUT", '/admin/brands/' + ele+'?name='+name+'&desc='+desc, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
        xhttp.send();
    }

    function search(ele) {
        var newval =document.getElementById('name-category-modal-'+ele).value;
        var ss1 =document.getElementById(ele).parentElement.parentElement;
        console.log(ss1);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                ss1.children[1].innerHTML=newval;
            }
        };
        xhttp.open("PUT", '/admin/categories/' + ele+'?name='+newval, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
        xhttp.send();
    }
</script>