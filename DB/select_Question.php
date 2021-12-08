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

// TYPE SELON ROULETTE
// ! à modifier avec code Laure
echo '<br><h2>Type Question : </h2>';
$managerType = new TypeManager($bdd);
// Sélectionner tous les types (array)
$listeTypes = $managerType->select();
// Choisir une type aléatoire
$indexAleatoire = rand(0,count($listeTypes)-1);
$typeChoisi = $listeTypes[$indexAleatoire] ;
// var_dump($typeChoisi);
// echo '<br><br> type choisi : ' . $typeChoisi->getType_question();
// echo '<br><br> type index : ' . $typeChoisi->id;
// echo '<br><br>fin type choi';


// Afficher le type avec echo (fct qui se trouve dans la classe Type)
$typeChoisi->afficherType();
// ! prob pour récupérer ID type
// $typeChoisi->afficherIndexType();
// $indexType = $typeChoisi->getid();


// CHOIX QUESTION   
echo '<br><br>
        <h2>Intitulé Question : </h2>'; 
$managerQuestion = new QuestionManager($bdd);
// Sélectionner toutes les questions (array)
// ! modifier indexType avec index de la roue
$listeQuestions = $managerQuestion->select(['ID_type'=>$indexAleatoire]);
var_dump($listeQuestions);
echo '<br>nombre liste : ' . count($listeQuestions) . '<br>';
// Choisir une question aléatoire
$indexAleatoire = rand(0, (count($listeQuestions)-1));
$questionChoisie = $listeQuestions[$indexAleatoire] ;
echo '<br>question choisie info : ';
var_dump($questionChoisie);
// Afficher la question avec echo (fct qui se trouve dans la classe Question)
$questionChoisie->afficherQuestion();
$questionChoisie->getID_type();

// REPONSES ASSOCIÉES
echo '<br><br>
        <h2>Réponses possibles : </h2>';
// ? AFFICHER TOUTES LES QUESTIONS
$managerReponse = new ReponseManager($bdd);
// ! ajouter ID Question dans le filtre du select
// Sélectionner toutes les reponses (array)
$listeReponses = $managerReponse->select();
// Choisir une reponse aléatoire
$indexAleatoire = rand(0,count($listeReponses)-1);
$reponseChoisie = $listeReponses[$indexAleatoire] ;
// Afficher la reponse avec echo (fct qui se trouve dans la classe Reponse)
$reponseChoisie->afficherReponse();
// echo '<br><br>';
// echo $listeQuestions[4]->getIntitule_question();
// foreach ($listeQuestions as $valeurObjet) {
//     $valeurObjet->afficherQuestion();
// };