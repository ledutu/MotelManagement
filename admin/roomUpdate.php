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
    .detail input{
        margin-bottom: 10px
    };

</style>
    
<body>

    <div class="detail" style="padding: 50px">
        <div class="container">
            <div class="row">

                <form action="" method="POST" role="form">

                        
                    
                    <div class="form-group">

                        <?php
                            require_once("../conn.php");

                            if(isset($_GET["id"]))
                            {
                                $motelId = $_GET["id"];
                                $sql = "SELECT * FROM motels WHERE motelId = '$motelId' ";
                                $result = $conn->query($sql);
                                
                                if($result->num_rows > 0)
                                {
                                    while($row = $result->fetch_assoc())
                                    {

                           
                            
                        ?>                        
                        <h4 style="padding-left: 20px"><?= $row["name"] ?></h4>
                        <hr>

                        
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                            <label for="">Tiền phòng</label>
                            <input type="roomCostUpdate" class="form-control" id="roomCostUpdate" value="<?= $row["roomCost"] ?>" placeholder="Tiền phòng">

                            <label for="">Tiền điện, nước</label>
                            <input type="waterCostUpdate" class="form-control" id="waterCostUpdate" value="<?= $row["waterCost"] ?>" placeholder="Tiền phòng">

                            <label for="">Tiền dịch vụ</label>
                            <input type="serviceCostUpdate" class="form-control" id="waterCostUpdate" value="<?= $row["serviceCost"] ?>" placeholder="Tiền dịch vụ">

                            <label for="">Diện tích</label>
                            <input type="areaUpdate" class="form-control" id="areaUpdate" value="<?= $row["area"].'m2' ?>" placeholder="Diện tích">

                            <label for="">Gát</label>
                            <select name="gat" id="inputGat" class="form-control">
                                <option value="yes" <?php if ($row["gat"]) echo "selected" ?>>Có gát</option>
                                <option value="no" <?php if (!$row["gat"]) echo "selected" ?>>Không có gát</option>
                            </select>
                        </div>

                        
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="margin-bottom: 25px">
                                    <label for="">Thành viên 1</label>
                                    <input type="memberName1" class="form-control" id="memberName1" placeholder="Nhập tên">
                                    <input type="memberCMND1" class="form-control" id="memberCMND1" placeholder="Nhập CMND">
                                    <input type="memberPhoneNumber1" class="form-control" id="memberPhoneNumber1" placeholder="Nhập số điện thoại">

                                    
                                </div>

                                
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="margin-bottom: 25px">
                                    <label for="">Thành viên 2</label>
                                    <input type="memberName2" class="form-control" id="memberName2" placeholder="Nhập tên">
                                    <input type="memberCMND2" class="form-control" id="memberCMND2" placeholder="Nhập CMND">
                                    <input type="memberPhoneNumber2" class="form-control" id="memberPhoneNumber2" placeholder="Nhập số điện thoại">
                                </div>
                                

                                
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="margin-bottom: 25px">
                                    <label for="">Thành viên 4</label>
                                    <input type="memberName4" class="form-control" id="memberName4" placeholder="Nhập tên">
                                    <input type="memberCMND4" class="form-control" id="memberCMND4" placeholder="Nhập CMND">
                                    <input type="memberPhoneNumber4" class="form-control" id="memberPhoneNumber4" placeholder="Nhập số điện thoại">
                                </div>
                                
                                
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="margin-bottom: 25px">
                                    <label for="">Thành viên 3</label>
                                    <input type="memberName3" class="form-control" id="memberName3" placeholder="Nhập tên">
                                    <input type="memberCMND3" class="form-control" id="memberCMND3" placeholder="Nhập CMND">
                                    <input type="memberPhoneNumber3" class="form-control" id="memberPhoneNumber3" placeholder="Nhập số điện thoại">
                                </div>
                                
                                
                            </div>
                            
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="margin-left: 30px">Cập nhật</button>

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