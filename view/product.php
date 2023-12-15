<?php
    $html_dmsp = show_dmsp($getcatalog);
    $html_spdm = show_spdm($getproduct) ;
    if($h1title!=""){
        $title=$h1title;
    }else{  
        $title="Sản phẩm";
    }
?>
        <main>
            <h1><?=$title?></h1>
            <div class="locat"><a href="index.php">Trang chủ</a>/<a href="index.php?pg=product">Sản phẩm</a>/ <a ><?=$name?></a></div>
            <div class="directional">
                <div class="filter">
                    <ion-icon name="options-outline"></ion-icon>
                    Bộ lọc
                </div>
                <div class="arrange">
                    <ion-icon name="arrow-down-outline"></ion-icon>
                    <span>Sản phẩm mới</span>
                    <ion-icon name="caret-down-outline"></ion-icon>
                </div>
            </div>
            <div class="main-product">
                <div class="left-product">
                    <div class="sidebars">
                        <div class="sidebar">
                        <div class="toggle"><strong>Danh mục</strong></div>
                        <ul>
                            <?=$html_dmsp?>
                        </ul>
                        </div>
                    </div>
                    <div class="sidebar-bt"></div>
                </div>
                <div class="right-product">
                    <div class="dm">
                    <table>
                            <ul>
                            </ul>
                        </table>
                    </div>
                    <div class="container-product">
                        <div class="list-product">
                            <?=$html_spdm?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <link rel="stylesheet" href="view/layout/css/shop-product.css">