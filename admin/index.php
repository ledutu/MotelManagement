<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="index.css?version=51">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- application -->
    <div class="application">
    

        <div class="header">
            
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">PHÒNG TRỌ <b style="color: red">LÊ ĐỨC TÙNG</b></a>
                    </div>

                    <ul class="nav navbar-nav">
                        
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>

                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                        </form>
                        
                    </ul>

                    <ul class="nav navbar-nav navbar-right" style="margin-right: 50px">
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>

                </div>
            </nav>
                    
        </div> <!-- End header -->

        <!-- Information -->
        <div class="information">
            <div class="container-fluid">
                <div class="row">
                    
                    <!-- Left Menu -->
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <h3><i class="fa fa-home fa-lg"></i> Home</h3> 

                        <div class="leftMenu">
                            <a href="index.php?status=1" style="display: block" ><i class="fa fa-check fa-lg"></i>Phòng trọ đang thuê</a> 
                            <a href="index.php?status=0" style="display: block" ><i class="fa fa-times fa-lg"></i> Phòng trọ chưa thuê</a> 
                            <a href="index.php?userInfo" style="display: block" ><i class="fa fa-users fa-lg"></i>Thông tin thành viên</a> 
                            <hr>
                            <a href="#" style="display: block" data-toggle="modal" data-target="#roomAdding"><i class="fa fa-plus fa-lg"></i>Thêm phòng</a> 
                        
                        </div>  <!-- End Left menu -->  
                    </div>

                    <!-- Content -->
                    <div class="col-xs-10 col-sm-10 col-md-10">
                        <?php
                            require_once("../conn.php");

                            if(isset($_GET["userInfo"]))
                            {
                        ?>
                            <h3>Thông tin thành viên</h3>

                            
                            <table class="table table-hover">
                                
                                <!-- <form action="" method="POST" role="form">
                                    <div class="form-group">
                                        <label for="">label</label>
                                        <input type="text" class="form-control" id="" placeholder="Input field">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form> -->
                                
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Tên đầy đủ</th>
                                        <th>username</th>
                                        <th>password</th>
                                        <th>SĐT</th>
                                        <th>CMND</th>
                                        <th>Ngày sinh</th>
                                        <th>Phòng</th>
                                        <th>Lựa chọn</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $userSql = "SELECT * FROM users, motels
                                        WHERE users.motelId = motels.motelId
                                        ORDER BY users.motelId, users.userId ASC";
                                        $results = $conn->query($userSql);

                                        if($results->num_rows > 0)
                                        {
                                            while($user = $results->fetch_assoc())
                                            {

                                    ?>
                                    <tr>
                                        <td>
                                            <img src="" alt="">
                                        </td>
                                        <td><?= $user["fullName"] ?></td>
                                        <td><?= $user["username"] ?></td>
                                        <td><?= $user["password"] ?></td>
                                        <td><?= $user["numberPhone"] ?></td>
                                        <td><?= $user["CMND"] ?></td>
                                        <td><?= $user["dayOfBirth"] ?></td>
                                        <td><?= $user['name'] ?></td>
                                        <th>
                                            <a href=""><button class="btn btn-primary">Edit</button></a>
                                            <a href=""><button class="btn btn-danger">Delete</button></a>
                                        </th>
                                        
                                    </tr>
                                    

                                    <?php
                                                                                    
                                            }
                                        }
                                    ?>

                                </tbody>
                            </table>
                            

                        <?php
                            }
                            else
                            {
                        ?>

                        <h3>Thông tin nhà trọ</h3>

                        <div class="content">

                            <div class="container">
                                <div class="row">
                                    
                                <?php
                                    $sql = "SELECT * FROM motels";

                                    if(isset($_GET['status']))
                                    {
                                        $status = $_GET['status'];
                                        $sql = $sql . " WHERE status = $status";
                                    }

                                    $result = $conn->query($sql);

                                    if($result->num_rows > 0)
                                    {
                                        while($row = $result->fetch_assoc())
                                        {
                                            
                                ?>

                                    <!-- da thue -->
                                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 card" style="background-color: <?php if($row["cast"]) echo '#d9d9f3' ?>">
                                        <a href="roomUpdate.php?id=<?= $row["motelId"] ?>" style="text-decoration: none">
                                            <div class="card text-center" style="padding: 35px">
                                                <img src="https://image.flaticon.com/icons/png/512/18/18625.png"  alt="" width="50px">
                                                <h4 class="text" style="color: black"><?= $row["name"] ?></h4>
                                                <?php
                                                    if($row["status"])
                                                    {
                                                ?>
                                                    <p class="text-center" style="color: green"><i class="fa fa-check"></i> Đã thuê</p>
                                                <?php
                                                    }
                                                    else
                                                    {
                                                ?>
                                                    <p class="text-center" style="color: red"><i class="fa fa-times"></i> Còn trống</p>

                                                <?php
                                                    }

                                                ?>

                                            </div>
                                        </a>
                                    </div>

                                <?php
                                                    
                                        }

                                    }
                                ?>
                                    
                                </div>  <!-- Row -->
                            </div>  <!-- End container -->

                        </div>  <!-- End Content -->

                        <?php
                            }
                        ?>

                    </div>
                                                

                </div>  <!-- End Row -->
            </div>  <!-- End container -->          
        </div>  <!-- End Information -->

        <?php 
            require_once("roomAdd.php");
        ?>

        
    </div> <!-- End application -->
    

</body>
</html>