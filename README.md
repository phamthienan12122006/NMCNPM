<p align="center">
  <a href="https://hcmue.edu.vn/">
    <img src="./uploads/Logo_Trường_Đại_học_Sư_phạm_Thành_phố_Hồ_Chí_Minh.svg.png" width="360" alt="Logo Trường Đại học Sư phạm Thành phố Hồ Chí Minh">
  </a>
</p>

<p align="center">
  <strong>TRƯỜNG ĐẠI HỌC SƯ PHẠM THÀNH PHỐ HỒ CHÍ MINH</strong><br>
  <strong>KHOA CÔNG NGHỆ THÔNG TIN</strong>
</p>

<h1 align="center">WEBSITE QUẢN LÝ NHÀ HÀNG</h1>

<p align="center">
  <strong>Tiểu luận học phần Nhập môn Công nghệ phần mềm</strong><br>
  Nhóm 04 · Lớp học phần COMP1044GD05
</p>

## 1. Giới thiệu đề tài

Website quản lý nhà hàng hỗ trợ khách **đặt món** và **đặt bàn** trực tuyến. Khách có thể xem thực đơn, chọn món, ghi chú yêu cầu và theo dõi đơn hàng sau khi đặt.

Qua trang quản trị, nhà hàng có thể cập nhật thực đơn, tiếp nhận đơn hàng, xử lý yêu cầu đặt bàn và xem thống kê.

## 2. Thông tin nhóm thực hiện

**Giảng viên hướng dẫn** · ThS. Lê Thanh Thoại

| STT | Họ và tên | Mã sinh viên | Lớp |
|:---:|---|:---:|:---:|
| 1 | Phạm Thiên Ân | 50.01.104.003 | 50.01.CNTT.C |
| 2 | Lý Ngọc My | 50.01.104.092 | 50.01.CNTT.C |
| 3 | Nguyễn Khánh Ngọc | 50.01.104.101 | 50.01.CNTT.D |
| 4 | Phạm Yến Nhi | 50.01.104.111 | 50.01.CNTT.C |
| 5 | Nguyễn Thị Thanh Xuân | 50.01.104.185 | 50.01.CNTT.C |

## 3. Chức năng chính

### Dành cho khách hàng

- **Xem thực đơn** – Xem món theo danh mục, lưu món yêu thích và đánh giá món ăn.
- **Đặt món** – Thêm món vào giỏ hàng, điều chỉnh số lượng, ghi chú cho nhà hàng và áp dụng mã giảm giá.
- **Thanh toán và theo dõi đơn** – Thanh toán trực tuyến qua PayOS, theo dõi trạng thái đơn và tra cứu lịch sử thanh toán.
- **Đặt bàn** – Gửi yêu cầu đặt bàn trước để nhà hàng tiếp nhận.
- **Quản lý tài khoản** – Đăng ký, đăng nhập, cập nhật hồ sơ và khôi phục mật khẩu.

### Dành cho quản trị viên

- **Quản lý thực đơn** – Cập nhật danh mục, thông tin món ăn và thực đơn theo ngày.
- **Xử lý đơn hàng** – Xem chi tiết từng đơn, cập nhật trạng thái và kiểm tra thanh toán.
- **Quản lý đặt bàn** – Tiếp nhận yêu cầu và cập nhật tình trạng đặt bàn.
- **Quản lý khách hàng và ưu đãi** – Quản lý tài khoản, theo dõi đánh giá món ăn và thiết lập mã giảm giá.
- **Thống kê** – Theo dõi số liệu hoạt động của nhà hàng.

## 4. Kiến trúc hệ thống

Khi khách gửi đơn, mã PHP trên máy chủ tiếp nhận thông tin giỏ hàng và lưu đơn vào MySQL. Quản trị viên mở đơn trong trang quản lý để cập nhật trạng thái. Khách có thể xem trạng thái mới trong mục **Đơn hàng của tôi**.

| Thành phần | Vai trò |
|---|---|
| Giao diện khách hàng | Hiển thị thực đơn, giỏ hàng, biểu mẫu đặt bàn và lịch sử đơn. |
| Xử lý phía máy chủ | Tiếp nhận yêu cầu, xử lý nghiệp vụ đặt món và kết nối với PayOS. |
| Cơ sở dữ liệu | Lưu thông tin tài khoản, món ăn, giỏ hàng, đơn hàng, đánh giá và lịch đặt bàn. |
| Giao diện quản trị | Giúp nhà hàng quản lý thực đơn, xử lý đơn và theo dõi yêu cầu đặt bàn. |

## 5. Công nghệ sử dụng

| Thành phần | Công nghệ |
|---|---|
| Giao diện | HTML, CSS, JavaScript |
| Xử lý phía máy chủ | PHP |
| Cơ sở dữ liệu | MySQL |
| Kết nối PHP với MySQL | MySQLi |
| Thanh toán trực tuyến | PayOS |
| Quản lý thư viện PHP | Composer |

## 6. Cấu trúc thư mục chính

```text
NMCNPM/
├── assets/                  # CSS, JavaScript và hình ảnh giao diện
├── database/
│   └── database.sql         # Cấu trúc bảng và dữ liệu ban đầu
├── src/
│   ├── admin/               # Các trang quản trị nhà hàng
│   ├── api/                 # Xử lý yêu cầu từ website và PayOS
│   └── includes/            # Cấu hình và mã PHP dùng chung
├── uploads/                 # Hình ảnh được tải lên
├── menu.php                 # Thực đơn
├── order.php                # Đặt món
├── my_orders.php            # Theo dõi đơn hàng
├── reservation.php          # Đặt bàn
├── .env.example             # Mẫu cấu hình kết nối
├── composer.json            # Danh sách thư viện PHP
└── start_server.bat         # Khởi động website trên Windows
```

## 7. Hướng dẫn chạy chương trình trên Windows

### Bước 1. Tải mã nguồn

Trên GitHub, chọn **Code → Download ZIP** rồi giải nén. Mở thư mục có chứa `start_server.bat` và `.env.example`.

### Bước 2. Khởi tạo cơ sở dữ liệu

Khởi động MySQL. Mở **MySQL Workbench** hoặc **phpMyAdmin** và chạy lệnh sau để tạo cơ sở dữ liệu:

```sql
CREATE DATABASE gourmet_local CHARACTER SET utf8mb4;
```

Chọn cơ sở dữ liệu `gourmet_local`, sau đó nhập tập tin [`database/database.sql`](./database/database.sql) để tạo bảng và nạp dữ liệu ban đầu.

### Bước 3. Cấu hình kết nối

Nếu thư mục dự án chưa có tập tin `.env`, mở **PowerShell** tại thư mục chứa `start_server.bat` và chạy:

```powershell
Copy-Item .env.example .env
```

Mở `.env` và điền thông tin kết nối MySQL trên máy:

| Biến cấu hình | Giá trị cần điền |
|---|---|
| `DB_HOST` | `127.0.0.1` nếu MySQL chạy trên cùng máy |
| `DB_PORT` | Cổng MySQL đang sử dụng, thường là `3306` |
| `DB_NAME` | `gourmet_local` |
| `DB_USER` | Tên tài khoản MySQL |
| `DB_PASS` | Mật khẩu của tài khoản MySQL |

Để thử **thanh toán trực tuyến**, điền thêm thông tin PayOS trong `.env` và cấu hình địa chỉ webhook mà PayOS có thể truy cập từ Internet.

### Bước 4. Khởi động và chạy thử

Trong PowerShell, chạy:

```powershell
.\start_server.bat
```

Giữ cửa sổ PowerShell đang mở và truy cập [trang đăng nhập](http://localhost:8000/login.php). Để kiểm tra, đăng ký tài khoản khách hàng, mở thực đơn, chọn một món rồi xem món đó trong giỏ hàng.

Để **dừng website**, quay lại cửa sổ PowerShell và nhấn `Ctrl + C`.
