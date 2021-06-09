<?php
    function toast($message){
        ?>
        <script>toast("<?php echo str_replace('"', '\"', $message)?>")</script>
        <?php
    }
?>
<script src="lib/tminc-extras/javascript.js"></script>