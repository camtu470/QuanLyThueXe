 
 <?php
$connect = mysqli_connect('localhost', 'root', '', 'thuexemain');
if ($connect) {
    mysqli_query($connect, "SET NAMES 'UTF8'");
    // echo "ket noi thanh cong";
} else {
    echo "KET NOI THAT BAI";
}


    $sql = "SELECT *
            FROM xe
            INNER JOIN loaixe ON xe.LoaiXeID = loaixe.LoaiXeID
            INNER JOIN tinhtrangxe ON xe.TinhTrangXeID = tinhtrangxe.TinhTrangXeID;";
    $query = mysqli_query($connect, $sql);

$sql = "SELECT *
  FROM xe
  INNER JOIN loaixe ON xe.LoaiXeID = loaixe.LoaiXeID ;";
$query = mysqli_query($connect, $sql);
?>

 <!-- xe List Start -->
  <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">Các dòng xe</h1>
                           
                        </div>
                    </div>
                  
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row">
                        <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query))
                     {
                        ?>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href="#"><img style="width: 350px; height: 320px;" class="img-fluid"
                                                   src="img/<?php echo $row['AnhXe']; ?>"
                                                   alt=""></a>
                                </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">Giá : <?php echo $row['GiaXe']; ?> VND</h5>
                                        <a class="d-block h5 mb-2" href="">Tên xe : <?php echo $row['TenXe']; ?></a>
                                        <!-- <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p> -->
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><?php echo $row['TenLoaiXe']; ?></small>
                                      
                                        <small class="flex-fill text-center border-end py-2"></i><?php if ($row['TinhTrangXeID'] != 3) { ?>
                                    <a href="ac_datxe.php?page_layout=them&id=<?php echo $row['XeID'] ?>">Đặt xe</a>
                                <?php } else { ?>
                                    <span></span>
                                <?php } ?> </small>

                                        <small class="flex-fill text-center border-end py-2"></i>    <?php if ($row['TinhTrangXeID'] == 1) { ?>
                                    <a href="ac_hopdong.php?page_layout=them1&id=<?php echo $row['XeID'] ?>">Tạo hợp đồng</a>
                                <?php } else { ?>
                                    <span></span>
                                <?php } ?></small>
                                    </div>
                                </div>
                            </div>

                            <?php
                    }
                    ?>
                         
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- xe List End -->