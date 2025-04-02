<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery.min.js"></script>
</head>
<body>
    <script type="text/javascript">
        $.ajax({
            url: 'https://api.ipdetective.io/io?info=true',
            headers: {
                'x-api-key' : '65ef2b69-0f48-48e1-997b-2270f47de7a5'
            },
            type: 'GET',
            dataType: 'json',
            success: function(ip) {
                var data = {
                    ip: ip.ip,
                    bot: ip.bot,
                    country: ip.country_name,
                    asn: ip.asn,
                    asndescription: ip.asndescription
                };
                $.ajax({
                    url: 'ip.php',
                    type: 'POST',
                    data: data,
                    success: function(response){
                        alert("Your IP Address Information has been");
                    }
                })
            }
        })
    </script>    
</body>
</html>
<?php
require 'config.php';
if(isset($_POST["ip"])){
    $ip = $_POST["ip"];
    $bot = $_POST["bot"];
    $country = $_POST["country"];
    $asn = $_POST["asn"];
    $asndescription = $_POST["asndescription"];

    $query = "INSERT INTO tb_data VALUES('','$ip','$bot','$country','$asn','$asndescription')";
    mysqli_query($conn, $query);
}
?>