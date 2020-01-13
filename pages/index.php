<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="https://cdn3.iconfinder.com/data/icons/currency-and-cryptocurrency-signs/64/cryptocurrency_blockchain_dollar-512.png">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><div class="pos-f-t">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Currency Converter</title>
<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('timer').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>


<style>
  h1.a{
    font-family: Times New Roman;
  }
  body{
    background-color: #95afc0;
  }

  #ip1{
    border-radius: 30px;
      border: 2px solid #535c68;
      padding: 10px;
      width: 100px;
  }



</style>

<body onload="startTime()">
<div id="timer"></div>
<center><h1 class="a">Currency Converter</h1></center>
<br>


<form align="center" action="convert.php" method="post">


<center>
<div id="box">
<table>
	<tr>
	<td>
		Enter Amount:<input type="number" name="amount" required><br>
	</td>
</tr>
<tr>
<td>
	<br><center>From:<select name='currency_from'>
	 <option value="DKK" selected>Danish Krone(DKK)</option>
	 <option value="USD">US Dollar(USD)</option>
   <option value="GBP">Great British Pound(GBP)</option>
   <option value="RUB">Russian Ruble(RUB)</option>
   <option value="EUR">Euro(EUR)</option>
	 </select>
</td>
</tr>
<tr>
	<td>
	<br><center>To:<select name='currency_to'>
	 <option value="USD" selected>US Dollar(USD)</option>
	 <option value="GBP">Great British Pound(GBP)</option>
   <option value="RUB">Russian Ruble(RUB)</option>
   <option value="DKK">Danish Krone(DKK)</option>
   <option value="EUR">Euro(EUR)</option>
	</select>
</td>
</tr>
<tr>
<td><center><br>
<input type='submit' name='submit' value="Convert" id="ip1"></center>
</td>
</tr>
</table>
</form>
</center>
</head>
</body>
