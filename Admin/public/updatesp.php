<?php
extract($sanpham_one);
if ($hinh != "") {
    $hinh = '../View/layout/images/'. $hinh;
    if (file_exists($hinh)) {
        $img_new = "<img src='$hinh'>";
    } else {
        $img_new = "";
        
    }
}
// Load danh sách
$select_html = '';
foreach ($danhmuc_list as $item) {
    $id = $item['id_danhmuc'];
    $ten_dm = $item['ten']; // Renamed to avoid overwriting $name

    $select_html .= '<option value="' . $id. '">' . $ten_dm . '</option>';
}
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

            <div class="add-catalog container px-4 fz-1">
                <h3 class="add-catalog-title ">Update sản phẩm</h3>

                <form class="formmain row" action="index.php?pg=updateproduct_done" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group col-6">
                        <label class="fw-400" for="hinh">Hình ảnh</label>
                        <input type="file" class="hinh" id="hinh" name="hinh">
                        <?=$img_new?>

                    </div>
                    <div class="form-group col-6">
                        <label class="fw-400" for="category-name ">ID sản phẩm</label>
                        <input type="text" class="form-control" id="category-name" name="id_sp" value="<?=$id_sp?>">
                    </div>
                    <div class="form-group col-6">
                        <label class="fw-400" for="category-description">ID danh mục</label>
                        <select class="form-control" name="id_danhmuc">
                            <?=$select_html?>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label class="fw-400" for="category-description">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="category-description" name="ten_sp"
                            value="<?=$ten_sp?>">
                    </div>
                    <div class="form-group col-6">
                        <label class="fw-400" for="category-description">Giá</label>
                        <input type="number" class="form-control" id="category-description" name="gia"
                            value="<?=$gia?>">
                    </div>
                    <div class="form-group col-6">
                        <label class="fw-400" for="category-description">Giảm giá</label>
                        <input type="number" class="form-control" id="category-description" name="giam_gia"
                            value="<?=$giam_gia?>">
                    </div>
                    <div class="form-group col-6">
                        <label class="fw-400" for="category-description">Sale</label>
                        <input type="number" class="form-control" id="category-description" name="sale"
                            value="<?=$sale?>">
                    </div>
                    <div class="form-group col-6">
                        <label class="fw-400" for="category-description">New</label>
                        <select class="form-control" name="new" id="" class="col-12" value="<?=$new?>">
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label class="fw-400" for="category-description">Số lượt xem</label>
                        <input type="number" class="form-control" id="category-description" name="so_luot_xem"
                            value="<?=$so_luot_xem?>">
                    </div>
                    <div class="form-group col-6">
                        <label class="fw-400" for="category-description">Mô tả</label>
                        <input type="text" class="form-control" id="category-description" name="mo_ta"
                            value="<?=$mo_ta?>">
                    </div>
                    <input type="hidden" name="id_sp" value="<?=$id_sp?>">
                    <input type="hidden" name="hinh_old" value="<?=$hinh?>">


                    <div class="py-3">
                        <input type="submit" class="btn btn-primary" name="btn-update" value="Cập nhật">
                    </div>
                </form>
            </div>

        </div>
    </main>
</div>