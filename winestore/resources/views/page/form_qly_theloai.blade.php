<div class="p-3 row row-cols-1 row-cols-md-3 sticky-top bg-light justify-content-between">
    <div class="col-md-auto d-flex">
        <div class="col-md-auto">
            <input type="radio" class="btn-check" autocomplete="off" value="Tổng đơn">
            <label class="btn btn-outline-primary btn-sm" for="btnradio1">Tổng thể loại <span class="badge bg-danger"
                    id="badge_tongdon"> <?php echo $pagin; ?></span></label>
        </div>
        <div class="col-md-auto">
            <a class="btn btn-primary btn-sm" href="{{ route('add-product') }}">Thêm thể loại </a>
        </div>
    </div>

    <div class="col-md-auto">
        <div class="input-group">
            <input type="text" class="form-control form-control-sm" value="" placeholder="Tên" id="search_id">

            <button class="btn btn-sm btn-primary" onclick="searched(this.parentElement)" type="button">Search</button>
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
        <tbody id="show-category">
            @foreach ($categoryArray as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <th scope="row"><?php echo $item['name']; ?></th>
                    <td>{{$item->description}}</td>
                    <td>
                        <button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#minhthu<?php echo $item['id']; ?>" id="<?php echo $item['id']; ?>">
                            <i class="bi bi-eye text-primary"> </i>
                        </button>
                        <button value="<?php echo $item['id']; ?>" class="delete-btn btn btn-sm bi bi-x-lg text-danger"
                            type="button" onclick="deleted(<?php echo $item['id']; ?>)">
                        </button>
                    </td>
                </tr>
                <div class="modal fade" id="minhthu<?php echo $item['id']; ?>" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Sửa thể loại</h5>
                                <button type="lbutton" class="btn-close" data-bs-dismiss="modal" aria-labe="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-center justify-content-around">

                                    <div class="col-md-12">

                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" disabled
                                                    id="old-name-category-modal-<?php echo $item['id']; ?>"
                                                    value="<?php echo $item['name']; ?>">
                                                <label for="floatingInput">Giá trị cũ</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <input name="name-category-modal-<?php echo $item['id']; ?>"
                                                    id="name-category-modal-<?php echo $item['id']; ?>" class="form-control"
                                                    value="">
                                                <label for="floatingInput">Giá trị mới</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                    onclick="edit(<?php echo $item['id']; ?>)">Sửa</button>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
    {!! $categoryArray !!}
</div>
<script>
    function deleted(ele) {
        console.log(ele);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };

        xhttp.open("DELETE", '/admin/categories/' + ele, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
        xhttp.send();
    }

    function edit(ele) {
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
