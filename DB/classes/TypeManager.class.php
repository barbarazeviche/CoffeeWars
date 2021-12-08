<?php

class TypeManager{
    
    public PDO $bdd;

public function __construct(PDO $objetBD) 
{
    $this->bdd = $objetBD;
}

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

    public function selectParId(int $id): Type
    {
        $sql = "SELECT * FROM types WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id",$id);
        $requete->execute();
        $arrayUnType = $requete->fetch(PDO::FETCH_ASSOC); // une seule ligne, un seul array
        return new Type($arrayUnType);
        
    }
    
    public function update (Type $unType) : void {
        $sql = "UPDATE types SET type_question = :type_question, 
                WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id", $unType->getId());
        $requete->bindValue(":type_question", $unType->getType_question()); 
        $requete->execute();
        
    }
}