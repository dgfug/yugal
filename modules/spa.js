var tminc_fw_pending_url = "";
const tminc = {
    launch: function(url){
        // ADD CODE FOR LOADER HERE
        $("#tmincfwprogressbar").animate({height: "6px"});
        if (localStorage.getItem("tminc_framework_reserved_" + url) !== null){
            let provisional_data_fw = JSON.parse(localStorage.getItem("tminc_framework_reserved_" + url));
            document.getElementById("root").innerHTML = provisional_data_fw.body;
            document.getElementsByTagName("head")[0].innerHTML = document.getElementById("user_header").innerHTML + provisional_data_fw.head;
        }
        $.ajax({
            url: url,
            success: function(page){
                $("#tmincfwprogressbar").animate({height: "0px"});
                localStorage.setItem("tminc_framework_reserved_" + url, page);
                // CACHING IN localStorage

                // ADD CODE FOR LOADER HERE
                let page_cont = JSON.parse(page); //CONTENT GOT -> JSON
                document.getElementById("root").innerHTML = page_cont.body; //UPDATING SCREEN
                let user_header = document.getElementById("user_header").innerHTML; //FETCHING DEFAULT <HEAD>
                document.getElementsByTagName("head")[0].innerHTML = user_header + page_cont.head; //COMPILING DEFAULT AND NEW HEAD
                return true;   
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#tmincfwprogressbar").animate({height: "0px"});
                if (navigator.onLine == true){
                let error_code = jqXHR.status;
                if (error_code === 404){
                    if (url === "error_404.php"){
                        if (localStorage.getItem("tminc_framework_reserved_" + url) === null){
                         alert('Requested Page was not found, however a 404 Error page was requested too, but it too shooted ERROR 404.');
                        }
                    }else{
                    navigate('error_404.php');
                    }
                }else{
                    navigate('unknown_err.php');
                }
            }else{
                if (localStorage.getItem("tminc_framework_reserved_" + url) == null){
                    tminc_fw_pending_url = url;
                    NoInternet();
                }
            }
              }
        });
    },
    replace: function(url){
        document.getElementById("def_progress_bar").style.display = "block";
        $.post(
            url,
            {tminc_load_url: ""},
            function(page){
                document.getElementById("def_progress_bar").style.display = "none";
                document.getElementsByTagName("html")[0].innerHTML = page;
            }
        );
    },
    makeBlank: function(id){
        document.getElementById(id).innerHTML = "";
    },
    error: (message) => {
        notify("ERROR!", message);
    }
};
function navigate(url){
    tminc.launch(url);
}
const preloaded = (url) =>{
    tminc.launch(url);
}
window.addEventListener('online', () => {
    document.getElementById("tminc-fw-reserved-no-internet-notice").style.display = "none";
    document.getElementsByTagName("body")[0].style.overflow = "unset";
    if (tminc_fw_pending_url !== ""){
        navigate(tminc_fw_pending_url);
    }
});
const NoInternet = () => {
    document.getElementById("tminc-fw-reserved-no-internet-notice").style.display = "block";
    document.getElementsByTagName("body")[0].style.overflow = "hidden";
}
