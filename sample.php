<?php
    include('modules/tminc.php');
    $head = spa(
        array(
        "title"=>"SITE TITLE",
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
