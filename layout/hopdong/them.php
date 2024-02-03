<?php
// Kết nối với cơ sở dữ liệu (bạn cần định nghĩa biến $connect trước đoạn mã này)



$sql_query_KH = "SELECT * FROM khachhang";
$query_KH = mysqli_query($connect, $sql_query_KH);

// Fetch the contract details you want to process.
$id = $_GET['id'];
$sql = "SELECT *
FROM xe,khachhang
WHERE xe.XeID = $id";

$query = mysqli_query($connect, $sql);
$row_up = mysqli_fetch_assoc($query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem các trường ngày có tồn tại và hợp lệ
    if (isset($_POST['NgayLapHD']) && isset($_POST['NgayTraXe'])) {
        $NgayLapHD = $_POST['NgayLapHD'];
        $NgayTraXe = $_POST['NgayTraXe'];
        
        // Kiểm tra ngày lập hợp đồng và ngày trả xe phải lớn hơn ngày hiện tại
        $today = date("Y-m-d");
        if ($NgayLapHD >= $today && $NgayTraXe >= $today) {
            // Tính toán tổng tiền, tiền cọc, và tiền còn lại
            $ngayLapHD = new DateTime($NgayLapHD);
            $ngayTraXe = new DateTime($NgayTraXe);
            $soNgay = (int)date_diff($ngayLapHD, $ngayTraXe)->format('%a') + 1;
            $GiaXe = $row_up['GiaXe'];
            $TongTien = $soNgay * $GiaXe;
            $TienCoc = $TongTien / 2;
            $TienConLai = $TienCoc;

            // Lấy dữ liệu khác từ form
            $KhachHangID = $_POST['KhachHangID'];
            $XeID = $row_up['XeID'];
            $DiaDiemNhanXe = $_POST['DiaDiemNhanXe'];
            $DiaDiemTraXe = $_POST['DiaDiemTraXe'];
          
            $trangthaihopdong = $_POST['trangthaihopdong'];

            // Thêm dữ liệu vào bảng hopdong
            $sql_insert_hopdong = "INSERT INTO hopdong (KhachHangID, XeID, NgayLapHD, NgayTraXe, DiaDiemNhanXe, DiaDiemTraXe, TongTien, TienCoc, TienConLai, trangthaihopdong) 
            VALUES ('$KhachHangID', '$XeID', '$NgayLapHD', '$NgayTraXe', '$DiaDiemNhanXe', '$DiaDiemTraXe', '$TongTien', '$TienCoc', '$TienConLai', '$TienTra', '$TinhTranghdID')";
            
            $query_insert_hopdong = mysqli_query($connect, $sql_insert_hopdong);


            if ($query_insert_hopdong) {
                // Cập nhật trạng thái của xe thành 'đang thuê' (TinhTrangXeID = 2)
                $sql_update_xe = "UPDATE xe SET TinhTrangXeID = 2 WHERE XeID = $XeID";
                $query_update_xe = mysqli_query($connect, $sql_update_xe);

                // Chuyển hướng về trang danh sách hợp đồng hoặc trang khác
                header('location: ac_hopdong.php?page_layout=view');
            } else {
                echo "Lỗi: " . mysqli_error($connect);
            }
        } else {
            echo "Ngày không hợp lệ.";
        }
    } else {
        echo "Vui lòng nhập ngày lập hợp đồng và ngày trả xe.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <!-- Thêm nội dung head của bạn tại đây -->
</head>
<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Tạo hợp đồng</h2>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                <div class="form-group">
                        <label for="TinhTranghdID">Tên khách hàng</label>
                        <select class="form-control" name="KhachHangID">
                            <?php
                            while($row_brand = mysqli_fetch_assoc($query_KH))
                            {?>
                                  <option value="<?php echo $row_brand['KhachHangID']; ?>"><?php echo $row_brand['HoTen']; ?></option>
                          <?php }
                            ?>
                        </select>
                    </div>
                <div class="form-group">
                    <label for="XeID">Xe</label>
                    <input type="text" name="XeID" class="form-control" readonly value="<?php echo $row_up['TenXe']; ?>">
                </div>
              
                <div class="form-group">
                    <label for="GiaXe">Giá Xe 1 ngày</label>
                    <input type="text" name="GiaXe" class="form-control" readonly value="<?php echo $row_up['GiaXe']; ?>">
                </div>

                    <div class="form-group">
                        <label for="NgayLapHD">Ngày lập hợp đồng</label>
                        <input type="date" name="NgayLapHD" class="form-control" id="NgayLapHD">
                    </div>

                    <div class="form-group">
                        <label for="NgayTraXe">Ngày trả xe</label>
                        <input type="date" name="NgayTraXe" class="form-control" id="NgayTraXe">
                    </div>

                    <div class="form-group">
                        <label for="DiaDiemNhanXe">Địa điểm nhận xe</label>
                        <input type="text" name="DiaDiemNhanXe" class= "form-control" id="DiaDiemNhanXe">
                    </div>

                    <div class="form-group">
                        <label for="DiaDiemTraXe">Địa điểm trả xe</label>
                        <input type="text" name="DiaDiemTraXe" class="form-control" id="DiaDiemTraXe">
                    </div>

                    <div class="from-group">
                        <label for="">Trạng thái hợp đồng</label>
                        <select name="trangthaihopdong" class="form-control" required>
                            <option value="Đã đóng 50%">Đã đóng 50%</option>
                            <option value="Hoàn thành">Hoàn thành</option>
                           
                        </select>
                    </div>
          

                    <div class="form-group">
                        <label for="TongTien">Tổng tiền</label>
                        <input type="text" name="TongTien" class="form-control" id="TongTien" readonly>
                    </div>

                    <div class="form-group">
                        <label for="TienCoc">Tiền cọc</label>
                        <input type="text" name="TienCoc" class="form-control" id="TienCoc" readonly>
                    </div>

                    <div class="form-group">
                        <label for="TienConLai">Tiền còn lại</label>
                        <input type="text" name="TienConLai" class="form-control" id="TienConLai" readonly>
                    </div>

            
                    <br>

                    <button name="sbm" class="btn btn-success" type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Bắt sự kiện khi ngày lập hợp đồng và ngày trả xe thay đổi
        document.getElementById('NgayLapHD').addEventListener('change', function () {
            updateTongTien();
        });

        document.getElementById('NgayTraXe').addEventListener('change', function () {
            updateTongTien();
        });

        // Hàm cập nhật tổng tiền, tiền cọc và tiền còn lại dựa trên ngày lập hợp đồng và ngày trả xe
        function updateTongTien() {
            var NgayLapHD = new Date(document.getElementById('NgayLapHD').value);
            var NgayTraXe = new Date(document.getElementById('NgayTraXe').value);
            var GiaXe = <?php echo $row_up['GiaXe']; ?>;
            
            if (!isNaN(NgayLapHD) && !isNaN(NgayTraXe) && GiaXe > 0) {
                 var soNgay = Math.ceil(((NgayTraXe - NgayLapHD)+1) / (1000 * 60 * 60 * 24));
                var TongTien = soNgay * GiaXe;
                var TienCoc = TongTien / 2;
                var TienConLai = TienCoc;

                document.getElementById('TongTien').value = TongTien;
                document.getElementById('TienCoc').value = TienCoc;
                document.getElementById('TienConLai').value = TienConLai;
            }
        }

        // Gọi hàm cập nhật khi trang được tải lần đầu
        updateTongTien();
    </script>
</body>
</html>
