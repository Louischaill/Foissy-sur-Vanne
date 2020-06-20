<footer>
    <div id="footer_centered">
        <img id="logo_footer" src="https://upload.wikimedia.org/wikipedia/fr/c/c1/Yonne_%2889%29_logo_2015.svg" alt="logo_yonne">
        <div class="text_footer">
            <h3>Nous rencontrer :</h3>
            <p>40 Grande Rue<br>
                89190 Foissy-sur-Vanne<br>
                <br>
                Horaire Mairie :<br>
                Le mardi de 8h 30 à 11h 00<br>
                Le jeudi de 12h 30 à 16h 00</p>
        </div>
        <div class="text_footer">
            <h3>Nous contacter :</h3>
            <p>Tel: 03 86 86 70 80<br>
                Tel: 03 86 65 57 04<br>
                mail : test@test.fr<br>
                <br>
                Horaire Téléphonique :<br>
                Vendredi, Samedi : 10h-13h / 15h-18h<br>
                Mardi, Mercredi, Jeudi : 11h-13h / 15h-17h<br>
                Dimanche, Lundi, Jours feriés : Fermé</p>
        </div>
    </div>
</footer>
<!--
<a onclick="redirection();" target="_blank">
    <img src="image/uti.png" alt="Documentation du web - MDN" height="50" width="50"/>
</a>
-->


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript">
    var sessionId = "<?php echo $_SESSION['username']; ?>";
    console.log(sessionId);

    function redirection() {
        if (sessionId) {
            document.location.href = "accueil.php";
        } else {
            document.location.href = "connexion.php";
        }
    }
</script>
</body>

</html>