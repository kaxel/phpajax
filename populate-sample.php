<?php

$con=mysqli_connect("localhost","root","addi3","sample");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$retailers = array("Target", "Gamestop", "Walmart", "CVS", "Whole Foods", "BiRite", "Best Buy", "Carrefour", "Couche Tard", "Dreamland", "Kmart", "Kroger", "Kruidvat", "MediaMarkt", "FNAC", "Saturn", "Staples", "Tesco", "Supervalu", "Sears");

$sql="CREATE TABLE retailers (id int(6) NOT NULL auto_increment,name varchar(15) NOT NULL, PRIMARY KEY (id))";

if (mysqli_query($con,$sql)) {
	foreach ($retailers as $value) {
		
		$sqlinsert = "insert into retailers (name) values ('$value')";
		mysqli_query($con,$sqlinsert);
	}
  
}

$sql="CREATE TABLE june_sales (id int(6) NOT NULL auto_increment, day_num int(2) NOT NULL, retailer_name varchar(15) NOT NULL, sale_amount double(3,2), PRIMARY KEY (id))";

if (mysqli_query($con,$sql)) {
		
	for ($x=1; $x<=100000; $x++) {
		#get random retailer (no Sears allowed)
		$this_retailer = $retailers[rand(0, 18)];
		#get random dollar amount
		$this_amount = rand(100,9999)/100;
		#get random day number (30 days in June)
		$this_day = rand(1,30);
		
		$sqlinsert = "insert into june_sales (day_num, retailer_name, sale_amount) values ($this_day, '$this_retailer', $this_amount)";
	    mysqli_query($con,$sqlinsert);
	  
	}
	echo "Finished. <br>";
}

mysql_close();

?>



