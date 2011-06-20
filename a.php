<?php
session_start();
$ipAdd = $_SERVER['REMOTE_ADDR'];

if($ipAdd == $_SESSION['ipAdd']){
	echo "no";
}else{
	$fp = file_get_contents('scripts/results.json');
	$obj = json_decode($fp, true);
	while (list($key, $val) = each($obj))
	  {
		$val = $val + (int) $_REQUEST[$key];
		$obj[$key] = $val; 
	  }
	arsort($obj);
	$newobj = json_encode($obj);
	file_put_contents('scripts/results.json', $newobj);
	$fp1 = file_get_contents('scripts/results.json');
	$_SESSION['ipAdd'] = $ipAdd;
	echo $fp1;	
}
?>