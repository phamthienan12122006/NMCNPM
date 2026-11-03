<p align="center">
  <a href="https://hcmue.edu.vn/" title="Trường Đại học Sư Phạm TP.HCM" style="border: none;">
    <img src="./uploads/Logo_Trường_Đại_học_Sư_phạm_Thành_phố_Hồ_Chí_Minh.svg.png" alt="Trường Đại học Sư Phạm TP.HCM | Ho Chi Minh City University of Education">
  </a>
</p>
<p align="center"><strong>Trường Đại học Sư phạm Thành phố Hồ Chí Minh</strong><br>Nhập môn Công nghệ phần mềm · Nhóm 04</p>
# Website quản lý nhà hàng

## Giới thiệu

Đây là đề tài tiểu luận của **Nhóm 04** trong học phần **Nhập môn Công nghệ phần mềm**, Khoa Công nghệ Thông tin, Trường Đại học Sư phạm TP. Hồ Chí Minh.

Website hỗ trợ hai hoạt động chính của nhà hàng là **đặt món** và **đặt bàn**. Khách hàng có thể xem thực đơn, thêm món vào giỏ hàng, gửi đơn và theo dõi quá trình xử lý. Qua trang quản trị, nhà hàng có thể cập nhật thực đơn, tiếp nhận đơn hàng, xử lý yêu cầu đặt bàn và xem thống kê.

### Thông tin học phần

- **Học phần:** Nhập môn Công nghệ phần mềm
- **Mã lớp học:** COMP1044GD05
- **Nhóm thực hiện:** 04
- **Giảng viên hướng dẫn:** ThS. Lê Thanh Thoại

### Sinh viên thực hiện

| STT | Họ và tên | Mã sinh viên | Lớp |
|:---:|---|---|---|
| 1 | Phạm Thiên Ân | 50.01.104.003 | 50.01.CNTT.C |
| 2 | Lý Ngọc Mỹ | 50.01.104.092 | 50.01.CNTT.C |
| 3 | Nguyễn Khánh Ngọc | 50.01.104.101 | 50.01.CNTT.D |
| 4 | Phạm Yến Nhi | 50.01.104.111 | 50.01.CNTT.C |
| 5 | Nguyễn Thị Thanh Xuân | 50.01.104.185 | 50.01.CNTT.C |

## Chức năng chính

**Đối với khách hàng**

- **Xem thực đơn:** Xem món ăn theo danh mục, lưu món yêu thích và gửi đánh giá.
- **Đặt món:** Thêm món vào giỏ hàng, điều chỉnh số lượng, ghi chú yêu cầu và áp dụng mã giảm giá.
- **Thanh toán và theo dõi đơn:** Thanh toán trực tuyến qua PayOS, xem trạng thái đơn đã đặt và tra cứu lịch sử thanh toán.
- **Đặt bàn:** Gửi yêu cầu đặt bàn trước cho nhà hàng.
- **Quản lý tài khoản:** Đăng ký, đăng nhập, cập nhật hồ sơ và khôi phục mật khẩu.

**Đối với quản trị viên**

- **Quản lý thực đơn:** Cập nhật danh mục, món ăn và thực đơn theo ngày.
- **Quản lý đơn hàng:** Xem chi tiết từng đơn, cập nhật trạng thái xử lý và kiểm tra thanh toán.
- **Quản lý đặt bàn:** Xem danh sách yêu cầu đặt bàn và cập nhật trạng thái.
- **Quản lý khách hàng:** Quản lý tài khoản, theo dõi đánh giá và thiết lập mã giảm giá.
- **Thống kê:** Xem số liệu hoạt động của nhà hàng trên trang quản trị.

## Kiến trúc hệ thống

Website sử dụng PHP để tạo giao diện và xử lý yêu cầu trên máy chủ. Khi khách gửi đơn, mã PHP tiếp nhận thông tin từ giỏ hàng và lưu đơn vào MySQL. Quản trị viên mở đơn trên trang quản lý để cập nhật trạng thái. Khách hàng có thể xem trạng thái đó trong mục đơn hàng của mình.

## Công nghệ sử dụng

| Thành phần | Công nghệ |
|---|---|
| Giao diện | HTML, CSS, JavaScript |
| Xử lý phía máy chủ | PHP |
| Cơ sở dữ liệu | MySQL |
| Kết nối PHP với MySQL | MySQLi |
| Thanh toán trực tuyến | PayOS |
| Quản lý thư viện PHP | Composer |

## 📂 Cấu trúc thư mục chính

```text
NMCNPM/
├── assets/                  # CSS, JavaScript và hình ảnh giao diện
├── database/
│   └── database.sql         # Tạo bảng và nạp dữ liệu ban đầu
├── src/
│   ├── admin/               # Các trang quản trị nhà hàng
│   ├── api/                 # Xử lý yêu cầu từ website và PayOS
│   └── includes/            # Cấu hình và mã PHP dùng chung
├── uploads/                 # Hình ảnh được tải lên
├── menu.php                 # Xem thực đơn
├── order.php                # Đặt món
├── my_orders.php            # Theo dõi đơn hàng
├── reservation.php          # Đặt bàn
├── .env.example             # Mẫu cấu hình kết nối
├── composer.json            # Khai báo thư viện PHP
└── start_server.bat         # Khởi động website trên Windows
```

## Hướng dẫn chạy chương trình trên Windows

### Bước 1. Tải mã nguồn

Trên GitHub, chọn **Code → Download ZIP** rồi giải nén. Mở thư mục có chứa `start_server.bat` và `.env.example`.

### Bước 2. Khởi tạo cơ sở dữ liệu

Khởi động MySQL. Trong MySQL Workbench hoặc phpMyAdmin, tạo cơ sở dữ liệu cho website:

```sql
CREATE DATABASE gourmet_local CHARACTER SET utf8mb4;
```

Chọn cơ sở dữ liệu `gourmet_local`, sau đó nhập tập tin [`database/database.sql`](./database/database.sql) để tạo bảng và nạp dữ liệu ban đầu.

### Bước 3. Cấu hình kết nối

Nếu thư mục dự án chưa có `.env`, mở PowerShell tại thư mục chứa `start_server.bat` và chạy:

```powershell
Copy-Item .env.example .env
```

Mở `.env`, đặt `DB_NAME=gourmet_local`, rồi điền `DB_HOST`, `DB_PORT`, `DB_USER` và `DB_PASS` theo cấu hình MySQL trên máy. Nếu muốn thử thanh toán trực tuyến, điền thêm thông tin PayOS và cấu hình địa chỉ webhook có thể truy cập từ Internet.

### Bước 4. Khởi động website

Trong PowerShell, chạy:

```powershell
.\start_server.bat
```

Giữ cửa sổ PowerShell đang mở và truy cập [trang đăng nhập](http://localhost:8000/login.php). Để kiểm tra luồng đặt món, đăng ký một tài khoản khách hàng, mở thực đơn và thêm một món vào giỏ hàng.

Khi muốn dừng website, nhấn `Ctrl + C` trong cửa sổ PowerShell.
Giữ cửa sổ PowerShell đang mở, sau đó truy cập [trang đăng nhập](http://localhost:8000/login.php). Để thử luồng đặt món, đăng ký tài khoản khách hàng, mở thực đơn, chọn một món rồi kiểm tra giỏ hàng.

Khi muốn tắt website, quay lại cửa sổ PowerShell và nhấn **Ctrl + C**.
