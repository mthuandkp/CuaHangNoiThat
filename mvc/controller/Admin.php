<?php
class Admin extends Controller
{
    function __construct()
    {
        include_once('./menuadmin.php');
    }
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
        $this->View('AdminChiTietHoaDon', 'Admin Chi Tiết HĐ', $id);
    }
    function TimKiemHoaDon(){
        $this->View('AdminTimKiemHoaDon','Tìm kiếm hóa đơn');
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
        $this->View('AdminThemNhanVien','Admin Thêm Nhân Viên');
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