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
            
            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Title</a>
                </div>
            
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
            
        </div>

        <div class="thanhvien">
            <div class="container-fluid">
                <div class="row">
                    <div class="left">
                        <div class="col-lg-2" id="viewUser">
                            <p id="nameRoom">Phòng A01</p>
                                <div class="ngayThue"> Ngày thuê: <input type="text" name="date" value="20/11/2019" readonly></div>
                            <p id="listUserTitle">Thành viên: </p>

                            <div class="formListUser">
                                
                                <div class="listUser">
                                <?php
                                    for($i = 0; $i<4; $i++)
                                {
                                ?>
                                    <a href="" ><i class="fa fa-user"></i> Nguyễn Văn A</a>
                                    <hr>
                                <?php
                                }
                                ?>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="right">      
                        <div class="col-lg-10">
                            <p id="tien">Tiền trọ</p>
                            <form action="">
                                Chọn tháng: <input type="month" name="bdaymonth">
                                <input type="submit" value="Chọn">
                            </form>
                            <div class="row">
                                
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-8" >
                                    <p class="titleDichVu">Dịch vụ sử dụng</p>
                                    <div class="row" id="tienDichVu">
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-6" id="leftTienDV">

                                            <p class="tien">Tiền nhà: </p>
                                            <input type="tien" name="date" value="5000000" readonly>
                                        
                                            <p class="tien">Tiền điện: </p>
                                            <input type="tien" name="date" value="200000" readonly>

                                            <p class="tien">Tiền nước: </p>
                                            <input type="tien" name="date" value="40000" readonly>

                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-6" id="rightTienDV">
                                            <p class="tien">Tiền giữ xe: </p>
                                            <input type="tien" name="date" value="5000000" readonly>
                                        
                                            <p class="tien">Tiền mạng: </p>
                                            <input type="tien" name="date" value="200000" readonly>
                                            <p class="tien">Tiền rác: </p>
                                            <input type="tien" name="date" value="200000" readonly><hr>
                                            <p class="tongTien">Tổng tiền: 10000000</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <p class="titleThongBao">Thông Báo</p>
                                    <div class="row" id="thongBao">
                                        <p class="textThongBao">Vui lòng để xe đúng qui định.</p>
                                        <p class="textThongBao">Vui lòng thanh toán tiền phòng đúng thời hạn.</p> 
                                    </div>
                                </div> 
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html> 