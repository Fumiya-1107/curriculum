<!-- pi -->
<!-- 半径5cmの円周率 -->
    <?php
    echo pi();
    
    function circleArea($r) {
        $circle_area = $r * $r * pi();
        echo $circle_area; 
    }
    circleArea(5);
    ?>