<?php
include_once 'config.php';
$connection=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(!$connection){
	throw new Exception("Database did not connect");

}

function getStatusMessage($statusCode=0){
	$status = [
		0=>'',
		1=>'Duplicate Email Address',
		2=>'Username or Password Empty',
		3=>'User created successfully',
		4=>'Username and password did not match',
		5=>'Username does not exist',
	];
	return $status[$statusCode];
}

function getWords($user_id,$search=null){
	global $connection;
	if($search){
		$query="SELECT * FROM words where user_id='$user_id'  AND word like  '$search%'  ORDER BY word";
	

	}else
	{

		$query="SELECT * FROM words where user_id='$user_id'  ORDER BY word";
	}
	$result=mysqli_query($connection,$query);
	$data=array();
	while($_data=mysqli_fetch_assoc($result)){
		array_push($data, $_data);

	}
	return $data;

	

}
