<?php

$id = "FHuD1SpO5xk";

//if ($curl = curl_init()) {
    curl_setopt($curl, CURLOPT_URL, "www.youtube.com/get_video_info?video_id=".$id);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);

    $meta = curl_exec($curl);

    echo $meta;
//}
