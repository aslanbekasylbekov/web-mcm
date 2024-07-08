

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
		
		<h2>Give Us Your Money</h2>
		<form action="buyagrade.php" method="POST">
		<dl>
			<dt>Name</dt>
			<dd>
				<input type="text" name="name">
			</dd>
			
			<dt>Section</dt>
			<dd>
            <select name="section">
                <option value="select">(Select a section)</option>
                <option value="MA">MA</option>
                <option value="MB">MB</option>
                <option value="MC">MC</option>
                <option value="MD">MD</option>
                <option value="ME">ME</option>
                <option value="MF">MF</option>
                <option value="MG">MG</option>
                <option value="MH">MH</option>
            </select>
			</dd>
			
			<dt>Credit Card</dt>
			<dd>
            <input type="text" name="creditcard" /><br />
					<label><input type="radio" name="cardtype" value="visa" />Visa</label>
					<label><input type="radio" name="cardtype" value="mastercard" />MasterCard</label>
			</dd>
		</dl>
		
		<div>
			<input type="submit" value="I am a giant sucker.">
		</div>
	</form>
	</body>
</html>