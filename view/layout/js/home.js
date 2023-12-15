const slideShow = document.querySelectorAll(".slideshow img");
        const slContainer = document.querySelector(".slideshow");
        const dotSlide = document.querySelectorAll(".dotslide");
        const backBtn = document.getElementById("back()");
        const nextBtn = document.getElementById("next()");
        const getItem = slideShow.length;// lấy item
        index = 0;
        slideShow.forEach(function(image, index){
            image.style.left = index*100+"%";
            dotSlide[index].addEventListener("click", function(){
                runSlides(index);
            });
            
        });
        backBtn.addEventListener("click", function() {
            index--;
            if (index < 0) {
                index = getItem - 1;
            }
            runSlides(index);
            });
        nextBtn.addEventListener("click", function(){
            index++;
            if(index>= getItem){
                index = 0;
            }
            runSlide(index);
        });
        function runSlide(){
            index++;
            console.index;
            if(index>=getItem){
                index=0;
            }
            runSlides(index);
        }
        function runSlides(index){
            slContainer.style.left= "-" +index*100+"%";// mỗi 2s runleft 1 lần 
            const dotRemove =document.querySelector(".active");
            dotRemove.classList.remove("active");
            dotSlide[index].classList.add("active");
        }
        setInterval(runSlide, 3000);
        // console.log(slideShow);/
        // ----------------NEW PRODUCE-------------------//

        
        // let sp ={  href:"#", img:"section3.1.webp",  name:"Tea table minimalist", price:"4.300 đ"};
        // const arrSP = [
        //     { href:"#",img:"section3.1.webp",  name:"Sofa Annie xinh xắn", price:"4.300"},
        //     { href:"#",img:"section3.2.webp",  name:"Bàn trà Bắc Âu", price:"4.879"},
        //     { href:"#",img:"section3.3.webp",  name:"Bàn trà Noguichi", price:"4.416"},
        //     { href:"#",img:"section3.4.webp",  name:"Bàn tròn Tulip", price:"4.002"},
        //     { href:"#",img:"section3.5.webp",  name:"Đèn Trang trí", price:"1.700"},
        //     { href:"#",img:"section3.6.webp",  name:"Đồng hồ treo tường", price:"1.400"},
        //     { href:"#",img:"section3.7.webp",  name:"Ghế gỗ đan lát", price:"2.898"},
        //     { href:"#",img:"section3.8.webp",  name:"Ghế Noom", price:"3.082"},
        //     { href:"#",img:"section3.9.webp",  name:"section3.9.webp", price:"2.853"},
        //     { href:"#",img:"section3.10.webp",  name:"Giỏ đựng quần áo", price:"1.541"},
        // ];
        // var str= "";
        // for (let i = 0; i < arrSP.length; i++) {
        //     str+=`
        //     <div class="bd-product">
        //     <a href="/page/product.html" class="a">
        //         <img src="../img/home/section/${arrSP[i].img}"  alt="">
        //         <h4>${arrSP[i].name}</h4>
        //         <p>${arrSP[i].price +".000 đ"}</p> 
        //     </a>
        //         <div class="atc trans"><ion-icon name="bag-add"></ion-icon>Thêm giỏ hàng</div>  
        //     </div> `
        // };
        // document.querySelector(".list-product").innerHTML= str;
    // ----------------hover transfer-------------------//
    
    //click menu
        // document.querySelector("menu__list").addEventListener("click", function menu__list(){
        //     document.getElementById("col5").style.display="none";
        // });
        
       

    // -----------------------cart--------------------------//

// var cart=JSON.parse(localStorage.getItem("cart"));
// if(cart!=null){
//     cartlcal=cart;
// }else{
//     var cartlcal = [];
// }
// function loadSo(){
//     var cart=JSON.parse(localStorage.getItem("cart"));
//     if (cart != null){
//         document.getElementById("cartnub").innerText=cart.length;
//     }
// }
// function loadNumber(){
//     localStorage.setItem("cart",JSON.stringify(cartlcal));
//     var cart =JSON.parse(localStorage.getItem("cart"));
//     loadSo();
// }
// var btnCart = document.querySelectorAll(".atc");
// for(var i=0;i<btnCart.length;i++){
//         btnCart[i].addEventListener("click", function(event){
//         var clickBtn = event.target;
//         var clickImg = clickBtn.parentElement.querySelector("img").src;
//         var clickName = clickBtn.parentElement.querySelector("h4").innerHTML;
//         var clickPrice = clickBtn.parentElement.querySelector("p").innerHTML;
//         var quantity = 1;
//         var pd = {
//             "img":clickImg, "name":clickName, "price":clickPrice, "quantity":quantity
//         };
//         cartlcal.push(pd);
//         loadNumber();
//     });
//  };
// ---------------------------page cart-------------------------//
// function showAll(){
//     showcart();
//     loadSo();
//     total()
// }

// function showcart(){
//     var cart = JSON.parse(localStorage.getItem("cart"));
//     if (cart!=null){ // khác null sshowcart
//         var kq = ""; //tạo 1 biến lưu giá trị rỗng
//         for (let i = 0; i < cart.length; i++) {
//             var tt =parseInt(cart[i]["quantity"]*cart[i]["price"]); //tạo biến tổng = sl * giá:/parseInt chuyển chuỗi thành số nguyên 
//             kq+=`
//                 <div class="sp">
//                     <img src="`+cart[i]["img"]+`" alt="">
//                     <div class="title-sp">
//                         <div class="colum1-title">
//                             <div class="name-title">`+cart[i]["name"]+`</div>
//                             <div class="colors"> <strong>Colors: </strong>
//                                 <select name="" id="">
//                                     <option value="">White</option>
//                                     <option value="">Pink</option>
//                                     <option value="">Beige</option>
//                                 </select>
//                             </div>
//                             <p>delivered within 3-5 working day</p>
//                         </div>
//                         <div class="colum2-title">
//                             <div class="price-title">`+cart[i]["price"]+`</div>
//                             <div class="quantity">
//                                 <input type="number" id="clickQuantity" onclick="clickQuantity()" min="1" placeholder="1" >
//                                 <input class="check-box" type="checkbox">
//                             </div>
//                             <div class="remove" id="delsp" onclick="delsp()" ><ion-icon name="trash-outline"></ion-icon>Remove</div>
//                         </div>
//                     </div>
//                 </div>
//             `;
//         }
//         document.getElementById("addOnSP").innerHTML = kq;
//     }
// }
// function clickQuantity(){
//     document.getElementById(clickQuantity).value;
// }
// function subtotal(){
//     var cart = JSON.parse(localStorage.getItem("cart"));
//     if (cart!=null){ // khác null sshowcart
//         var subtotal = 0; //tạo 1 biến lưu giá trị bằng 0
//         for (let i = 0; i < cart.length; i++) {
//             var tt =parseInt(cart[i]["quantity"]*cart[i]["price"]); //tạo biến tổng = sl * giá:/parseInt chuyển chuỗi thành số nguyên 
//             subtotal += tt;
//         }
//         document.getElementById("subtotal").innerHTML ="$"+ subtotal;
//     }
// }

// function total(){
//     var cart = JSON.parse(localStorage.getItem("cart"));
//     if (cart!=null){ // khác null sshowcart
//         var total = 0; //tạo 1 biến lưu giá trị bằng 0
//         for (let i = 0; i < cart.length; i++) {
//             var tt =parseInt(cart[i]["quantity"]*cart[i]["price"]); //tạo biến tổng = sl * giá:/parseInt chuyển chuỗi thành số nguyên 
//             total += tt;
//         }
//         document.getElementById("total").innerHTML ="$"+ total;
//     }
// }
// function delsp() {
//     var delitems = document.querySelectorAll(".sp");
//     delitems.forEach(function (delitem) {
//       var delBtn = delitem.querySelector("#delsp");
//       delBtn.addEventListener("click", function (event) {
//         var delonesp = event.target.closest(".sp");
//         delonesp.remove();
//         loadNumber();
//       });
//     });
//   }
// localStorage.clear();