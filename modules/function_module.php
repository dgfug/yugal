<?php
    include_once('./string.php');
    
    function errorc($msg){
        ?>
        <script>
            var errmsg = 'Error shooted!, see CONSOLE for issue and its fix.';
           alert(errmsg);
           console.error('SOME ERROR FOUND! CHECK BELOW');
           console.warn('<?php echo $msg; ?>');
           </script>
            <?php
    }
    function alert($msg){
        ?>
            <script>
                alert('<?php echo $msg; ?>');
            </script>
        <?php
    }
    function export_screen($screen){
        echo $screen;
    }
    function upload($files, $directory){
        $size = $files['size'];
        $filename = $files['name'];
        $namear = explode(".", $filename);
        $fname = date("Ymd") ."". time()."".$namear[0].".".$namear[1];
        $tempname = $files['tmp_name'];
        $folder = $directory."/".$fname;
        move_uploaded_file($tempname, $folder);
        return $folder; //RETURNS FILE PATH
    }
    function save_cookie($key, $val){
        setcookie($key, $val, time() + (86400 * 30), "/"); // 86400 = 1 day 
    }
    function cookie($cookiename){
        return $_COOKIE[$cookiename];
    }
    function style($code){
        ?>
            <style><?php echo $code; ?></style>
        <?php
    }
    function delete_cookie($cookiename){
        ?><script>
        document.cookie = "<?php echo $cookiename ?>=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        </script>
        <?php
        if (!isset($_COOKIE[$cookiename])){
            return true;
        }else{
            return false;
        }
    }
    function open($dest){
        ?>
            <script>
                window.location="<?php echo $dest; ?>";
            </script>
        <?php
    }
    function error($msg){
        ?>
            <script>
                console.error('<?php echo $msg; ?>');
            </script>
        <?php
    }
    // function interval
    function console($msg){
        ?>
            <script>
                console.log('<?php echo $msg; ?>');
            </script>
        <?php
    }
    function warn($msg){
        ?>
            <script>
                console.warn('<?php echo $msg; ?>');
            </script>
        <?php
    }
    function encrypt($tag, $value){
        setcookie(md5($tag), base64_encode($value), time() + (86400 * 30), "/"); // 86400 = 1 day 
    }
    function md5cook($tag, $val){
        setcookie(md5($tag), base64_encode(md5($val)), time() + (86400 * 30), "/"); // 86400 = 1 day 
    }
    function dccook($key){
        return base64_decode(
            $_COOKIE[md5($key)]
        );
    }
    
    function save_local($tag, $val){
        ?>
        <script>
        localStorage.setItem($tag, $val);
        </script>
        <?php
    }
    function del_local($tag){
        ?>
        <script>
        localStorage.removeItem($tag);
        </script>
        <?php
    }
    function loadevent($function){
        ?>
        <script>
        $(document).ready(function() {
            <?php echo $function; ?>
        });
        </script>
        <?php
    }
    function import($arr){
        foreach($arr as $each){
            include_once('./comp/'.$each.'.php');
        }
    }
    function clicked($id, $function){
        ?>
            <script>
                document.getElementById("<?php echo $id; ?>").addEventListener("click", ()=>{<?php echo $function; ?>});
            </script>
        <?php
    }
    function mouseover($id, $function){
        ?>
            <script>
                document.getElementById("<?php echo $id; ?>").addEventListener("mouseover", ()=>{<?php echo $function; ?>});
            </script>
        <?php
    }
    function notify($title, $message){
        ?>
            <script>
            notify("<?php echo $title; ?>", "<?php echo $message; ?>");
            </script>
        <?php
    }
?>