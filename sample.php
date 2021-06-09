<?php
    include('modules/tminc.php');
    $head = spa(
        array(
        "title"=>array(
            "hi"=>" - सबकुछ",
            "en"=>$site_title." - Everything"
        ),
        "import"=>"header"
    ));
      $screen = prnt(
          prnt(
            "sd"
            ). //DEFUALT HEADING AND ITS CSS FUNCTION (IMPORTED FROM comp/header.php)
          "HELLO WORLD"
      );
      save_screen($head, $screen);

?>
