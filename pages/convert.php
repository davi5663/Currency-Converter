<?php

$amount = $_POST['amount'];
$currency_from = $_POST['currency_from'];
$currency_to = $_POST['currency_to'];
getCurrency();


function get_xml_from_url($url){ //Returner en string xml'en fra url'en.
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    $xmlstr = curl_exec($ch);
    curl_close($ch);

    return $xmlstr;
}


function getCurrency() {


  $url = 'http://www.nationalbanken.dk/_vti_bin/DN/DataService.svc/CurrencyRatesXML?lang=da';
  $xml = get_xml_from_url($url);
  $doc = new DOMDocument;
  $doc -> loadXML($xml);


  convert($doc);


}


function convert($doc) {


$currencys = $doc -> getElementsByTagName("currency");


$kurs = array();

foreach ($currencys as $currency) {
  $code = $currency->getAttribute('code');
  $rate = $currency->getAttribute('rate');
  $kurs[$code] = floatval($rate)/100;
    }


$inDkk = 0; // Penge i kr.
if ($GLOBALS['currency_from']=="DKK") {
  $inDkk = $GLOBALS['amount'];
}
else {
  $inDkk = $GLOBALS['amount'] * $kurs[$GLOBALS['currency_from']]; //hvis det ikk er kroner så ganger den med det som vi har valgt
}



if ($GLOBALS['currency_to']=="DKK") {
  echo "<center><b>Your Converted Amount is:</b><br></center>";
  echo "<center>" . $inDkk . "</center>";
}
else  {
  echo "<center><b>Your Converted Amount is:</b><br></center>";
  echo "<center>" . $inDkk / $kurs[$GLOBALS['currency_to']] . "</center>";

  }
}




 ?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="https://cdn3.iconfinder.com/data/icons/currency-and-cryptocurrency-signs/64/cryptocurrency_blockchain_dollar-512.png">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><div class="pos-f-t">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Currency Converter</title>

<style>
body{
  background-color: #95afc0;
}

#ip2{
  border-radius: 30px;
    border: 2px solid #535c68;
    padding: 10px;
    width: 100px;
}
</style>

<body>
<br>
<center>
<button onclick="location.href = 'http://xdas15.skp-dp.sde.dk/Valuta/pages/index.php';" id="ip2">Go back</button>
</center>
</body>
