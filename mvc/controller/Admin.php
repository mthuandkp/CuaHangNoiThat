<?php
class Admin extends Controller{
    function display()
    {
        $this->View('AdminTrangChu', 'Trang Chủ');
    }
    /* ===========================HOA DON================================ */
    function HoaDon()
    {
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

        $this->View('AdminChiTietHoaDon', 'Admin Chi Tiết HĐ', $data);
    }
    function TimKiemHoaDon(){
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
        $this->View('AdminKhachHang','Admin Khách Hàng');
    }
    function ThemKhachHang(){
        $this->View('AdminThemKhachHang','Admin Thêm Khách Hàng');
    }
    function TimKiemKhachHang(){
        $this->View('AdminTimKiemKhachHang','Admin Tìm kiếm khách hàng');
    }
    function SuaKhachHang($id){
        $this->View('AdminSuaKhachHang','Admin sửa khách hàng',$id);
    }
    /*===================================================================== */
    /*============================== KHUYEN MAI ============================ */
    function KhuyenMai()
    {
        $this->View('AdminKhuyenMai','Admin Khuyến Mãi');
    }
    function ThemKhuyenMai(){
        $this->View('AdminThemKhuyenMai','Admin Thêm Khuyến mãi');
    }
    function TimKiemKhuyenMai(){
        $this->View('AdminTimKiemKhuyenMai','Admin Tìm kiếm Khuyến mãi');
    }
    function SuaKhuyenMai($id){
        $this->View('AdminSuaKhuyenMai','Admin sửa Khuyến mãi',$id);
    }
    /*===================================================================== */
    /*============================== LOAI SAN PHAM ============================ */
    function LoaiSanPham()
    {
        $this->View('AdminLoaiSanPham','Admin Loại Sản Phẩm');
    }
    function ThemLoaiSanPham()
    {
        $this->View('AdminThemLoaiSanPham','Admin Thêm Loại Sản Phẩm');
    }
    function SuaLoaiSanPham($id)
    {
        $this->View('AdminSuaLoaiSanPham','Admin Sửa Loại Sản Phẩm',$id);
    }
    /*========================================================================= */
    /*============================== NHA CUNG CAP ============================ */
    function NhaCungCap()
    {
        $this->View('AdminNhaCungCap','Admin Nhà Cung Cấp');
    }
    function ThemNhaCungCap()
    {
        $this->View('AdminThemNhaCungCap','Admin Thêm Nhà Cung Cấp');
    }
    function SuaNhaCungCap($id)
    {
        $this->View('AdminSuaNhaCungCap','Admin Sửa Nhà Cung Cấp',$id);
    }
    /*========================================================================= */

    /* =========================NHAN VIEN===================================*/
    function NhanVien()
    {
        $this->View('AdminNhanVien','Admin nhân viên');
    }
    function ThemNhanVien(){
        $data = array();
        $obj = $this->getModel('QuyenDB');
        $data['Right'] = $obj->getAllRight();
        $this->View('AdminThemNhanVien','Admin Thêm Nhân Viên',$data);
    }
    function TimKiemNhanVien(){
        $this->View('AdminTimKiemNhanVien','Admin Tìm kiếm nhân viên');
    }
    function SuaNhanVien($id){
        $this->View('AdminSuaNhanVien','Admin sửa nhân viên',$id);
    }
    /* ============================================================*/
    /* ========================== PHIEU NHAP==================================*/
    function PhieuNhap()
    {
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
        $this->View('AdminThemPhieuNhap','Admin Thêm Phiếu Nhập',$data);
    }
    function TimKiemPhieuNhap()
    {
        $this->View('AdminTimKiemPhieuNhap','Admin Tìm Kiếm Phiếu Nhập');
    }
    function XemCHiTietPhieuNhap($id)
    {
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
    /* ============================================================*/
    /* =========================SAN PHAM===================================*/
    function SanPham()
    {
        $this->View('AdminSanPham', 'Admin Sản Phẩm');
    }
    function ThemSanPham()
    {
        $this->View('AdminThemSanPham', 'Admin Thêm Sản Phẩm');
    }
    function TimKiemSanPham()
    {
        $this->View('AdminTimKiemSanPham', 'Admin Tìm Kiếm Sản Phẩm');
    }
    function SuaSanPham($id)
    {
        $this->View('AdminSuaSanPham', 'Admin Sửa Sản Phẩm', $id);
    }
    function GoiYThemSP()
    {
        $this->View('AdminGoiYThemSanPham', 'Admin Gợi ý thêm sản phẩm');
    }

    function uploadImage(){
        $objProduct = $this->getModel("SanPhamDB");
        if($objProduct->uploadImage($_FILES['file'])){
            echo 0;
        }
        else{
            echo -1;
        }
    }
    /* ============================================================== */
    /* =====================TRANG THAI GIAO HANG ====================*/
    /* ============================================================== */


    function ThongKe()
    {
        $this->View('AdminThongKe');
    }
    function DangNhap()
    {
        $this->View('DangNhap');
    }
}
?>