<?php

class QuestionManager{
    
    public PDO $bdd;

public function __construct(PDO $objetBD) 
{
    $this->bdd = $objetBD;
}

//INSERT 
//INSERT INTO `questions` (`id`, `intitule_question`, `ID_type`) VALUES (NULL, 'nomQuestion', ID_type);
public function insert(Question $uneQuestion):void
{
    $sql = "INSERT INTO questions (intitule_question, ID_type) VALUES (:intitule_question, :ID_type)";
    $requete = $this->bdd->prepare($sql);
    $requete->bindValue(":intitule_question",$uneQuestion->intitule_question);
    $requete->bindValue(":ID_type",$uneQuestion->ID_type);
    $requete->execute();
    // var_dump($requete->errorInfo());
    // die();
    $uneQuestion->hydrate(['id'=>$this->bdd->lastInsertId()]);
}

// DELETE
public function delete(Question $uneQuestion)
    {
        $sql = "DELETE FROM questions WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id", $uneQuestion->getId());
        $requete->execute();
        var_dump($requete->errorInfo());
        var_dump($this->bdd->errorInfo());
    }

    // SELECT
public function select(array $filtres = []): array
    {
        $sql = "SELECT * FROM questions";
        // SELECT * from questions WHERE intitule_question=:intitule_question AND ID_type=:ID_type
        if (count($filtres) > 0) {
            $sql = $sql . " WHERE ";

            $arrayFiltresRequete = [];
            foreach ($filtres as $nomFiltre => $valeur) {
                $arrayFiltresRequete[] = $nomFiltre . "=:" . $nomFiltre;
            }
            // var_dump($arrayFiltresRequete);
            $sql = $sql . implode(" AND ", $arrayFiltresRequete);
        }

        $requete = $this->bdd->prepare($sql);

        foreach ($filtres as $nomFiltre => $valFiltre) {
            $requete->bindValue(":" . $nomFiltre, $valFiltre);
        }

        $requete->execute();

        $res = $requete->fetchAll(PDO::FETCH_ASSOC);

        $arrayObjetsQuestion = [];
        foreach ($res as $uneQuestionArray) {
            $arrayObjetsQuestion[] = new Question($uneQuestionArray);
        }
        return $arrayObjetsQuestion;
    }

    // SELECT par ID
    public function selectParId(int $id): Question
    {
        $sql = "SELECT * FROM questions WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id",$id);
        $requete->execute();
        $arrayUneQuestion = $requete->fetch(PDO::FETCH_ASSOC); // une seule ligne, un seul array
        return new Question($arrayUneQuestion);
        
    }
    
    // UPDATE
    public function update (Question $uneQuestion) : void {
        $sql = "UPDATE questions SET intitule_question = :intitule_question, 
                                            ID_type = :ID_type
                WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id", $uneQuestion->getId());
        $requete->bindValue(":intitule_question",$uneQuestion->getIntitule_question());
        $requete->bindValue(":ID_type",$uneQuestion->getID_type()); 
        $requete->execute();
        
    }


    
}