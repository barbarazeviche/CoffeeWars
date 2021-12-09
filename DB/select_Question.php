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

// Afficher le type avec echo (fct qui se trouve dans la classe Type)
$typeChoisi->afficherType();
$indexType = $typeChoisi->getid();
// echo '<br>index Type : ' . $indexType;


// CHOIX QUESTION   
echo '<br><br>
        <h2>Intitulé Question : </h2>'; 
$managerQuestion = new QuestionManager($bdd);
// Sélectionner toutes les questions (array)
$listeQuestions = $managerQuestion->select(['ID_type'=>$indexType]);

// var_dump($listeQuestions);
// echo '<br>nombre liste : ' . count($listeQuestions) . '<br>';

// Choisir une question aléatoire parmi la sélection par type
$indexAleatoire = rand(0, (count($listeQuestions)-1));
$questionChoisie = $listeQuestions[$indexAleatoire] ;
// Afficher la question avec echo (fct qui se trouve dans la classe Question)
$questionChoisie->afficherQuestion();
$indexQuestion = $questionChoisie->getid();
// echo '<br>index question : ' . $indexQuestion;
// echo '<br>index Type : ' . $questionChoisie->getID_type();



// REPONSES ASSOCIÉES
echo '<br><br>
        <h2>Réponses possibles : </h2>';
// ? AFFICHER TOUTES LES QUESTIONS
$managerReponse = new ReponseManager($bdd);
// Sélectionner toutes les reponses (array)
$listeReponses = $managerReponse->select(['ID_question'=>$indexQuestion]);
// Créer formulaire réponses
?>
<form action="">
        <p id="question"></p>
        <p>
        <?php
        $value = 1;
        foreach ($listeReponses as $valeurObjet) {
                echo '<br><input type="radio" name="solution" value="' . $value . '">';
                $valeurObjet->afficherReponse();
                $value+=1;
        };
        ?>
        </p>
        <button type="submit">Envoyer</button>
</form>