<!doctype html>
<html lang="en">

<head>
    <title><?php echo $title; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .optionButton {
            width: 13rem;
            font-size: 1.1rem;
        }

        .btnControl {
            width: 10rem;
        }
    </style>
</head>

<body>
<h1 style="margin-top: 5rem;margin-left: 10%;"><?php echo $title; ?></h1>
    <div style="width: 80%;margin-left: 10%;">
        <a href="/CuaHangNoiThat/Admin/TimKiemHoaDon"><button type="button" class="btn btn-primary btn-lg optionButton">Tìm kiếm hóa đơn</button></a>
        <a href="#"><button type="button" class="btn btn-primary btn-lg optionButton">Xuất Excel</button></a>
        <div class="form-group" style="width: 50%;float: right;margin-left: 2rem;">
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập vào mã hóa đơn..." style="float: right;width: 20rem;">
        </div>
    </div>
    <table id="tableContent" class="table" style="width: 80%;margin-left: 10%;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Mã Hóa Đơn</th>
                <th scope="col">Tên Nhân Viên</th>
                <th scope="col">Tên Khách Hàng</th>
                <th scope="col">Ngày Lập</th>
                <th scope="col">Giờ Lập</th>
                <th scope="col" style="width: 10rem;">Tổng</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col" style="width: 15rem;">Chức Năng</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <button class="btn btn-primary btnControl" type="submit" style="background-color: red;">Xác nhận hóa đơn</button>
                    <button class="btn btn-primary btnControl" type="submit" style="background-color: #007bff;margin-top: 0.3rem;">In hóa đơn</button>
                    <a href="/CuaHangNoiThat/Admin/XemChiTietHD/1">
                        <button class="btn btn-primary btnControl" type="submit" style="background-color: green;margin-top: 0.3rem;">Xem chi tiết</button>
                    </a>
                </td>

            </tr>
        </tbody>
    </table>

</body>

</html>