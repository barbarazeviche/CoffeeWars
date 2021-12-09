<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

        $nouvelleQuestion = new Question(["intitule_question"=>$_POST["intitule_question"], "ID_type"=>$_POST["ID_type"]]);
        $managerQuestion = new QuestionManager($bdd);
        $managerQuestion->insert($nouvelleQuestion);
        // récupérer l'ID de la question
        $ID_question = $nouvelleQuestion->getid();

        $nouvelleReponse = new Reponse(["intitule_reponse"=>$_POST["reponse1"], "ID_question"=>$ID_question, "resultat"=>$_POST["resultat1"]]);
        $managerReponse = new ReponseManager($bdd);
        $managerReponse->insert($nouvelleReponse);

        $nouvelleReponse = new Reponse(["intitule_reponse"=>$_POST["reponse2"], "ID_question"=>$ID_question, "resultat"=>$_POST["resultat2"]]);
        $managerReponse = new ReponseManager($bdd);
        $managerReponse->insert($nouvelleReponse);

        $nouvelleReponse = new Reponse(["intitule_reponse"=>$_POST["reponse3"], "ID_question"=>$ID_question, "resultat"=>$_POST["resultat3"]]);
        $managerReponse = new ReponseManager($bdd);
        $managerReponse->insert($nouvelleReponse);

    ?>

    <a href="./Ajouter_Question-FORM.php">Ajouter une autre question</a>        

</body>
</html>