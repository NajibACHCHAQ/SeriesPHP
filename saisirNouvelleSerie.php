

<?php
 include 'head.php';
 include 'header.php';
?>
 
<form method="POST" class="formulaire" action="creerNouvelleSerie.php">
    <div class="enteteform">Ajouter une série</div>

    <div class="saisie-titre">
        <label>Nom de la série </label><input type="text" required="true" name="serie-name">
    </div>
    <div class="saisie-vue">
        <label>Vue </label><input type="checkbox" name="vue">le :<input type="date" name="datevue">
    </div>
    <div class="saisie-feedback">
        <textarea name="feedback" rows="5" cols="33" placeholder="Vos remarques..."></textarea>
    </div>
    <button type="submit" class="btn btn-success valid">Valider</button>
</form>

</body>

