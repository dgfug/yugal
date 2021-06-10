<?php
    include('modules/tminc.php');   
    meta(
        array(
            "title"=>"TMINC Yugal",
            "design"=>array(
                "def"
            ),
            "library"=>array(
                "tminc-extras"
            )
        )
    );
    $screen = prnt(
            p(
                array(
                    "style"=>"margin-top:45vh;text-align:center",
                    "id"=>"clickme"
                ),
                "Enter something below and click outside to see my power"
            ).
            center(
                textarea(
                    array(
                        "placeholder"=>"Enter Something",
                        "id"=>"text",
                        "style"=>"width:500px;height:30vh"
                    )
                )
            )
    );
    export_screen($screen);
    clicked("clickme", "
        toast('Thank You for Clicking me');
    ");
    script('
        widget("text").addEventListener("change", ()=>{
            widget("clickme").innerHTML = widget("text").value;
            widget("clickme").value="";
        });
    ');
    close();
?>
