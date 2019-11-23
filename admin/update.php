<?php
    require_once('../conn.php');


    if($_POST['action'] == 'update')
    {
        $roomCostUpdate = $_POST["roomCostUpdate"];
        $waterCostUpdate = $_POST['waterCostUpdate'];
        $areaUpdate = $_POST['areaUpdate'];
        $serviceCostUpdate = $_POST['serviceCostUpdate'];
        $total = ($roomCostUpdate + $waterCostUpdate + $serviceCostUpdate);
        $gat = $_POST['gat'];
        $thue = $_POST['thue'];
        
        $motelId = $_POST['motelId'];
    
        if($thue)
        {
            
            $cast = $_POST['cast'];
            
            $sql = "UPDATE motels SET 
            roomCost=$roomCostUpdate,
            waterCost=$waterCostUpdate,
            serviceCost=$serviceCostUpdate,
            area=$areaUpdate,
            gat=$gat,
            status=$thue,
            cast=$cast,
            total=$total
            WHERE motelId='$motelId'";
    
        }
        else
        {
            $count = $_POST['count'];
    
            #user1
            $userId1 = "user" . ($count + 1);
            $memberName1 = $_POST['memberName1'];
            $memberCMND1 = $_POST['memberCMND1'];
            $memberPhoneNumber1 = $_POST['memberPhoneNumber1'];
    
            #user2
            $userId2 = "user" . ($count + 2);
            $memberName2 = $_POST['memberName2'];
            $memberCMND2 = $_POST['memberCMND2'];
            $memberPhoneNumber2 = $_POST['memberPhoneNumber2'];
    
            #user3
            $userId3 = "user" . ($count + 3);
            $memberName3 = $_POST['memberName3'];
            $memberCMND3 = $_POST['memberCMND3'];
            $memberPhoneNumber3 = $_POST['memberPhoneNumber3'];
    
            #user4
            $userId4 = "user" . ($count + 4);
            $memberName4 = $_POST['memberName4'];
            $memberCMND4 = $_POST['memberCMND4'];
            $memberPhoneNumber4 = $_POST['memberPhoneNumber4'];
    
            $sql = "UPDATE motels SET
            gat=$gat,
            area=$areaUpdate,
            status=1,
            roomCost=$roomCostUpdate,
            waterCost=$waterCostUpdate,
            serviceCost=$serviceCostUpdate,
            memberId1='$userId1',
            memberId2='$userId2',
            memberId3='$userId3',
            memberId4='$userId4'
            WHERE motelId='$motelId'";
    
            $addMember1 = "INSERT INTO users(userId, fullName, numberPhone, CMND) 
            VALUES ('$userId1', '$memberName1', '$memberPhoneNumber1', '$memberCMND1')";
    
            $addMember2 = "INSERT INTO users(userId, fullName, numberPhone, CMND) 
            VALUES ('$userId2', '$memberName2', '$memberPhoneNumber2', '$memberCMND2')";
    
            $addMember3 = "INSERT INTO users(userId, fullName, numberPhone, CMND) 
            VALUES ('$userId3', '$memberName3', '$memberPhoneNumber3', '$memberCMND3')";
    
            $addMember4 = "INSERT INTO users(userId, fullName, numberPhone, CMND) 
            VALUES ('$userId4', '$memberName4', '$memberPhoneNumber4', '$memberCMND4')";
    
            if(
                ($conn->query($addMember1) === false) ||
                ($conn->query($addMember2) === false) ||
                ($conn->query($addMember3) === false) ||
                ($conn->query($addMember4) === false)
            )
            {
                die("Error: " . $conn->error);
            }
    
    
        }
    
        if($conn->query($sql)=== FALSE)
        {
            die("Error: " . $sql . $conn->error);
        }
        else
        {
            header("Location: index.php");
        }
    
    }
    else if($_POST['action'] == 'delete')
    {
        $motelId = $_POST['motelId'];
        $name = $_POST['name'];
        $sql = "DELETE FROM motels WHERE motelId = '$motelId'";
        if($conn->query($sql) === FALSE)
        {
            die("Error: " . $sql . $conn->error);
        }
        else
        {
            $sql1 = "INSERT INTO motels (motelId, name) VALUES ('$motelId', '$name')";

            $conn->query($sql1);

            header("Location: roomUpdate.php");
        }
    }
    

    

?>