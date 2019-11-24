<?php
    session_start();

    if(!isset($_SESSION["username"]))
    {
        header("Location: login.php");
    };

    require_once("../conn.php");

    if(date('d') == 1)
    {
        $resetSql = "UPDATE motels SET cast = 0";
        $conn->query($resetSql);
    }
   
?>

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

    <link rel="stylesheet" type="text/css" href="index.css">

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
                        <a class="navbar-brand" href="index.php">PHÒNG TRỌ <b style="color: red">LÊ THỊ KỈNH</b></a>
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
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
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
                            <a href="#" style="display: block" data-toggle="modal" data-target="#annouce"><i class="fa fa-bullhorn fa-lg"></i>Thông báo</a> 
                            <a href="index.php?listAnnouce" style="display: block"><i class="fa fa-list fa-lg"></i>Danh sách thông báo</a> 

                        
                        </div>  <!-- End Left menu -->  
                    </div>

                    <!-- Content -->
                    <div class="col-xs-10 col-sm-10 col-md-10">
                        <?php

                            if(isset($_GET['listAnnouce']))
                            {
                        ?>
                            <h3>Danh sách thông báo</h3>
                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th style="padding-left: 20px">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        $annouceSql = "SELECT * FROM information";

                                        $annouceResult = $conn->query($annouceSql);

                                        if($annouceResult->num_rows > 0)
                                        {
                                            $i = 0;
                                            while($annouce = $annouceResult->fetch_assoc())
                                            {
                                    ?>

                                   
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td><?= $annouce['title'] ?></td>
                                        <td style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box;"><?= $annouce['date'] ?></td>
                                        <td>
                                            <a href="deleteAnnouce.php?id=<?= $annouce['id'] ?>"><button class="btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>

                                    <?php
                                            }
                                        }

                                    ?>
                                </tbody>
                            </table>
                            
                        <?php

                            }
                            else if(isset($_GET["userInfo"]))
                            {
                        ?>
                            <h3>Thông tin thành viên</h3>

                            
                            <table class="table table-hover">
                                
                                <form action="index.php?userInfo" method="POST" role="form" enctype="multipart/form-data">
                                    <div class="form-group" style="float: left; margin-right: 10px">
                                        <input type="text" class="form-control" id="userSearching" name="userSearching" placeholder="Tìm kiếm">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                                
                                <thead>
                                    <tr>
                                        <th>Tên đầy đủ</th>
                                        <th>username</th>
                                        <th>password</th>
                                        <th>SĐT</th>
                                        <th>CMND</th>
                                        <th>Ngày sinh</th>
                                        <th>Phòng</th>
                                        <th style="padding-left: 20px">Lựa chọn</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $userSql = "SELECT * FROM users, motels
                                        WHERE users.motelId = motels.motelId
                                        ORDER BY users.motelId, users.userId ASC";

                                        if(isset($_POST['userSearching']))
                                        {
                                            $fullName = $_POST['userSearching'];
                                            $userSql = "SELECT * FROM users, motels
                                            WHERE users.fullName LIKE '%$fullName%'
                                            AND motels.motelId = users.motelId 
                                            ORDER BY users.motelId, users.userId ASC";
                                        }

                                        if(isset($_GET['id']) && isset($_GET['edit']))
                                        {
                                            $id = $_GET['id'];
                                            $userSql = "SELECT * FROM users, motels
                                            WHERE motels.motelId = users.motelId AND userId = '$id'";
                                        }

                                        $results = $conn->query($userSql);

                                        if($results->num_rows > 0)
                                        {
                                            while($user = $results->fetch_assoc())
                                            {
                                                if(isset($_GET['id']) && isset($_GET['edit']))
                                                {
                                                    $userId = $_GET['id'];
                                                    $editSql = ""
                                    ?>
                                    
                                        <form action="update.php" method="POST" role="form" enctype="multipart/form-data">

                                            <tr id="edit">
                                                <div class="form-group">
                                                    
                                            
                                                        <td>
                                                            <input type="text" name="fullName" id="fullName" value="<?= $user["fullName"] ?>" required>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="username" id="username" value="<?= $user["username"] ?>" required>
                                                        </td>
                                                        <td>
                                                            <input type="pwd" name="password" id="password" value="<?= $user["password"] ?>" required>
                                                        </td>
                                                        <td>
                                                            <input type="pwd" name="phone" id="phone" value="<?= $user["numberPhone"] ?>" required>
                                                        </td>   
                                                        <td>
                                                            <input type="text" name="CMND" id="CMND" value="<?= $user["CMND"] ?>" required>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="dayOfBirth" id="dayOfBirth" value="<?= $user["dayOfBirth"] ?>" required>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="room" id="room" value="<?= $user["name"] ?>" required>
                                                        </td>
                                                        
                                                        <input type="hidden" name ="userId" value="<?php echo $_GET['id'] ?>" >
                                                </div>
                                            
                                                        <th>
                                                        <button type="submit" name="action" value="edit" class="btn btn-primary" style="margin-left: 15px">Update</button>
                                        
                                            </tr>

                                        </form>
                                        

                                    <?php

                                                }
                                                else if(isset($_GET['id']) && isset($_GET['delete'])){
                                                    $userId = $_GET['id'];
                                                    $deleteSql = "DELETE FROM users WHERE userId = '$userId'";
                                                    if($conn->query($deleteSql) === FALSE){
                                                        echo "Không xóa được";
                                                    }
                                                    else{
                                                        echo "Đã xóa thành công!";
                                                        
                                    ?>
                                                        <a href="index.php?userInfo"><button class="btn btn-priary">Quay lại</button></a>
                                    <?php
                                                        break;
                                                    }
                                                    
                                                }

                                                else{
                                    ?>
                                    
                                    <tr>
                                        <td><?= $user["fullName"] ?></td>
                                        <td><?= $user["username"] ?></td>
                                        <td><?= $user["password"] ?></td>
                                        <td><?= $user["numberPhone"] ?></td>
                                        <td><?= $user["CMND"] ?></td>
                                        <td><?= $user["dayOfBirth"] ?></td>
                                        <td><?= $user['name'] ?></td>
                                        <th>
                                            <a href="index.php?userInfo&id=<?= $user['userId'] ?>&edit"><button class="btn btn-primary">Edit</button></a>
                                            <a href="index.php?userInfo&id=<?= $user['userId'] ?>&delete" ><button class="btn btn-danger">Delete</button></a>
                                        </th>
                                        
                                    </tr>
                                    

                                    <?php
                                                }
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