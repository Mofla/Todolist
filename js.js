function Description_display(id,id2){
    var text = document.getElementById(id2);
    if(text.style.display !== 'initial'){
        document.getElementById(id).innerHTML = 'Description &#9652;';
        text.style.display = 'initial';
    }
    else{
        document.getElementById(id).innerHTML = 'Description &#9662;';
        text.style.display = 'none';
    }
}
