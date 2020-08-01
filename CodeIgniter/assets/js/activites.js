var vignettes;
var next_button;
var previous_button;
window.addEventListener('load', function (){
    vignettes = document.getElementsByClassName("activite_vignette");
    console.log(vignettes);
    next_button = document.getElementById("next_button");
    previous_button = document.getElementById("previous_button");
    next_button.addEventListener("click", function () {
        next();
    });
});
var i;
var current=0;

var next = function (){
    for(i=0 ; i<2 ; i++){
        vignettes[i+current].style.opacity = "0";
        setTimeout(() => { next_hiding(); }, 500);
    }
}
var next_hiding =function(){
    for(let i=0 ; i<2 ; i++){
        vignettes[i+current].style.display = "none";
        vignettes[i+current+4].style.display = "block";
    }
    setTimeout(() => {
        for(let i=0 ; i<2 ; i++){
            vignettes[i+current+4].style.opacity = "1";
        }
        next_ended();
    }, 1);
    previous_button.style.opacity = "1";
    previous_button.addEventListener("click", function () {
        previous();
    });
};
var next_ended = function () {
    current = current + 2;
    if(current+4 >= vignettes.length){
        next_button.style.opacity = "0";
        next_button.style.cursor = "default";
        next_button.onclick = function () {
            return false;
        };
    }
}


var previous = function (){
    console.log("previous");
    for(i=0 ; i<2 ; i++){
        console.log(vignettes[i+current+2]);
        vignettes[i+current+2].style.opacity = "0";
        setTimeout(() => { previous_hiding(); }, 500);
    }
}
var previous_hiding =function(){
    for(let i=0 ; i<2 ; i++){
        vignettes[i+current+2].style.display = "none";
        vignettes[i+current-2].style.display = "block";
    }
    setTimeout(() => {
        for(let i=0 ; i<2 ; i++){
            vignettes[i+current-2].style.opacity = "1";
        }
        previous_ended();
    }, 1);
    next_button.style.opacity = "1";
    next_button.addEventListener("click", function () {
        next();
    });
};
var previous_ended = function () {
    current = current - 2;
    if(current-2 <= 0){
        previous_button.style.opacity = "0";
        previous_button.style.curor = "default";
        previous_button.onclick = function (){
            return false;
        };
    }
}
