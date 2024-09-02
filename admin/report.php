<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];


$no=0;

if(!isset($admin_id)){
   header('location:admin_login.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="../css/admin_style.css">

    <style>
        table{
            background-color:SkyBlue;
            font-size:15px;
            margin-top:20px;
        }
        th{
            background-color:#2980b9;
        }
        tr:hover{
            background-color:LightCyan;
        }
        table,th,td{
            border:3px; 
            border-style:groove;
            border-collapse:collapse;
            padding:10px;
            text-align:center;
        }
        th,td{
            color:white;
            border-style:groove;
        }
        td{
            color:black;
        }
        .fa{
            font-size:30px;
            margin:15px;
            margin-left:45%;
        }
        .form{
            display:flex;
            margin-left:30%;
        }
        select{
            width:250px;
            height:25px;
            margin:10px;
            margin-top:20px;
        }
        .search{
            margin:10px;
            width:80px;
            height:40px;
            border-radius:10px;
            background-color:darkgray;
            color:white;
            padding:10px;
            font-size:15px;
        }

    </style>

</head>
<body>
    
<?php include '../components/admin_header.php'; ?>

<section class="orders">

<div>
    <div>
        <h1 class="heading">Reports</h1>
    </div>

    <div>

        <form class="form" method="post" action="">
        <select class="form-control mt-2" name="filter" action="dashboard.php">
            <option value="all"></option>
            <option value="pending">Status Pending</option>
            <option value="completed">Status Completed</option>
            <option value="time">By Date</option>
        </select>
        <!-- <button type="Submit">Search</button> -->
        <input  class="search" type="submit" name="search" value="Search">
        <i class="fa fa-print" name="print" onClick="window.print()"></i>
        </form>
    </div>

    <div>
    

    <?php

if(isset($_POST['search'])){
    $value=$_POST['filter'];
    switch($value){
        case 'all': 
            echo "<table width=100%>
            <tr>
                <th>Sr no.</th>
                <th>User Name</th>
                <th>Mob no.</th>
                <th>User's Email</th>
                <th>Payment Method</th>
                <th>Address</th>
                <th>Total Products</th>
                <th>Total Price</th>
                <th>Placed On</th>
                <th>Payment Status</th>
            </tr>";
            $select_orders = $conn->prepare("SELECT * FROM `orders` where admin_id=$admin_id");
            $select_orders->execute();
            if($select_orders->rowCount() > 0){
                while($fetch_report = $select_orders->fetch(PDO::FETCH_ASSOC)){
                    $no+=1;
                    $content="<tr> 
                            <td>$no</td> 
                            <td>$fetch_report[name]</td>
                            <td>$fetch_report[number]</td>
                            <td>$fetch_report[email]</td>
                            <td>$fetch_report[method]</td>
                            <td>$fetch_report[address]</td>
                            <td>$fetch_report[total_products]</td>
                            <td>$fetch_report[total_price]</td>
                            <td>$fetch_report[placed_on]</td>
                            <td>$fetch_report[payment_status]</td>
                            </tr>";
                    echo $content;
                    }
                }
            break;
        case 'pending':
            echo "<table width=100%>
            <tr>
                <th>Sr no.</th>
                <th>User Name</th>
                <th>Mob no.</th>
                <th>User's Email</th>
                <th>Payment Method</th>
                <th>Address</th>
                <th>Total Products</th>
                <th>Total Price</th>
                <th>Placed On</th>
                <th>Payment Status</th>
            </tr>";
            $select_orders = $conn->prepare("SELECT * FROM `orders` where payment_status='pending' AND admin_id=$admin_id");
            $select_orders->execute();
            if($select_orders->rowCount() > 0){
                while($fetch_report = $select_orders->fetch(PDO::FETCH_ASSOC)){
                    $no+=1;
                    $content="<tr> 
                            <td>$no</td> 
                            <td>$fetch_report[name]</td>
                            <td>$fetch_report[number]</td>
                            <td>$fetch_report[email]</td>
                            <td>$fetch_report[method]</td>
                            <td>$fetch_report[address]</td>
                            <td>$fetch_report[total_products]</td>
                            <td>$fetch_report[total_price]</td>
                            <td>$fetch_report[placed_on]</td>
                            <td style='background-color:yellow'>$fetch_report[payment_status]</td>
                            </tr>";
                    echo $content;
                    }
                }
            break;
        
        case 'completed':
            echo "<table width=100%>
            <tr>
                <th>Sr no.</th>
                <th>User Name</th>
                <th>Mob no.</th>
                <th>User's Email</th>
                <th>Payment Method</th>
                <th>Address</th>
                <th>Total Products</th>
                <th>Total Price</th>
                <th>Placed On</th>
                <th>Payment Status</th>
            </tr>";
            $select_orders = $conn->prepare("SELECT * FROM `orders` where payment_status='completed' AND admin_id=$admin_id");
            $select_orders->execute();
            if($select_orders->rowCount() > 0){
                while($fetch_report = $select_orders->fetch(PDO::FETCH_ASSOC)){
                    $no+=1;
                    $content="<tr> 
                            <td>$no</td> 
                            <td>$fetch_report[name]</td>
                            <td>$fetch_report[number]</td>
                            <td>$fetch_report[email]</td>
                            <td>$fetch_report[method]</td>
                            <td>$fetch_report[address]</td>
                            <td>$fetch_report[total_products]</td>
                            <td>$fetch_report[total_price]</td>
                            <td>$fetch_report[placed_on]</td>
                            <td style='background-color:yellow'>$fetch_report[payment_status]</td>
                            </tr>";
                    echo $content;
                    }
                }
            break;

        case 'time':
            echo "<table width=100%>
            <tr>
                <th>Sr no.</th>
                <th>User Name</th>
                <th>Mob no.</th>
                <th>User's Email</th>
                <th>Payment Method</th>
                <th>Address</th>
                <th>Total Products</th>
                <th>Total Price</th>
                <th>Placed On</th>
                <th>Payment Status</th>
            </tr>";
            $select_orders = $conn->prepare("SELECT * FROM `orders` where admin_id=$admin_id ORDER BY `placed_on` DESC");
            $select_orders->execute();
            if($select_orders->rowCount() > 0){
                while($fetch_report = $select_orders->fetch(PDO::FETCH_ASSOC)){
                    $no+=1;
                    $content="<tr> 
                            <td>$no</td> 
                            <td>$fetch_report[name]</td>
                            <td>$fetch_report[number]</td>
                            <td>$fetch_report[email]</td>
                            <td>$fetch_report[method]</td>
                            <td>$fetch_report[address]</td>
                            <td>$fetch_report[total_products]</td>
                            <td>$fetch_report[total_price]</td>
                            <td style='background-color:yellow'>$fetch_report[placed_on]</td>
                            <td>$fetch_report[payment_status]</td>
                            </tr>";
                    echo $content;
                    }
                }
            break;

        default: echo '<p class="empty">no orders placed yet!</p>';

            }
        
}
else{
    echo "<table width=100%>
            <tr>
                <th>Sr no.</th>
                <th>User Name</th>
                <th>Mob no.</th>
                <th>User's Email</th>
                <th>Payment Method</th>
                <th>Address</th>
                <th>Total Products</th>
                <th>Total Price</th>
                <th>Placed On</th>
                <th>Payment Status</th>
            </tr>";
    $select_orders = $conn->prepare("SELECT * FROM `orders` where admin_id=$admin_id");
    $select_orders->execute();
            if($select_orders->rowCount() > 0){
                while($fetch_report = $select_orders->fetch(PDO::FETCH_ASSOC)){
                    $no+=1;
                    $content="<tr> 
                            <td>$no</td> 
                            <td>$fetch_report[name]</td>
                            <td>$fetch_report[number]</td>
                            <td>$fetch_report[email]</td>
                            <td>$fetch_report[method]</td>
                            <td>$fetch_report[address]</td>
                            <td>$fetch_report[total_products]</td>
                            <td>$fetch_report[total_price]</td>
                            <td>$fetch_report[placed_on]</td>
                            <td>$fetch_report[payment_status]</td>
                            </tr>";
                    echo $content;
                    }
                }
}

?>

</table>
</div>
</div>
</section>

<script src="../js/admin_script.js"></script>

</body>
</html>