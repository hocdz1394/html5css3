<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Danh mục</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Danh mục</li>
            </ol>

        </div>
        <div class="add-catalog container px-4 fz-1">
            <h3 class="add-catalog-title">Chỉnh sửa</h3>

            <?php
        extract($id); 
        ?>
            <form class="formmain" action="index.php?pg=update" method="post">
                <div class="form-group">
                    <label for="category-name">Id danh mục:</label>
                    <input type="text" class="form-control" id="category-name" value="<?=$id?>"
                    
                        name="id_danhmuc">
                </div>
                <div class="form-group">
                    <label for="category-name">Tên danh mục:</label>
                    <input type="text" class="form-control" id="category-name" value="<?=$name?>" name="ten">
                </div>

                <div class="form-group">
                    <label for="category-description">Mô tả:</label>
                    <input type="text" class="form-control" id="category-description" value="<?=$mo_ta?>" name="mo_ta">
                </div>

                <input type="hidden" name="id_danhmuc" value="<?=$id ?>">
                <div class="py-3">
                    <input type="submit" class="btn btn-primary" name="btn-update" value="Cập nhật">
                    <a href="index.php?pg=danhmuc" type="submit" class="btn btn-danger" name="btn-cancel">Cancel</a>
                </div>

            </form>
        </div>

</div>
</main>
</div>