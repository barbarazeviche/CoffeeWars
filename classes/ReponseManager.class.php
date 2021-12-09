<?php

class ReponseManager{
    
    public PDO $bdd;

public function __construct(PDO $objetBD) 
{
    $this->bdd = $objetBD;
}

//INSERT 
public function insert(Reponse $uneReponse):void
{
    $sql = "INSERT INTO reponses (intitule_reponse, ID_question, resultat) VALUES (:intitule_reponse, :ID_question, :resultat)";
    $requete = $this->bdd->prepare($sql);
    $requete->bindValue(":intitule_reponse",$uneReponse->intitule_reponse);
    $requete->bindValue(":ID_question",$uneReponse->ID_question);
    $requete->bindValue(":resultat",$uneReponse->resultat);
    $requete->execute();
    // var_dump($requete->errorInfo());
    // die();
    $uneReponse->hydrate(['id'=>$this->bdd->lastInsertId()]);
}

// DELETE
public function delete(Reponse $uneReponse)
    {
        $sql = "DELETE FROM reponses WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id", $uneReponse->getId());
        $requete->execute();
        var_dump($requete->errorInfo());
        var_dump($this->bdd->errorInfo());
    }

    // SELECT
public function select(array $filtres = []): array
    {
        $sql = "SELECT * FROM reponses";
        // SELECT * from reponses WHERE intitule_reponse=:intitule_reponse AND ID_question=:ID_question
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

        $arrayObjetsReponse = [];
        foreach ($res as $uneReponseArray) {
            $arrayObjetsReponse[] = new Reponse($uneReponseArray);
        }
        return $arrayObjetsReponse;
    }

    // SELECT par ID
    public function selectParId(int $id): Reponse
    {
        $sql = "SELECT * FROM reponses WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id",$id);
        $requete->execute();
        $arrayUneReponse = $requete->fetch(PDO::FETCH_ASSOC); // une seule ligne, un seul array
        return new Reponse($arrayUneReponse);
        
    }
    
    // UPDATE
    public function update (Reponse $uneReponse) : void {
        $sql = "UPDATE reponses SET intitule_reponse = :intitule_reponse, 
                                            ID_question = :ID_question,
                                            resultat = :resultat
                WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id", $uneReponse->getId());
        $requete->bindValue(":intitule_reponse",$uneReponse->getIntitule_reponse());
        $requete->bindValue(":ID_question",$uneReponse->getID_question()); 
        $requete->bindValue(":resultat",$uneReponse->getResultat()); 
        $requete->execute();
        
    }
}