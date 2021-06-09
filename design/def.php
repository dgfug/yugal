<?php
    include('./string.php');
    // THE ABOVE FILE IS INCLUDED HERE TO ALLOW YOU TO USE SOME DEFAULT VARIABLES.
    //  FOR EG COLORS- ADD A VARIABLE IN detail.php in root folder and use it here.
    //  eg code, suppose you have define a variable name colorscheme there and want to use it as some div's bg.
    //  the code should look somehing like:-
    //  .div{
    //      background: <?php echo $colorscheme; ? > A GAP IS GIVEN IN PHP CLOSING HERE, YOU DON'T HAVE TO GIVE THIS GAP. 
            // THIS IS GIVEN HERE BECAUSE IF THIS GAP WAS NOT GIVEN, THEN PHP WILL TAKE THIS COMMENT AS CODE AND CASUE FAULTS.
    //  } 
    //  If you want to add tminc php extension css page, just create it in same directory and extension should be php,
    //  to use this default variable and unification function. 
?>
*{
    margin:0;
    padding:0;
    font-family: sans-serif;
    outline:0;
}
header{
    width: 100%;
    background: #ededed;
    border: 1px solid #000;
    text-align: center;
    padding:20px;
}
img{width: 100px;height:100px}
