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
</head>

<body>
    <div style="width: 60%;margin-left: 20%;margin-top: 1rem;">
        <h2><?php echo $title;?></h2>
        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                    <label class="form-check-label" for="autoSizingCheck">Tìm theo mã sản phẩm</label>
                </div>
                <input type="text" class="form-control" id="inputAddress">
            </div>
            <div class="form-group col-md-8">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                    <label class="form-check-label" for="autoSizingCheck">Tìm theo tên sản phẩm</label>
                </div>
                <input type="text" class="form-control" id="inputAddress">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                    <label class="form-check-label" for="autoSizingCheck">Tìm theo loại sản phẩm</label>
                </div>
                <select class="form-control">
                    <option>Default select</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                    <label class="form-check-label" for="autoSizingCheck">Tìm theo giá sản phẩm</label>
                </div>
                <input type="number" class="form-control" id="inputAddress" placeholder="Giá thất nhất">
            </div>
            <div class="form-group col-md-4">
            <div class="form-check mb-2">
                    <label class="form-check-label" for="autoSizingCheck" style="color: white;">Giá cao nhất</label>
                </div>
                <input type="number" class="form-control" id="inputAddress" placeholder="Giá cao nhất">
            </div>
        </div>
        <a href="/CuaHangNoiThat/Admin/SanPham">
            <button type="submit" class="btn btn-primary" style="background-color: white;color: #007bff;">Trở về </button>
        </a>
        <button type="submit" class="btn btn-primary">Tìm kiếm </button>
    </div>


    <table id="tableContent" class="table" style="width: 80%;margin-left: 10%;margin-top: 2rem;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Mã Sản Phẩm</th>
                <th scope="col" style="width: 20rem;">Tên Sản Phẩm</th>
                <th scope="col">Loại</th>
                <th scope="col">Giá</th>
                <th scope="col">Số Lượng</th>
                <th scope="col" style="width: 10rem;">Hình Ảnh</th>
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
                <td><img src="/CuaHangNoiThat/public/image/Empty.jpg" alt="empty_Image" style="width: 10rem;"></td>
                <td></td>
                <td>
                    <a href="/CuaHangNoiThat/Admin/SuaSanPham?id=1">
                        <button class="btn btn-primary btnControl" type="submit" style="background-color: green;">Sửa sản phẩm</button>
                    </a>
                    
                    <button class="btn btn-primary btnControl" type="submit" style="background-color: red;margin-top: 1rem;">Xóa Sản phẩm</button>
                </td>

            </tr>
        </tbody>
    </table>
</body>

</html>