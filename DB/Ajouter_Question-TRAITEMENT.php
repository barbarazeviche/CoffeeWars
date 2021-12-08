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

        include_once "./config/db.php";
        try {
            $bdd = new PDO(DBDRIVER . ':host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME . ';charset='. DBCHARSET, DBUSER, DBPASS);
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }   

        include "./vendor/autoload.php";

        echo $_POST["intitule_question"];
        echo $_POST["ID_type"];

        $nouvelleQuestion = new Question(["intitule_question"=>$_POST["intitule_question"], "ID_type"=>$_POST["ID_type"]]);
        $managerQuestion = new QuestionManager($bdd);
        $managerQuestion->insert($nouvelleQuestion);



        // $newEntreprise = $_POST["questions"];
        // $Manager = new QuestionManager($bdd);
        //$Manager->insert();

        //$Manager->select();

        //var_dump($_POST);
        //echo $_POST["entreprise"];
        //echo $_POST["email"];
        //echo $_FILES["logo"];
    ?>
</body>
</html>