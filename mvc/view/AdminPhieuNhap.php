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
        <a href="/CuaHangNoiThat/Admin/ThemPhieuNhap"><button type="button" class="btn btn-primary btn-lg optionButton">Thêm Phiếu Nhập</button></a>
        <a href="#"><button type="button" class="btn btn-primary btn-lg optionButton">Xuất Excel</button></a>
        <div class="form-group" style="width: 50%;float: right;margin-left: 2rem;">
            <input type="email" class="form-control" id="searchReceipt" placeholder="Nhập vào thông tin cần tìm..." style="float: right;width: 20rem;">
        </div>
    </div>
    <div style="width: 80%;margin-left: 10%;margin-top: 1rem;">
        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="checkReceiptId">
                    <label class="form-check-label" for="autoSizingCheck">Tìm theo mã phiếu nhập</label>
                </div>
                <input type="text" class="form-control" id="inputReceiptId">
            </div>
            <div class="form-group col-md-4">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="checkNameSupplier">
                    <label class="form-check-label" for="autoSizingCheck">Tìm theo tên nhà cung cấp</label>
                </div>
                <input type="text" class="form-control" id="inputNameSupplier">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="checkNameStaff">
                    <label class="form-check-label" for="autoSizingCheck">Tìm theo tên nhân viên</label>
                </div>
                <input type="text" class="form-control" id="inputNameStaff">
            </div>
            <div class="form-group col-md-1">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="checkDay">
                    <label class="form-check-label" for="autoSizingCheck">Ngày</label>
                </div>
                <select class="form-control" id="inputDay">
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        $value = strlen((string)$i) > 1 ? $i : '0' . $i;
                        echo '<option value="' . $i . '">' . $value . '</option>';
                    }
                    ?>

                </select>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="checkMonth">
                    <label class="form-check-label" for="autoSizingCheck">Tháng</label>
                </div>
                <select class="form-control" id="inputMonth">
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        $value = strlen((string)$i) > 1 ? $i : '0' . $i;
                        echo '<option value="' . $i . '">' . $value . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-1">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="checkYear">
                    <label class="form-check-label" for="autoSizingCheck">Năm</label>
                </div>
                <input type="text" class="form-control" id="inputYear">
            </div>
            <button onclick="searchReceipt();" type="submit" class="btn btn-primary">Tìm kiếm </button>
        </div>

    </div>
    <table id="tableContent" class="table" style="width: 80%;margin-left: 10%;"></table>
    <script>
        loadTable();

        function loadTable() {
            $(document).ready(function() {
                $.ajax({
                    url: '/CuaHangNoiThat/Admin/getAllReceipt',
                    success: function(data) {
                        var data = JSON.parse(data);
                        //console.log(data);

                        $xhtml = '<thead>' +
                            '<tr>' +
                            '<th scope="col">#</th>' +
                            '<th scope="col">Mã Hóa Đơn</th>' +
                            '<th scope="col">Tên Nhân Viên</th>' +
                            '<th scope="col">Tên Nhà Cung Cấp</th>' +
                            '<th scope="col">Ngày Lập</th>' +
                            '<th scope="col">Giờ Lập</th>' +
                            '<th scope="col" style="width: 10rem;">Tổng</th>' +
                            '<th scope="col" style="width: 15rem;">Chức Năng</th>' +
                            '</tr>' +
                            '</thead>' +
                            '<tbody>';
                        for ($i = 0; $i < data.length; $i++) {
                            $xhtml += '<tr><th scope="row">' + ($i + 1) + '</th>' +
                                '<td>' + data[$i].MAPN + '</td>' +
                                '<td>' + data[$i].TENNV + '</td>' +
                                '<td>' + data[$i].TENNCC + '</td>' +
                                '<td>' + data[$i].NGAYLAP + '</td>' +
                                '<td>' + data[$i].GIOLAP + '</td>' +
                                '<th scope="col">' + formatter.format(data[$i].TONG) + '</th>' +
                                '<td>' +
                                '<button class="btn btn-primary btnControl" type="submit" style="background-color: #007bff;margin-top: 0.3rem;">In phiếu nhập</button>' +
                                '<a href="/CuaHangNoiThat/Admin/XemChiTietPhieuNhap/1">' +
                                '<button class="btn btn-primary btnControl" type="submit" style="background-color: green;margin-top: 0.3rem;">Xem chi tiết</button>' +
                                '</a>' +
                                '</td></tr>';
                        }


                        $xhtml += '</tbody></table>';
                        $('#tableContent').html($xhtml);
                    }
                });
            });
        }

        //Bat su kien nhap vao o tim kiem
        $(document).ready(function() {
            $("#searchReceipt").keyup(function() {
                $value = convertStringToEnglish(this.value);

                $.ajax({
                    url: '/CuaHangNoiThat/Admin/getAllReceipt',
                    success: function(data) {
                        var data = JSON.parse(data);
                        //console.log(data);
                        $xhtml = '<thead>' +
                            '<tr>' +
                            '<th scope="col">#</th>' +
                            '<th scope="col">Mã Hóa Đơn</th>' +
                            '<th scope="col">Tên Nhân Viên</th>' +
                            '<th scope="col">Tên Nhà Cung Cấp</th>' +
                            '<th scope="col">Ngày Lập</th>' +
                            '<th scope="col">Giờ Lập</th>' +
                            '<th scope="col" style="width: 10rem;">Tổng</th>' +
                            '<th scope="col" style="width: 15rem;">Chức Năng</th>' +
                            '</tr>' +
                            '</thead>' +
                            '<tbody>';
                        for ($i = 0; $i < data.length; $i++) {
                            $check = false;
                            if (convertStringToEnglish(data[$i].MAPN).includes($value)) {
                                $check = true;
                            }
                            if (convertStringToEnglish(data[$i].TENNV).includes($value)) {
                                $check = true;
                            }

                            if (convertStringToEnglish(data[$i].TENNCC).includes($value)) {
                                $check = true;
                            }
                            if (convertStringToEnglish(data[$i].NGAYLAP).includes($value)) {
                                $check = true;
                            }

                            if (!$check) {
                                continue;
                            }
                            $xhtml += '<tr><th scope="row">' + ($i + 1) + '</th>' +
                                '<td>' + data[$i].MAPN + '</td>' +
                                '<td>' + data[$i].TENNV + '</td>' +
                                '<td>' + data[$i].TENNCC + '</td>' +
                                '<td>' + data[$i].NGAYLAP + '</td>' +
                                '<td>' + data[$i].GIOLAP + '</td>' +
                                '<th scope="col">' + formatter.format(data[$i].TONG) + '</th>' +
                                '<td>' +
                                '<button class="btn btn-primary btnControl" type="submit" style="background-color: #007bff;margin-top: 0.3rem;">In phiếu nhập</button>' +
                                '<a href="/CuaHangNoiThat/Admin/XemChiTietPhieuNhap/1">' +
                                '<button class="btn btn-primary btnControl" type="submit" style="background-color: green;margin-top: 0.3rem;">Xem chi tiết</button>' +
                                '</a>' +
                                '</td></tr>';
                        }


                        $xhtml += '</tbody></table>';
                        $('#tableContent').html($xhtml);
                    }
                });

            });
        });

        function searchReceipt() {
            $receiptId = "@";
            $nameSupplier = "@";
            $nameStaff = "@";
            $day = "@";
            $month = "@";
            $year = "@";

            if ($("#checkReceiptId").is(":checked")) {
                $receiptId = convertStringToEnglish($("#inputReceiptId").val());
            }
            if ($("#checkNameSupplier").is(":checked")) {
                $nameSupplier = convertStringToEnglish($("#inputNameSupplier").val());
            }
            if ($("#checkNameStaff").is(":checked")) {
                $nameStaff = convertStringToEnglish($("#inputNameStaff").val());
            }
            if ($("#checkDay").is(":checked")) {
                $day = convertStringToEnglish($("#inputDay").val());
            }
            if ($("#checkMonth").is(":checked")) {
                $month = convertStringToEnglish($("#inputMonth").val());
            }
            if ($("#checkYear").is(":checked")) {
                $year = convertStringToEnglish($("#inputYear").val());
            }

            $.ajax({
                url: '/CuaHangNoiThat/Admin/getAllReceipt',
                success: function(data) {
                    var data = JSON.parse(data);
                    //console.log(data);
                    $xhtml = '<thead>' +
                        '<tr>' +
                        '<th scope="col">#</th>' +
                        '<th scope="col">Mã Hóa Đơn</th>' +
                        '<th scope="col">Tên Nhân Viên</th>' +
                        '<th scope="col">Tên Nhà Cung Cấp</th>' +
                        '<th scope="col">Ngày Lập</th>' +
                        '<th scope="col">Giờ Lập</th>' +
                        '<th scope="col" style="width: 10rem;">Tổng</th>' +
                        '<th scope="col" style="width: 15rem;">Chức Năng</th>' +
                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    for ($i = 0; $i < data.length; $i++) {
                        $dayReceipt = parseInt(data[$i].NGAYLAP.substring(8));
                        $monthReceipt = parseInt(data[$i].NGAYLAP.substring(5, 7));
                        $yearReceipt = parseInt(data[$i].NGAYLAP.substring(0, 4));


                        if ($receiptId != '@' && !convertStringToEnglish(data[$i].MAPN).includes($receiptId)) {
                            continue;
                        }
                        if ($nameStaff != '@' && !convertStringToEnglish(data[$i].TENNV).includes($nameStaff)) {
                            continue;
                        }
                        if ($nameSupplier != '@' && !convertStringToEnglish(data[$i].TENNCC).includes($nameSupplier)) {
                            continue;
                        }
                        if ($day != '@' && $day != $dayReceipt) {
                            continue;
                        }
                        if ($month != '@' && $month != $monthReceipt) {
                            continue;
                        }
                        if ($year != '@' && $year != $yearReceipt) {
                            continue;
                        }



                        $xhtml += '<tr><th scope="row">' + ($i + 1) + '</th>' +
                            '<td>' + data[$i].MAPN + '</td>' +
                            '<td>' + data[$i].TENNV + '</td>' +
                            '<td>' + data[$i].TENNCC + '</td>' +
                            '<td>' + data[$i].NGAYLAP + '</td>' +
                            '<td>' + data[$i].GIOLAP + '</td>' +
                            '<th scope="col">' + formatter.format(data[$i].TONG) + '</th>' +
                            '<td>' +
                            '<button class="btn btn-primary btnControl" type="submit" style="background-color: #007bff;margin-top: 0.3rem;">In phiếu nhập</button>' +
                            '<a href="/CuaHangNoiThat/Admin/XemChiTietPhieuNhap/1">' +
                            '<button class="btn btn-primary btnControl" type="submit" style="background-color: green;margin-top: 0.3rem;">Xem chi tiết</button>' +
                            '</a>' +
                            '</td></tr>';
                    }


                    $xhtml += '</tbody></table>';
                    $('#tableContent').html($xhtml);
                }
            });
        }
    </script>
</body>

</html>