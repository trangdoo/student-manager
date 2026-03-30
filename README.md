# Student Manager (Plugin)

Plugin này đăng ký Custom Post Type `Sinh viên` và cung cấp metabox để nhập dữ liệu MSSV, Lớp, Ngày sinh; đồng thời cung cấp shortcode `[danh_sach_sinh_vien]` để hiển thị danh sách dưới dạng bảng.

Thư mục plugin: `wp-content/plugins/student-manager/`

Hướng dẫn nhanh:

- Kích hoạt plugin: Copy thư mục `student-manager` vào `wp-content/plugins/` và kích hoạt trong Dashboard → Plugins.
- Tạo Sinh viên: Dashboard → Sinh viên → Thêm mới. Nhập `Họ tên` (title), `Tiểu sử` (editor), và phần `Thông tin sinh viên` (MSSV, Lớp, Ngày sinh).
- Hiển thị danh sách: Chèn shortcode `[danh_sach_sinh_vien]` vào một Page.

Files chính đã tạo:

- [student-manager.php](student-manager.php)
- [includes/cpt.php](includes/cpt.php)
- [includes/meta-boxes.php](includes/meta-boxes.php)
- [includes/shortcode.php](includes/shortcode.php)
- [assets/css/style.css](assets/css/style.css)

Zip & Git

1) Tạo file nén (.zip) chứa plugin:

