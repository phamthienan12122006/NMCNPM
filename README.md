<p align="center">
  <a href="https://hcmue.edu.vn/" title="Trường Đại học Sư Phạm TP.HCM" style="border: none;">
    <img src="./uploads/Logo_Trường_Đại_học_Sư_phạm_Thành_phố_Hồ_Chí_Minh.svg.png" alt="Trường Đại học Sư Phạm TP.HCM | Ho Chi Minh City University of Education">
  </a>
</p>
<p align="center"><strong>Trường Đại học Sư phạm Thành phố Hồ Chí Minh</strong><br>Nhập môn Công nghệ phần mềm · Nhóm 04</p>
# Website đặt món ăn nhà hàng Gourmet

## Giới thiệu

**CanTinAgile** là website đặt món ăn cho nhà hàng Gourmet, được Nhóm 04 thực hiện trong học phần **Nhập môn Công nghệ phần mềm**. Khách hàng có thể xem thực đơn, chọn món, ghi chú yêu cầu và theo dõi đơn hàng ngay trên website. Với khách muốn dùng bữa tại nhà hàng, hệ thống còn hỗ trợ đặt bàn trước.

Phía nhà hàng sử dụng trang quản trị để cập nhật món ăn, xử lý đơn hàng, quản lý lịch đặt bàn và theo dõi tình hình kinh doanh.

### Giảng viên hướng dẫn

- Thầy Lê Thanh Thoại

### Sinh viên thực hiện

| STT | Họ và tên | Công việc phụ trách |
|:---:|---|---|
| 1 | Lý Ngọc Mỹ | Nhóm trưởng, theo dõi tiến độ, tích hợp thanh toán PayOS và xây dựng chức năng thống kê. |
| 2 | Nguyễn Nhật Nam | Thiết kế giao diện khách hàng, phụ trách trang chủ, thực đơn và giỏ hàng. |
| 3 | Nguyễn Như Xuân | Xây dựng chức năng đăng nhập, đăng ký, xử lý giỏ hàng và truy xuất dữ liệu. |
| 4 | Phạm Phương Nam | Xây dựng chức năng đặt bàn, mã giảm giá, lịch sử đơn hàng và tập tin khởi động website. |
| 5 | Đặng Hoàng Phúc | Thiết kế cơ sở dữ liệu, xây dựng các trang quản trị và kiểm thử hệ thống. |

## Chức năng chính

### Dành cho khách hàng

- **Tài khoản** – Đăng ký, đăng nhập, khôi phục mật khẩu và cập nhật hồ sơ cá nhân.
- **Thực đơn** – Xem món ăn theo danh mục, lưu món yêu thích và đánh giá món ăn.
- **Giỏ hàng và đặt món** – Chọn món, điều chỉnh số lượng, thêm ghi chú cho nhà hàng và áp dụng mã giảm giá trước khi đặt đơn.
- **Thanh toán và theo dõi đơn** – Thanh toán trực tuyến qua PayOS, xem trạng thái đơn đã đặt và tra cứu lịch sử thanh toán.
- **Đặt bàn** – Gửi yêu cầu đặt bàn trước để nhà hàng tiếp nhận và xử lý.

### Dành cho quản trị viên

- **Quản lý thực đơn** – Cập nhật món ăn, danh mục món và thực đơn theo ngày.
- **Quản lý đơn hàng** – Xem chi tiết đơn, cập nhật trạng thái xử lý và theo dõi thanh toán.
- **Quản lý đặt bàn** – Xem danh sách yêu cầu và cập nhật tình trạng đặt bàn.
- **Quản lý khách hàng và ưu đãi** – Quản lý tài khoản, đánh giá món ăn và mã giảm giá.
- **Thống kê** – Xem số liệu hoạt động của nhà hàng trên trang quản trị.

## Kiến trúc hệ thống

Khi khách chọn món và gửi đơn, giao diện chuyển yêu cầu đến mã PHP trên máy chủ. Máy chủ xử lý giỏ hàng và ghi thông tin đơn vào MySQL. Quản trị viên có thể mở đơn đó để cập nhật trạng thái, còn khách hàng xem lại kết quả trong mục đơn hàng của mình.

| Thành phần | Nhiệm vụ | Vị trí trong dự án |
|---|---|---|
| Giao diện khách hàng | Hiển thị thực đơn, giỏ hàng, lịch sử đơn và biểu mẫu đặt bàn | `menu.php`, `order.php`, `my_orders.php`, `reservation.php` |
| Xử lý nghiệp vụ | Tiếp nhận yêu cầu, xử lý dữ liệu và dùng chung cấu hình kết nối | `src/api/`, `src/includes/` |
| Quản trị nhà hàng | Quản lý thực đơn, đơn hàng, đặt bàn, thanh toán và thống kê | `src/admin/` |
| Cơ sở dữ liệu | Lưu tài khoản, món ăn, giỏ hàng, đơn hàng, đánh giá và lịch đặt bàn | `database/database.sql` |

## Công nghệ sử dụng

| Thành phần | Công nghệ |
|---|---|
| Giao diện | HTML, CSS, JavaScript |
| Xử lý phía máy chủ | PHP |
| Cơ sở dữ liệu | MySQL |
| Kết nối cơ sở dữ liệu | MySQLi |
| Thanh toán trực tuyến | PayOS |
| Quản lý thư viện PHP | Composer |

## 📂 Cấu trúc thư mục chính

| Thư mục hoặc tập tin | Nội dung |
|---|---|
| [`assets/`](./assets/) | Hình ảnh, CSS và JavaScript dùng cho giao diện. |
| [`database/`](./database/) | Các tập lệnh SQL tạo bảng và nạp dữ liệu ban đầu. |
| [`src/admin/`](./src/admin/) | Các trang quản trị nhà hàng. |
| [`src/api/`](./src/api/) | Các chức năng xử lý yêu cầu từ website và cổng thanh toán. |
| [`src/includes/`](./src/includes/) | Cấu hình kết nối và các thành phần PHP dùng chung. |
| [`uploads/`](./uploads/) | Hình ảnh được tải lên website. |
| [`start_server.bat`](./start_server.bat) | Tập tin khởi động máy chủ PHP trên Windows. |
| [`.env.example`](./.env.example) | Mẫu cấu hình kết nối cơ sở dữ liệu và dịch vụ bên ngoài. |

## Hướng dẫn chạy trên Windows

### Bước 1. Tải mã nguồn

Trên trang GitHub của dự án, chọn **Code → Download ZIP** rồi giải nén. Mở thư mục chứa `start_server.bat`, `.env.example` và `composer.json`. Đây là thư mục dùng để chạy các lệnh PowerShell bên dưới.

### Bước 2. Khởi tạo cơ sở dữ liệu

Khởi động MySQL. Mở MySQL Workbench hoặc phpMyAdmin và tạo cơ sở dữ liệu cho website:

```sql
CREATE DATABASE gourmet_local CHARACTER SET utf8mb4;
```

Chọn cơ sở dữ liệu `gourmet_local`, sau đó nhập tập tin [`database/database.sql`](./database/database.sql) để tạo các bảng và nạp dữ liệu ban đầu.

### Bước 3. Cấu hình kết nối

Mở tập tin `.env` trong thư mục dự án. Nếu máy chưa có tập tin này, mở PowerShell tại thư mục chứa `start_server.bat` và chạy:

```powershell
Copy-Item .env.example .env
```

Điền các thông số MySQL của máy vào `.env`:

| Biến | Giá trị cần điền |
|---|---|
| `DB_HOST` | `127.0.0.1` nếu MySQL chạy trên cùng máy |
| `DB_PORT` | Cổng MySQL đang sử dụng, mặc định là `3306` |
| `DB_NAME` | `gourmet_local` |
| `DB_USER` | Tên tài khoản MySQL |
| `DB_PASS` | Mật khẩu của tài khoản MySQL |

Để thử chức năng thanh toán trực tuyến, cấu hình thêm thông tin PayOS trong `.env` và dùng địa chỉ webhook mà PayOS có thể truy cập từ Internet.

### Bước 4. Khởi động website

Trong PowerShell, chạy:

```powershell
.\start_server.bat
```

Giữ cửa sổ PowerShell đang mở, sau đó truy cập [trang đăng nhập](http://localhost:8000/login.php). Để thử luồng đặt món, đăng ký tài khoản khách hàng, mở thực đơn, chọn một món rồi kiểm tra giỏ hàng.

Khi muốn tắt website, quay lại cửa sổ PowerShell và nhấn **Ctrl + C**.
