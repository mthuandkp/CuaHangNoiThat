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
        <a href="/CuaHangNoiThat/Admin/ThemNhanVien"><button type="button" class="btn btn-primary btn-lg optionButton">Thêm Nhân Viên</button></a>
        <a href="/CuaHangNoiThat/Admin/TimKiemNhanVien"><button type="button" class="btn btn-primary btn-lg optionButton">Tìm kiếm nhân viên</button></a>
        <a href="#"><button type="button" class="btn btn-primary btn-lg optionButton">Xuất Excel</button></a>
        <div class="form-group" style="width: 50%;float: right;margin-left: 2rem;">
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập vào tên nhân viên..." style="float: right;width: 20rem;">
        </div>
    </div>
    <table id="tableContent" class="table" style="width: 80%;margin-left: 10%;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Mã Nhân Viên</th>
                <th scope="col">Tên Nhân Viên</th>
                <th scope="col">Ngày Sinh</th>
                <th scope="col">Giới Tính</th>
                <th scope="col">Địa Chỉ</th>
                <th scope="col">SĐT</th>
                <th scope="col">Quyền</th>
                <th scope="col">Tên Đăng Nhập</th>
                <th scope="col">Mật Khẩu</th>
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
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <button class="btn btn-primary btnControl" type="submit" style="background-color: red;">Khóa Nhân Viên</button>
                    <a href="/CuaHangNoiThat/Admin/SuaNhanVien/1">
                        <button class="btn btn-primary btnControl" type="submit" style="background-color: green;margin-top: 0.3rem;">Sửa Nhân Viên</button>
                    </a>



                </td>

            </tr>
        </tbody>
    </table>

</body>

</html>