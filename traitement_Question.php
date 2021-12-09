<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/modal.css">
</head>
<body>
    
<div class="glass">
    <div class="modalFormContainer">
        <div class="modalFormThird">
            <div class="modalFormSecond">
                <div class="modalForm" >
                <?php
                                    
                    $score;

                    if ($_POST["solution"] == 1){
                        echo 'BRAVO VOUS AVEZ GAGNÉ';
                    }else{
                        echo 'Dommage vous avez perdu...';
                    }
                ?>
                
                </div>
            </div>
        </div>
    </div>
</div>











</body>
</html>