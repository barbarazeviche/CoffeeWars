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
// echo '<br><h2>Type Question : </h2>';
$managerType = new TypeManager($bdd);
// Sélectionner tous les types (array)
$listeTypes = $managerType->select();
// Choisir une type aléatoire
$indexAleatoire = rand(0,count($listeTypes)-1);
$typeChoisi = $listeTypes[$indexAleatoire] ;
// Afficher le type avec echo (fct qui se trouve dans la classe Type)
// $typeChoisi->afficherType();
$indexType = $typeChoisi->getid();


// CHOIX QUESTION   
$managerQuestion = new QuestionManager($bdd);
// Sélectionner toutes les questions (array) avec filtre
$listeQuestions = $managerQuestion->select(['ID_type'=>$indexType]);
// Choisir une question aléatoire parmi la sélection par type
$indexAleatoire = rand(0, (count($listeQuestions)-1));
$questionChoisie = $listeQuestions[$indexAleatoire] ;
// Afficher la question avec echo (fct qui se trouve dans la classe Question)
// $questionChoisie->afficherQuestion();
echo '<h5 class="titreQuestion">Question : </h5>'; 
echo '<h6 class="intituleQuestion">' . $questionChoisie->getIntitule_question() . '</h6>';
// Récupérer l'ID de la question pour trouver les réponses associées
$indexQuestion = $questionChoisie->getid();


// REPONSES ASSOCIÉES
$managerReponse = new ReponseManager($bdd);
// Sélectionner toutes les reponses (array) avec filtre
$listeReponses = $managerReponse->select(['ID_question'=>$indexQuestion]);
// Créer formulaire réponses
?>
<form action="./traitement_Question.php" method="post">
        <div class="divReponses">
                <?php
                $numeroReponse = 1;
                foreach ($listeReponses as $valeurObjet) {
                        echo '<div class="reponseRadio">';
                                echo '<input class="btnRadio" type="radio" id="' . $valeurObjet->getid() . '" name="solution" value="' . $valeurObjet->getResultat() . '"checked>';
                                echo '<label for="' . $valeurObjet->getid() . '" class="intituleReponse">' . $valeurObjet->getIntitule_reponse() . "</label>";
                        echo '</div>';
                        $numeroReponse+=1;
                };
                ?>
        </div>
        <button type="submit" class="btnModal">Valider</button>
</form>