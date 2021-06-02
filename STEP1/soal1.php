<?php
$url = 'https://olahraga.okezone.com/2021/05/soal-test';

function cariSubDomain ($url){
    $parseUrl = parse_url($url);
    $host = explode('.', $parseUrl['host']);
    $subdomain = $host[0];
    echo $subdomain;
}
cariSubDomain($url);  
?> 