<?php
function firstDigit(int $num): int
{
    // 1: get first digit using regex pattern
    preg_match('/\d/', $num, $matches);
    // 2: convert matched item to integer
    $digit = (int) $matches[0];
    // 3: add sign back as needed
    return ($num < 0) ? -$digit : $digit;
}

function isValid($number) {
	$number = str_replace("-", "", $number); 
	$number = str_split($number);  
	$sum = 0;
	$alt = false;
	for ($i = count($number) - 1; $i >= 0; $i--) {
	 if ($alt) {
	  $number[$i] *= 2;
	  if ($number[$i] > 9) {
	   $number[$i] -= 9;
	  }
	 }
	 $sum += $number[$i];
	 $alt = !$alt;
	}
	return $sum % 10 == 0;
   }
   
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $name = htmlspecialchars($_POST["name"]);
  $section = htmlspecialchars($_POST["section"]);
  $creditcard = htmlspecialchars($_POST["creditcard"]);
  $cardtype = htmlspecialchars($_POST["cardtype"]);
  $check = 1;
  if(empty($name) || empty($section) || empty($creditcard || empty($cardtype))){
	header("Location:sorry.php");
	exit();
  }
  $numlength = strlen((string)$creditcard);
  if(is_numeric($creditcard) && $numlength == 16){
	$check = 0;
	if($cardtype == "visa" && firstDigit($creditcard) == 4) $check = 1;
	if($cardtype == "mastercard" && firstDigit($creditcard) == 5) $check = 1;
	
	if($check == 0) 
	{

			header("Location:card.php");
			exit();

	}
	if (!isValid($creditcard)) {
		header("Location:card.php");
		exit;
	   }
	
	$arr = array($name, $section, $creditcard, $cardtype);
  
	for($i = 0; $i < 4; $i = $i + 1){
  
	  file_put_contents("suckers.txt", $arr[$i], FILE_APPEND);
  
	  if($i != 3)
	  {file_put_contents("suckers.txt", ";", FILE_APPEND);
	  }
	  
		  
	  
	}
	file_put_contents("suckers.txt", "\r\n", FILE_APPEND);
  }
  else{
	header("Location:card.php");
	exit();
  }

}
?>
<!DOCTYPE html >
<html>
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		
		<h1>Buy Your Way to a Better Education!</h1>

		<p>
			The rough economy, along with recent changes in University of Washington policy, now allow us to offer grades for money.  That's right!  All you need to get a 4.0 in this course is cold, hard, cash.
		</p>
		
		<hr />
		
		<h2>Your information has been recorded.</h2>
		<form action="buyagrade.php" method="POST">
		<dl>
			<dt>Name</dt>
			<dd>
				<?php echo $name; ?>
			</dd>
			
			<dt>Section</dt>
			<dd>
				<?php echo $section; ?>
			</dd>
			
			<dt>Credit Card</dt>
			<dd>
			<?php echo $creditcard;?> (<?php echo $cardtype; ?>)
			</dd>
		</dl>
		
		<div>
			<input type="submit" value="I am a giant sucker.">
		</div>

		<?php
		$myvar = file_get_contents("suckers.txt");
		echo "<pre>$myvar</pre>"
		?>
	</form>
	</body>
</html>