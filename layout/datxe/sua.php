<?php
$sql_query_tinhtrangthe = "SELECT KhachHangID, HoTen FROM khachhang";
$query_tinhtrangthe = mysqli_query($connect, $sql_query_tinhtrangthe);

$sql_query_xe = "SELECT XeID, TenXe FROM xe";
$query_xe = mysqli_query($connect, $sql_query_xe);

    $id = $_GET['id'];
    $sql_up = "SELECT * FROM datxe WHERE DatXeID = '$id'";
    $query_up = mysqli_query($connect, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['sbm']))
    {

       $KhachHangID =  $_POST['KhachHangID'];
       $XeID =  $_POST['XeID'];
       $NgayDat =  $_POST['NgayDat'];
       $NgayNhan =  $_POST['NgayNhan'];

       $sql = "UPDATE datxe SET KhachHangID = '$KhachHangID',XeID = '$XeID',NgayDat = '$NgayDat',NgayNhan = '$NgayNhan' WHERE DatXeID = $id";
        $query = mysqli_query($connect, $sql);
        header('location: ac_datxe.php?page_layout=view');
    }
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Sửa thông tin đặt xe</h2>
        </div>
        <div class="card-body">
           <form method="POST" enctype="multipart/form-data">
         
    
           <div class="from-group">
                <label for="">Khách hàng</label>
                <select class="form-control" name="KhachHangID">
                        <?php
                        while ($row_brand = mysqli_fetch_assoc($query_tinhtrangthe)) {
                            $selected = isset($_POST['KhachHangID']) && $_POST['KhachHangID'] == $row_brand['KhachHangID'] ? 'selected' : '';
                            echo "<option value='" . $row_brand['KhachHangID'] . "' $selected>" . $row_brand['HoTen'] . "</option>";
                        }
                        ?>
                    </select>
            </div>


                  
            <div class="from-group">
                <label for="">Tên xe</label>
                <select class="form-control" name="XeID">
                        <?php
                        while ($row_brand = mysqli_fetch_assoc($query_xe)) {
                            $selected = isset($_POST['XeID']) && $_POST['XeID'] == $row_brand['XeID'] ? 'selected' : '';
                            echo "<option value='" . $row_brand['XeID'] . "' $selected>" . $row_brand['TenXe'] . "</option>";
                        }
                        ?>
                    </select>
            </div>
    
    

            <div class="from-group">
                <label for="">Ngày đặt</label>
                <input type="date" name="NgayDat" class="form-control" required value="<?php echo $row_up['NgayDat']; ?>">
            </div>
           
            <div class="from-group">
                <label for="">Ngày nhận</label>
                <input type="date" name="NgayNhan" class="form-control" required value="<?php echo $row_up['NgayNhan']; ?>">
            </div>
            <br>
    
            <button name="sbm" class="btn btn-success" type="submit">Lưu</button>


           </form>   
            
        </div>

    </div>
</div>