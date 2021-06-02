<?php
function curl($url){
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);      
    return $output;
}

$send = curl("https://reqres.in/api/users/2");

// mengubah JSON menjadi array
$data = json_decode($send, TRUE);
$datas = $data["data"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">
<tr>
	<th> ID </th>
    <th> Email</th>
	<th> Nama </th>
    <th> Avatar </th>
</tr>

<tr>
	<td><?= $datas["id"]; ?></td>
    <td><?= $datas["email"]?></td>
	<td><?= $datas["first_name"] ?> <?= $datas["last_name"] ?></td>
    <td><img src="<?= $datas["avatar"]?>" alt=""></td>
</tr>
</table>
</body>
</html>
