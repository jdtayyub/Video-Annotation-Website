<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include("parameters.php");
include("api_functions.php");
include("../url2.php");

$operation = "CreateHIT";
$title = "Highly Paid: Simple activity video annotation (BONUSES up to 3.5 USD per assignment based on work quality)";
$description = "In this task you are asked to watch a video multiple times and write all the activities you observe using short labels (2-3 words). Please allow up to 1-2 minutes for the video to load.";


$assignment_duration=1000; // 1200
$reward=0.20;

//echo $description;

$url = "https://annotateme.com/activity_annotator.php?vid=";
$frame_height = 800;

$timestamp = generate_timestamp(time());
$signature = generate_signature($SERVICE_NAME, $operation, $timestamp, $AWS_SECRET_ACCESS_KEY);




//scan the video folder
$folder_list=scandir("../vids");

//$arr = array(2,5);//3,5,6,10,11,12,13,14,15,21,22,23,24,25,41,42,43,44,45,47,48,53);
$arr = array(1);
//for($v=2;$v<count($folder_list);$v++)

foreach ($arr as $key=>$id)
{
    $url_v=$url.$id;
    echo $url_v.'<br>';
    //$url_v=$url.substr($folder_list[$v],3);


    //check how many frame the video is
    $images=scandir("../vids/vid$id/images_clad");
    echo (count($images)-2)."<br><br>";
    //$assignment_duration=??
    //$reward=??

    $url2 = $URL2_HITS
  . "?Service=" . urlencode($SERVICE_NAME)
  . "&Operation=" . urlencode($operation)
  . "&Title=" . urlencode($title)
  . "&Description=". urlencode($description)
  . "&Reward.1.Amount=".$reward
  . "&Reward.1.CurrencyCode=USD"
  . "&Question=" . urlencode(constructQuestion($url_v, $frame_height))
  . "&AssignmentDurationInSeconds=".$assignment_duration
  . "&LifetimeInSeconds=10800"
  . "&Version=" . urlencode($SERVICE_VERSION)
  . "&Timestamp=" . urlencode($timestamp)
  . "&AWSAccessKeyId=" . urlencode($AWS_ACCESS_KEY_ID)
  . "&Signature=" . urlencode($signature)
  . "&QualificationRequirement.1.QualificationTypeId=00000000000000000040"
  . "&QualificationRequirement.1.Comparator=GreaterThan"
  . "&QualificationRequirement.1.IntegerValue=0"//0
  . "&QualificationRequirement.2.QualificationTypeId=000000000000000000L0"
  . "&QualificationRequirement.2.Comparator=GreaterThan"
  . "&QualificationRequirement.2.IntegerValue=0"//80
  . "&MaxAssignments=2"
  . "&Keywords=activity,%20video,%20labelling,%20annotation,%20ground+truth";



echo $url2."<br>";


    /*
    $xml = simplexml_load_file($url2);
    echo $xml."<br>";
    $hit = $xml->HIT->HITId;
    if ($hit) {
      print "HIT Number: " . $hit . "\n";
    }
    */

}

?>
