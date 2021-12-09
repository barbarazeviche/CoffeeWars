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
                <input type="text" id="intitule_question" name="intitule_question" require>
<br>           
            <label for="reponse1">réponse 1</label>
            <input id="reponse1" name="reponse1" type="text" require>
            <label for="resultat1">Résultat réponse</label>
            <select name="resultat1" id="resultat1">
                <option value="0">FAUX</option>
                <option value="1">VRAI</option>
            </select>
<br>
            <label for="reponse2">réponse 2</label>
            <input id="reponse2" name="reponse2" type="text" require>
            <label for="resultat2">Résultat réponse</label>
            <select name="resultat2" id="resultat2">
                <option value="0">FAUX</option>
                <option value="1">VRAI</option>
            </select>
<br>
            <label for="reponse3">réponse 3</label>
            <input id="reponse3" name="reponse3" type="text" require>
            <label for="resultat3">Résultat réponse</label>
            <select name="resultat3" id="resultat3">
                <option value="0">FAUX</option>
                <option value="1">VRAI</option>
            </select>
<br>
            <input type="submit">
        </form>
        
    </div>

    <!-- !<script src="script.js"></script> -->

</body>
</html>