<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./my-css.css">
    <script src="./processFunc.js"></script>
    <title>Trang Trí</title>
</head>

<body>
    <div class="header">
        <div class="address">
            <i class="fa fa-map-marker"> Hồ Chí Minh, Việt Nam</i>
            <i class="fa fa-envelope"> milfuniture@gmail.com</i>
        </div>
    </div>
    <nav class="navbar sticky-top navbar-expand-md navbar-light ">
        <div class="container-fluid">
            <a class="navar-branch" style="cursor: pointer;" href="./TrangChu">
                <img src="./public/image/logo.png" alt="logo" height="60px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto " id="lsp">
                    <li class="nav-item active">
                        <a class="nav-link a active" style="cursor: pointer;" href="./TrangChu">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="./TrangTri">TRANG TRÍ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="./PhongNgu">PHÒNG NGỦ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="./PhongLamViec">PHÒNG LÀM VIỆC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="./PhongKhach">PHÒNG KHÁCH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="./PhongAn">PHÒNG ĂN</a>
                    </li>
                </ul>
            </div>
            <div class="user-nav">
                <p style="float: left;font-size: 13px;">
                </p>
                <div class="dropdown">
                    <i class="fa fa-user"></i><i class="fa fa-angle-down"></i>
                    <div class="dropdown-content user">
                        <a href="./DangNhap">Đăng nhập</a>
                        <a href="./DangKy">Đăng ký</a>
                        <a href="./ThayDoiThongTin">Thay đổi thông tin</a>
                        <a href="./TrangChu">Đăng xuất</a>
                        <a href="./LichSuGioHang">Lịch sử</a>
                    </div>
                </div>
                <a href="./GioHang" style="cursor: pointer;"><i class="fa fa-shopping-cart"></i></a>
                <span id="counter">
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $count = 0;
                        foreach($_SESSION['cart'] as $value){
                            $count += $value['amount'];
                        }
                        echo $count;
                    } else {
                        echo 0;
                    }
                    ?>
                </span>
            </div>
        </div>
    </nav>
    <div class="banner">
        <img src="./public/image/TRANG_TRI_BANNER.jpg" alt="">
    </div>
    <h2 class="title">
        <span>TRANG TRÍ</span>
    </h2>
    <p class="content">
        Các phụ kiện nhập khẩu từ các hãng thiết kế nội thất uy tín của Australia mang lại điểm nhấn đặc biệt sang trọng cho không gian nội thất
    </p>

    <div style="width: 80%;margin-left: 10%;margin-top: 1rem;">
        <h2 style="font-weight: bolder;">Tìm kiếm</h2>
        <div class="form-row">
            <div class="form-group col-md-2">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="checkProductName">
                    <label class="form-check-label" for="autoSizingCheck">Tên sản phẩm</label>
                </div>
                <input type="text" class="form-control" id="inputProductName">
            </div>
            <div class="form-group col-md-2">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="checkProductPrice">
                    <label class="form-check-label" for="autoSizingCheck">Giá sản phẩm</label>
                </div>
                <input type="number" class="form-control" id="inputMinProductPrice" placeholder="Giá thất nhất">
            </div>
            <div class="form-group col-md-2">
                <div class="form-check mb-2">
                    <label class="form-check-label" for="autoSizingCheck" style="color: white;">Giá cao nhất</label>
                </div>
                <input type="number" class="form-control" id="inputMaxProductPrice" placeholder="Giá cao nhất">
            </div>
            <div class="form-group col-md-2">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="checkStatusDecreaseProduct">
                    <label class="form-check-label" for="autoSizingCheck">Trạng thái giảm</label>
                </div>
                <select class="form-control" id="inputStatusDecreaseProduct">
                    <option value="0">Không Giảm Giá</option>
                    <option value="1">Được Giảm Giá</option>
                </select>
            </div>
            <div style="width: 91%;">
                <button id="searchProduct" style="width: 15rem;float: right;font-size: 1.2rem;font-weight: bolder;" class="btn btn-primary">Tìm kiếm </button>
            </div>

        </div>
    </div>
    <div class="products">
        <div class="product-container" id="product-container-id"></div>
    </div>
    <div class="footer-container">
        <div class="footer">
            <img src="./public/image/logo.png" alt="">
        </div>
        <div class="footer">
            <a href="">GIAO HÀNG</a><br>
            <a href="">BẢO HÀNH</a><br>
            <a href="">BẢO DƯỠNG</a><br>
            <a href="">ĐẶT HÀNG</a><br>
            <a href="">CỬA HÀNG</a><br>
            <a href="">LIÊN HỆ</a><br>
        </div>
        <div class="footer">
            <a href="">VỀ MILD</a><br>
            <a href="">TẠI SAO LẠI CHỌN MILD</a><br>
        </div>
        <div class="footer">
            <h3>ĐĂNG KÝ NHẬN TIN</h3><br>
            <input type="text">
            <button class="footer-btn">ĐĂNG KÝ</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: './Admin/getAllProductByType/LSP01',
                success: function(data) {
                    var data = JSON.parse(data);
                    $xhtml = '';
                    for (var key in data) {
                        $obj = data[key];
                        $xhtml += ' <div class="product-item">' +
                            '<a href="">' +
                            '<img src="./public/image/HINHANH/' + $obj.HINHANH + '" alt="">' +
                            '<p class="product-name">' + $obj.TENSP + '<sup style="color: red;font-size: 1.2rem;"> -' + $obj.PHANTRAMGIAM + '%</sup></p>' +
                            '</a>' +
                            '<div style="font-size: 20px;">Giá gốc: <div class="price">' + formatter.format($obj.GIA) + ' <sup>đ</sup></div>';
                            if($obj.PHANTRAMGIAM != 0){
                                $xhtml += '<div style="font-size: 20px;">Giá khuyến mãi: <div class="price" style="color: red;">'+formatter.format($obj.GIA*(1-$obj.PHANTRAMGIAM/100))+' <sup>đ</sup></div>';
                            }
                            $xhtml += '<button onclick="addToCart(\''+$obj.MASP+'\');" class="product-name" style="background-color: white;color: red;font-weight: 900;float: right;border-radius: 0.3rem;">Thêm vào giỏ</button>' +
                            '</div>';
                    }

                    $("#product-container-id").html($xhtml);
                }
            });
        });


        $("#searchProduct").click(function(){
            $name = "@";
            $minPrice = "@";
            $maxPrice = '@';
            $sale = "@";

            if($("#checkProductName").is(":checked")){
                $name = convertStringToEnglish($("#inputProductName").val());
                if($name == ""){
                    alert("Vui lòng nhập tên sản phẩm");
                    return;
                }
            }
            if($("#checkProductPrice").is(":checked")){
                
                $minPrice = parseInt( $("#inputMinProductPrice").val());
                $maxPrice = parseInt($("#inputMaxProductPrice").val());
                if($minPrice == "" || $maxPrice == ""){
                    alert("Vui lòng nhập khoảng giá cần tìm kiếm");
                    return;
                }
                else if(!Number.isInteger($minPrice) || !Number.isInteger($maxPrice)){
                    alert("Giá tìm kiếm phải là số");
                    return;
                }
                else if($minPrice > $maxPrice){
                    alert("Giá thấp nhất phải nhỏ hơn bằng giá cao nhất");
                    return;
                }
            }
            if($("#checkStatusDecreaseProduct").is(":checked")){
                $sale = $("#inputStatusDecreaseProduct").val();
            }

            $.ajax({
                url: './Admin/getAllProductByType/LSP01',
                success: function(data) {
                    var data = JSON.parse(data);
                    $xhtml = '';
                    for (var key in data) {
                        $obj = data[key];
                        if ($name != '@' && !convertStringToEnglish($obj.TENSP).includes($name)) {
                            continue;
                        }
                        if ($minPrice != '@' && ($minPrice > $obj.GIA || $maxPrice < $obj.GIA)) {
                            continue;
                        }
                        if ($sale != '@') {
                            if($sale == 0 && $obj.PHANTRAMGIAM != 0){
                                continue;    
                            }

                            if($sale != 0 && $obj.PHANTRAMGIAM == 0){
                                continue;
                            }
                        }

                        $xhtml += ' <div class="product-item">' +
                            '<a href="">' +
                            '<img src="./public/image/HINHANH/' + $obj.HINHANH + '" alt="">' +
                            '<p class="product-name">' + $obj.TENSP + '<sup style="color: red;font-size: 1.2rem;"> -' + $obj.PHANTRAMGIAM + '%</sup></p>' +
                            '</a>' +
                            '<div style="font-size: 20px;">Giá gốc: <div class="price">' + formatter.format($obj.GIA) + ' <sup>đ</sup></div>';
                            if($obj.PHANTRAMGIAM != 0){
                                $xhtml += '<div style="font-size: 20px;">Giá khuyến mãi: <div class="price" style="color: red;">'+formatter.format($obj.GIA*(1-$obj.PHANTRAMGIAM/100))+' <sup>đ</sup></div>';
                            }
                            $xhtml += '<button onclick="addToCart(\''+$obj.MASP+'\');" class="product-name" style="background-color: white;color: red;font-weight: 900;float: right;border-radius: 0.3rem;">Thêm vào giỏ</button>' +
                            '</div>';
                    }

                    $("#product-container-id").html($xhtml);
                }
            });

        });


        function addToCart($productId){
            if(!confirm("Bạn có muốn thêm sản phẩm vào giỏ hàng ?")){
                return;
            }
            $.ajax({
                url : './Admin/addToCart/' + $productId,
                success: function(data){
                    alert(data);
                }
            });
        }
    </script>
</body>

</html>