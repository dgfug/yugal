<?php
    include('modules/tminc.php');
    meta(
        array(
            "title"=>"Page Not Found - Error 404",
            "import"=>"nointernet",
            "css"=>array(
                "design/no_internet.css"
            )
        )
    );
    echo nointernet();
    close();
?>