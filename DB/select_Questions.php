<?php
        // LIAISON BD
        include_once "./config/db.php";
        try {
            $bdd = new PDO(DBDRIVER . ':host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME . ';charset='. DBCHARSET, DBUSER, DBPASS);
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }   

        include "./vendor/autoload.php";
        
$managerQuestion = new QuestionManager($bdd);
$test = $managerQuestion->select();
// var_dump($test);
var_dump($test[4]) ;
echo '<br><br>';
echo $test[4]->getIntitule_question();
foreach ($test as $indexObjet=>$valeurObjet) {
    $valeurObjet->afficherQuestion();
    // $valeurObjet->afficherQuestion($valeurObjet->getIntitule_question());
};