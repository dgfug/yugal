 <!-- PRELOADER -->
    <div class="preloader" id="preloader" style="
    width: 100%;
    height: 100vh;
    position: fixed;
    background: #000000a6;
    text-align:center;
    ">
    <img src="assets/loading.gif" style="margin-top: 37vh;display:inline-block;">
    </div>
    <div class="toast" id="toast"><div class="visi" id="visi"></div></div>
    <script>
        $(document).ready(function(){
            $("#preloader").css("display", "none");
            document.getElementsByTagName("body")[0].style.overflow = "unset";
        });
    </script>
                    <!-- PRELOADER END -->

                <div id="overlay">
                    <div class="dialog">
                    <h3 id='heading'></h3>
                    <p id='message'></p>
                    <button onClick='tmincreshidedialog()' id="tmincokbtn">OK</button>
                </div>
                </div>