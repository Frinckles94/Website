function augmentForm(){
    var s = document.getElementById("selectProduct");
    var sValue = s.value;
    document.getElementById("disk").style.display = "none";
    document.getElementById("book").style.display = "none";;
    document.getElementById("furniture").style.display = "none";;
    document.getElementById(sValue).style.display = "initial";
}