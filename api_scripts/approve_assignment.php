<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


include("parameters.php");
include("api_functions.php");
include("../url2.php");

$operation = "ApproveAssignment";
//$HITId=$_REQUEST['hid'];

$AssignmentId=$_REQUEST['aid'];

$RequesterFeedback="Thank you!";

$timestamp = generate_timestamp(time());
$signature = generate_signature($SERVICE_NAME, $operation, $timestamp, $AWS_SECRET_ACCESS_KEY);


$url2 = $URL2_HITS
. "?Service=" . urlencode($SERVICE_NAME)
. "&Operation=" . urlencode($operation)
. "&AssignmentId=".urlencode($AssignmentId)
. "&RequesterFeedback=".urlencode($RequesterFeedback)
. "&Version=" . urlencode($SERVICE_VERSION)
. "&Timestamp=" . urlencode($timestamp)
. "&AWSAccessKeyId=" . urlencode($AWS_ACCESS_KEY_ID)
. "&Signature=" . urlencode($signature);



$xml = simplexml_load_file($url2);



if($xml->ApproveAssignmentResult->Request->IsValid=="True")
  echo "OK";
else
  echo "X";




?>
