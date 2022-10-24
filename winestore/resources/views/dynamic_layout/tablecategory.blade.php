<table class="table align-middle table-hover table-sm">
    <thead class="table">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col" style="width:70%;">Mô tả</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody id="show-product">
        @foreach ($categoryArray as $item)
            <tr>
                <th scope="row"><?php echo $item->id; ?></th>
                <th scope="row"><?php echo $item->name; ?></th>
                <td><?php echo $item->description; ?></td>
                <td>
                    <button type="button" class="btn" data-bs-toggle="modal"
                        data-bs-target="#minhthu<?php echo $item->id; ?>" id="<?php echo $item->id; ?>">
                        <i class="bi bi-eye text-primary"> </i>
                    </button>
                    <button value="<?php echo $item->id; ?>" class="delete-btn btn btn-sm bi bi-x-lg text-danger"
                        type="button" onclick="deleted(<?php echo $item->id; ?>)">
                    </button>
                </td>
            </tr>
            
            <div class="modal fade" id="minhthu<?php echo $item->id; ?>" tabindex="-1" aria-labelledby="staticBackdropLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Sửa thương hiệu</h5>
                            <button type="lbutton" class="btn-close" data-bs-dismiss="modal" aria-labe="Close">
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
                                                <input name="name-category-modal-<?php echo $item->id; ?>"
                                                    id="name-category-modal-<?php echo $item->id; ?>" class="form-control"
                                                    value="<?php echo $item->name; ?>">
                                                <label for="floatingInput">Tên thương hiệu</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="desc-category-modal-{{ $item->id }}" placeholder="Mô tả gì đó"
                                                    style="height: 12rem">{{ $item->description }}</textarea>
                                                <label for="floatingInput">Mô tả</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="edit(<?php echo $item->id; ?>)">Sửa</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </tbody>
</table>
{!! $categoryArray !!}
