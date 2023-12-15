<?php
// Load danh sách

$html_showsp = showsp_admin($sanpham_list);
$html_showdm = showdm_admin($danhmuc_list);

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Danh mục</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Danh mục</li>
            </ol>
            <div class="card mb-4">

            </div>
            <div class="card mb-4">
                <?php
        if (isset($tb)) echo"<span class='px-3 fz-1 text-danger'>".$tb."</span>"
        ?>
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Danh sách danh mục
                </div>
                <div class="card-body">
                    <table id="customTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Danh muc</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>View</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?=$html_showsp?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="add-catalog container px-4 fz-1">
            <h3 class="add-catalog-title ">Thêm sản phẩm</h3>

            <form class="formmain row" action="index.php?pg=add_sanpham" method="post" enctype="multipart/form-data">
                <div class="form-group col-6">
                    <label class="fw-400" for="hinh">Hình ảnh</label>
                    <input type="file" class="hinh" id="hinh" name="hinh" required>
                </div>
                <div class="form-group col-6">
                    <label class="fw-400" for="category-name ">ID sản phẩm</label>
                    <input type="text" class="form-control" id="category-name" name="id_sp">
                </div>
                <div class="form-group col-6">
                    <label class="fw-400" for="category-description">ID danh mục</label>
                    <select class="form-control" name="id_danhmuc">
                        <?=$html_showdm?>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label class="fw-400" for="category-description">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="category-description" name="ten_sp">
                </div>
                <div class="form-group col-6">
                    <label class="fw-400" for="category-description">Giá</label>
                    <input type="number" class="form-control" id="category-description" name="gia">
                </div>
                <div class="form-group col-6">
                    <label class="fw-400" for="category-description">Số lượt xem</label>
                    <input type="number" class="form-control" id="category-description" name="so_luot_xem">
                </div>
                <div class="form-group col-6">
                    <label class="fw-400" for="category-description">Mô tả</label>
                    <input type="text" class="form-control" id="category-description" name="mo_ta">
                </div>
                <div class="py-3">
                    <input type="submit" class="btn btn-primary" name="btn-add" value="Thêm">
                </div>
            </form>
        </div>

</div>
</main>
</div>