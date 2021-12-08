<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Coffee wars - Add Question</title>
</head>
<body>
    <div>
        Coffee wars - Add Question
    </div>
    <div>
        <!-- LIAISON BD -->
        <?php
        include_once "./config/db.php";
        try {
            $bdd = new PDO(DBDRIVER . ':host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME . ';charset='. DBCHARSET, DBUSER, DBPASS);
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }   
        // ! AUTOLOAD ?
        include_once "./Type.class.php";
        include_once "./TypeManager.class.php";
        include_once "./Question.class.php";
        include_once "./QuestionManager.class.php";
        ?>

        <form id="formulaire" action="Ajouter_Question-TRAITEMENT.php" method="POST" enctype="multipart/form-data">
            <label for="ID_type">Type de la question :</label>
            <select name="ID_type" id="ID_type">
                <option value="1">WEB</option>
                <option value="2">WAD</option>
                <option value="3">GAME</option>
                <option value="4">ASR</option>
                <option value="5">Interface 3</option>
                <option value="6">Culture Générale</option>
            </select>
<br>            
            <label for="intitule_question">Intitulé de la question :</label>
                <input type="text" id="intitule_question" name="intitule_question">
<br>           
            <label for="">réponse 1</label>
            <input type="text">
            <label for="">réponse 2</label>
            <input type="text">
            <label for="">réponse 3</label>
            <input type="text">
<br>
            <input type="submit">
        </form>
        
    </div>

    <!-- !<script src="script.js"></script> -->

</body>
</html>