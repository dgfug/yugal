<?php
    include('modules/tminc.php');
    include('app_head.php');
        // END OF PROVISIONAL CODE

      $screen = prnt(
            nointernet().
            // PROGRESS BAR BELOW
            ''.
            // PROGRESS BAR ABOVE
            '<div id="root"></div>'
            ."<div class='fill_space_options' style='height:60px;'></div>"
        );
      export_screen($screen);


      // IF PAGE IS REQUESTED WITH GET DATA
      if (isset($_GET['page']) && @$_GET['page'] !== ""){
        preloaded($_GET['page'].".php");
      }else{
        preloaded("sample");
      }

      // END DOC
    end_doc(array(   
    ));
     ?>
