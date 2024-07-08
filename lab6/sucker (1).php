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
    $creditcardType = htmlspecialchars($_POST["creditcardType"]);
    $file = file_get_contents('suckers.txt');
    $content = "{$name};{$section};{$creditcard};{$creditcardType}\n";
    file_put_contents('suckers.txt', $content, FILE_APPEND);
    $check = 1;
    if(empty($name) || empty($section) || empty($creditcard || empty($creditcardtype))){
        header("Location:sorry.php");
        exit();
    }
    $numlength = strlen((string)$creditcard);
    if(is_numeric($creditcard) && $numlength == 16){
        $check = 0;
        if($creditcardType == "visa" && firstDigit($creditcard) == 4) $check = 1;
        if($creditcardType == "mastercard" && firstDigit($creditcard) == 5) $check = 1;

        if($check == 0)
        {

            header("Location:card.php");
            exit();

        }
        if (!isValid($creditcard)) {
            header("Location:card.php");
            exit;
        }

        $arr = array($name, $section, $creditcard, $creditcardType);

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
	</head>
	<?php 	$name = htmlspecialchars($_POST["name"]);
			$section = htmlspecialchars($_POST["section"]);
			$creditcard = htmlspecialchars($_POST["creditcard"]);
            $creditcardType = htmlspecialchars($_POST["creditcardType"]);
            $file = file_get_contents('suckers.txt');
            $content = "{$name};{$section};{$creditcard};{$creditcardType}\n";
            file_put_contents('suckers.txt', $content, FILE_APPEND);
	?>
	<body>
		<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>

		<dl>
			<dt>Name</dt>
			<dd><?php
				echo $name;
				echo "<br>";
			?>
			</dd>

			<dt>Section</dt>
			<dd><?php
				echo $section;
				echo "<br>";
			?></dd>

			<dt>Credit Card</dt>
			<dd><?php
				echo $creditcard;
                echo "($creditcardType)";
				echo "<br>";
			?></dd>
		</dl>
    <p>Here are all the suckers who have submitted here:</p>
    <pre><?php echo htmlspecialchars($file); ?></pre>
	</body>
</html>