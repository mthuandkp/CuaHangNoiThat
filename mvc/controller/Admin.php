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

    function TimKiemHoaDon(){
        $this->View('AdminTimKiemHoaDon','Tìm kiếm hóa đơn');
    }
    /*===================================================================== */

    function KhachHang()
    {
        $this->View('AdminKhachHang');
    }
    function KhuyenMai()
    {
        $this->View('AdminKhuyenMai');
    }
    function LoaiSanPham()
    {
        $this->View('AdminLoaiSanPham');
    }
    function NhaCungCap()
    {
        $this->View('AdminNhaCungCap');
    }

    /* =========================NHAN VIEN===================================*/
    function NhanVien()
    {
        $this->View('AdminNhanVien','Admin nhân viên');
    }
    function ThemNhanVien(){
        $this->View('AdminThemNhanVien','Admin Thêm Nhân Viên');
    }
    /* ============================================================*/
    function PhieuNhap()
    {
        $this->View('AdminPhieuNhap');
    }
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
        $this->View('AdminGoiYThemSanPham', 'Gợi ý thêm sản phẩm');
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



    function XemChiTietHD($id)
    {
        $this->View('AdminChiTietHoaDon', 'Admin Chi Tiết HĐ', $id);
    }
}
?>