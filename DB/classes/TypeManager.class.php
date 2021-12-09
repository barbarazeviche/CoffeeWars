<?php

class TypeManager{
    
    public PDO $bdd;

public function __construct(PDO $objetBD) 
{
    $this->bdd = $objetBD;
}


//INSERT 
//INSERT INTO `types` (`id`, `intitule_question`, `ID_type`) VALUES (NULL, 'nomType', ID_type);
public function insert(Type $uneType):void
{
    $sql = "INSERT INTO types (type_question) VALUES (:type_question)";
    $requete = $this->bdd->prepare($sql);
    $requete->bindValue(":type_question",$uneType->type_question);
    $requete->execute();
    // var_dump($requete->errorInfo());
    // die();
    $uneType->hydrate(['id'=>$this->bdd->lastInsertId()]);
}

// DELETE
public function delete(Type $uneType)
    {
        $sql = "DELETE FROM types WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id", $uneType->getId());
        $requete->execute();
        var_dump($requete->errorInfo());
        var_dump($this->bdd->errorInfo());
    }

    // SELECT
public function select(array $filtres = []): array
    {
        $sql = "SELECT * FROM types";
        // SELECT * from types WHERE type_question=:type_question
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

        $arrayObjetsType = [];
        foreach ($res as $unTypeArray) {
            $arrayObjetsType[] = new Type($unTypeArray);
        }
        return $arrayObjetsType;
    }


    // SELECT par ID
    public function selectParId(int $id): Type
    {
        $sql = "SELECT * FROM types WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id",$id);
        $requete->execute();
        $arrayUnType = $requete->fetch(PDO::FETCH_ASSOC); // une seule ligne, un seul array
        return new Type($arrayUnType);
        
    }
    
        // UPDATE
    public function update (Type $unType) : void {
        $sql = "UPDATE types SET type_question = :type_question, 
                WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id", $unType->getId());
        $requete->bindValue(":type_question", $unType->getType_question()); 
        $requete->execute();
        
    }
}