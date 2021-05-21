function augmentForm(){
    var s = document.getElementById("selectProduct");
    var sValue = s.value;
    var diskT = document.getElementById("diskT");
    var bookT = document.getElementById("bookT");
    var furnitureT = document.getElementById("furnitureT");
    if(sValue == "disk"){
        diskT.style.display = "initial";
        bookT.style.display = "none";
        furnitureT.style.display = "none";
    }
    else if(sValue =="book"){
        diskT.style.display = "none";
        bookT.style.display = "initial";
        furnitureT.style.display = "none";
        
    }else if(sValue == "furniture"){
        diskT.style.display = "none";
        bookT.style.display = "none";
        furnitureT.style.display = "initial";
        
    }

}
