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

<body style="background-image: radial-gradient(#b3b3b3, #ffffff);">

    <div style="width: 25%;margin-left: 5%;font-size: 1.5rem;background-color: white;padding: 2rem;border-radius: 1rem;color:#0066cc;margin-top: 2rem;float: left;height: 30rem;">
        <button type="button" class="btn btn-primary btn-lg optionButton" style="float: right;">Đọc File</button>
        <h2 style="width: 100%;color: #0066cc;font-weight: 600;">Thêm Phiếu Nhập</h2>
        <div class="form-group">
            <label for="exampleInputEmail1">Tên Nhân Viên</label>
            <input type="text" class="form-control" id="exampleInputEmail1" readonly>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tên Nhà Cung Cấp</label>
            <input type="text" class="form-control" id="exampleInputEmail1">
        </div>

        <a href="/CuaHangNoiThat/Admin/PhieuNhap">
            <button type="submit" class="btn btn-primary" style="background-color: white;color: #0066cc;font-size: 1.5rem;margin-top: 2rem;">Trở về </button>
        </a>
        <button type="submit" class="btn btn-primary" style="background-color: #0066cc;color: white;font-size: 1.5rem;margin-top: 2rem;float: right;">Thêm Phiếu Nhập</button>
    </div>

    <div style="width: 64%;margin-left: 1rem;font-size: 1.5rem;background-color: white;padding: 2rem;border-radius: 1rem;color:#0066cc;margin-top: 2rem;float: left;height: 30rem;">
        <h2 style="width: 100%;color: #0066cc;font-weight: 600;text-align: center;">Thêm Chi Tiết Phiếu Nhập</h2>
        <div class="form-row">
            <div class="form-group col-md-2">
                <div class="form-check mb-2">
                    <label class="form-check-label" for="autoSizingCheck">Mã Sản Phẩm</label>
                </div>
                <input type="text" class="form-control" id="inputAddress">
            </div>
            <div class="form-group col-md-4">
                <div class="form-check mb-2">
                    <label class="form-check-label" for="autoSizingCheck">Tên Sản Phẩm</label>
                </div>
                <input type="text" class="form-control" id="inputAddress">
            </div>
            <div class="form-group col-md-4">
                <div class="form-check mb-2">
                    <label class="form-check-label" for="autoSizingCheck">Loại Sản Phẩm</label>
                </div>
                <select class="form-control">
                    <option></option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <div class="form-check mb-2">
                    <label class="form-check-label" for="autoSizingCheck">Giá</label>
                </div>
                <input type="text" class="form-control" id="inputAddress">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <div class="form-check mb-2">
                    <label class="form-check-label" for="autoSizingCheck">Số lượng</label>
                </div>
                <input type="text" class="form-control" id="inputAddress">
            </div>
            <div class="form-group col-md-4">
                <div class="form-check mb-2">
                    <label class="form-check-label" for="autoSizingCheck">Hình Ảnh</label>
                </div>
                <input type="file" class="form-control" id="inputAddress">
            </div>
            <div style="width: 100%;">
                <button type="submit" class="btn btn-primary" style="background-color: #0066cc;color: white;font-size: 1em;margin-top: 2rem;float: right;margin-left:1rem;">Thêm Chi Tiết</button>
                <button type="submit" class="btn btn-primary" style="background-color: white;color: #0066cc;font-size: 1em;margin-top: 2rem;float: right;margin-left: 2rem;">Làm Lại</button>
            </div>
        </div>
    </div>


    <table id="tableContent" class="table" style="width: 90%;margin-left: 5%;background-color: white;margin-top: 2rem;float: left;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Mã Sản Phẩm</th>
                <th scope="col" style="width: 20rem;">Tên Sản Phẩm</th>
                <th scope="col">Loại</th>
                <th scope="col">Giá</th>
                <th scope="col">Số Lượng</th>
                <th scope="col" style="width: 10rem;">Hình Ảnh</th>
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
            </tr>
        </tbody>
    </table>
</body>

</html>