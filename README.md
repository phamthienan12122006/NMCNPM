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

## 7. Hướng dẫn chạy website trên Windows

Hướng dẫn này dành cho người lần đầu tải dự án về máy. Bạn chỉ cần trình duyệt, XAMPP và mã nguồn tải từ GitHub. Bản dự án đã có sẵn PHP cho Windows 64-bit và các thư viện cần thiết.

**Lần đầu sử dụng**, thực hiện từ bước 1 đến bước 6. **Từ lần thứ hai**, làm theo mục **Mở lại website sau khi tắt máy** ở cuối phần này.

### Bước 1. Tải và giải nén mã nguồn

1. Mở [trang GitHub của dự án](https://github.com/phamthienan12122006/NMCNPM).
2. Bấm nút màu xanh **Code**, sau đó chọn **Download ZIP**.
3. Khi tải xong, mở thư mục **Downloads** trên máy.
4. Nhấp chuột phải vào file ZIP vừa tải → chọn **Extract All…** → bấm **Extract**.
5. Mở thư mục vừa giải nén. Nếu bên trong còn một thư mục nữa, tiếp tục mở đến khi thấy các mục sau nằm **cùng một chỗ**:

   - `start_server.bat`
   - `.env.example`
   - Thư mục `database`
   - Thư mục `php-8.5.1-nts-Win32-vs17-x64`
   - Thư mục `vendor`

**Hãy giữ cửa sổ thư mục này đang mở.** Từ đây, cụm từ **thư mục dự án** chỉ thư mục đang chứa `start_server.bat`. Bạn có thể để dự án ngay trong Downloads.

### Bước 2. Cài XAMPP và bật cơ sở dữ liệu

Nếu máy đã có **XAMPP**, bắt đầu từ mục 4 bên dưới.

1. Mở [trang tải XAMPP](https://www.apachefriends.org/download.html) và chọn bản dành cho **Windows**.
2. Mở file cài đặt vừa tải. Khi trình cài đặt hiện ra, bấm **Next**. Giữ các thành phần **Apache**, **MySQL** và **phpMyAdmin** được chọn.
3. Giữ thư mục cài đặt mặc định `C:\xampp`. Tiếp tục bấm **Next** để cài, sau đó bấm **Finish**.
4. Mở menu **Start** của Windows, gõ `XAMPP Control Panel` rồi mở ứng dụng đó.
5. Trong bảng điều khiển, tìm dòng **Apache** → bấm **Start**. Tiếp theo, tìm dòng **MySQL** → bấm **Start**.
6. Khi cả hai dòng chuyển sang màu xanh và nút bên cạnh đổi thành **Stop**, mở trình duyệt và truy cập [phpMyAdmin](http://localhost/phpmyadmin/).

**Bạn đã làm đúng khi** trình duyệt hiện trang phpMyAdmin với danh sách cơ sở dữ liệu ở bên trái. Đây là nơi chuẩn bị dữ liệu. Website nhà hàng sẽ được mở riêng ở bước 6.

### Bước 3. Tạo cơ sở dữ liệu và nhập các bảng của dự án

**Tạo cơ sở dữ liệu**

1. Trong phpMyAdmin, bấm **New** hoặc **Mới** ở phía trên danh sách bên trái.
2. Ở ô **Database name** hoặc **Tên cơ sở dữ liệu**, nhập chính xác `gourmet_local`.
3. Nếu có ô chọn kiểu đối chiếu ở bên cạnh, chọn `utf8mb4_unicode_ci`.
4. Bấm **Create** hoặc **Tạo**. Tên `gourmet_local` sẽ xuất hiện ở cột bên trái.

**Nhập các bảng**

1. Bấm vào **gourmet_local** ở cột bên trái. Kiểm tra phía trên trang đang hiển thị tên cơ sở dữ liệu này.
2. Bấm tab **Import** hoặc **Nhập** trên thanh phía trên.
3. Bấm **Choose File** hoặc **Chọn tệp**.
4. Trong cửa sổ chọn file, mở **thư mục dự án** ở bước 1 → mở thư mục `database` → chọn file **`database.sql`** → bấm **Open**.
5. Cuộn xuống cuối trang phpMyAdmin rồi bấm **Import** hoặc **Go**.
6. Sau khi nhập xong, bấm lại **gourmet_local** ở bên trái. Bạn sẽ thấy các bảng như `accounts`, `products`, `orders` và `order_items`.

**Bạn đã làm đúng khi** thấy tên các bảng. File SQL tạo cấu trúc dữ liệu, vì vậy bảng `products` có thể đang trống.

### Bước 4. Cấu hình để website kết nối đúng cơ sở dữ liệu

1. Quay lại cửa sổ **thư mục dự án** đã mở ở bước 1.
2. Bấm vào **thanh địa chỉ** phía trên cửa sổ, nơi đang hiển thị đường dẫn thư mục. Gõ `powershell` rồi nhấn **Enter**. Một cửa sổ PowerShell sẽ mở ngay tại thư mục đó.
3. Copy dòng lệnh dưới đây, dán vào PowerShell rồi nhấn **Enter**. Lệnh này tạo file `.env` từ bản mẫu nếu file chưa tồn tại.

   ```powershell
   if (!(Test-Path .env)) { Copy-Item .env.example .env }
   ```

4. Tiếp tục chạy lệnh sau để mở đúng file `.env` bằng Notepad:

   ```powershell
   notepad .env
   ```

5. Trong Notepad, tìm các dòng bắt đầu bằng `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER` và `DB_PASS`. Sửa giá trị của **năm dòng hiện có** như bên dưới. Đây là cấu hình cho XAMPP cài mới trên cùng máy, dùng tài khoản `root` chưa đặt mật khẩu:

   ```dotenv
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_NAME=gourmet_local
   DB_USER=root
   DB_PASS=
   ```

   Nếu bạn đã đặt mật khẩu cho tài khoản MySQL `root`, hãy nhập mật khẩu đó ngay sau `DB_PASS=`. Nếu MySQL đang dùng cổng khác `3306`, điền cổng hiển thị ở dòng **MySQL** trong XAMPP.

6. Nhấn **Ctrl + S** để lưu rồi đóng Notepad. Giữ cửa sổ PowerShell đang mở để làm bước tiếp theo.

### Bước 5. Khởi động website

1. Kiểm tra dòng **MySQL** trong XAMPP vẫn đang màu xanh.
2. Quay lại cửa sổ PowerShell ở bước 4, dán lệnh sau rồi nhấn **Enter**:

   ```powershell
   .\start_server.bat
   ```

3. Chờ đến khi cửa sổ hiển thị thông báo máy chủ PHP đã khởi động tại `http://localhost:8000`.
4. **Giữ cửa sổ PowerShell đang mở** trong suốt thời gian dùng website. Bạn có thể thu nhỏ cửa sổ xuống thanh tác vụ.

### Bước 6. Mở website và kiểm tra lần đầu

1. Mở Chrome hoặc Edge và truy cập **[trang đăng nhập của website](http://localhost:8000/login.php)**.
2. Chọn **Đăng ký**, nhập thông tin cho một tài khoản thử và hoàn tất đăng ký.
3. Đăng nhập bằng tài khoản vừa tạo.
4. Để kiểm tra tài khoản đã được lưu, quay lại tab **phpMyAdmin** → bấm **gourmet_local** → chọn bảng **accounts** → bấm **Browse** hoặc **Duyệt**.
5. Tìm tên tài khoản bạn vừa đăng ký. Nếu thấy dòng mới trong `accounts`, website đã ghi dữ liệu vào đúng cơ sở dữ liệu trên máy.

### Mở lại website sau khi tắt máy

Bạn chỉ cần khởi động lại các chương trình đã cài:

1. Mở **XAMPP Control Panel** → bấm **Start** ở dòng **MySQL**. Nếu muốn mở cả phpMyAdmin để xem dữ liệu, bật thêm **Apache**.
2. Mở **thư mục dự án** → nhấp đúp vào `start_server.bat` và giữ cửa sổ đó đang mở.
3. Truy cập [http://localhost:8000/login.php](http://localhost:8000/login.php) rồi đăng nhập bằng tài khoản đã tạo.

### Tắt website sau khi sử dụng

1. Quay lại cửa sổ đang chạy website và nhấn **Ctrl + C**. Nếu hiện câu hỏi `Terminate batch job (Y/N)?`, gõ `Y` rồi nhấn **Enter**.
2. Nếu đã dùng xong cơ sở dữ liệu, mở **XAMPP Control Panel** và bấm **Stop** ở các dòng **MySQL** và **Apache** đang chạy.

### Nếu gặp lỗi

| Hiện tượng | Cách kiểm tra |
|---|---|
| PowerShell báo không tìm thấy `start_server.bat` | Quay lại thư mục có file `start_server.bat`. Bấm thanh địa chỉ, gõ `powershell`, nhấn **Enter** rồi chạy lại lệnh ở bước 5. |
| Trình duyệt không mở được `localhost/phpmyadmin` | Mở XAMPP và kiểm tra dòng **Apache** đã chuyển sang màu xanh. |
| Trình duyệt không mở được `localhost:8000` | Kiểm tra cửa sổ chạy `start_server.bat` còn mở và đã báo máy chủ khởi động. |
| Website báo lỗi kết nối cơ sở dữ liệu | Kiểm tra dòng **MySQL** trong XAMPP đang màu xanh. Mở `.env` và đối chiếu tên cơ sở dữ liệu, cổng, tài khoản, mật khẩu với bước 4. |
| Website báo thiếu bảng `accounts` hoặc `products` | Mở phpMyAdmin → chọn **gourmet_local**. Nếu chưa thấy các bảng, thực hiện lại phần **Nhập các bảng** ở bước 3. |
