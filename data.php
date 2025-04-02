<?php
// $conn = mysqli_connect("sql310.infinityfree.com","if0_34531533","8z09k5BLOIhiEo","if0_34531533_ipaddress");
// $conn = mysqli_connect("localhost","root","789456123eternal@))$","ipaddress");

require 'config.php';
// echo $_SESSION["id"];
if(isset($_SESSION["userid"])){
    $id = $_SESSION["userid"];
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM hbd.admin WHERE id = $id"));
}
else{
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p><?php echo $user["username"]; ?></p>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <td>#</td>
            <td>IP</td>
            <td>Bot</td>
            <td>Country</td>
            <td>AS Number</td>
            <td>AS Description</td>
            <td>Username</td>
            <td>HBD Name</td>
            <td>Greetings</td>
            <td>Image Name</td>
            <td>Created Time</td>
        </tr>
        <?php
        // require 'config.php';
        // $rows = mysqli_connect("sql310.infinityfree.com","if0_34531533","8z09k5BLOIhiEo","if0_34531533_ipaddress");
        $conn = mysqli_connect("localhost","root","789456123","ipaddress");
        $rows = mysqli_query($conn, "SELECT * FROM tb_data AS tb,hbd.tb_upload AS hbd WHERE tb.id=hbd.id;");
        foreach($rows as $row) :
        ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["ip"]; ?></td>
            <td><?php echo $row["bot"]; ?></td>
            <td><?php echo $row["country"]; ?></td>
            <td><?php echo $row["asn"]; ?></td>
            <td><?php echo $row["asndescription"]; ?></td>
            <td><?php echo $row["username"]; ?></td>
            <td><?php echo $row["hbd_name"]; ?></td>
            <td><?php echo $row["greeting"]; ?></td>
            <td><a href="users/<?php echo $row["image"]; ?>"><?php echo $row["image"]; ?></td>
            <td><?php echo $row["date_time"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>