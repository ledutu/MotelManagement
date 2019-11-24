<?php
    require_once('../conn.php');

    if(isset($_POST['annoucement']))
    {
        $title = $_POST['annoucement'];
        $date = date('Y/m/d');

        $sql = "INSERT INTO information (title, date)
        VALUES ('$title', '$date')";

            
        if($conn->query($sql) === false)
        {
            echo "Thông báo lỗi! Xin thử lại! Hãy nhập thông báo ngắn hơn";
        }
        else
        {
            header("Location: index.php?listAnnouce");
        }
    }
?>