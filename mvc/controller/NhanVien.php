<?php
class NhanVien extends Controller
{
    function display()
    {
        require_once('./menuStaff.php');
        $this->View('NhanVienTrangChu', 'Trang Chủ Nhân Viên');
    }

    function DangNhap(){
        require_once('./menuStaff.php');
        $this->View('NhanVienDangNhap');
    }

    function DangXuat(){
        if (isset($_SESSION['staff'])) {
            unset($_SESSION['staff']);
        }
        echo '<script>window.location.href="/CuaHangNoiThat/NhanVien";</script>';
    }

    function SanPham(){
        if(!isset($_SESSION['staff']) || strpos($_SESSION['staff']['QUYEN'],'v_product') === false){
            $this->returnHome();
        }
        $objTypeProduct = $this->getModel("LoaiSanPhamDB");
        $data = array();
        $data['type'] = $objTypeProduct->getAllProductType();
        require_once('./menuStaff.php');
        $this->View('NhanVienSanPham', 'Trang Sản Phẩm Nhân Viên', $data);
    }

    function returnHome($url = ''){
        echo '<script>alert("Bạn không có quyền sử dụng chức năng này !!!!");window.location.href = "/CuaHangNoiThat/NhanVien'.($url == '' ? '':'/'.$url).'";</script>';
    }

    function SuaSanPham($id)
    {
        if (!isset($_SESSION['staff']) || strpos($_SESSION['staff']['QUYEN'],'e_product') === false) {
            echo '<script>alert("Bạn không có quyền thực hiên chức năng này !!!");window.location.href="/CuaHangNoiThat/NhanVien/SanPham";</script>';
        }
        $data = array();
        $objProduct = $this->getModel("SanPhamDB");
        $objTypeProduct = $this->getModel("LoaiSanPhamDB");

        $data['id'] = $id;
        $data['product'] = $objProduct->getProductById($id);
        $data['type'] = $objTypeProduct->getAllProductType();
        require_once('./menuStaff.php');
        $this->View('NhanVienSuaSanPham', 'Sửa Sản Phẩm Nhân Viên', $data);
    }

    function GoiYThemSP(){
        if(!isset($_SESSION['staff']) || strpos($_SESSION['staff']['QUYEN'],'ve_product') === false){
            $this->returnHome('SanPham');
        }
        require_once('./menuStaff.php');
        $this->View('NhanVienGoiYThemSanPham', 'Gợi ý thêm sản phẩm nhân viên');
    }

    function KhachHang()
    {
        if(!isset($_SESSION['staff']) || strpos($_SESSION['staff']['QUYEN'],'v_customer') === false){
            $this->returnHome();
        }
        require_once('./menuStaff.php');
        $this->View('NhanVienKhachHang', 'Khách Hàng Nhân Viên');
    }

    function HoaDon()
    {
        if(!isset($_SESSION['staff']) || strpos($_SESSION['staff']['QUYEN'],'v_bill') === false){
            $this->returnHome();
        }
        require_once('./menuStaff.php');
        $this->View('NhanVienHoaDon', 'Hóa Đơn Nhân Viên');
    }
    
    function XemChiTietHD($id)
    {
        if(!isset($_SESSION['staff']) || strpos($_SESSION['staff']['QUYEN'],'v_bill') === false){
            $this->returnHome('HoaDon');
        }
        $objBillDetail = $this->getModel('HoaDonDB');
        $bill = $objBillDetail->getBillById($id)[0];
        $objProduct = $this->getModel('SanPhamDB');
        $objSale = $this->getModel('KhuyenMaiDB');
        $data = $objBillDetail->getBillDetailById($id);
        foreach ($data as $key => $value) {
            $product = $objProduct->getProductById($value['MASP']);
            $data[$key]['TENSP'] = $product['TENSP'];
            $data[$key]['HINHANH'] = $product['HINHANH'];
        }
        $data['data'] = $data;
        $data['sale'] = $objSale->getSaleById($bill['MAKM']);
        require_once('./menuStaff.php');
        $this->View('NhanVienChiTietHoaDon', 'Chi Tiết HĐ - Nhân Viên', $data);
    }

    function KhuyenMai()
    {
        if(!isset($_SESSION['staff']) || strpos($_SESSION['staff']['QUYEN'],'v_sale') === false){
            $this->returnHome();
        }
        require_once('./menuStaff.php');
        $this->View('NhanVienKhuyenMai', 'Khuyến Mãi - Nhân Viên');
    }

    function ThemKhuyenMai()
    {
        if(!isset($_SESSION['staff']) || strpos($_SESSION['staff']['QUYEN'],'a_sale') === false){
            $this->returnHome('KhuyenMai');
        }
        require_once('./menuStaff.php');
        $this->View('NhanVienThemKhuyenMai', 'Admin Thêm Khuyến mãi');
    }

    function NhaCungCap()
    {
        if(!isset($_SESSION['staff']) || strpos($_SESSION['staff']['QUYEN'],'v_supplier') === false){
            $this->returnHome();
        }
        require_once('./menuStaff.php');
        $this->View('NhanVienNhaCungCap', 'Nhà Cung Cấp - Nhân Viên');
    }

    function ThemNhaCungCap()
    {
        if(!isset($_SESSION['staff']) || strpos($_SESSION['staff']['QUYEN'],'a_supplier') === false){
            $this->returnHome('NhaCungCap');
        }
        require_once('./menuStaff.php');
        $this->View('NhanVienThemNhaCungCap', 'Thêm Nhà Cung Cấp - Nhân Viên');
    }

    function SuaNhaCungCap($id)
    {
        if(!isset($_SESSION['staff']) || strpos($_SESSION['staff']['QUYEN'],'e_supplier') === false){
            $this->returnHome('NhaCungCap');
        }
        $objSupplier = $this->getModel("NhaCungCapDB");
        $supplier = $objSupplier->getSupplierById($id);
        require_once('./menuStaff.php');
        $this->View('NhanVienSuaNhaCungCap', 'Sửa Nhà Cung Cấp - Nhân Viên', $supplier);
    }

    function PhieuNhap()
    {
        if(!isset($_SESSION['staff']) || strpos($_SESSION['staff']['QUYEN'],'v_receipt') === false){
            $this->returnHome();
        }
        require_once('./menuStaff.php');
        $this->View('NhanVienPhieuNhap', 'Phiếu Nhập Nhân Viên');
    }

    function ThemPhieuNhap()
    {
        if(!isset($_SESSION['staff']) || strpos($_SESSION['staff']['QUYEN'],'a_receipt') === false){
            $this->returnHome();
        }
        $data = array();
        $objTypeProduct = $this->getModel('LoaiSanPhamDB');
        $objSupplier = $this->getModel('NhaCungCapDB');
        $objProduct = $this->getModel('SanPhamDB');

        $data['NCC'] = $objSupplier->getAllSupplier();
        $data['TypeProduct'] = $objTypeProduct->getAllProductType();
        $data['Product'] = $objProduct->getAllProduct();
        $data['NEXT_ID'] = $objProduct->createNextproductId();
        require_once('./menuStaff.php');
        $this->View('NhanVienThemPhieuNhap', 'Thêm Phiếu Nhập - Nhân Viên', $data);
    }

    function XemCHiTietPhieuNhap($id)
    {
        $objReceiptDetail = $this->getModel('PhieuNhapDB');
        $objProduct = $this->getModel('SanPhamDB');
        $objSale = $this->getModel('KhuyenMaiDB');
        $data = $objReceiptDetail->getReceiptDetailById($id);
        foreach ($data as $key => $value) {
            $product = $objProduct->getProductById($value['MASP']);
            $data[$key]['TENSP'] = $product['TENSP'];
            $data[$key]['HINHANH'] = $product['HINHANH'];
        }
        $data['data'] = $data;

        require_once('./menuStaff.php');
        $this->View('NhanVienChiTietPhieuNhap', 'Chi Tiết Phiếu Nhập - Nhân Viên', $data);
    }
}
?>