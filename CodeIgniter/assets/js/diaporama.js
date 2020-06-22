var n_image = 0;
var n_max_images = 0;
var next_image = function () {
    n_image++;
    if(n_image>n_max_images){
        n_image = 0;
    }
    refresh_image();
}
var previous_image = function () {
    n_image--;
    if(n_image<0){
        n_image = n_max_images;
    }
    refresh_image();
}

var refresh_image = function () {
    var images = document.getElementById("diaporama_images").children;
    document.getElementById("diaporama").style.backgroundImage="url("+ images[n_image].src +")";
}

window.addEventListener('load', function () {
    n_max_images = document.getElementById("diaporama_images").children.length-1;
});