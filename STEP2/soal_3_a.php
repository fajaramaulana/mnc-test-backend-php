<?php 
function curl($url){
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);      
    return $output;
}

$send = curl("https://reqres.in/api/users?page=2");

// mengubah JSON menjadi array
$data = json_decode($send, TRUE);
$datas = $data["data"];
?>

<!DOCTYPE html>
<html>
<body>

<table border="1">
<tr>
	<th> ID </th>
    <th> Email</th>
	<th> Nama </th>
    <th> Avatar </th>
</tr>
<?php foreach($datas as $row){ ?>

<tr>
	<td><?= $row["id"]; ?></td>
    <td><?= $row["email"]?></td>
	<td><?= $row["first_name"] ?> <?= $row["last_name"] ?></td>
    <td><img src="<?= $row["avatar"]?>" alt=""></td>
</tr>
<?php } ?>
</table>

</body>
</html>