<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie ie6 lte9 lte8 lte7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="ie ie7 lte9 lte8 lte7" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="ie ie8 lte9 lte8" lang="en"> <![endif]-->
<!--[if IE 9]> <html class="ie ie9 lte9" lang="en"> <![endif]-->
<!--[if gt IE 9]> <html lang="en"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
        <head>
                <meta charset="utf-8">
                <title>Driverly - Home</title>
                <link rel="stylesheet" media="all" href="_ui/css/main.css">
                <!--[if lt IE 9]>
                        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
                <![endif]-->
        </head>
        <body class="no-js">
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
                                        <nav id="navigation">
                                                <ul>
                                                        <li>
<?php
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
}?>

<li>
 <?php  if ($user) { ?>
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
          xfbml: true,
          oauth: true
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
<body>                        <!-- / wrapper-header -->

   <div id="wrapper-home">
                                <div id="featured-home">
                                        <div class="intro">
                                                <h1>Driverly</h1>
					 <p>When to sell your vehicle</p>
					</div>

<form name="adsForm" method="get" action="page2-3.php">
<table border="0" cellspacing="0" cellpadding="5">
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
<tr>
    <td><input type="text" name="vin" value="<?= requestParam("vin") ?>" size="40" <div align="left"><input class="button" type="submit" name="query" value="Decode VIN"></div></td>
</tr><?php
$vehicleInfo["modelYear"]?> <?=$vehicleInfo["bestMakeName"]?> <?=$vehicleInfo["bestModelName"]?> <?=$vehicleInfo["bestStyleName"]?>
</table>
</form>
<div> 

                                   <p class="dont-have"><a href="page2-3.php">Don't have your VIN?</a></p>
                                        </div>
                                        <!-- / intro -->

                                   <div class="best-time clearfix">
                                                <div class="lights">
                                                         <span class="green-lights"></span> <span class="or">OR</span> <span class="red-lights"></span>
                                                </div>
                                                <!-- / lights -->

                                                <div class="intro-text">
                                                         <h2>Know the best time to sell your vehicle</h2>
                                                         <h3>Driverly predicts the resale value of your vehicle to help you sell for more</h3>
                                                </div>
                                   </div>
                                   <!-- / best-time -->
                                </div>
                                <!-- / featured-home -->

                        </div>
                        <!-- / wrapper-home -->
 <div id="wrapper-content">
                                <div id="content">
                                        <div class="recent-predictions clearfix">
                                                <ul>
                                                        <li>
                                                                <img src="_media/images/home/pic-1.jpg" alt="" />
                                                                <span class="green-lights"></span>
                                                        </li>

                                                        <li>
                                                                <img src="_media/images/home/pic-2.jpg" alt="" />
                                                                <span class="green-lights"></span>
                                                        </li>

                                                        <li class="last-child">
                                                                <img src="_media/images/home/pic-3.jpg" alt="" />
                                                                <span class="red-lights"></span>
                                                        </li>
                                                </ul>
                                        </div>
                                        <!-- / recent-predictions -->

                                        <div class="testimonials clearfix">
                                                <ul>
                                                        <li>
                                                                <blockquote>Using Driverly, I avoided taking a substantial loss on my car by selling before the new model came out.</blockquote>
                                                                <p class="author">- Audrey, Birmingham</p>
                                                        </li>

                                                        <li>
                                                                <blockquote>When I was buying my new car, a pushy sales guy was trying to get my trade-in, but Driverly recommended I wait. I did and ended up getting much more value.</blockquote>
                                                                <p class="author">- Leslie, Atlanta</p>
                                                        </li>

                                                        <li class="last-child">
                                                                <blockquote>After my house, my car is my most valuable asset. I like to know it's value not just today, but in the near future as well. Driverly gives you the whole picture.</blockquote>
                                                                <p class="author">- Chris, Chicago</p>
                                                        </li>
                                                </ul>
                                        </div>
                                        <!-- / testimonials -->
                                </div>
                                <!-- / content -->

                                <footer id="footer">
                                        <ul class="clearfix">
                                                <li><a href="">How it works</a></li>
                                                <li><a href="">Company</a></li>
                                                <li><a href="">Policies</a></li>
                                                <li><a href="">Contact</a></li>
                                                <li class="last-child"><a href="">Blog</a></li>
                                        </ul>
                                </footer>
                                <!-- / footer -->
                        </div>
                        <!-- / wrapper-content -->
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


<?php
    /*

    This PHP implementation cannot use the built-in 'SoapClient' object, due
    to a bug in how it interprets the WSDL.  So instead, we build the requests
    as XML strings, using the curl library to transact with the service, and
    the responses are parsed using the SimpleXML API (the older 'DOMDocument'
    interface may not be compiled into your version of PHP).

    Apparently the bug is that, when there is a "choice" element in the WSDL
    and anything other than the first element in that choice is supplied,
    'SoapClient' will throw an error, expecting the first element to be there.
    Here are some references:

    https://bugs.php.net/bug.php?id=50997
    https://bugs.php.net/bug.php?id=53234

    */


    function requestParam($name) {
        if (array_key_exists($name, $_REQUEST))
            return $_REQUEST[$name];
        else
            return "";
    }

    function call_soap($xml) {
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
        $doc = simplexml_load_string($result);
        return $doc;
    }

    function moneyFormat($dollarValue) {
        return "$$$" . $dollarValue;
    }


    $request = '
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:description7a.services.chrome.com">
   <soapenv:Header/>
   <soapenv:Body>
      <urn:VersionInfoRequest>
         <urn:accountInfo number="282945" secret="1795f48fa5d44557" country="US" language="en" behalfOf="?"/>
      </urn:VersionInfoRequest>
   </soapenv:Body>
</soapenv:Envelope>
    ';
    $dataVersions = call_soap($request);
    $version = "";
    foreach ($dataVersions as $data) {
        if ($data->country == "US")
            $version = $data->country . " " . $data->build . " (" . $data->date . ")";
    }

    $vehicleInfo = "";
    if (array_key_exists("vin", $_REQUEST)) {
        $request = '
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:description7a.services.chrome.com">
   <soapenv:Header/>
   <soapenv:Body>
      <urn:VehicleDescriptionRequest>
         <urn:accountInfo number="282945" secret="1795f48fa5d44557" country="US" language="en" behalfOf="?"/>
         <urn:vin>' . $_REQUEST["vin"] . '</urn:vin>';
        if (!empty($_REQUEST["limitingStyleID"]))
            $request .= '
         <urn:reducingStyleId>' . $_REQUEST["limitingStyleID"] . '</urn:reducingStyleId>';
        if (!empty($_REQUEST["trimName"]))
            $request .= '
         <urn:trimName>' . $_REQUEST["trimName"] . '</urn:trimName>';
        if (!empty($_REQUEST["manufacturerModelCode"]))
            $request .= '
         <urn:manufacturerModelCode>' . $_REQUEST["manufacturerModelCode"] . '</urn:manufacturerModelCode>';
        if (!empty($_REQUEST["wheelBase"]))
            $request .= '
         <urn:wheelBase>' . $_REQUEST["wheelBase"] . '</urn:wheelBase>';
        foreach (explode(",", $_REQUEST["oemOptionCodes"]) as $code)
           if (!empty($code))
                $request .= '
         <urn:OEMOptionCode>' . $code . '</urn:OEMOptionCode>';
        foreach (explode(",", $_REQUEST["equipmentDescriptions"]) as $equip)
            if (!empty($equip))
                $request .= '
         <urn:equipmentDescription>' . $equip . '</urn:equipmentDescription>';
        if (!empty($_REQUEST["exteriorColorName"]))
            $request .= '
         <urn:exteriorColorName>' . $_REQUEST["exteriorColorName"] . '</urn:exteriorColorName>';
        if (!empty($_REQUEST["interiorColorName"]))
            $request .= '
         <urn:interiorColorName>' . $_REQUEST["interiorColorName"] . '</urn:interiorColorName>';
        $request .= '
      </urn:VehicleDescriptionRequest>
   </soapenv:Body>
</soapenv:Envelope>';
        $reducingStyleId = $_REQUEST["limitingStyleID"];
        $vehicleInfo = call_soap($request);
    }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<? 
    $msrp = "";
    $invoice = "";
    $destination = "";

    if ($vehicleInfo !== "") {
        if ($vehicleInfo->responseStatus["responseCode"] != "Successful") {
                   echo("<br><br><b>" . $vehicleInfo->responseStatus["responseCode"] . "</b>");
        } else {
            if ((double)$vehicleInfo->basePrice->msrp["low"] == (double)$vehicleInfo->basePrice->msrp["high"]){
                $msrp = moneyFormat($vehicleInfo->basePrice->msrp["low"]);
            } else {
                $msrp = moneyFormat($vehicleInfo->basePrice->msrp["low"]) . " - "  . moneyFormat($vehicleInfo->basePrice->msrp["high"]);
            }

            if ((double)$vehicleInfo->basePrice->invoice["low"] == (double)$vehicleInfo->basePrice->invoice["high"]) {
                $invoice = moneyFormat($vehicleInfo->basePrice->invoice["low"]);
            } else {
                $invoice = moneyFormat($vehicleInfo->basePrice->invoice["low"]) . " - " . moneyFormat($vehicleInfo->basePrice->invoice["high"]);
            }

            if ((double)$vehicleInfo->basePrice->destination["low"] == (double)$vehicleInfo->basePrice->destination["high"]) {
                $destination = moneyFormat($vehicleInfo->basePrice->destination["low"]);
            } else {
                $destination = moneyFormat($vehicleInfo->basePrice->destination["low"]) . " - " . moneyFormat($vehicleInfo->basePrice->destination["high"]);
            }
?>
<!--
<a href="#bodyTypes">Body Types</a>
<br>
<a href="#marketClasses">Market Classes</a>
<br>
<a href="#gvwr">GVWR Range</a>
<br>
<a href="#engines">Engines</a>
<br>

<a href="#styles">Styles</a>
<br>

<a href="#Tech Specs">Technical Specifications</a>
<br>

<a href="#options">Options</a>
<br>
<a href="#standards">Standards</a>
<br>
<a href="#generics">Generic Equipment</a>
<br>

<hr>
<h1 align="center"><?=$vehicleInfo["modelYear"]?> <?=$vehicleInfo["bestMakeName"]?> <?=$vehicleInfo["bestModelName"]?> <?=$vehicleInfo["bestStyleName"]?></h1>

<br>
<h3 class="label">Prices:</h3>
<table border="0" cellspacing="0" cellpadding="5" width="100%">
<tr>
    <td>&nbsp;</td>
    <td><b>MSRP</b></td>
    <td><b>Invoice</b></td>
    <td><b>Destination</b></td>
</tr>
<tr>
    <td><b>Original Prices</b></td>
    <td><?=$msrp?></td>
    <td><?=$invoice?></td>
    <td><?=$destination?></td>
</tr>
</table>

<a name="bodyTypes" />
<h3 class="label">Body Type:</h3>
<table border="0" cellspacing="0" cellpadding="4" width="100%">
<tr>
    <td align="left" colspan="3"><?=$vehicleInfo->vinDescription["bodyType"]?></td>
</tr>
</table>

<a name="marketClasses" />
<h3 class="label">Market Classes:</h3>
<table border="0" cellspacing="0" cellpadding="4" width="100%">
<tr>
    <th width="70">Id</th>
    <th>Name</th>
</tr>

<?
echo "<pre>";
//print_r($vehicleInfo);
echo "</pre>";
    $vinDesc = $vehicleInfo->vinDescription;
    $marketClasses = $vinDesc->marketClass;
    $row=0;
    foreach ($marketClasses as $marketClass) {
        $rowClass = "";
        if ($row++ % 2 != 0)
            $rowClass = "class=\"grey\"";
?>
<tr <?=$rowClass ?>>
    <td><?=$marketClass["id"]?></td>
    <td><?=$marketClass["value"]?></td>
</tr>

<?
    }
?>
</table>

<a name="gvwr" />
<h3 class="label">GVWR Range:</h3>
<table border="0" cellspacing="0" cellpadding="4" width="100%">
<tr>
    <th width="70">Low</th>
    <th>High</th>
</tr>
<tr>
<td><?=$vehicleInfo->vinDescription->gvwr != null ? $vehicleInfo->vinDescription->gvwr["low"] : 0?></td>
<td><?=$vehicleInfo->vinDescription->gvwr != null ? $vehicleInfo->vinDescription->gvwr["high"] : 0?></td>
</tr>
</table>
<br>

<a name="engines" />
<h3 class="label">Engines:</h3>
<table border="0" cellspacing="0" cellpadding="4" width="100%">
<tr>
    <th width="70">Installed</th>
    <th>Type</th>
    <th>Displacement L/CI</th>
    <th>Fuel Type</th>
    <th>Horsepower</th>
    <th>Fuel Economy city/hwy</th>
    <th>Fuel Capacity</th>
</tr>
<?
    $row =0;
    $engines = $vehicleInfo->engine;
    foreach ($engines as $engine) {
        $rowClass = "";
        if ($row++ % 2 != 0)
            $rowClass = "class=\"grey\"";
        $city = "";
        if($engine->fuelEconomy == null || $engine->fuelCapacity== null) continue;
        if ((double)$engine->fuelEconomy->city["low"] == (double)$engine->fuelEconomy->city["high"]) {
            $city = $engine->fuelEconomy->city["low"];
        } else {
            $city = $engine->fuelEconomy->city["low"] . " - " . $engine->fuelEconomy->city["high"];
        }

        $hwy = "";
        if ((double)$engine->fuelEconomy->hwy["low"] == (double)$engine->fuelEconomy->hwy["high"]) {
            $hwy = $engine->fuelEconomy->hwy["low"];
        } else {
            $hwy = $engine->fuelEconomy->hwy["low"] . " - "  . $engine->fuelEconomy->hwy["high"];
        }

        $capacity = "";
        if ((double)$engine->fuelCapacity["low"] == (double)$engine->fuelCapacity["high"]) {
            $capacity = $engine->fuelCapacity["low"];
        } else {
            $capacity = $engine->fuelCapacity["low"] . " - " . $engine->fuelCapacity["high"];
        }
?>
<tr <?=$rowClass ?>>
    <td align="center"><?=$engine->installed["cause"]!= null && !empty($engine->installed["cause"]) ? $engine->installed["cause"] : "-"?></td>
    <td><?= $engine->engineType?></td>
    <td><?=$engine->displacement["liters"]?>/<?=$engine->displacement["cubicIn"]?></td>
    <td><?=$engine->fuelType?></td>
    <td><?=$engine->horsepower["value"]?> @ <?=$engine->horsepower["rpm"]?></td>
    <td><?=$city?> / <?=$hwy?> <?=$engine->fuelEconomy["unit"]?></td>
    <td><?=$capacity?> <?=$engine->fuelCapacity["unit"]?></td>
</tr>
<?
    }
?>
</table>

<a name="styles" />
<h3 class="label">Styles:</h3>
<table border="0" cellspacing="0" cellpadding="4" width="100%">
<tr>
    <th>Style ID</th>
    <th>Fleet Only</th>
    <th>Division</th>
    <th>Subdivision</th>
    <th>Model</th>
    <th>Style</th>
    <th>Trim</th>
    <th>Code</th>
    <th>MSRP</th>
    <th>Invoice</th>
    <th>Destination</th>
</tr>
<?
     $styles = $vehicleInfo->style;
     $row =0;
     foreach ($styles as $style) {
       $rowClass = "";
       if ($row++ % 2 != 0)
            $rowClass = "class=\"grey\"";
?>
<tr <?=$rowClass ?>>
    <td><?=$style["id"]?></td>
    <td align="left"><?=(boolean)$style["fleetOnly"]? "X" : "&nbsp;"?></td>
    <td><?=$style->division?></td>
    <td><?=$style->subdivision?></td>
    <td><?=$style->model?></td>
    <td><?=$style["name"]?></td>
    <td><?=$style["trim"]?></td>
    <td><?=$style["mfrModelCode"]?></td>
    <td align="right"><?=moneyFormat($style->basePrice["msrp"])?></td>
    <td align="right"><?=moneyFormat($style->basePrice["invoice"])?></td>
    <td align="right"><?=moneyFormat($style->basePrice["destination"])?></td>
</tr>
<?
    }
?>
</table>

<a name="Tech Specs" />
<h3 class="label">Technical Specifications:</h3>
<table border="0" cellspacing="0" cellpadding="4" width="100%">
<tr>
    <th>Title Id</th>
    <th>Low Value</th>
    <th>High Value</th>
    <th>Specification Value</th>
    <th>Condition</th>
    <th>Available Style IDs</th>
</tr>

<?
    $techSpecs = $vehicleInfo->technicalSpecification;
    $row = 0;
    foreach ($techSpecs as $techSpec) {
        $rowClass = "";
        if ($row++ % 2 == 0)
            $rowClass = "class=\"grey\"";
          if($techSpec != null && $techSpec->value != null){
?>


<?
    $row = 0;
    $techSpecValues = $techSpec;
    foreach ($techSpecValues as $techSpecValue) {
        if ($row % 2 != 0)
            $rowClass = "class=\"grey\"";

        foreach ($techSpecValue->styleId as $styleId){
            $row++;
?>

<tr>
    <td><?=$techSpec->titleId?></td>
    <td><?=$techSpec->range["min"]?></td>
    <td><?=$techSpec->range["max"]?></td>
    <td><?= $techSpecValue["value"]?></td>
    <td><?=$techSpecValue["condition"]?></td>
    <td><?=$styleId?></td>
</tr>
<?
    }
}

?>

<?
   }
 }
?>
</table>

<a name="options" />
<h3 class="label">Options:</h3>
<table border="0" cellspacing="0" cellpadding="4" width="100%">
<tr>
    <th width="70">Installed Cause</th>
    <th>OEM Code</th>
    <th>Chrome Code</th>
    <th>Description</th>
    <th>MSRP</th>
    <th>Invoice</th>
</tr>

<?
       $factoryOptions = $vehicleInfo->factoryOption;
       $lastHeader = null;
            $row = 0;
            foreach ($factoryOptions as $option) {
                if((double)$option->price["msrpMin"] == (double)$option->price["msrpMax"]){
                    $msrp = moneyFormat($option->price["msrpMax"]);
                }
                else {
                    $msrp = moneyFormat($option->price["msrpMin"]) . " - " . moneyFormat($option->price["msrpMax"]);
                }

                if((double)$option->price["invoiceMin"] == (double)$option->price["invoiceMax"]){
                    $invoice = moneyFormat($option->price["invoiceMax"]);
                }
                else {
                    $invoice = moneyFormat($option->price["invoiceMin"]) . " - " . moneyFormat($option->price["invoiceMax"]);
                }

                $rowClass = "";
                if (!$option->header == $lastHeader) {
                    $lastHeader = $option->header;
                    $row = 0;

?><tr>
    <td class="header" colspan="6"><?=$option->header?></td>
</tr>

<?
    }
                if ($row++ % 2 != 0)
                    $rowClass = "class=\"grey\"";
?>

<tr <?=$rowClass ?>>
    <td align="left"><?=$option->installed["cause"]!= null && !empty($option->installed["cause"]) ? $option->installed["cause"] : "-"?></td>
    <td><?=$option["oemCode"]?></td>
    <td><?=$option["chromeCode"]?></td>
    <td><?=$option->description?></td>
    <td align="right"><?=$msrp?></td>
    <td align="right"><?=$invoice?></td>
</tr>

<?
    }
?>
</table>

<a name="standards" />
<h3 class="label">Standards:</h3>
<table border="0" cellspacing="0" cellpadding="4" width="100%">
<tr>
    <th width="70">Installed Cause</th>
    <th>Description</th>
</tr>
<?
 $standards = $vehicleInfo->standard;
 $lastHeader = null;
 $row = 0;
 foreach ($standards as $standard) {

    $rowClass = "";
    if(!$standard->header == $lastHeader){
       $lastHeader = $standard->header;
?>
<tr><td class="header" colspan="2"><?=$standard->header?></td></tr>
<?
  }
                if ($row++ % 2 != 0)
                    $rowClass = "class=\"grey\"";
?>
<tr <?=$rowClass ?>>
    <td align="left"><?=$standard->installed["cause"]!= null && !empty($standard->installed["cause"]) ? $standard->installed["cause"] : "-"?></td>
    <td><?=$standard->description?></td>
</tr>
<?
    }
?>
</table>



<a name="generics" />
<h3 class="label">Generic Equipment:</h3>
<table border="0" cellspacing="0" cellpadding="4" width="100%">
<tr>
    <th width="70">Installed Cause</th>
    <th>Category Id</th>
    <th>Style Id</th>
</tr>
<?
  $generics= $vehicleInfo->genericEquipment;
  $row = 0;
  foreach ($generics as $generic) {
                $rowClass="";
                if ($row++ % 2 != 0)
                    $rowClass = "class=\"grey\"";
?>
<tr <?=$rowClass ?>>
    <td align="left"><?=$generic->installed["cause"]!= null && !empty($generic->installed["cause"]) ? $generic->installed["cause"] : "-"?></td>
    <td><?=$generic->categoryId?></td>
    <td><?=$generic->styleId?></td>
</tr>
<?
    }
?>
</table>


<?
}
}
?>





</body>

</html>
