<?php
    include_once('./string.php');
    
    function preloaded($url){
        ?><script>tminc.launch("<?php echo $url; ?>")</script><?php
    }
    function test_screen($head, $body){
        include_once('app_head.php');
        echo $body; ?>
        </body>
        </html>
        <?php
    }

    function spa($arr){
        global $theme_color;
        global $favicon;
        global $common_head_tag;
        global $webapp;
        global $universal_library;
        $provisional_head = "";
        foreach ($universal_library as $each_library){
            if (file_exists('lib/'.$each_library.'/header.php')){
                include_once('lib/'.$each_library.'/header.php');
            }
        }
        ?><?php 
                foreach ($arr as $key=>$val){
                    if ($key === "title"){
                        $provisional_head = $provisional_head . "<title>";
                            $provisional_head = $provisional_head. $val;
                            $provisional_head = $provisional_head .  "</title>";
                            $provisional_head = $provisional_head . '<meta name="title" content="'.$val.'">';
                    }elseif($key === "css"){
                        foreach ($val as $ele){
                            $provisional_head =  $provisional_head."<link rel='stylesheet' type='text/css' content='".$ele."'>";
                        }
                    }elseif($key === "design"){
                        $provisional_head =  $provisional_head."<style>";
                        foreach ($val as $name){
                            include_once("design/".$name.".php");
                        }
                        $provisional_head =  $provisional_head."</style>";
                    }elseif($key === "description"){
                        $provisional_head = $provisional_head. "<meta name='description' content='".$val."'>";
                    }elseif($key === "keyword"){
                        $provisional_head = $provisional_head. "<meta name='keywords' content='".$val."'>";
                    }elseif($key === "robots"){
                        if ($val == false){
                            $provisional_head = $provisional_head. "<meta name='robots' content='noindex'>";
                        }
                    }elseif($key === "custom"){
                        $provisional_head = $provisional_head. $val;
                    }elseif($key === "import"){
                        $pages = explode(", ", $val);
                        foreach ($pages as $coms){
                            include_once("comp/".$coms.".php");
                        }
                    }elseif($key === "library"){
                        foreach($val as $each){
                            if (file_exists('lib/'.$each.'/header.php')){
                                include_once('lib/'.$each.'/header.php');
                            }
                        }
                    }
                }
                return str_replace('"', "'", $provisional_head);
    }

    function add_spa($arr){
        global $theme_color;
        global $favicon;
        global $common_head_tag;
        global $webapp;
        global $universal_library;
        foreach ($universal_library as $each_library){
            if (file_exists('lib/'.$each_library.'/header.php')){
                include_once('lib/'.$each_library.'/header.php');
            }
        }
        ?><!DOCTYPE html>
        <html lang="en">
        <head>
        <?php
    foreach ($arr as $key=>$val){
        if ($key === "title"){
            if ($key === "title"){
                echo "<title>";
                    echo $val;
                    echo "</title>";
                    echo '<meta name="title" content="'.$val.'">';
            }
        }
    }
        ?>
            <div id="user_header">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <script src="modules/mod.js"></script>
                <script src="modules/spa.js"></script>
            <?php 
                foreach ($arr as $key=>$val){
                    if($key === "css"){
                        foreach ($val as $ele){
                            echo "<link rel='stylesheet' type='text/css' href='".$ele."'>";
                        }
                    }elseif($key === "design"){
                        echo "<style>";
                        foreach ($val as $name){
                            include_once("design/".$name.".php");
                        }
                        echo "</style>";
                    }elseif($key === "description"){
                        echo "<meta name='description' content='".$val."'>";
                    }elseif($key === "keyword"){
                        echo "<meta name='keywords' content='".$val."'>";
                    }elseif($key === "robots"){
                        if ($val == false){
                            echo "<meta name='robots' content='noindex'>";
                        }
                    }elseif($key === "js"){
                        foreach ($val as $js){
                            echo "<script src='".$js."'></script>";
                        }
                    }elseif($key === "custom"){
                        echo $val;
                    }elseif($key === "import"){
                        $pages = explode(", ", $val);
                        foreach ($pages as $coms){
                            include_once("comp/".$coms.".php");
                        }
                    }elseif($key === "library"){
                        foreach($val as $each){
                            if (file_exists('lib/'.$each.'/header.php')){
                                include_once('lib/'.$each.'/header.php');
                            }
                        }
                    }
                }
            ?><meta name="theme-color" content="<?php echo $theme_color; ?>">
            <?php
                if ($webapp == true){
                    echo "<link rel='manifest' href='menifest.webmenifest'>";
                }
            ?>
            <?php
                if ($favicon[0] === false){
                    echo '';
                }else{
                    ?>
                    <?php 
                        if ($favicon[1] === false || !isset($favicon[1]) || $favicon[1] === ''){
                            ?>
                                <script>
                                    var errmsg = 'Error in setting Favicon, see CONSOLE for issue and its fix.';
                                    alert(errmsg);
                                    console.warn(errmsg);
                                    console.log('ISSUE FIX HINT: OPEN /default.php and add image type of favicon in 2nd Value (1st INDEX) of array in \'$favicon\' variable in line 3, or change its 1st Value (0th Index) to false to remove custom favicon.')
                                </script>
                            <?php
                        }
                    ?>
                <meta name="msapplication-TileImage" content="<?php echo $favicon[0]; ?>"> <!-- Windows 8 -->
                <meta name="msapplication-TileColor" content="<?php echo $favicon[0]; ?>"/> <!-- Windows 8 color -->
                <link rel="icon" type="image/<?php echo $favicon[1]; ?>" href="<?php echo $favicon[0]; ?>">
                <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $favicon[0]; ?>"><!-- iPad Retina-->
                <link rel="apple-touch-icon-precomposed" sizes="114x114" href="i<?php echo $favicon[0]; ?>"><!--iPhone Retina -->
                <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $favicon[0]; ?>"><!-- iPad 1 e 2 -->
                <link rel="apple-touch-icon-precomposed" href="<?php echo $favicon[0]; ?>"><!-- iPhone, iPod e Android 2.2+ -->

                    <?php
                }
                echo $common_head_tag;
            ?><script src="modules/jquery.js"></script>
        </div></head><body>
                <?php
                if($key === "library"){
                        foreach($val as $each){
                            include_once('lib/'.$each.'/index.php');
                        }
                    }
                    foreach ($universal_library as $each_library){
                        if (file_exists('lib/'.$each_library.'/index.php')){
                            include_once('lib/'.$each_library.'/index.php');
                        }
                    }
                    echo '<div class="progress" id="tmincfwprogressbar">
                    <span class="progress-bar" style="width: 100%"></span>
                  </div><br>';
    }

    function spa_body($array){
        return str_replace('"', "'", $array);
    }
    function save_screen($head, $body){
        echo json_encode(array(
            "head"=>str_replace('"', '\"', $head),
            "body"=>str_replace('"', '\"', $body)
        ));
    }
    
    ?>
