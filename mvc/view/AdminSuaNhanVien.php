<!doctype html>
<html lang="en">

<head>
    <title><?php echo $title; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-image: radial-gradient(#b3b3b3, #ffffff);">

    <div style="width: 30%;margin-left: 35%;font-size: 1.5rem;background-color: white;padding: 2rem;border-radius: 1rem;color:#0066cc;margin-top: 2rem;">
        <h2 style="width: 100%;text-align: center;color: #0066cc;font-weight: 600;">Sửa Nhân Viên <?php echo $data; ?></h2>
        <div class="form-group">
            <label for="exampleInputEmail1">Mã nhân viên</label>
            <input type="text" class="form-control" id="exampleInputEmail1" readonly>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tên nhân viên</label>
            <input type="text" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Ngày Sinh</label>
            <input type="text" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Giới Tính</label>
            <select class="form-control">
                <option></option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Địa Chỉ</label>
            <input type="text" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">SĐT</label>
            <input type="text" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Quyền</label>
            <select class="form-control">
                <option></option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tên đăng nhập</label>
            <input type="text" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Mật khẩu</label>
            <input type="text" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Trạng thái</label>
            <select class="form-control">
                <option></option>
            </select>
        </div>

        <a href="/CuaHangNoiThat/Admin/NhanVien">
            <button type="submit" class="btn btn-primary" style="background-color: white;color: #0066cc;font-size: 1.5rem;margin-top: 2rem;">Trở về </button>
        </a>
        <button type="submit" class="btn btn-primary" style="background-color: #0066cc;color: white;font-size: 1.5rem;margin-top: 2rem;float: right;">Sửa Nhân Viên</button>
    </div>
</body>

</html>