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
        <a href="/CuaHangNoiThat/Admin/ThemKhuyenMai"><button type="button" class="btn btn-primary btn-lg optionButton">Thêm khuyến mãi</button></a>
        <div class="form-group" style="width: 50%;float: right;margin-left: 2rem;">
            <input type="text" class="form-control" id="searchValue" placeholder="Nhập thông tin khuyến mãi..." style="float: right;width: 20rem;">
        </div>
    </div>

    <table id="tableContent" class="table" style="width: 80%;margin-left: 10%;"></table>

    <script>
        loadTable();

        function loadTable() {
            $.ajax({
                url: '/CuaHangNoiThat/Admin/getAllSale',
                success: function(data) {
                    var data = JSON.parse(data);
                    $xhtml = '<thead>' +
                        '<tr>' +
                        '<th scope="col">#</th>' +
                        '<th scope="col">Mã Khuyến Mãi</th>' +
                        '<th scope="col">Ngày Bắt Đầu</th>' +
                        '<th scope="col">Ngày Kết Thúc</th>' +
                        '<th scope="col">Phần Trăm Giảm</th>' +
                        '<th scope="col" style="width: 15rem;">Chức Năng</th>' +
                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    for ($i = 0;$i < data.length;$i++) {
                        $xhtml += '<tr>' +
                            '<th scope="row">'+($i+1)+'</th>' +
                            '<td>'+data[$i].MAKM+'</td>' +
                            '<td>'+formatDateToddmmyyyy(data[$i].NGAYBD)+'</td>' +
                            '<td>'+formatDateToddmmyyyy(data[$i].NGAYKT)+'</td>' +
                            '<td>'+data[$i].PHANTRAMGIAM+'%</td>' +
                            '<td>' +
                            '<a href="/CuaHangNoiThat/Admin/SuaKhuyenMai/'+data[$i].MAKM+'">' +
                            '<button class="btn btn-primary btnControl" type="submit" style="background-color: green;">Sửa khuyến mãi</button>' +
                            '</a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $xhtml += '</tbody>';
                    $("#tableContent").html($xhtml);
                }
            });
        }

        $(document).ready(function() {
            $("#searchValue").keyup(function() {
                $searchValue = convertStringToEnglish($("#searchValue").val());

                $.ajax({
                    url: '/CuaHangNoiThat/Admin/getAllSale',
                    success: function(data) {
                        var data = JSON.parse(data);
                        $xhtml = '<thead>' +
                        '<tr>' +
                        '<th scope="col">#</th>' +
                        '<th scope="col">Mã Khuyến Mãi</th>' +
                        '<th scope="col">Ngày Bắt Đầu</th>' +
                        '<th scope="col">Ngày Kết Thúc</th>' +
                        '<th scope="col">Phần Trăm Giảm</th>' +
                        '<th scope="col" style="width: 15rem;">Chức Năng</th>' +
                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                        
                        for ($i = 0; $i < data.length; $i++) {
                            $check = false;
                            if (convertStringToEnglish(data[$i].MAKM).includes($searchValue)) {
                                $check = true;
                            }
                            if (convertStringToEnglish(data[$i].NGAYBD).includes($searchValue)) {
                                $check = true;
                            }
                            if (convertStringToEnglish(data[$i].NGAYKT).includes($searchValue)) {
                                $check = true;
                            }

                            if(!$check){continue;}
                            $xhtml += '<tr>' +
                            '<th scope="row">'+($i+1)+'</th>' +
                            '<td>'+data[$i].MAKM+'</td>' +
                            '<td>'+formatDateToddmmyyyy(data[$i].NGAYBD)+'</td>' +
                            '<td>'+formatDateToddmmyyyy(data[$i].NGAYKT)+'</td>' +
                            '<td>'+data[$i].PHANTRAMGIAM+'%</td>' +
                            '<td>' +
                            '<a href="/CuaHangNoiThat/Admin/SuaKhuyenMai/'+data[$i].MAKM+'">' +
                            '<button class="btn btn-primary btnControl" type="submit" style="background-color: green;">Sửa khuyến mãi</button>' +
                            '</a>' +
                            '</td>' +
                            '</tr>';
                        }
                        $xhtml += '</tbody>';
                        $("#tableContent").html($xhtml);
                    }
                });
            });
        });
    </script>

</body>

</html>