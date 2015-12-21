<?php

// Make sure this points to a copy of Zencoder.php on the same server as this script.
require_once('Services/Zencoder.php');

try {
  // Initialize the Services_Zencoder class
  $zencoder = new Services_Zencoder('be4f76dcb370deb7efba18dc0480598d');

  // New Encoding Job
  $encoding_job = $zencoder->jobs->create(
    array(
      "input" => "http://solutions.brightcove.com/bmorrell/videos/llama_drama_1.mp4",
      "outputs" => array(
        array(
          "label" => "web"
        )
      )
    )
  );

  // Success if we got here
  echo "Success! Your job has been created. \n\n";
  echo "Job ID: ".$encoding_job->id."\n";
  echo "Output ID: ".$encoding_job->outputs['web']->id."\n";
  // Store Job/Output IDs to update their status when notified or to check their progress.
} catch (Services_Zencoder_Exception $e) {
  // If were here, an error occured
  echo "Fail :(\n\n";
  echo "Errors:\n";
  foreach ($e->getErrors() as $error) echo $error."\n";
  echo "Full exception dump:\n\n";
  print_r($e);
}

echo "\nAll Job Attributes:\n";
var_dump($encoding_job);

?>
