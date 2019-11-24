<?php
    require_once('../conn.php');

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql = "DELETE FROM information WHERE id=$id";

        if($conn->query($sql) === false)
        {
            echo "Xóa thất bại! xin thử lại";
        }
        else
        {
            header('Location: index.php?listAnnouce');
        }
    }

?>