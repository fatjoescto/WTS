<?php
session_start();
require './php-sdk/src/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '275892992478961',
  'secret' => '34abf2a01afa8d4bbe0d5673a336dae1',
));
$user = $facebook->getUser();

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    $user = null;
  }
}

if( intval($_POST["finalSubmit"])!=0 ) {
	header( 'Location: chart2-3.php?msrp=' . $_POST["price"] . '&make=' . 
		urlencode($_POST['vmake']) . '&model=' . urlencode($_POST['vmodel']) . 
		'&year=' . urlencode($_POST['vyear']) . '&cond=' . $_POST['condition'] . 
		'&cur=' . urlencode($_POST['mileage_current']) .
		'&peryr=' . urlencode($_POST['miles']) .
		'&finamt=' . urlencode($_POST['amount_financed']) .
		'&intrate=' . urlencode($_POST['interest_rate']) .
		'&finleng=' . urlencode($_POST['financing_length']) .
		'&purchmonth=' . urlencode($_POST['ownership_month']) .
		'&purchyear=' . urlencode($_POST['ownership_year']) .
		'&fbf=' . urlencode($_POST['v4x4']) .
		'&mpg=' . urlencode($_POST['vmpg']) ) ;
  // check number is greater than 0 and $length digits long
  // returns TRUE on success
	return;
}
function requestParam($name) {
    if (array_key_exists($name, $_REQUEST))
        return $_REQUEST[$name];
    else
        return "";
}

$lastreceived="x";
function int_call_soap($xml) {
    $soapURL ="http://services.chromedata.com/Description/7a";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $soapURL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    $header[] = "SOAPAction: ". "";
    $header[] = "MIME-Version: 1.0";
    $header[] = "Content-type: text/xml; charset=utf-8";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($ch);
    $start = strpos($result, "<S:Body>") + 8;
    $end = strrpos($result, "</S:Body>");
    if (($start <= 0) || ($end <= 0)) {
        echo("<!--\n\n" . $result . "\n\n-->\n");
        die("Response returned from '$soapURL' doesn't appear to be a SOAP document.");
    }
    $result = substr($result, $start, $end - $start);
	//return $result;
	global $lastreceived;
	$lastreceived = $result;
    $doc = simplexml_load_string($result);
    return $doc;
}

function call_soap($xml) {
	$newxml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:description7a.services.chrome.com">
	<soapenv:Header/>
	<soapenv:Body>' . $xml . '</soapenv:Body>
</soapenv:Envelope>	';
	return int_call_soap($newxml);
}

$divs = "";
function loadDivisions($foryear) {
	$divs = call_soap('<DivisionsRequest modelYear="' . $foryear . '" xmlns="urn:description7a.services.chrome.com">
		<accountInfo number="282945" secret="1795f48fa5d44557" country="US" language="en"/>
	</DivisionsRequest>
');
	return $divs;
}

if( $_POST['year']!="" ) {
	$divs = loadDivisions($_POST['year']);
}

function loadModelsByDivision($divid,$modelyear) {
	return call_soap('<ModelsRequest xmlns="urn:description7a.services.chrome.com">
<accountInfo number="282945" secret="1795f48fa5d44557" country="US" language="en"/>
<modelYear>' . $modelyear . '</modelYear>
<divisionId>' . $divid . '</divisionId>
</ModelsRequest>');
}

$models = "";
if( $_POST["make"]!="" ) {
	$models=loadModelsByDivision($_POST["make"],$_POST["year"]);
}

function loadStylesByModel($modelId) {
	return call_soap('<StylesRequest modelId="' . $modelId . '" xmlns="urn:description7a.services.chrome.com">
<accountInfo number="282945" secret="1795f48fa5d44557" country="US" language="en"/>
</StylesRequest>');
}

$styles = "";
if( $_POST["model"]!="" ) {
	$styles=loadStylesByModel($_POST["model"]);
}

function loadDescription($styleId) {
	return call_soap('<VehicleDescriptionRequest xmlns="urn:description7a.services.chrome.com">
<accountInfo number="282945" secret="1795f48fa5d44557" country="US" language="en"/>
<styleId>' . $styleId . '</styleId>
</VehicleDescriptionRequest>');
}

function loadDescriptionByVin($vin) {
	return call_soap('<VehicleDescriptionRequest xmlns="urn:description7a.services.chrome.com">
<accountInfo number="282945" secret="1795f48fa5d44557" country="US" language="en"/>
<vin>' . $vin . '</vin>
</VehicleDescriptionRequest>');
}

$vdesc = "";
$price = "";
$stockImage="";

$vinmake= "";
$vinyear = "";
$vinmodel = "";
$vinstyle = "";
$vin4x4 = "";
$vinmpg = "";
$vinstyle = "";

function updatePrice($vdesc) {
	global $price;
	global $stockImage;
	global $vinmake;
	global $vinyear;
	global $vinmodel;
	global $vin4x4;
	global $vinmpg;
	global $vinstyle;
	$highv = intval($vdesc->basePrice->msrp["high"]);
	$lowv = intval($vdesc->basePrice->msrp["low"]);
	$diffv = $highv - $lowv;
	$price = $lowv + $diffv * .75;	
	$stockImage = $vdesc->style[0]->stockImage["url"];
	if( $vdesc->style[0]["drivetrain"]=="Four Wheel Drive" ) {
		$vin4x4 = 1;
	} else {
		$vin4x4 = 0;
	}
	$vinyear = $vdesc["modelYear"];
	$vinmake = $vdesc["bestMakeName"];
	$vinmodel = $vdesc["bestModelName"];
	$vinstyle = $vdesc["bestStyleName"];
	if( $vinstyle=="" ) {
		$vinstyle = $vdesc->style[0]->name;
	}
	$vinmpg = $vdesc->engine[0]->fuelEconomy->hwy["low"];
	
}	


if( $_GET['vin'] ) { 
	global $vdesc;
	$vdesc = loadDescriptionByVin($_GET["vin"]);
	updatePrice($vdesc);
}

if( $_POST["version"]!="" ) {
	global $vdesc;
	$vdesc=loadDescription($_POST["version"]);
	updatePrice($vdesc);
}



?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie ie6 lte9 lte8 lte7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="ie ie7 lte9 lte8 lte7" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="ie ie8 lte9 lte8" lang="en"> <![endif]-->
<!--[if IE 9]> <html class="ie ie9 lte9" lang="en"> <![endif]-->
<!--[if gt IE 9]> <html lang="en"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Driverly - Info</title>
		<link rel="stylesheet" media="all" href="_ui/css/main.css">
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script type="text/javascript">
			function selYear() {
				var frm=document.getElementById('mainForm');
				document.getElementById('make').options.length=0;
				document.getElementById('model').options.length=0;
				document.getElementById('version').options.length=0;
				frm.submit();
			}
			function selMake() {
				var frm=document.getElementById('mainForm');
				document.getElementById('model').options.length=0;
				document.getElementById('version').options.length=0;
				frm.submit();
			}
			function selModel() {
				var frm=document.getElementById('mainForm');
				document.getElementById('version').options.length=0;
				frm.submit();
			}
			function selVersion() {
				var frm=document.getElementById('mainForm');
				frm.submit();
			}
			function onNext() {
<?php if(!$user){
echo "alert('Please login to proceed to WTS interface');";
echo "return;";
}
?>
				var om=document.getElementById('ownership-month');
				var oy=document.getElementById('ownership-year');
				var mp=document.getElementById('mileage-purchased');
				if (isNaN(parseInt(mp.value))){
					alert('Please enter a valid number for the miles on the car when purchased...FLAPJACK');
					return;
				}
				var mc=document.getElementById('mileage-current');
				if (isNaN(parseInt(mc.value))){
					alert('Please enter a valid number for the current mileage.. ST00G3');
					return;
				}
				var m=document.getElementById('miles');
				if (isNaN(parseInt(m.value))){
					alert('Please enter a valid number for the average miles driven per year.. YA MOOK');
					return;
				}
				var yesfi=document.getElementById('radio-yes');
				var pc=document.getElementById('postal-code');
				if (isNaN(parseInt(pc.value))){
					alert('Please enter a valid 5 digit zipcode... WHEEZER');
					alert(yesfi.value);
					return;
				}
				var af=document.getElementById('amount-financed');
				if (isNaN(parseInt(af.value))){
				alert('Please enter a valid number for the initial loan amount... GEETCH');
					return;
				}
				var ir=document.getElementById('interest-rate');
				if (isNaN(parseInt(ir.value))){
				alert('Please enter an interest rate in the form 2 or 4.5  .. STUBBLE MUFFIN!');
					return;
				}
				var flo=document.getElementById('financing-length');
				if (isNaN(parseInt(flo.value))){
					alert('Please enter a valid number for the length of the loan... GOOBER');
					return;
				}
				var frm=document.getElementById('mainForm');
				var fld=document.getElementById('finalSubmit');
				fld.value=1;
				frm.submit();
}		
			function onLoaded() { 
				var img=document.getElementById('vpic');
<?php 
if( $stockImage ) {
	echo 'img.src="' . $stockImage . '";';
}
?>			
			}
		</script>
			
		
	</head>
	<body class="no-js" onload='onLoaded()'>
<?php
//echo 'year is: ' . $_POST["year"] . '     date is: ' . date(DATE_RFC822) . '     version: ' . $version . '<br/>';
//var_dump($vdesc);
if ($vdesc) {
	
	//echo 'price is: ' . $price . '<br/>';
	//echo $vinmake . $vinyear . 	$vinmodel . $vinstyle . '<br/>';
	//echo $stockImage . '<br/>';
	//echo 'session:' . $_SESSION['smake'];
	//var_dump($vdesc->engine[0]->fuelEconomy->hwy["low"]);
	//echo 'MPG' . $vinmpg . '<br/>';
}
?>
		<div class="container">
		
			<nav id="accessibility-nav">
				<ol>
					<li><a href="#navigation">Skip to navigation</a></li>
					<li><a href="#content">Skip to content</a></li>
				</ol>
			</nav>
			<!-- / accessibility-nav -->
			<hr />
			
			<div id="wrapper-header">
				<header id="header" class="clearfix">
					<a href="#" rel="index" title="Go to homepage" class="ir site-name">Driverly<span></span></a>
					
					<nav id="navigation">
						<ul>
							 <li>
<?php if ($user) { ?>
<fb:login-button autologoutlink="true" perms="user_likes" size="small"></fb:login-button>
<?php } else { ?>
      <fb:login-button> </fb:login-button>
    <?php } ?>
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId: '<?php echo $facebook->getAppID() ?>',
          cookie: true,
          xfbml: true
        });
        FB.Event.subscribe('auth.login', function(response) {
          window.location.reload();
        });
        FB.Event.subscribe('auth.logout', function(response) {
          window.location.reload();
        });
      };
      (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol +
          '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
      }());
    </script></li>
<li class="nav-signup"><a href="#">Sign Up</a></li>
	<li class="nav-twitter"><a href="http://twitter.com/driverly">Twitter</a></li>
	<li class="nav-facebook"><a href="http://facebook.com/driverly">Facebook</a></li>
	</ul>
	</nav>
	<!-- / navigation -->
	
	</header>
	<!-- / header -->
	<hr />
	
	</div>
	<!-- / wrapper-header -->
	
	<div id="wrapper-content">
	<div id="content">
	<div class="breadcrumbs">
	<a href="">Vehicle Description</a> > <a href="" class="current">Ownership Information</a> > When to Sell
					</div>
					<!-- / breadcrumbs -->
					
<form id="mainForm" name="mainForm" method="POST" action="page2-3.php">
<input name="finalSubmit" id="finalSubmit" type="hidden" value="0" ></input>
<input name="price" id="price" type="hidden" value="<?php echo $price;?>" ></input>
<input name="vyear" id="vyear" type="hidden" value="<?php echo $vinyear;?>" ></input>
<input name="vmake" id="vmake" type="hidden" value="<?php echo $vinmake;?>" ></input>
<input name="vmodel" id="vmodel" type="hidden" value="<?php echo $vinmodel;?>" ></input>
<input name="v4x4" id="v4x4" type="hidden" value="<?php echo $vin4x4;?>" ></input>
<input name="vmpg" id="vmpg" type="hidden" value="<?php echo $vinmpg;?>" ></input>
						<div class="info-box confirm-vehicle">
				<h2>Please confirm vehicle</h2>
				<div class="clearfix">
				<div class="vehicle-picture">
				<img id='vpic' src="_media/images/info/pic-vehicle-info.jpg" alt="" />
				</div>
				<!-- / vehicle-picture -->
				<div class="vehicle-details">
				<ul>
				<li>
				<select id="year" name="year" onchange="selYear()">
				<option value="">Please select a year</option>
<?php 

for( $ix=2012; $ix > 1990; $ix-- ) {
	echo '<option value="' . $ix . '"';
	if( $ix == intval($_POST["year"]) ||
		$ix == intval($vinyear) ) {
		echo ' selected';
	}
	echo '>' . $ix . '</option>';
}
?>										
	</select>
	</li>
	<li>
	<select id="make" name="make" onchange="selMake()">
<?php
if( $divs ) {
	echo '<option value="' . $ix . '">&nbsp;</option>"';
	foreach($divs as $data) {
		if( $data == "" )
			continue;
		echo '<option value="' . $data["id"] . '"';
		if( $data["id"] == $_POST['make'] ) {
			echo ' selected';
			$_SESSION['smake']=htmlspecialchars($data);
		}
		echo '>' . htmlspecialchars($data) . '</option>\r\n';
	}
} else if( $vinmake ) {
	echo '<option value="0">' . htmlspecialchars($vinmake) . '</option>\r\n';
}
?>										
	</select>
	</li>
	<li>
	<select id="model" name="model" onchange="selModel()">
<?php
if( $models ) {
	echo '<option value="' . $ix . '">&nbsp;</option>"';
	foreach($models as $data) {
		if( $data == "" )
			continue;
		echo '<option value="' . $data["id"] . '"';
		if( $data["id"] == $_POST["model"] ) {
			echo ' selected';
			$_SESSION['smodel']=htmlspecialchars($data);
		}
		echo '>' . htmlspecialchars($data) . '</option>\r\n';
	}
} else if( $vinmodel ) {
	echo '<option value="0">' . htmlspecialchars($vinmodel) . '</option>\r\n';
}
?>										
	</select>
	</li>
	<li>
	<select name="version" id="version" onchange="selVersion()">
<?php
if( $styles ) {
	echo '<option value="' . $ix . '">&nbsp;</option>"';
	foreach($styles as $data) {
		if( $data == "" )
			continue;
		echo '<option value="' . $data["id"] . '"';
		if( $data["id"] == $_POST["version"] ) {
			echo ' selected';
			$_SESSION['sstyle']=htmlspecialchars($data);
		}
		echo '>' . htmlspecialchars($data) . '</option>\r\n';
	}
} else if( $vinstyle ) {
	echo '<option value="0">' . htmlspecialchars($vinstyle) . '</option>\r\n';
}
?>										
</select>
</li>
</ul>
</div>
<!-- / vehicle-details -->
</div>
<!-- / clearfix -->
</div>	
<!-- / info-box -->

<div class="info-box ownership-info">
<h2>Ownership information</h2>

<ul>
<li>
<label>When did you purchase your vehicle:</label>
<select id="ownership-month" name="ownership_month" class="ownership-month">
			<option value="">Month</option>
			<option value="1">January</option>
			<option value="2">February</option>
			<option value="3">March</option>
			<option value="4">April</option>
			<option value="5">May</option>
			<option value="6">June</option>
			<option value="7">July</option>
			<option value="8">August</option>
			<option value="9">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
		</select>
	<select id="ownership-year" name="ownership_year" class="ownership-year">
			<option value="">Year</option>
			<option value="2012">2012</option>
			<option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                        <option value="1989">1989</option>
                        <option value="1988">1988</option>
                        <option value="1987">1987</option>
                        <option value="1986">1986</option>
                        <option value="1985">1985</option>
                        <option value="1984">1984</option>
                        <option value="1983">1983</option>
                        <option value="1982">1982</option>
                        <option value="1981">1981</option>
                        <option value="1980">1980</option>
	</select>
</li>
<li>

	<label for="mileage-purchased">Mileage when purchased:</label>
	<input type="text" name="mileage_purchased" id="mileage-purchased" />
</li>
<li>
	<label for="mileage-current">Current mileage:</label>
	<input type="text" name="mileage_current" id="mileage-current" />
</li>
<li>
	<label for="miles">Estimated miles driven per year:</label>
	<input type="text" name="miles" id="miles" />
</li>
<li>
<label>Condition: </label>
<input type="radio" value="excellent" name="condition" class="radio-first" id="radio-excellent" checked="checked" /> <label for="radio-excellent" class="radio-label">Excellent</label>
<input type="radio" value="good" name="condition" class="radio-good" id="radio-good" /> <label for="radio-good" class="radio-label">Good</label>
<input type="radio" value="fair" name="condition" class="radio-fair" id="radio-fair" /> <label for="radio-fair" class="radio-label">Fair</label>
<input type="radio" value="poor" name="condition" class="radio-poor" id="radio-poor" /> <label for="radio-poor" class="radio-label">Poor</label>
</li>
								<li>
<label for="postal-code">Postal code:</label>
<input type="text" name="postal_code" id="postal-code" />
</li>
</ul>
</div>	
<!-- / info-box -->
<div class="info-box financing-info">
<h2>Financing information</h2>

<p>This part is optional, but really helps give you the best results! Enter as much as you know.</p>
<p class="is-vehicle-financed">
<label>Is your vehicle financed: </label>
<input type="radio" value="no" name="vehicle_financed" class="radio-no" id="radio-no" checked="checked" /> <label for="radio-no" class="radio-label">No</label>
<input type="radio" value="yes" name="vehicle_financed" class="radio-yes" id="radio-yes" /> <label for="radio-yes" class="radio-label">Yes</label>
</p>

<div id="financed-yes">
<ul>
<li>
<label for="amount-financed">Amount financed: a dollar value like 15000</label>
<input type="text" name="amount_financed" id="amount-financed" />
</li>
<li>
<label for="interest-rate">Interest rate: a number like 2 or 2.25 etc.</label>
<input type="text" name="interest_rate" id="interest-rate" />
</li>
<li>
<label>Financing length: number of months financed: </label>
<input type="text" name="financing_length" id="financing-length"/>
</li>
</ul>
</div>
<!-- / financed-yes -->

</div>	
<!-- / info-box -->

<div class="button-area">
<input type="button" value="Next" class="button" onclick="onNext()" />
</div>
<!-- / button-area -->
</form>
</div>
<!-- / content -->

<footer id="footer">
<ul class="clearfix">
<li><a href="http://www.driverly.com/howitworks.html">How it works</a></li>
<li><a href="http://www.driverly.com/company.html">Company</a></li>
<li><a href="http://www.driverly.com/policies.html">Policies</a></li>
<li><a href="http://www.driverly.com/contact.php">Contact</a></li>
<li class="last-child"><a href="">Blog</a></li>
</ul>
</footer>
<!-- / footer -->
</div>
<!-- / wrapper-content -->

</div>
<!-- / container -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='_ui/js/jquery-1.7.1.min.js'>\x3C/script>")</script>
<script src="_ui/js/jsized.form.jquery/form.select.jquery.min.js"></script>
<script src="_ui/js/main.js"></script>
</body>
</html>
