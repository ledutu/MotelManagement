<?php
    require_once('../conn.php');

    $size = "SELECT * FROM motels";
    $sizeResult = $conn->query($size);


    $motelId = "motels" . ($sizeResult->num_rows + 1);

    $name = $_POST["name"];
    $cost = $_POST["cost"];
    $area = $_POST["area"];
    $gat = $_POST["gat"];

    $sql = "INSERT INTO motels(motelId, name, roomCost, area, gat)
    VALUES ('$motelId', '$name', $cost, $area, $gat)";

    if($conn->query($sql) === false)
    {
        echo "Bạn đã đặt trùng tên xin nhập lại.";
    }
    else
    {
        header("Location: index.php");
    }
?>