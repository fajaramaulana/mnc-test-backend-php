<?php
for($i=1;$i<=100;$i++){ 
    $x = 0; 
    for($y=1;$y<=$i;$y++){ 
        if($i % $y == 0){ 
            $x++;
        }
    }
    if($x == 2){ 
     echo "$i<br>";
    }
}
?>