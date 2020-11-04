<!-- sprintf -->
<?php
    $limit_hour = 4;
    $limit_minute = 4;
    printf("残り%02d時間%02d分", $limit_hour, $limit_minute);
    
    $limit_time = sprintf("残り%06d時間%04d分", $limit_hour, $limit_minute);
    echo $limit_time;