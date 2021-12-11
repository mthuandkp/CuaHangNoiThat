<?php
class Admin extends Controller{
    function display()
    {
        require_once('./menuadmin.php');
        $this->View('AdminTrangChu', 'Trang Chủ');
    }
    /* ===========================HOA DON================================ */
    function HoaDon()
    {
        require_once('./menuadmin.php');
        $this->View('AdminHoaDon', 'Admin Hóa Đơn');
    }
    function XemChiTietHD($id)
    {
        $objBillDetail = $this->getModel('HoaDonDB');
        $objProduct = $this->getModel('SanPhamDB');
        $data = $objBillDetail->getBillDetailById($id);
        foreach($data as $key => $value){
            $product = $objProduct->getProductById($value['MASP']);
            $data[$key]['TENSP'] = $product['TENSP'];
            $data[$key]['HINHANH'] = $product['HINHANH'];
        }
        require_once('./menuadmin.php');
        $this->View('AdminChiTietHoaDon', 'Admin Chi Tiết HĐ', $data);
    }
    function TimKiemHoaDon(){
        require_once('./menuadmin.php');
        $this->View('AdminTimKiemHoaDon','Tìm kiếm hóa đơn');
    }
    function getAllBill(){
        $obj = $this->getModel('HoaDonDB');
        $objStatus = $this->getModel('TrangThaiDB');
        $objStaff = $this->getModel('NhanVienDB');
        $objCustomer = $this->getModel('KhachHangDB');
        $objSale = $this->getModel('KhuyenMaiDB');

        $data = $obj->getAllBIll();
        foreach($data as $key=>$value){
            $staff = $objStaff->getStaffById($value['MANV']);
            $status = $value['MATRANGTHAI'];
            $customer = $objCustomer->getCutomerById($value['MAKH']);
            $data[$key]['MOTATRANGTHAI'] = $objStatus->getStatusNameById($status)['MOTATRANGTHAI'];
            $data[$key]['TENNV'] = $staff['TENNV'];
            $data[$key]['TENKH'] = $customer['TENKH'];
            $data[$key]['PHANTRAMGIAM'] = $objSale->getSaleById($value['MAKM'])['PHANTRAMGIAM'];
        }
        
        echo json_encode($data);
    }

    function getBillAndDetail(){
        if(!isset($_POST['id'])){
            echo -1;
            return;
        }
        $id = $_POST['id'];
        $objBill = $this->getModel("HoaDonDB");
        $objStaff = $this->getModel('NhanVienDB');
        $objCustomer = $this->getModel('KhachHangDB');
        $objProduct = $this->getModel('SanPhamDB');
        $objSale = $this->getModel('KhuyenMaiDB');


        $data = array();
        $data['bill'] = $objBill->getBillById($id)[0];
        $data['bill']['TENNV'] = $objStaff->getStaffById($data['bill']['MANV'])['TENNV'];
        $data['bill']['TENKH'] = $objCustomer->getCutomerById($data['bill']['MAKH'])['TENKH'];
        $data['bill']['SALE'] = $objSale->getSaleById($data['bill']['MAKM']);
        $data['detail'] = $objBill->getBillDetailById($id);
        foreach($data['detail'] as $key => $value){
            $product = $objProduct->getProductById($value['MASP']);
            $data['detail'][$key]['TENSP'] = $product['TENSP'];
            
        }
        echo json_encode($data);
    }


    function getReceiptAndDetail(){
        if(!isset($_POST['id'])){
            echo -1;
            return;
        }
        $id = $_POST['id'];
        $objReceipt = $this->getModel("PhieuNhapDB");
        $objStaff = $this->getModel('NhanVienDB');
        $objSupplier = $this->getModel('NhaCungCapDB');
        $objProduct = $this->getModel('SanPhamDB');


        $data = array();
        $data['receipt'] = $objReceipt->getReceiptById($id)[0];
        $data['receipt']['TENNV'] = $objStaff->getStaffById($data['receipt']['MANV'])['TENNV'];
        $data['receipt']['TENNCC'] = $objSupplier->getSupplierById($data['receipt']['MANCC'])['TENNCC'];
        
        $data['detail'] = $objReceipt->getReceiptDetailById($id);
        foreach($data['detail'] as $key => $value){
            $product = $objProduct->getProductById($value['MASP']);
            $data['detail'][$key]['TENSP'] = $product['TENSP'];
            
        }
        echo json_encode($data);
    }

    function updateBillStatus(){
        
        if(!isset($_POST['id'])){
            echo -1;
            return;
        }
        $id = $_POST['id'];
        $objBill = $this->getModel("HoaDonDB");
        if($objBill->updateBillStatus($id)){
            echo 0;
            return;
        }
        echo -1;
    }

    function exportBillToExcel(){
        $objBill = $this->getModel('HoaDonDB');
        $data = $objBill->exportExcel();
        echo json_encode($data);
    }
    /*===================================================================== */
    /* ===========================KHACH HANG================================ */
    function KhachHang()
    {
        require_once('./menuadmin.php');
        $this->View('AdminKhachHang','Admin Khách Hàng');
    }
    function ThemKhachHang(){
        require_once('./menuadmin.php');
        $this->View('AdminThemKhachHang','Admin Thêm Khách Hàng');
    }
    function TimKiemKhachHang(){
        require_once('./menuadmin.php');
        $this->View('AdminTimKiemKhachHang','Admin Tìm kiếm khách hàng');
    }
    function SuaKhachHang($id){
        require_once('./menuadmin.php');
        $this->View('AdminSuaKhachHang','Admin sửa khách hàng',$id);
    }

    function getAllCustomer(){
        $objCus = $this->getModel('KhachHangDB');

        echo json_encode($objCus->getAllCustomer());
    }

    function block_unblockCutomer($id){
        $objCus = $this->getModel('KhachHangDB');
        if($objCus->block_unblockCutomer($id)){
            echo '0';
        }
        else{
            echo -1;
        }
    }

    function exportCustomerToExcel(){
        $objCustomer = $this->getModel('KhachHangDB');
        $data = $objCustomer->exportExcel();
        echo json_encode($data);
    }

    function checkLoginCustomer($user,$pass){
        $objCustomer = $this->getModel('KhachHangDB');
        $cus = $objCustomer->getCutomerByUser($user);
        $pass = hash('md5',$pass);
        $result = array();
        if(empty($cus)){
            $result['RESULT'] = "NOT_EXISTS";
        }
        else{
            if($pass == $cus['MATKHAU']){
                $result['RESULT'] = "SUCCESS";
                $result['DATA'] = $cus;
                $_SESSION['account'] = $cus;
            }
            else{
                $result['RESULT'] = "WRONG_PASSWORD";
                
            }
        }
        echo json_encode($result);
    }
    /*===================================================================== */
    /*============================== KHUYEN MAI ============================ */
    function KhuyenMai()
    {
        require_once('./menuadmin.php');
        $this->View('AdminKhuyenMai','Admin Khuyến Mãi');
    }
    function ThemKhuyenMai(){
        require_once('./menuadmin.php');
        $this->View('AdminThemKhuyenMai','Admin Thêm Khuyến mãi');
    }
    function TimKiemKhuyenMai(){
        require_once('./menuadmin.php');
        $this->View('AdminTimKiemKhuyenMai','Admin Tìm kiếm Khuyến mãi');
    }
    function SuaKhuyenMai($id){
        $objSale = $this->getModel('KhuyenMaiDB');
        $sale = $objSale->getSaleById($id);
        require_once('./menuadmin.php');
        $this->View('AdminSuaKhuyenMai','Admin sửa Khuyến mãi',$sale);
    }

    function getAllSale(){
        $objSale = $this->getModel('KhuyenMaiDB');
        echo json_encode($objSale->getAllSales());
    }

    function updateInforSale(){
        $sale = $_POST['data'];
        $objSale = $this->getModel('KhuyenMaiDB');
        if($objSale->updateInformationSale($sale)){
            echo 'Sửa Thành Công';
        }
        else{
            echo 'Không thể sửa';
        }
    }

    function addNewSale(){
        $sale = $_POST['data'];
        $objSale = $this->getModel('KhuyenMaiDB');
        if($objSale->addNewSale($sale)){
            echo 'Thêm Thành Công';
        }
        else{
            echo 'Không thể thêm';
        }
    }
    /*===================================================================== */
    /*============================== LOAI SAN PHAM ============================ */
    function LoaiSanPham()
    {
        require_once('./menuadmin.php');
        $this->View('AdminLoaiSanPham','Admin Loại Sản Phẩm');
    }
    function ThemLoaiSanPham()
    {
        require_once('./menuadmin.php');
        $this->View('AdminThemLoaiSanPham','Admin Thêm Loại Sản Phẩm');
    }
    function SuaLoaiSanPham($id)
    {
        $objType = $this->getModel('LoaiSanPhamDB');
        $typeProduct = $objType->getProductTypeById($id);
        require_once('./menuadmin.php');
        $this->View('AdminSuaLoaiSanPham','Admin Sửa Loại Sản Phẩm',$typeProduct);
    }

    function getAllProductType(){
        $objType = $this->getModel('LoaiSanPhamDB');
        echo json_encode($objType->getAllProductType());
    }

    function updateInformationProductType($typeProduct = array()){
        if (isset($_POST['data'])) {
            $typeProduct = $_POST['data'];
        }
        $objType = $this->getModel('LoaiSanPhamDB');

        if($objType->updateInformationProductType($typeProduct)){
            echo 0;
        }
        else{
            echo -1;
        }
    }

    function addNewTypeProduct($typeProduct = array()){
        if (isset($_POST['data'])) {
            $typeProduct = $_POST['data'];
        }
        $objType = $this->getModel('LoaiSanPhamDB');
        
        if($objType->addNewProductType($typeProduct)){
            echo 0;
        }
        else{
            echo -1;
        }
    }

    function exportTypeProductToExcel(){
        $typeProduct = $this->getModel('LoaiSanPhamDB');
        $data = $typeProduct->exportExcel();
        echo json_encode($data);
    }

    function readExcelTypeProduct(){
        $typeProduct = $this->getModel("LoaiSanPhamDB");
        $data = $typeProduct->readExcel($_FILES['file']);

        //Check valid data
        foreach($data as $key=>$value){
            if($value['MALOAI'] == ''){
                unset($data[$key]);
                continue;
            }
            if($value['TENLOAI'] == ''){
                unset($data[$key]);
                continue;
            }
            if($value['MOTA'] == ''){
                unset($data[$key]);
                continue;
            }
        }
        array_filter($data);
        echo json_encode(array('data'=>$data,'dataDB'=>$typeProduct->getAllProductType()));
    }

    /*========================================================================= */
    /*============================== NHA CUNG CAP ============================ */
    function NhaCungCap()
    {
        require_once('./menuadmin.php');
        $this->View('AdminNhaCungCap','Admin Nhà Cung Cấp');
    }
    function ThemNhaCungCap()
    {
        require_once('./menuadmin.php');
        $this->View('AdminThemNhaCungCap','Admin Thêm Nhà Cung Cấp');
    }
    function SuaNhaCungCap($id)
    {
        $objSupplier = $this->getModel("NhaCungCapDB");
        $supplier = $objSupplier->getSupplierById($id);
        require_once('./menuadmin.php');
        $this->View('AdminSuaNhaCungCap','Admin Sửa Nhà Cung Cấp',$supplier);
    }

    function getAllSupplier(){
        $objSupplier = $this->getModel("NhaCungCapDB");
        echo json_encode($objSupplier->getAllSupplier());
    }

    function block_unblockSupplier($idSupplier){
        $objSupplier = $this->getModel("NhaCungCapDB");
        if($objSupplier->block_unblockSupplier($idSupplier)){
            echo 0;
        }
        else{
            echo -1;
        }
        
    }

    function updateInformationSupplier(){
        $supplier = $_POST['data'];
        $objSupplier = $this->getModel("NhaCungCapDB");
        if($objSupplier->updateInformationSupplier($supplier)){
            echo 0;
        }
        else{
            echo -1;
        }
    }

    function addNewSupplier(){
        $objSupplier = $this->getModel("NhaCungCapDB");
        $supplier = $_POST['data'];
        if($objSupplier->addNewSupplier($supplier)){
            echo 0;
        }
        else{
            echo -1;
        }
    }

    function readExcelSupplier(){
        $objSupplier = $this->getModel("NhaCungCapDB");
        $data = $objSupplier->readExcel($_FILES['file']);

        //print_r($data);
        //Check valid data
        foreach($data as $key=>$value){
            if($value['TENNCC'] == ''){
                unset($data[$key]);
                continue;
            }
            if($value['DIACHI'] == ''){
                unset($data[$key]);
                continue;
            }
            if(strlen($value['SDT']) < 10 || strlen($value['SDT']) > 11 || $value['SDT'][0] != '0' || !is_numeric($value['SDT'])){
                unset($data[$key]);
                continue;
            }
        }
        array_filter($data);
        echo json_encode(array('data'=>$data,'dataDB'=>$objSupplier->getAllSupplier()));
    }

    function exportSupplierToExcel(){
        $objSupplier = $this->getModel('NhaCungCapDB');
        $data = $objSupplier->exportExcel();
        echo json_encode($data);
    }
    /*========================================================================= */

    /* =========================NHAN VIEN===================================*/
    function NhanVien()
    {
        $obj = $this->getModel('QuyenDB');
        $data = array();
        $data['Right'] = $obj->getAllRight();
        require_once('./menuadmin.php');
        $this->View('AdminNhanVien','Admin Nhân Viên',$data);
    }
    function ThemNhanVien(){
        $data = array();
        $obj = $this->getModel('QuyenDB');
        $data['Right'] = $obj->getAllRight();
        require_once('./menuadmin.php');
        $this->View('AdminThemNhanVien','Admin Thêm Nhân Viên',$data);
    }
    function TimKiemNhanVien(){
        require_once('./menuadmin.php');
        $this->View('AdminTimKiemNhanVien','Admin Tìm kiếm nhân viên');
    }
    function SuaNhanVien($id){
        $data = array();
        $objRight = $this->getModel('QuyenDB');
        $objStaff = $this->getModel('NhanVienDB');

        $data['Right'] = $objRight->getAllRight();
        $data['Staff'] = $objStaff->getStaffById($id);
        require_once('./menuadmin.php');
        $this->View('AdminSuaNhanVien','Admin sửa nhân viên',$data);
    }

    function getAllStaff(){
        $objStaff = $this->getModel('NhanVienDB');
        $objRight = $this->getModel('QuyenDB');
        $data = $objStaff->getAllStaff();
        //getRightById
        foreach($data as $key=>$value){
            $data[$key]['RIGHT'] = $objRight->getRightById($value['MAQUYEN']);
        }
        echo json_encode($data);
    }

    function updateInfoStaff(){
        $staff = $_POST['data'];
        $objStaff = $this->getModel('NhanVienDB');
        if($objStaff->updateInformationStaff($staff)){
            echo 'Cập nhật thành công';
        }
        else{
            echo 'Không thể cập nhật';
        }
    }

    function updateStatusStaff(){
        $staffId = $_POST['data'];
        $objStaff = $this->getModel('NhanVienDB');
        if($objStaff->updateStatusStaff($staffId)){
            echo 'Cập nhật thành công';
        }
        else{
            echo 'Không thể cập nhật';
        }
    }

    function exportStaffToExcel(){
        $objSupplier = $this->getModel('NhanVienDB');
        $data = $objSupplier->exportExcel();
        echo json_encode($data);
    }

    function addNewStaff(){
        $staff = $_POST['data'];
        $objStaff = $this->getModel('NhanVienDB');
        if($objStaff->addNewStaff($staff)){
            echo 0;
        }
        else{
            echo -1;
        }
    }

    function readExcelStaff(){
        $objSupplier = $this->getModel("NhanVienDB");
        $data = $objSupplier->readExcel($_FILES['file']);

        //print_r($data);
        //Check valid data
        foreach($data as $key=>$value){
            if($value['MANV'] == ''){
                unset($data[$key]);
                continue;
            }
            if($value['TENNV'] == ''){
                unset($data[$key]);
                continue;
            }
            if($value['NGAYSINH'] == ''){
                unset($data[$key]);
                continue;
            }
            if($value['GIOITINH'] == ''){
                unset($data[$key]);
                continue;
            }
            if($value['DIACHI'] == ''){
                unset($data[$key]);
                continue;
            }
            if(strlen($value['SDT']) < 10 || strlen($value['SDT']) > 11 || $value['SDT'][0] != '0' || !is_numeric($value['SDT'])){
                unset($data[$key]);
                continue;
            }
            if($value['MAQUYEN'] == ''){
                unset($data[$key]);
                continue;
            }
            if($value['TENDN'] == ''){
                unset($data[$key]);
                continue;
            }
            if($value['MATKHAU'] == ''){
                unset($data[$key]);
                continue;
            }           
        }
        array_filter($data);
        echo json_encode(array('data'=>$data,'dataDB'=>$objSupplier->getAllStaff()));
    }

    /* ============================================================*/
    /* ========================== PHIEU NHAP==================================*/
    function PhieuNhap()
    {
        require_once('./menuadmin.php');
        $this->View('AdminPhieuNhap','Admin Phiếu Nhập');
    }
    function ThemPhieuNhap(){
        $data = array();
        $objTypeProduct = $this->getModel('LoaiSanPhamDB');
        $objSupplier = $this->getModel('NhaCungCapDB');
        $objProduct = $this->getModel('SanPhamDB');

        $data['NCC'] = $objSupplier->getAllSupplier();
        $data['TypeProduct'] = $objTypeProduct->getAllProductType();
        $data['Product'] = $objProduct->getAllProduct();
        require_once('./menuadmin.php');
        $this->View('AdminThemPhieuNhap','Admin Thêm Phiếu Nhập',$data);
    }
    function TimKiemPhieuNhap()
    {
        require_once('./menuadmin.php');
        $this->View('AdminTimKiemPhieuNhap','Admin Tìm Kiếm Phiếu Nhập');
    }
    function XemCHiTietPhieuNhap($id)
    {
        require_once('./menuadmin.php');
        $this->View('AdminChiTietPhieuNhap','Admin Chi Tiết Phiếu Nhập',$id);
    }

    function getAllReceipt(){
        $objReceipt = $this->getModel('PhieuNhapDB');
        $objStaff = $this->getModel('NhanVienDB');
        $objSupplier = $this->getModel('NhaCungCapDB');

        $data = $objReceipt->getAllReceipt();
        foreach($data as $key=>$value){
            $data[$key]['TENNV'] = $objStaff->getStaffById($value['MANV'])['TENNV'];
            $data[$key]['TENNCC'] = $objSupplier->getSupplierById($value['MANCC'])['TENNCC'];
        }
        
        echo json_encode($data);
    }

    function AddReceiptToDb(){
        $dataProduct = $_POST['data'];
        $objReceipt = $this->getModel('PhieuNhapDB');
        $objProduct = $this->getModel('SanPhamDB');
        //Count sum of receipt
        $sum = 0;
        foreach($dataProduct as $value){
            $sum += $value['GIA']*$value['SOLUONG'];
        }
        
        $receipt = array(
            'MANV'=>$_POST['staffid'],
            'MANCC'=>$_POST['supplierId'],
            'MAPN'=>$objReceipt->createNextReceiptId(),
            'NGAYLAP'=>date('Y-m-d'),
            'GIOLAP'=>date('h:i:s'),
            'TONG'=>$sum
        );

        //detail of receipt
        $detailReceipt = array();
        //New product
        $newProduct = array();
        //Exist Product
        $existProduct = array();
        foreach($dataProduct as $value){
            if(empty($objProduct->getProductById($value['MASP']))){
                $newProduct[] = $value;
            }
            else{
                $existProduct[] = array(
                    'MASP'=> $value['MASP'],
                    'SOLUONG'=>$value['SOLUONG']
                );
            }
            $detailReceipt[] = array(
                'MAPN'=>$receipt['MAPN'],
                'MASP'=>$value['MASP'],
                'SOLUONG'=>$value['SOLUONG'],
                'GIA'=>$value['GIA']
            );
        }

        //Update product
        if (!empty($newProduct)) {
            $result = $objProduct->addNewProduct($newProduct);
            if (!$result) {
                echo 'ERROR_ADD_NEW';
                return;
            }
        }

        if (!empty($existProduct)) {
            $result = $objProduct->updateNumberListProduct($existProduct);
            if (!$result) {
                echo 'ERROR_ADD_EXIST';
                return;
            }
        }
        //Update receipt
        $result = $objReceipt->AddReceiptAndDetail($receipt,$detailReceipt);
        echo $result ? 0:"ERROR_ADD_RECEIPT_AND_DETAIL";
    }

    function compareTo($detail1,$detail2){
        if($detail1['MASP'] != $detail2['MASP'] ||
        $detail1['TENSP'] != $detail2['TENSP'] ||
        $detail1['MALOAI'] != $detail2['MALOAI'] ||
        $detail1['GIA'] != $detail2['GIA'] ||
        $detail1['HINHANH'] != $detail2['HINHANH'] ){
            return false;
        }
        if(strcmp($detail1['MASP'],$detail2['MASP']) != 0 ||
        strcmp($detail1['TENSP'],$detail2['TENSP']) != 0 ||
        strcmp($detail1['MALOAI'],$detail2['MALOAI']) != 0 ||
        $detail1['MASP'] != $detail2['MASP'] ||
        strcmp($detail1['HINHANH'],$detail2['HINHANH']) != 0){
            return false;
        }
        return true;
    }

    function readDetailReceiptFromFile(){
        $objReceipt = $this->getModel("PhieuNhapDB");
        $objProduct = $this->getModel("SanPhamDB");
        $objTypeProduct = $this->getModel("LoaiSanPhamDB");
        $data = $objReceipt->readExcel($_FILES['file']);
        

        $countArray = array(
            'sumRow' => count($data),
            'sumFilterRow' => 0,
            'sumInvalidRow' => 0,
            'sumValidRow' => 0,
            'sumExistRow' => 0,
            'sumNewRow' => 0
        );

        // Group number of product same as id
        $tmp = $data;
        $data =array();
        while(!empty($tmp)){
            $item = end($tmp);
            $sumOfNumber = 0;
            foreach($tmp as $key=>$value){
                if($this->compareTo($item,$value)){
                    $sumOfNumber += $value['SOLUONG'];
                    unset($tmp[$key]);
                }
            }
            $item['SOLUONG'] = $sumOfNumber;
            $data[] = $item;
        }

        $countArray['sumFilterRow'] = count($data);

        //Kiem tra hop le du lieu
        foreach($data as $key=>$value){
            if($value['MASP']=='' || strpos($value['MASP'],"SP")===false || strlen($value['MASP']) <=2){
                unset($data[$key]);
                $countArray['sumInvalidRow']++;
                continue;
            }
            if($value['TENSP']=='' || $value['TENSP'] == '' || strlen($value['TENSP']) < 4){
                unset($data[$key]);
                $countArray['sumInvalidRow']++;
                continue;
            }
            
            if($value['MALOAI']=='' || 
            strpos($value['MALOAI'],'LSP')===false || 
            empty($objTypeProduct->getProductTypeById($value['MALOAI'])) || strlen($value['MALOAI']) < 4){
                unset($data[$key]);
                $countArray['sumInvalidRow']++;
                continue;
            }
            if($value['GIA']=='' || !is_numeric($value['GIA']) || abs((int)$value['GIA']) != $value['GIA']){
                unset($data[$key]);
                $countArray['sumInvalidRow']++;
                continue;
            }
            if($value['SOLUONG']=='' || !is_numeric($value['SOLUONG']) || abs((int)$value['SOLUONG']) != $value['SOLUONG']){
                unset($data[$key]);
                $countArray['sumInvalidRow']++;
                continue;
            }
            if($value['HINHANH']=='' || strpos($value['HINHANH'],'jpg')===false && strpos($value['HINHANH'],'png')===false){
                unset($data[$key]);
                $countArray['sumInvalidRow']++;
                continue;
            }
        }
        
        //Kiem tra tinh dung dan cua san pham da co  trong db
        foreach ($data as $key=>$value) {
            $product = $objProduct->getProductById($value['MASP']);
            if(!empty($product)){
                if(strcmp($value['TENSP'], $product['TENSP']) != 0 ||
                strcmp($value['MALOAI'], $product['MALOAI']) != 0 ||
                $value['GIA'] != $product['GIA']||
                strcmp($value['HINHANH'], $product['HINHANH']) != 0){
                    $countArray['sumInvalidRow']++;
                    unset($data[$key]);
                }
            }
        }

        foreach ($data as $key=>$value) {
            $product = $objProduct->getProductById($value['MASP']);
            if (!empty($product)) {
                $countArray['sumExistRow']++;
            }
        }
        $countArray['sumValidRow'] = $countArray['sumFilterRow'] - $countArray['sumInvalidRow'];
        $countArray['sumNewRow'] = $countArray['sumValidRow'] - $countArray['sumExistRow'];
        echo json_encode(array($data,$countArray));
    }

    function exportReceiptToExcel(){
        $objBill = $this->getModel('PhieuNhapDB');
        $data = $objBill->exportExcel();
        echo json_encode($data);
    }
    /* ============================================================*/
    /* =========================SAN PHAM===================================*/
    function SanPham()
    {
        $objTypeProduct = $this->getModel("LoaiSanPhamDB");
        $data = array();
        $data['type'] = $objTypeProduct->getAllProductType();
        require_once('./menuadmin.php');
        $this->View('AdminSanPham', 'Admin Sản Phẩm',$data);
    }
    function ThemSanPham()
    {
        require_once('./menuadmin.php');
        $this->View('AdminThemSanPham', 'Admin Thêm Sản Phẩm');
    }
    function TimKiemSanPham()
    {
        require_once('./menuadmin.php');
        $this->View('AdminTimKiemSanPham', 'Admin Tìm Kiếm Sản Phẩm');
    }
    function SuaSanPham($id)
    {
        $data = array();
        $objProduct = $this->getModel("SanPhamDB");
        $objTypeProduct = $this->getModel("LoaiSanPhamDB");
        
        $data['id'] = $id;
        $data['product'] = $objProduct->getProductById($id);
        $data['type'] = $objTypeProduct->getAllProductType();
        require_once('./menuadmin.php');
        $this->View('AdminSuaSanPham', 'Admin Sửa Sản Phẩm', $data);
    }
    function GoiYThemSP()
    {
        require_once('./menuadmin.php');
        $this->View('AdminGoiYThemSanPham', 'Admin Gợi ý thêm sản phẩm');
    }

    function getAllProduct(){
        $objProduct = $this->getModel('SanPhamDB');
        echo json_encode($objProduct->getAllProduct());
    }

    function uploadImage(){
        $filename = date("dmY_his");
        $objProduct = $this->getModel("SanPhamDB");
        if($objProduct->uploadImage($_FILES['file'],$filename)){
            echo json_encode(array(0,$filename));
        }
        else{
            echo -1;
        }
    }
    

    function updateInformationProduct(){
        $data = $_POST['obj'];
        $objProduct = $this->getModel("SanPhamDB");
        $rs = $objProduct->updateInformationProduct($data);
        if($rs){
            echo 0;
        }
        else{
            echo -1;
        }
    }

    function disableProductStatus(){
        $productId = $_POST['id'];
        $objProduct = $this->getModel("SanPhamDB");
        if($objProduct->disableProductStatus($productId)){
            echo 0;
        }
        else{
            echo -1;
        }
    }
    function exportProductToExcel(){
        $objProduct = $this->getModel('SanPhamDB');
        $data = $objProduct->exportExcel();
        echo json_encode($data);
    }

    function getAllProductByType($typeId){
        $objProduct = $this->getModel('SanPhamDB');
        $data = $objProduct->getAllProduct();
        $result = array();

        foreach($data as $value){
            if($value['MALOAI'] == $typeId){
                $result[] = $value;
            }
        }

        echo json_encode($result);
    }

    /* ============================================================== */
    /* =====================TRANG THAI GIAO HANG ====================*/
    /* ============================================================== */


    function ThongKe()
    {
        require_once('./menuadmin.php');
        $this->View('AdminThongKe');
    }
    function DangNhap()
    {
        require_once('./menuadmin.php');
        $this->View('DangNhap');
    }
}
?>