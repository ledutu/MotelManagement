<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<style>
    .detail input, select{
        margin-bottom: 10px
    };

</style>
    
<body>

    <div class="detail" style="padding: 50px">
        <div class="container">
            <div class="row">

                <form action="update.php" method="POST" role="form" enctype="multipart/form-data">

                        
                    
                    <div class="form-group">

                        <?php
                            require_once("../conn.php");

                            $motelId = "";

                            $size = "SELECT * FROM users";

                            $resultSize = $conn->query($size);

                            $count = $resultSize->num_rows;

                            if(isset($_GET["id"]))
                            {
                                $motelId = $_GET["id"];
                                $sql = "SELECT * FROM motels WHERE motelId = '$motelId'" ;
                                $users = "SELECT * FROM motels, users WHERE motelId = '$motelId'

                                AND (motels.memberId1 = users.userId 
                                OR motels.memberId2 = users.userId
                                OR motels.memberId3 = users.userId
                                OR motels.memberId4 = users.userId)";

                                $result = $conn->query($sql);
                                $usersResult = $conn->query($users);
                                
                                if($result->num_rows > 0)
                                {
                                    while($row = $result->fetch_assoc())
                                    {
                                        

                           
                            
                        ?>                        
                        <h4 style="padding-left: 20px"><?= $row["name"] ?></h4>
                        <hr>

                        
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                            <label for="">Tiền phòng</label>
                            <input type="number" class="form-control" id="roomCostUpdate" name="roomCostUpdate" value="<?= $row["roomCost"] ?>" placeholder="Tiền phòng" required>

                            <label for="">Tiền điện, nước</label>
                            <input type="number" class="form-control" id="waterCostUpdate" name="waterCostUpdate" value="<?= $row["waterCost"] ?>" placeholder="Tiền điện, nước">

                            <label for="">Tiền dịch vụ</label>
                            <input type="number" class="form-control" id="serviceCostUpdate" name="serviceCostUpdate" value="<?= $row["serviceCost"] ?>" placeholder="Tiền dịch vụ">

                            <label for="">Diện tích</label>
                            <input type="number" class="form-control" id="areaUpdate" name="areaUpdate" value="<?= $row["area"] ?>" placeholder="Diện tích">

                            <label for="">Gát</label>
                            <select name="gat" id="inputGat" class="form-control">
                                <option value="1" <?php if ($row["gat"]) echo "selected" ?>>Có gát</option>
                                <option value="0" <?php if (!$row["gat"]) echo "selected" ?>>Không có gát</option>
                            </select>

                            <label for="">Trạng thái</label>
                            <div class="row">
                                
                                <div class="<?php if($row["status"]) echo 'col-xs-6'; else echo 'col-xs-12';  ?>">
                                    <select name="thue" id="inputThue" class="form-control">
                                        <option value="1" <?php if ($row["status"]) echo "selected" ?> style="color: green">Đã thuê</option>
                                        <option value="0" <?php if (!$row["status"]) echo "selected" ?> style="color: red">Còn trống</option>
                                    </select>
                                </div>
                                
                            

                            <?php
                                if($row["status"])
                                {
                            ?>
                            
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <select name="cast" id="inputCast" class="form-control">
                                        <option value="1" <?php if ($row["cast"]) echo "selected" ?> style="color: green">Đã đóng tiền</option>
                                        <option value="0" <?php if (!$row["cast"]) echo "selected" ?> style="color: red">Chưa đóng tiền</option>
                                    </select>
                                </div>
                                
                            <?php       
                                }
                            ?>
                            </div>
                        </div>

                        
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                
                                <?php
                                    if($usersResult->num_rows > 0)
                                    {
                                        $i = 0;
                                        while($user = $usersResult->fetch_assoc())
                                        {
                                     
                                ?>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="margin-bottom: 25px">

                                    <label for="">Thành viên <?= ++$i ?></label>
                                    <input type="text" class="form-control" id="memberName<?= ++$i ?>" name="memberName<?= ++$i ?>" value = "<?= $user["fullName"] ?>" placeholder="Nhập tên" required>
                                    <input type="text" class="form-control" id="memberCMND<?= ++$i ?>" name="memberCMND<?= ++$i ?>" value = "<?= $user["CMND"] ?>" placeholder="Nhập CMND" required>
                                    <input type="text" class="form-control" id="memberPhoneNumber<?= ++$i ?>" name="memberPhoneNumber<?= ++$i ?>" value="<?= $user["numberPhone"] ?>" placeholder="Nhập số điện thoại" required>
                                    
                                </div>
                                <?php
                                        }
                                    }
                                    else
                                    {
                                        for($i = 1; $i<5; $i++)
                                        {

                                ?>

                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="margin-bottom: 25px">

                                    <label for="">Thành viên <?= $i ?></label>
                                    <input type="text" class="form-control" id="memberName<?= $i ?>" name="memberName<?= $i ?>" value = "" placeholder="Nhập tên" required>
                                    <input type="text" class="form-control" id="memberCMND<?= $i ?>" name="memberCMND<?= $i ?>" value = "" placeholder="Nhập CMND" required>
                                    <input type="text" class="form-control" id="memberPhoneNumber<?= $i ?>" name="memberPhoneNumber<?= $i ?>" value="" placeholder="Nhập số điện thoại" required>

                                </div>

                                <?php

                                        }
                                    }
                                ?>


                            </div>

                            <input type="hidden" name ="motelId" value="<?php echo $motelId ?>" >
                            <input type="hidden" name ="count" value="<?php echo $count ?>" >
                            <input type="hidden" name ="name" value="<?php echo $row["name"] ?>" >
                            
                        </div>
                        
                        <label for="" style="margin-left: 20px">Tổng tiền: <?= $row['total'] ?></label>
                        
                        
                        <button type="submit" name="action" value="update" class="btn btn-primary" style="margin-left: 15px">Cập nhật</button>
                        <button type="submit" name="action" value="delete" class="btn btn-danger" style="margin-left: 15px">Delete All</button>

                        <?php
                                    }
                                }
                            }
                        ?>

                    </div>

                    

                </form>
            </div>
        </div>

    </div>
    
</div>
</body>
</html>