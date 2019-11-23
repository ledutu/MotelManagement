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
                    
                    
                    <form action="" method="POST" role="form">
                    
                        <div class="form-group">
                            <label for="">Tên phòng</label>
                            <input type="roomName" class="form-control" id="roomName" placeholder="Nhập tên phòng">

                            <label for="">Giá tiền</label>
                            <select name="cost" id="inputCost" class="form-control">
                                <option value="">3.000.000 VNĐ</option>
                                <option value="">3.500.000 VNĐ</option>
                                <option value="">4.000.000 VNĐ</option>
                                <option value="">4.500.000 VNĐ</option>
                            </select>
                            
                            <label for="">Diện tích</label>
                            <select name="area" id="inputArea" class="form-control">
                                <option value="">20m2</option>
                                <option value="">25m2</option>
                                <option value="">30m2</option>
                            </select>
                            
                            

                            <label for="">Gát</label>
                            <select name="gat" id="inputGat" class="form-control">
                                <option value="">Có gát</option>
                                <option value="">Không có gát</option>
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