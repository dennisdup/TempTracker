<?php
require "index.php";
 
$tracker = new TempTracker;

function insertTemps($temps, $tracker) {
    foreach($temps as $temp):{
        $tracker->insert($temp);
    }endforeach;
}

insertTemps(["dsds", 200, 6, 7, 8.8, "sdsds"], $tracker);
echo json_encode( 
        array( 
            "list" => $tracker->getList(),
            "max" => $tracker->getMax(),
            "min" => $tracker->getMin(),
            "avg" => $tracker->getMean()
        ) 
    )

?>