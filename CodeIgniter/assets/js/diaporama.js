var n_image = 0;
var n_max_images = 0;
var next_image = function (){
    n_image++;
    if(n_image>=n_max_images){
        n_image = 0;
    }
    refresh_image();
}
var previous_image = function (){
    n_image--;
    if(n_image<0){
        n_image = n_max_images;
    }
    refresh_image();
}
var images =[];
var textes = [];
var refresh_image = function (){
    document.getElementById("diaporama").style.backgroundImage="url("+ images[n_image].src +")";
    document.getElementById("texte").innerText = textes[n_image].innerText;

}

window.addEventListener('load', function (){
    var all = document.getElementById("diaporama_images").children;
    for(var i=0; i<all.length ; i++){
        console.log(all[i]);
        if(all[i].tagName === "IMG"){
            console.log("image");
            images.push(all[i]);
        }else if(all[i].tagName === "P"){
            console.log("p");
            textes.push(all[i]);
        }

    }
    n_max_images = images.length;
    console.log(n_max_images);
});