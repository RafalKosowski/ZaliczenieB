<?php
$url = "https://www.w3schools.com/xml/tempconvert.asmx";
$dane = '<?xml version="1.0" encoding="utf-8"?>
 <soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
   <soap12:Body>
     <CelsiusToFahrenheit xmlns="https://www.w3schools.com/xml/">
       <Celsius>' . @$_POST['cel1'] . '</Celsius>
     </CelsiusToFahrenheit>
   </soap12:Body>
 </soap12:Envelope>';


$headers = array(
    "Content-type: application/soap+xml; charset=utf-8",
    "Content-length: " . strlen($dane),
);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_TIMEOUT, 60);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $dane);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

$far = curl_exec($curl);

if (curl_errno($curl)) {
    print "Error: " . curl_error($curl);
}

curl_close($curl);
// drugie zapytanie
$url2 = "https://www.w3schools.com/xml/tempconvert.asmx";
$dane2 = '<?xml version="1.0" encoding="utf-8"?>
 <soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
   <soap12:Body>
     <FahrenheitToCelsius xmlns="https://www.w3schools.com/xml/">
       <Fahrenheit>' . @$_POST['far2'] . '</Fahrenheit>
     </FahrenheitToCelsius>
   </soap12:Body>
 </soap12:Envelope>';

$headers2 = array(
    "Content-type: application/soap+xml; charset=utf-8",
    "Content-length: " . strlen($dane2),
);

$curl2 = curl_init();
curl_setopt($curl2, CURLOPT_URL, $url);
curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl2, CURLOPT_TIMEOUT, 60);
curl_setopt($curl2, CURLOPT_HTTPHEADER, $headers2);
curl_setopt($curl2, CURLOPT_POST, 1);
curl_setopt($curl2, CURLOPT_POSTFIELDS, $dane2);
curl_setopt($curl2, CURLOPT_SSL_VERIFYPEER, 0);

$cel = curl_exec($curl2);

if (curl_errno($curl2)) {
    print "Error: " . curl_error($curl2);
}

curl_close($curl2);
if (!isset($_POST['ctf'])) {
    $far = "";
}
if (!isset($_POST['ftc'])) {
    $cel = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Temperature converter </title>
</head>

<body>
    <div class="menu">
        <a href="converter.php" class="active">Conventer</a>
        <a href="dogs.php">Dogs</a>
    </div>
    <div id="celToFar" class="temp">
        <h2>Celcius To Fahrenheit </h2>
        <form action="" method="post">
            <label for="cel1">Celcius:</label>
            <input type="number" name="cel1" step="0.01" id="cel1" />

            <input type="submit" value="Convert" name="ctf" />
        </form>

        <p>Fahrenheit: <b><?php echo $far ?></b></p>
    </div>
    <div id="farToCel" class="temp">
        <h2> Fahrenheit to Celcius</h2>
        <form action="" method="post">
            <label for="far2">Fahrenheit:</label>
            <input type="number" name="far2" step="0.01" id="far2" />
            <input type="submit" value="Convert" name="ftc" />
        </form>
        <p>Celcius: <b><?php echo $cel ?></b></p>
    </div>
    <footer>
        <p>
            Created by Rafał Kosowski &copy; 2023
        </p>
    </footer>

</body>

</html>