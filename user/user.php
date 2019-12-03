<?php
    session_start();

    require_once('../conn.php');

    if(!isset($_SESSION['username']))
    {
        header('Location: login.php');
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="user.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="application">

        <div class="header">
            
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php" style="margin-left: 10px">PHÒNG TRỌ <b style="color: #e06767">LÊ THỊ KỈNH</b></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right" style="margin-right: 50px">
                        <li class="navbar-brand" style="font-weight: 700"><?= $_SESSION['fullName'] ?></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>

                </div>
            </nav>
                    
        </div> <!-- End header -->

        <div class="thanhvien">
            <div class="container-fluid">
                <div class="row">
                    <div class="left">
                        <div class="col-lg-2" id="viewUser">

                            <p id="listUserTitle">Thành viên: </p>

                            <div class="formListUser">
                                
                                <div class="listUser">
                                <?php
                                    $motelId = $_SESSION['motelId'];
                                    $userSql = "SELECT * FROM users WHERE motelId = '$motelId'";

                                    $userResults = $conn->query($userSql);

                                    if($userResults->num_rows > 0)
                                    {
                                        while($user = $userResults->fetch_assoc())
                                        {
                                ?>
                                
                                    <p style="font-size: 18px"><i class="fa fa-user"></i> <?= $user['fullName'] ?></p>
                                    <hr>

                                <?php
                                        }
                                    }
                                ?>

                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="right">      
                        <div class="col-lg-10">
                            
                            <div class="row">
                                
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-8" >
                                    <p class="titleDichVu">Dịch vụ sử dụng</p>
                                    <div class="row" id="tienDichVu">
                                        <div class="col-xs-12" id="leftTienDV">

                                        <?php
                                            $motelId = $_SESSION['motelId'];
                                            $roomSql = "SELECT * FROM motels WHERE motelId = '$motelId'";

                                            $roomResult = $conn->query($roomSql);
                                            if($roomResult->num_rows > 0)
                                            {
                                                while($room = $roomResult->fetch_assoc())
                                                {
                                        ?>

                                        
                                            <p id="nameRoom">Phòng <?= $room['name'] ?></p>

                                            <div class="row info">
                                                <div class="col-xs-6">
                                                    <p>Tiền nhà: </p>
                                                    <p>Tiền điện, nước: </p>
                                                    <p>Tiền dịch vụ (Wifi, giử xe, rác): </p>
                                                </div>

                                                <div class="col-xs-6">
                                                    <p><?= number_format($room['roomCost']) ?></p>
                                            
                                                    <p><?= number_format($room['waterCost']) ?></p>

                                                    <p><?= number_format($room['serviceCost']) ?></p>

                                                </div>
                                            </div>

                                            
                                            

                                            <hr>

                                            <p style="font-weight: 700; font-size: 20px">Tổng tiền: <?php echo number_format($room['total']) ?> 
                                                <?php
                                                    if($room['cast']){
                                                        echo '<span style="color:green">(Đã đóng tiền)</span>';
                                                    } 
                                                    else{
                                                        echo '<span style="color:red">(Còn nợ)</span>';
                                                    }
                                                ?> 
                                            </p>

                                        <?php
                                                }
                                            }
                                            
                                        ?>

                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <p class="titleThongBao">Thông Báo</p>
                                    <div class="row" id="thongBao">
                                        <?php
                                            $annouceSql = "SELECT * FROM information";

                                            $annouceResult = $conn->query($annouceSql);

                                            if($annouceResult->num_rows > 0)
                                            {
                                                while($annouce = $annouceResult->fetch_assoc())
                                                {
                                        ?>

                                        <p class="textThongBao">- <?= $annouce['title'] ?> (<?= $annouce['date'] ?>).</p>

                                        <?php
                                                }
                                            }
                                        ?>
                                        
                                    </div>
                                </div> 
                            </div>
                        </div>  
                    </div>

                </div>  <!-- End row -->

            </div>  <!-- End container -->
            
        </div>  <!-- End thanh vien -->


    </div>  <!-- End app -->

</body>
</html> 