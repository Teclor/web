<?php
function GetIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function detect_by_ip($ip)
{
    $result = false;
    if ($ch = curl_init("http://suggestions.dadata.ru/suggestions/api/4_1/rs/iplocate/address?ip=".$ip))
    {
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept: application/json',
            'Authorization: Token 645608a938df4baaa8f1297c35b2326fcd778218'
        ));
        $result = curl_exec($ch);
        $result = json_decode($result, true);
        curl_close($ch);
    }
    return $result;
}
$ip = GetIP();
$result = detect_by_ip("95.29.216.57");
echo $result['location']['value'];

?>
