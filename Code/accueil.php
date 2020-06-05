<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: connexion.php");
  exit(); 
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css" />
  <link
  rel="stylesheet"
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
  crossorigin="anonymous"/>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

</head>
<body>
  <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
    <p>C'est votre tableau de bord.</p>
    <a href="logout.php">Déconnexion</a>
  </div>





  <script>

var requestURL = 'json/data.json';
var request = new XMLHttpRequest();
request.open('GET', requestURL);
request.responseType = 'json';
request.send();

var dataAccueil;
request.onload = function() {
  var data = request.response;
  afficher(data.accueil);
}

function afficher(data){
  dataAccueil = data;
  data.forEach(function(item) {
    var elt = document.createElement("div");
    elt.setAttribute('class', 'gang');
    document.body.appendChild(elt);
    var conn = document.createElement("div");
    conn.setAttribute('class', item.titre);
    elt.appendChild(conn);
    var titre = document.createElement("h1");
    titre.textContent = item.titre;
    conn.appendChild(titre);
    var p = document.createElement("p");
    p.textContent = item.texte;
    conn.appendChild(p);
    var btn = document.createElement("button");
    btn.setAttribute('class', 'btn btn-warning');
    btn.setAttribute('id', item.titre);
    btn.setAttribute('onclick', 'ajouter()');
    btn.textContent = "+";
    elt.appendChild(btn);
    console.log(btn)
    
 });
}
function ajouter(){
  console.log(dataAccueil);
  dataAccueil.push({titre: "conclusion","texte":"Voici la conclusion","color":"gray"});
  console.log(dataAccueil);
 
}


</script>
</body>
</html>