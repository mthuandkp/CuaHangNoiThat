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
    <link rel="stylesheet" href="/CuaHangNoiThat/my-css.css">
    <title>Trang Trí</title>
</head>
<body>
<div class="header">
        <div class="address">
            <i class="fa fa-map-marker" > Hồ Chí Minh, Việt Nam</i>
            <i class="fa fa-envelope"> milfuniture@gmail.com</i>
        </div>
    </div>
    <nav class="navbar sticky-top navbar-expand-md navbar-light ">
        <div class="container-fluid">
            <a class="navar-branch" style="cursor: pointer;" href="/CuaHangNoiThat/TrangChu">
                <img src="/CuaHangNoiThat/public/image/logo.png" alt="logo" height="60px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto " id="lsp">
                    <li class="nav-item active">
                        <a class="nav-link a active" style="cursor: pointer;" href="/CuaHangNoiThat/TrangChu">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="/CuaHangNoiThat/TrangTri">TRANG TRÍ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="/CuaHangNoiThat/PhongNgu">PHÒNG NGỦ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="/CuaHangNoiThat/PhongLamViec">PHÒNG LÀM VIỆC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="/CuaHangNoiThat/PhongKhach">PHÒNG KHÁCH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="/CuaHangNoiThat/PhongAn">PHÒNG ĂN</a>
                    </li>
                </ul>
            </div>
            <div class="user-nav">
                <p style="float: left;font-size: 13px;">
                </p>
                <div class="dropdown">
                    <i class="fa fa-user"></i><i class="fa fa-angle-down"></i>
                    <div class="dropdown-content user">
                        <a href="/CuaHangNoiThat/DangNhap">Đăng nhập</a>
                        <a href="/CuaHangNoiThat/DangKy">Đăng ký</a>
                        <a href="/CuaHangNoiThat/ThayDoiThongTin">Thay đổi thông tin</a>
                        <a href="/CuaHangNoiThat/TrangChu">Đăng xuất</a>
                        <a href="/CuaHangNoiThat/GioHang">Lịch sử</a>
                    </div>
                </div>
                <a href="/CuaHangNoiThat/GioHang" style="cursor: pointer;"><i class="fa fa-shopping-cart"></i></a>
                <span id="counter">
                    <?php
                    if (isset($_SESSION['cartDetail'])) {
                        echo count($_SESSION['cartDetail']);
                    } else {
                        echo 0;
                    }
                    ?>
                </span>
            </div>
        </div>
    </nav>
    <div class="banner">
        <img src="/CuaHangNoiThat/public/image/TRANG_TRI_BANNER.jpg" alt="">
    </div>
    <h2 class="title">
            <span>TRANG TRÍ</span>
    </h2>
    <p class="content">
    Các phụ kiện nhập khẩu từ các hãng thiết kế nội thất uy tín của Australia mang lại điểm nhấn đặc biệt sang trọng cho không gian nội thất
    </p>
    <div class="product-container">
        <div class="product-item">
            <a href="">
            <img src="/CuaHangNoiThat/public/image/HINHANH/Trangtri/gương.jpg" alt="">
            <p class="product-name">Gương trang trí</p>  
            </a>
            <div style="font-size: 20px;">Giá:   <div class="price">200.000 <sup>đ</sup></div></div>
        </div>
        <div class="product-item">
        <a href="">
            <img src="/CuaHangNoiThat/public/image/HINHANH/Trangtri/gương.jpg" alt="">
            <p class="product-name">Gương trang trí</p>  
            </a>
            <div style="font-size: 20px;">Giá:   <div class="price">200.000 <sup>đ</sup></div></div>
        </div>
        <div class="product-item">
        <a href="">
            <img src="/CuaHangNoiThat/public/image/HINHANH/Trangtri/gương.jpg" alt="">
            <p class="product-name">Gương trang trí</p>  
            </a>
            <div style="font-size: 20px;">Giá:   <div class="price">200.000 <sup>đ</sup></div></div>
        </div>
        <div class="product-item">
        <a href="">
            <img src="/CuaHangNoiThat/public/image/HINHANH/Trangtri/gương.jpg" alt="">
            <p class="product-name">Gương trang trí</p>  
            </a>
            <div style="font-size: 20px;">Giá:   <div class="price">200.000 <sup>đ</sup></div></div>
        </div>
        <div class="product-item">
        <a href="">
            <img src="/CuaHangNoiThat/public/image/HINHANH/Trangtri/gương.jpg" alt="">
            <p class="product-name">Gương trang trí</p>  
            </a>
            <div style="font-size: 20px;">Giá:   <div class="price">200.000 <sup>đ</sup></div></div>
        </div>
    </div>
    <div class="footer-container">
        <div class="footer">
            <img src="/CuaHangNoiThat/public/image/logo.png" alt="">
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
            <button class="footer-btn"  >ĐĂNG KÝ</button>
        </div>
    </div>
</body>
</html>