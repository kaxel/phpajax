<?php

$link = mysqli_connect("localhost", "root", "addi3", "sample");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "select name, IF(sum(js.sale_amount) IS NULL, 0, sum(js.sale_amount)) amt from retailers r LEFT OUTER JOIN june_sales js on js.retailer_name = r.name group by retailer_name";

if ($result = mysqli_query($link, $query)) {
	
	$info=array();

    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
	
        $lineInfo = array();
        $lineInfo["name"] = $row["name"];
	
		$formatted_number = number_format($row["amt"], 2);
        $lineInfo["amt"] = $formatted_number;
        array_push($info, $lineInfo);    
    }
	
    echo json_encode($info);

    /* free result set */
    mysqli_free_result($result);
} else {
	echo "no result";
}

/* close connection */
mysqli_close($link);

?>