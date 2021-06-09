const yugalext = {
    toast: (message)=>{
        tst = document.getElementById("toast");
        tstsnap = document.getElementById("visi");
        tstsnap.innerHTML = message;
        tst.style.display="block";
        setTimeout(()=>{
            tst.style.display="none";
            tstsnap.innerHTML="";
        }, 5000);
    },
    notify: (heading, message)=>{
        document.getElementsByTagName('body')[0].style.overflow='hidden';
        getbyid('overlay').style.display='block';
        getbyid('heading').innerHTML=heading;
        getbyid('message').innerHTML=message;
    },
    tmincreshidedialog: ()=>{
        getbyid('overlay').style.display='none';
        getbytag('body')[0].style.overflow='unset';
    }
}