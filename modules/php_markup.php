<?php
        include_once('./string.php');
        function center($element){
            return ("<center>{$element}</center>");
        }
        function left($cont){
            return ("<div class='lefttminc>'>{$cont}</p>");
        }
        function div($array){
            $attributes = "";
                foreach($array as $key=>$val){
                    if ($key === "value"){
                        $provisiona = "";
                    }else{
                    $attributes = $attributes.$key."='".$val."'";
                    }
                }
                $content = @$array['value'];
            return("
                <div {$attributes}>{$content}</div> 
            ");
        }
        function right($screen){
            return ("<div class='righttminc'>{$screen}</div>");
        }
        function close(){
            echo "</body></html>";
        }
        function p($props, $val){
            $attr = "";
            foreach($props as $att => $attval){
                $attr = $attr." ".$att."=\"".$attval."\"";
            }
            return(
                "<p {$attr}>{$val}</p>"
            );
        }
        function prnt($kid){
            return($kid);
        }
        function textarea($arr){
            $props = "";
            foreach($arr as $each=>$val){
                if ($each === "value"){
                    echo "";
                }else{
                    $props = $props." ".$each."='".$val."'";
                }
            }
            if (!isset($arr['value'])){
                $arr['value'] = "";
            }
            return("<textarea {$props}>{$arr['value']}</textarea>");
        }
        function end_doc($arr){
            foreach ($arr as $each){
                echo "<script src='".$each."'></script>";
            }
            echo "</body></html>";
        }
        function form($array){
            if (isset($array['method'])){
                $mtd =  $array['method'];
            }else{
                $mtd =  "post";
            }
            return("
                <form action='{$array['action']}' method={$mtd}>
                {$array['cont']}
                </form>
            ");
        }
        function floating($arr){
            ?>
            <style>
            #<?php echo $arr['id'] ?>:hover{background:<?php echo $arr['hover'];?>!important}
            </style>
                <div style="width:50px;z-index:-1;height:50px;border-radius:25px;position:fixed;<?php if(isset($arr['vert'])){
                                                                                        echo $arr['vert']; 
                                                                                        }else{
                                                                                            echo "right";}?>:0;bottom:0;background:<?php echo $arr['background']; ?>;cursor:pointer;margin: <?php echo $arr['margin']; ?>" id="<?php echo $arr['id']; ?>">
                <span style="color:<?php echo $arr['color']; ?>;margin:13px;" class="material-icons"><?php echo $arr['text']; ?></span>
                </div>
            <?php
        }
        function css($path){
            echo '<style type=\'text/css\'>';
            include_once('design/'.$path.'.php');
            echo '</style>';
            }
            function design($input){
                $arr = explode(", ", $input);
                echo '<style type="text/css">';
                foreach($arr as $filname){
                    include_once('design/'.$filname.'.php');
                    echo "\n";
                }
                echo "</style>";
            }
            function img($src, $alt){
                ?>
                    <image src="<?php echo $src; ?>" alt="<?php echo $alt; ?>">
                <?php
            }
            function errorn($msg){
                echo '<font style=\'font-weight:bold;color:red;\'>'.$msg.'</font><br>';
            }
            function warnn($msg){
                echo '<font style=\'font-weight:bold;color:yellow;\'>'.$msg.'</font><br>';
            }
            function success($msg){
                echo '<font style=\'font-weight:bold;color:green;\'>'.$msg.'</font><br>';
            }
            function input($array){
                if (is_array($array)){
                    $attributes = "";
                    foreach($array as $key=>$val){
                        $attributes = $attributes.$key."='".$val."'";
                    }
                return("<input {$attributes}>");
                }else{
                    errorc('Input accepts properties in an array with index name, string given');
                }
            }
            function field($arr){
                $attributes = "";
                foreach($arr as $props=>$val){
                    $attributes = $attributes."".$props."=\"".$val."\" ";
                }
                return("
                    <input {$attributes}/>
                ");
            }
            function button($props, $val){
                $attr = "";
                foreach($props as $att => $attval){
                    $attr = $attr." ".$att."=\"".$attval."\"";
                }
                return(
                    "<button {$attr}>{$val}</button>"
                );
            }
            function youtube($arr, $src){
                $sarr = explode("?v=", $src)[1];
                $props = "";
                if ($arr == false){
                    $props = "width='560' height='315' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen";
                }else{
                    foreach($arr as $key=>$val){
                        $props = $props.$key."=\"".$val." ";
                    }
                }
                return(
                    "<iframe src='https://youtube.com/embed/{$sarr}' {$props}></iframe>"
                );
            }
            function webview($arr){
                $props = "";
                foreach($arr as $key=>$val){
                    $props = $props."".$key."=\"".$val."\"";
                }
                return("<iframe {$props}></iframe>");
            }
            function br(){
                echo '<br>';
            }
            function bl(){
                return "<br>";
            }
            function label($larr){
                if (is_array($larr)){
                ?>
                <label id='<?php echo @$larr['id']; ?>' class='<?php echo @$larr['class']?>' for='<?php echo @$larr['for']?>'><?php echo @$larr['val']?></label>
                <?php
                }else{
                    errorc('You have added a label through PHP FRONTEND, it accepts an array but you have provided a string!');
                }
            }
            function html($html){
                echo $html;
            }
            function script($code){
                ?>
                    <script>
                        <?php echo $code; ?>
                        </script>
                <?php
            }
?> 