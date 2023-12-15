<?php
  extract($detail);
  $html_splq=show_splq($splq);
  
//   if($img!="") $img=PATH_IMG.$img;
?>
<main>
            <section class="section1">
                <div class="top-product">
                    <div class="left-product col5">
                        <img class="img-main" id="showImg" src="http://localhost/project/uploads/<?=$img?>" name="hover_exchan"  alt="" onmouseover="overEvent();" onmouseout="outEvent();">
                        <div class="img-mini">
                            <img id="branch" onclick="show()" src="http://localhost/project/uploads/<?=$img1?>" onmouseover="overEvent();"  onmouseout="outEvent();" alt="">
                            <img id="branch" onclick="show1()" src="http://localhost/project/uploads/<?=$img2?>" onmouseover="overEvent1();" onmouseout="outEvent();" alt="">
                            <img id="branch" onclick="show2()" src="http://localhost/project/uploads/<?=$img3?>" onmouseover="overEvent2();" onmouseout="outEvent();" alt="">
                        </div>
                    </div>
                    <div class="right-product col5">
                        <div class="name-product">
                            <h2><?=$name?></h2>
                            <div class="line"></div>
                        </div>
                        <div class="price-product">
                            <div class="price-sale"><?=number_format($price,0,",",".")?>đ</div>
                            <div class="price-main">4.990.000 đ</div>
                        </div>
                        <!-- <div class="colors"> 
                            <div class="text-color">Màu sắc :</div>
                            <div onclick="show()" class="dot-color1"></div>
                            <div onclick="show1()" class="dot-color2"></div>
                            <div onclick="show2()" class="dot-color3"></div>
                        </div> -->
                        <div class="quantity">
                            <div class="text-quantt">Số lượng :</div>
                            <div class="btn-quantt">
                                <div class="minus-quantt">-</div>
                                <div class="number-quantt">1</div>
                                <div class="plus-quantt">+</div>
                            </div>
                        </div>
                        <!-- <div class="quantity">
                            <div class="text-quantt">Thể loại : </div>
                        </div> -->
                        <div class="Specifications">
                            <span>Thông số :</span>
                            <?=$mota?>
                        </div>
                        
                            <form action="index.php?pg=addcart" method="post">
                                <input type="hidden" name="id" value="<?=$id?>">
                                <input type="hidden" name="img" value="http://localhost/project/uploads/<?=$img?>">
                                <input type="hidden" name="name" value="<?=$name?>">
                                <input type="hidden" name="price" value="<?=$price?>">
                                <input type="hidden" name="quantity" value="<?=1?>">
                                <input type="submit" name="btnaddtocart" value="Thêm giỏ hàng" class="btnatc" >
                            </form>
                    </div>
                </div>
                <h3>Sản phẩm liên quan</h3>
                <div class="bottom-products">
                    <!-- <div class="bottom-product">
                        
                    </div> -->
                    <?=$html_splq?>
                </div>
            </section>
            <section class="section2">
                <div class="box-left">
                    <h3>Mô tả sản phẩm</h3>
                    <div class="box_left--text">
                        <?=$chitiet?>
                    </div>
                </div>
                <div class="box-right">
                    <img src="view/layout/img/product/product-ct.jpeg" alt="">
                </div>
            </section>

        </main>
        <script>
          function overEvent(){
            document.hover_exchan.src="http://localhost/project/uploads/<?=$img1?>";
          }
          function outEvent(){
            document.hover_exchan.src="http://localhost/project/uploads/<?=$img?>";
          }
          function overEvent1(){
            document.hover_exchan.src="http://localhost/project/uploads/<?=$img2?>";
          }
          function overEvent2(){
            document.hover_exchan.src="http://localhost/project/uploads/<?=$img3?>";
          }
          function show(){
            node= document.getElementById("showImg").src="http://localhost/project/uploads/<?=$img1?>";
          }
          function show1(){
            node= document.getElementById("showImg").src="http://localhost/project/uploads/<?=$img2?>";
          }
          function show2(){
            node= document.getElementById("showImg").src="http://localhost/project/uploads/<?=$img3?>";
          }
        </script>
        <link rel="stylesheet" href="view/layout/css/product.css">