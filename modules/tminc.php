<?php
ob_start("ob_gzhandler"); 
ob_start("ob_html_compress2");
ini_set("display_errors", "1");
  error_reporting(E_ALL);
function ob_html_compress2($buf){
    return str_replace(array("\n","\r","\t"),'',$buf);
}
function ob_html_compress($buf){

    return preg_replace(array('/<!--(.*)-->/Uis',"/[[:blank:]]+/"),array('',' '),str_replace(array("\n","\r","\t"),'',$buf));
}
?>
<?php
    include_once('./string.php');
    include('function_module.php');

    if (@$yugal_enable_spa == true){
    include('spa_module.php');
    }
    include('php_markup.php');

    function meta($arr){
        global $theme_color;
        global $favicon;
        global $common_head_tag;
        global $webapp;
        global $universal_library;

        ?><!DOCTYPE html>
        <html lang="en">
        <head>
        <?php
                foreach ($universal_library as $each_library){
                    if (file_exists('lib/'.$each_library.'/header.php')){
                        include_once('lib/'.$each_library.'/header.php');
                    }
                }
        ?>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="design/tminc.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <script src="modules/mod.js"></script>
            <?php 
                foreach ($arr as $key=>$val){
                    if ($key === "title"){
                        echo "<title>".$val."</title>";
                        echo '<meta name="title" content="'.$val.'">';

                    }elseif($key === "css"){
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
        </head><body>
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
    }
?>
