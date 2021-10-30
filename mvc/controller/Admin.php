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
    function ThemPhieuNhap()
    {
        $this->View('AdminThemPhieuNhap','Admin Thêm Phiếu Nhập');
    }
    function TimKiemPhieuNhap()
    {
        $this->View('AdminTimKiemPhieuNhap','Admin Tìm Kiếm Phiếu Nhập');
    }
    function XemCHiTietPhieuNhap($id)
    {
        $this->View('AdminChiTietPhieuNhap','Admin Chi Tiết Phiếu Nhập',$id);
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