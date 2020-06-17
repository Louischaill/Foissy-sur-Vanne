window.addEventListener('load', function () {
    var annees = document.getElementsByClassName("annee");
    for(var i=0 ; i<annees.length ; i++){
        let button = annees[i].children[0].children[0];
        let annee_container = annees[i].children[1];
        button.addEventListener("click", function () {
            if(annee_container.style.display === "none"){
                annee_container.style.display = "flex";
                button.style.transform = "rotate(180deg)";
            }else{
                annee_container.style.display = "none";
                button.style.transform = "rotate(0deg)";
            }
        });
    }

    var jours = document.getElementsByClassName("jour");
    for(i=0 ; i<jours.length ; i++){
        let button = jours[i].children[0].children[0];
        let jours_container = jours[i].children[1];
        button.addEventListener("click", function () {
            if(jours_container.style.display === "none"){
                jours_container.style.display = "flex";
                button.style.transform = "rotate(180deg)";
            }else{
                jours_container.style.display = "none";
                button.style.transform = "rotate(0deg)";
            }
        });
    }
});