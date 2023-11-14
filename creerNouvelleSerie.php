<?php
include('Model/accesBDD.php');
echo 'données envoyées : ';
$serieName = filter_input(INPUT_POST, 'serie-name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$vue = filter_input(INPUT_POST, 'vue', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$dateVue = filter_input(INPUT_POST, 'datevue', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$feedback = filter_input(INPUT_POST, 'feedback', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$dbh = connexion();

if (isset($serieName) && !empty($serieName)) {
    echo $serieName . '<br>';
    echo $vue . '<br>';
    echo $dateVue . '<br>';
    echo $feedback;
}

ajouterSerie($dbh,$serieName,$vue,$dateVue,$feedback );
header('Location:index.php');



    
    








