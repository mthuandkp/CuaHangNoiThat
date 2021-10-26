<!doctype html>
<html lang="en">

<head>
    <title>
        <?php echo $title; ?>
    </title>
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
            width: 12rem;
        }
    </style>
</head>

<body>
    <div style="width: 60%;margin-left: 20%;margin-top: 1rem;">
    <h2><?php echo $title;?></h2>
        <div class="form-row">
            <div class="form-group col-md-2">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                    <label class="form-check-label" for="autoSizingCheck">Tìm theo mã KH</label>
                </div>
                <input type="text" class="form-control" id="inputAddress">
            </div>
            <div class="form-group col-md-6">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                    <label class="form-check-label" for="autoSizingCheck">Tìm theo tên khách hàng</label>
                </div>
                <input type="text" class="form-control" id="inputAddress">
            </div>
            <div class="form-group col-md-4">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                    <label class="form-check-label" for="autoSizingCheck">Tìm theo năm sinh</label>
                </div>
                <input type="text" class="form-control" id="inputAddress">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                    <label class="form-check-label" for="autoSizingCheck">Tìm theo địa chỉ</label>
                </div>
                <input type="text" class="form-control" id="inputAddress" placeholder="Nhập vào địa chỉ">
            </div>
            <div class="form-group col-md-4">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                    <label class="form-check-label" for="autoSizingCheck">Tìm theo SĐT</label>
                </div>
                <input type="text" class="form-control" id="inputAddress" placeholder="Nhập vào SĐT">
            </div>
            <div class="form-group col-md-4">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                    <label class="form-check-label" for="autoSizingCheck">Tìm theo Username</label>
                </div>
                <input type="text" class="form-control" id="inputAddress" placeholder="Nhập vào Username">
            </div>
        </div>
        <a href="/CuaHangNoiThat/Admin/KhachHang">
            <button type="submit" class="btn btn-primary" style="background-color: white;color: #007bff;">Trở về </button>
        </a>
        <button type="submit" class="btn btn-primary">Tìm kiếm </button>
    </div>
    
    <table id="tableContent" class="table" style="width: 80%;margin-left: 10%;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Mã Khách Hàng</th>
                <th scope="col">Tên Khách Hàng</th>
                <th scope="col">Tên đăng nhập</th>
                <th scope="col">Mật khẩu</th>
                <th scope="col">Địa Chỉ</th>
                <th scope="col">SĐT</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Điểm tích lũy</th>
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
                <td>
                    <button class="btn btn-primary btnControl" type="submit" style="background-color: green;">Mở Khóa Khách Hàng</button>
                    <button class="btn btn-primary btnControl" type="submit" style="background-color: red;margin-top: 1rem;">Khóa Khách Hàng</button>
                </td>

            </tr>
        </tbody>
    </table>

    
</body>

</html>