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

<body>
    <h2 style="margin-top: 4rem;text-align: center;">Gợi ý sản phẩm cần thêm</h2>
    <div>
    <a href="/CuaHangNoiThat/Admin/SanPham">
      <button type="submit" class="btn btn-primary" style="background-color: white;color: #0066cc;margin-left: 10%;">Trở về </button>
    </a>
    </div>
    <table id="tableContent" class="table" style="width: 80%;margin-left: 10%;margin-top: 2rem;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col" style="width: 10rem;">Mã Sản Phẩm</th>
                <th scope="col" style="width: 20rem;">Tên Sản Phẩm</th>
                <th scope="col" style="width: 10rem;">Loại</th>

                <th scope="col">Doanh số trong tháng</th>
                <th scope="col">Số Lượng trong kho</th>
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
                <td><img src="/CuaHangNoiThat/public/image/Empty.jpg" alt="empty_Image" style="width: 10rem;"></td>
                
            </tr>
        </tbody>
    </table>

</body>

</html>