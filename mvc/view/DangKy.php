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
    <script src="/CuaHangNoiThat/processFunc.js"></script>
    <title>Đăng ký</title>
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
            <?php if (isset($_SESSION['account'])) {
                echo "<div style='margin-top:2rem;'> Hello ," . $_SESSION['account']['TENKH'] . '</div>';
            } ?>

            <div class="user-nav">
                <div class="dropdown">
                    <i class="fa fa-user"></i><i class="fa fa-angle-down"></i>
                    <div class="dropdown-content user" style="margin-top: -0.5rem;">
                        <?php
                        if (!isset($_SESSION['account'])) {
                            echo '<a href="/CuaHangNoiThat/DangNhap">Đăng nhập</a>';
                            echo '<a href="/CuaHangNoiThat/DangKy">Đăng ký</a>';
                        } else {
                            echo '<a href="/CuaHangNoiThat/ThayDoiThongTin">Thay đổi thông tin</a>
                                <a href="/CuaHangNoiThat/DoiMatKhau">Đổi mật khẩu</a>
                                <a href="/CuaHangNoiThat/LichSuGioHang">Lịch sử</a>
                                <a href="/CuaHangNoiThat/TrangChu/Logout">Đăng xuất</a>';
                        }
                        ?>
                    </div>
                </div>
                <a href="/CuaHangNoiThatGioHang" style="cursor: pointer;"><i class="fa fa-shopping-cart"></i></a>
                <span id="counter">
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $count = 0;
                        foreach ($_SESSION['cart'] as $value) {
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
    <form action="">
        <fieldset>
            <legend><i class="fa fa-user-circle-o" aria-hidden="true"></i></legend>
            <p>ĐĂNG KÝ</p>
            <label for="">Họ và tên: </label>
            <input type="text" id="name" name="name">
            <label for="" style="width: 100%;">Giới Tính: </label>
            <select id="sex" style="width: 25rem;padding: 0.5rem 9rem 0.5rem 1rem;margin: 1rem auto 1rem auto;display: block;">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
            <label for="">Tên đăng nhập:</label>
            <input type="text" id="uname" name="uname">
            <label for="">Mật khẩu:</label>
            <input type="password" id="pass" name="pass">
            <label for="">Xác nhận mật khẩu:</label>
            <input type="password" id="passconfirm" name="pass">
            <label for="">Số điện thoại: </label>
            <input type="text" id="pnumber" name="pnumber">
            <label for="">Địa chỉ:</label>
            <input type="text" id="address" name="address">
            <p style="width: 100%;text-align: center;font-size: 1.3rem;color: red;" id="sms"></p>
            <input type="button" value="ĐĂNG KÝ" class="btn-reg" onclick="register()">
        </fieldset>
    </form>

    <script>
        function register() {
            $name = $("#name").val();
            $uname = $("#uname").val();
            $pass = $("#pass").val();
            $phone = $("#pnumber").val();
            $address = $("#address").val();
            $passc = $("#passconfirm").val();
            $sex = $("#sex").val();
            $("#sms").html('')

            if($name == ''){
                $("#sms").html('Họ và tên không được để trống');
            }
            else if($uname == '' || !$uname.includes('@gmail.com')){
                $("#sms").html('Tên đăng nhập phải là email (@gmail.com)');                
            }
            else if($pass == ''){
                $("#sms").html('Mật khẩu không được để trống');                
            }
            else if($passc == ''){
                $("#sms").html('Nhập lại mật khẩu không được để trống');                
            }
            else if($pass != $passc){
                $("#sms").html('Mật khẩu và xác nhận mật khẩu không khớp');                
            }
            else if(!checkPhoneNumber($phone)){
                $("#sms").html('Số điện thoại không hợp lệ');                
            }
            else if($address == ''){
                $("#sms").html('Địa chỉ không được để trống');                
            }
            else{
                $account = [$name,$uname,$pass,$phone,$address,$sex];
                $.ajax({
                    url:'/CuaHangNoiThat/Admin/registerNewAccount/' + JSON.stringify($account),
                    success : function(data){
                        var data = JSON.parse(data);
                        if(data.SMS === 'SUCCESS'){
                            alert('Đăng ký tài khoản thành công. Vui lòng đăng nhập');
                            window.location.href="/CuaHangNoiThat/DangNhap"
                        }
                        else{
                            $("#sms").html(data.SMS);
                        }
                    }
                })
            }
        }
    </script>
</body>

</html>