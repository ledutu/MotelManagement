<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
    
<body>
    
    <!-- Modal -->
    <div id="roomAdding" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                    <h4 class="modal-title">Thêm phòng</h4>
                </div>

                <div class="modal-body">
                    
                    
                    <form action="add.php" method="POST" role="form">
                    
                        <div class="form-group">
                            <label for="">Tên phòng</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên phòng" required>

                            <label for="">Giá tiền</label>
                            <input type="number" class="form-control" id="cost" name="cost" placeholder="Nhập giá tiền" required>
                            
                            <label for="">Diện tích</label>
                            <input type="number" class="form-control" id="area" name="area" placeholder="Nhập diện tích" required>
                            
                            <label for="">Gát</label>
                            <select name="gat" id="inputGat" class="form-control">
                                <option value="1">Có gát</option>
                                <option value="0">Không có gát</option>
                            </select>

                            
                            
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                    
                </div>

            </div>
        </div>

    </div>

</div>
</body>
</html>