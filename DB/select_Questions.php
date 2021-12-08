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
// Sélectionner toutes les questions (array)
$listeQuestions = $managerQuestion->select();
// Choisir une question aléatoire
$indexAleatoire = rand(0,count($listeQuestions)-1);
$questionChoisie = $listeQuestions[$indexAleatoire] ;
// Afficher la question avec echo (fct qui se trouve dans la classe Question)
$questionChoisie->afficherQuestion();

// ? AFFICHER TOUTES LES QUESTIONS
// echo '<br><br>';
// echo $listeQuestions[4]->getIntitule_question();
// foreach ($listeQuestions as $valeurObjet) {
//     $valeurObjet->afficherQuestion();
// };