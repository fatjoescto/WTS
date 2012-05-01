<?php 
session_start();
require './php-sdk/src/facebook.php';
require './loancalc.php';

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

function columnFromCondition($condstr) {
	if( $condstr=="excellent" ) {
		return 0;
	} else if( $condstr=="good" ) {
		return 1;
	} else if( $condstr=="fair" ) {
		return 2;
	} else if( $condstr=="poor" ) {
		return 3;
	}
	// default to 2 if not known.
	return 2;
}



//$row;
//$col;

function adjustRateByDifference($rate,$depmileage,$actmileage) {
	global $dbg;
	$diff = ($depmileage - $actmileage);
	$dbg = 'diff=' . $diff;
	$rate = $rate + $diff/3000;
	return $rate;
}

function getValueByMileage($mileage,$cond) {
	global $col;
	$col = columnFromCondition($cond);
	// Depreciation array columns are excellent, good, fair, poor, and mileage
	$dep = array (
		87.75,	81.00,	78.00,	75.00,	15000,
		76.35,	69.00,	65.40,	61.80,	30000,
		65.90,	58.00,	53.85,	49.70,	45000,
		57.35,	49.00,	44.40,	39.80,	60000,
		48.80,	40.00,	34.95,	29.90,	75000,
		44.05,	35.00,	29.70,	24.40,	90000,
		39.30,	30.00,	24.45,	18.90,	105000,
		34.55,	25.00,	19.20,	13.40,	120000,
		29.80,	20.00,	13.95,	7.90,	135000,
		25.05,	15.00,	8.70,	2.40,	150000,
		0,0,0,0, 1000000
		);

	global $dbg;
	for( $i = 0; $i < 10 ; $i++ ) {
		if( $dep[$i * 5 + 4]>floatval($mileage) ) {
			$rate=$dep[$i * 5 + $col];
			$rate = adjustRateByDifference($rate,$dep[$i * 5 + 4],floatval($mileage));
			return floatval($_GET['msrp']) * $rate / 100;
		}
	}
	return floatval($_GET['msrp']) * $dep[$i * 5 + $col]/100;
}

$chartvals = "";

function calcDepreciationValues() {
	global $chartvals;
	$curm = intval($_GET['cur']);
	$estyr = intval($_GET['peryr']);
	$cond = $_GET['cond'];
	$estmo = $estyr / 12;
	for( $i = 0; $i<9; $i++) {
		if ($i>0 ) {
			$chartvals = $chartvals . ',';
		}
		$chartvals = $chartvals . getValueByMileage($curm,$cond);
		$curm += $estmo;
	}
}
// Calculate loan values for charting
?>
<?php 
// Now we kick off the Depreciation calculations
calcDepreciationValues();
?>

<?php
$zipcode = intval($_GET['zipcode']);
function getLocalAreaInfoByZipCode($zipcode){
$zipcode = intval($_GET['zipcode']);
mysql_connect("localhost", "root", "G0dIsGreat") or die(mysql_error());
mysql_select_db("driverly_dev") or die(mysql_error());
$result = mysql_query("SELECT s.State, s.isTireTough, s.is4x4, s.isConvertible, s.latitude, s.longitude, f.average_fuel_price FROM driverly_dev.zipdata s, tbl_average_fuel_price f WHERE s.state=f.state AND s.zipcode=" . intval($_GET['zipcode']) );
/////$result = mysql_query("SELECT s.State, s.isTireTough, s.is4x4, s.isConvertible, s.latitude, s.longitude, f.state, f.average_fuel_price FROM driverly_dev.zipdata s, driverly_dev.tbl_average_fuel_price f WHERE s.zipcode=". $_GET['ZipCode']. "AND f.state = s.State");
$rows = mysql_fetch_array( $result );
$rows.join();
global $averagestategasprice;
$averagestategasprice=$rows[6];
}
?>
<?php
$zipcode = intval($_GET['ZipCode']);
getLocalAreaInfoByZipCode($zipcode);
?>
<script type="text/javascript">
var localgasprice='sdfsdf';
//alert(localgasprice);
//alert(<?php echo intval($_GET['zipcode'])?> );
</script>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie ie6 lte9 lte8 lte7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="ie ie7 lte9 lte8 lte7" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="ie ie8 lte9 lte8" lang="en"> <![endif]-->
<!--[if IE 9]> <html class="ie ie9 lte9" lang="en"> <![endif]-->
<!--[if gt IE 9]> <html lang="en"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Driverly - WTS Interface</title>
		<link rel="stylesheet" media="all" href="_ui/css/main.css">
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
	  var burnRate=0;
	  var isSelling=false;
      function drawChart() {
		var initVal=<?php echo $_GET['msrp']; ?>;
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'Loan');
		data.addColumn('number', 'Car value');
		var idx;
		var arr=new Array();
		var fields;
		var vals = '<?php echo $chartvals; ?>'.split(',');
		var mortgage = '<?php echo getAllValues(intval($_GET["finamt"]),
                    intval($_GET["finleng"]),
                    intval($_GET["purchmonth"]),
                    intval($_GET["purchyear"]),
                    intval($_GET["intrate"])); ?>'.split(',');
		var dt1 = new Date();
		var mo=dt1.getMonth();
		var yr=dt1.getFullYear();
		var vyear=<?php if( $_GET["year"] ) echo $_GET["year"]; else echo '0'; ?>;
		var yearBurn=burnRate*12;
		var totalBurn=yearBurn*(vyear-yr);
		var remainingLoan=initVal-totalBurn;
		var mos = "Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dev".split(',');
//
//Define Vehicle age variable. Vehicle age is equal to this year minus vehicle year of manufacture
//
		var vehicleAge = yr- vyear;
//
//Define year1 year 2-5 and year6 on depreciation rates.
//
		var year1DepPercent = initVal * .0168;
	        var year2to5DepPercent = initVal * .0086;
	        var year6OnDepPercent = initVal * .005;
//
// Define burn comparison based upon year1 year2-5 year6 on
		var burnCompare =0;
                if ( vehicleAge>=0 && vehicleAge<=1)
                        burnCompare=year1DepPercent;
                else if( vehicleAge>=2 && vehicleAge<=5)
                        burnCompare=year2to5DepPercent;
                else
                        burnCompare=year6OnDepPercent;
////
		burnRate=0;
		for( idx=0; idx<vals.length; idx++ ) {
			fields=new Array(3);
			fields[0]=mos[mo]+" "+yr;
			fields[1]=parseInt(mortgage[idx]);
			//fields[1]=remainingLoan;
			fields[2]=parseInt(vals[idx]);
			if( idx>0 )
				burnRate+=vals[idx]-vals[idx-1];
			arr.push(fields);
			mo++;
			if( mo>=12 ) {
				mo=0;
				yr++;
			}
		}
		burnRate/=(vals.length-1);
		burnRate = Math.round(-burnRate);
		if( burnRate>0 )
		{
			document.getElementById("lossamt").innerHTML="Losing $" + burnRate + " per month";
			if( burnCompare > burnRate ) {
				document.getElementById("redlight").className="your-result-lights hold";
				document.getElementById("redlight2").className="result-lights hold";
				document.getElementById("depmsg").innerHTML="Your vehicle is depreciating <br/>slower than average";
				document.getElementById("buysell").innerHTML="HOLD";
				document.getElementById("redlight2").innerHTML="HOLD";
			} else {
				document.getElementById("redlight").className="your-result-lights sell";
				document.getElementById("redlight2").className="result-lights green";
				document.getElementById("depmsg").innerHTML="Your vehicle is depreciating <br/>faster than average";
				document.getElementById("buysell").innerHTML="SELL";
				document.getElementById("redlight2").innerHTML="SELL";
				isSelling=true;
			}
		}
		else
		{
			document.getElementById("lossamt").innerHTML="Gaining $" + (-burnRate) + " per month";
			document.getElementById("redlight").className="your-result-lights hold";
			document.getElementById("redlight2").className="result-lights hold";
			document.getElementById("depmsg").innerHTML="Your vehicle is depreciating <br/>slower than average";
			document.getElementById("buysell").innerHTML="HOLD";
			document.getElementById("redlight2").innerHTML="HOLD";
		}
		
		
        data.addRows(arr);

        var options = {
          width: 604, height: 390,
          title: 'When To Sell',
          vAxis: {title: 'Value',  titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
	  google.load('visualization', '1', {packages:['gauge']});
      google.setOnLoadCallback(drawMeter);
      function drawMeter() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Label');
        data.addColumn('number', 'Value');
        data.addRows([
          ['Rate', burnRate]
        ]);

        var options = {
          width: 400, height: 120,
          redFrom: 700, redTo: 1000,
          yellowFrom:450, yellowTo: 700,
		  max: 1000,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('thegauge'));
        chart.draw(data, options);
      }
	  function isMonth(idx) {
	    var dt=new Date();
		if( dt.getMonth()==idx) {
			return true;
		}
		return false;
	  }
	  function isWinter() {
		var dt=new Date();
		idx=dt.getMonth();
	    if( idx<2 )
		  return true;
		if( idx>=11 ) 
		  return true;
		return false;
	  }
	  function isFall() {
		var dt=new Date();
		idx=dt.getMonth();
	    if( idx==10 || idx==9 || idx==8 )
			return true;
		return false;
	  }
	  function isSpring() {
		var dt=new Date();
		idx=dt.getMonth();
	    if( idx==2 || idx==3 || idx==4 )
			return 
	  }
	  function isSummer() {
		var dt=new Date();
		idx=dt.getMonth();
	    if( idx==2 || idx==3 || idx==4 )
			return 
	  }
	  google.setOnLoadCallback(buildRecommendations);
      function buildRecommendations() {
		var arr=new Array();
		var fbf = <?php echo $_GET["fbf"] ?>;
		var postal_code = <?php echo $_GET["zipcode"] ?>;
		var ownership_month= <?php if( $_GET["purchmonth"] ) echo $_GET["purchmonth"]; else echo '0'; ?>;
		var ownership_year= <?php if( $_GET["purchyear"] ) echo $_GET["purchyear"]; else echo '0'; ?>;
		var financing_length= <?php if( $_GET["finleng"] ) echo $_GET["finleng"]; else echo '0'; ?>;
		var amount_financed= <?php if( $_GET["finamt"] ) echo $_GET["finamt"]; else echo '0'; ?>;
		var interest_rate= <?php if( $_GET["intrate"] ) echo $_GET["intrate"]; else echo '0'; ?>;
		var mileage= <?php if( $_GET["cur"] ) echo $_GET["cur"]; else echo '0'; ?>;
		var mpg= <?php if( $_GET["mpg"] ) echo $_GET["mpg"]; else echo '0'; ?>;
		var dt=new Date();
		var month=dt.getMonth();
		var year=dt.getFullYear();
		var vyear=<?php if( $_GET["year"] ) echo $_GET["year"]; else echo '0'; ?>;
		var msrp= <?php if( $_GET["msrp"] ) echo $_GET["msrp"]; else echo '0'; ?>;
	        var vehicleAge = year- vyear;
	        var year1DepPercent = msrp * .0168;
	        var year2to5DepPercent = msrp * .086;
	        var year6OnDepPercent = msrp * .05;
 		var gpfc= <?php echo ($averagestategasprice)?>;
		var nationalGasAverage = 3.809;
/* The code here is for testing the gas price logic
if (gpfc >= nationalGasAverage)
	alert ('People in your state are paying $'+gpfc-nationalGasAverage+' more than the national average');
if (gpfc <= nationalGasAverage)
	alert ('Local gas price of $'+ gpfc +'is lower than the national average of $' + nationalGasAverage +'.');
*/ 
		if( isSelling ) {
			if( mileage>=20000 && mileage<=30000 && msrp >=70000 && vehicleAge<=5)
				arr.push('Sharp drop in value at 30,000 miles');
				arr.push('Guard against depreciation with regular detailing');
			if( mileage>=20000 && mileage<=30000 && msrp >=70000 && vehicleAge>=5)
				arr.push('Sharp drop in value at 30,000 miles');
			if( mileage>=70000 && mileage<=80000 )
				arr.push('Sharp drop in value at 80,000 miles');
			if( mileage>=90000 && mileage<=100000 ) 
				arr.push('Sharp drop in value at 100,000 miles');
			if( mileage>=120000 && mileage<=130000 ) 
				arr.push('Sharp drop in value at 130,000 miles');
			if( fbf && (isFall() || isWinter()) ) 
				arr.push('4x4 values higher in fall and winter');
	
	//	Convertible values higher in spring and summer
	//	IF vehicle is convertible and current month is March through August
	
			if( vehicleAge > 5 && vehicleAge < 10)
				arr.push('After 5 years this model becomes more difficult to finance');
			if( year - vyear > 10 )
				arr.push('After 10 years this model becomes more difficult to finance');
			if( msrp < 10000 && IsWinter())
				arr.push('Less expensive models worth more during tax rebate season');
			if( mpg<=25 && (gpfc >= nationalGasAverage))
				arr.push('Poor fuel economy less attractive while gas prices are high');
			if( mpg>=26 && (gpfc <= nationalGasAverage))
				arr.push('Good fuel economy less attractive while gas prices are low');
		} else {
			
			if( fbf && (isSpring() || isSummer()) ) 
				arr.push('4x4 values lower in spring and summer');
	
//	Convertible values lower in fall and winter
//•	IF convertible and current month is September through February 

			if( mpg<=25 && (gpfc >= nationalGasAverage))
				arr.push('Poor fuel economy less attractive while gas prices are high');
			if( mpg<=25 && (gpfc <= nationalGasAverage))
				arr.push('No rush to sell');
			if( mpg>=26 && (gpfc >= nationalGasAverage))
				arr.push('Good fuel economy less attractive while gas prices are low');
			if( mpg>=26 && (gpfc <= nationalGasAverage))
				arr.push('Good fuel economy less attractive while gas prices are low');
				arr.push('No rush to sell');

						
//	You’re currently underwater on your loan (owe more than car is worth)
//•	IF current loan value is higher than current vehicle value
			
//	Your loan is almost paid off, wait until then.
//•	IF loan value reaches 0 in next 3 months
		}	
			
		var rec1=document.getElementById('rec1');
		var rec2=document.getElementById('rec2');
		var rec3=document.getElementById('rec3');
		var rec4=document.getElementById('rec4');
		
		rec1.innerHTML="";
		rec1.style.display="none";
		rec2.innerHTML="";
		rec2.style.display="none";
		rec3.innerHTML="";
		rec3.style.display="none";
		rec4.innerHTML="";
		rec4.style.display="none";
		
		if( arr.length>0 ) {
			rec1.innerHTML = arr[0];
			rec1.style.display="";
		}
		if( arr.length>1 ) {
			rec2.innerHTML = arr[1];
			rec2.style.display="";
		}
		if( arr.length>2 ) {
			rec3.innerHTML = arr[2];
			rec3.style.display="";
		}
		if( arr.length>3 ) {
			rec4.innerHTML = arr[3];
			rec4.style.display="";
		}
	  }
    </script>

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
      appId      : '275892992478961', // App ID
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });
FB.Event.subscribe('auth.login', function(response) {
          window.location.reload();
        });

    // Additional initialization code here
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>

</li>

					<li class="nav-signup"><a href="javascript:window.location.reload();"onclick="FB.logout();">Sign Out</a></li>
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
					<h2 class="result-title"><?php echo 'Your ' . $_GET['year'] . ' ' .$_GET['make'] . ' ' . $_GET['model']; ?> </h2>
					
					<div class="results-wrapper clearfix">
						<div class="graph-wrapper">
							<div class="graph-options-wrapper">
								<div class="graph-options">
							<BR>
							<p>&nbsp</P>	
							<BR>
								</div>
								<!-- / graph-options -->
							</div>
							<!-- / graph-options-wrapper -->
							
							<div id="chart_div" class="graph">
							</div>
							<!-- / graph -->
						</div>
						<!-- / graph-wrapper -->
						
						<div class="your-result">
							<ul>
								<li>
									<div class="centerLight">
										<div id='redlight' class="your-result-lights sell">
										
										</div>
									</div>
									<!-- / your-result-lights -->
									<h3 id='buysell'>SELL</h3>
								</li>
								
								<li class="last-child">
									<div class="centerLight">
										<div id="thegauge" ></div>
									</div>
									<h3><div id="lossamt"></div></h3>
									<p id="depmsg">
										
									</p>
									<!-- / your-result-speedometer -->
									
								</li>
								<!-- / last-child -->
								
							</ul>
						</div>
						<!-- / your-result -->
						
					</div>
					<!-- / results-wrapper -->
					
					<div class="result-box clearfix">
						<div id="redlight2" class="result-lights green">
							Sell
						</div>
						<!-- / result-lights -->
						
						<div class="result-details">
							<ul>
								<li id="rec1"></li>
								<li id="rec2"></li>
								<li id="rec3"></li>
								<li id="rec4"></li>
							</ul>
						</div>
						<!-- / result-details -->
					</div>
					<!-- / result-box -->
					
					<!-- / recommendation-box -->
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
		<!-- / container -->
	
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script>window.jQuery || document.write("<script src='_ui/js/jquery-1.7.1.min.js'>\x3C/script>")</script>
		<script src="_ui/js/jsized.form.jquery/form.select.jquery.min.js"></script>
		<script src="_ui/js/main.js"></script>
	</body>
</html>
