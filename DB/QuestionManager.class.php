<?php

class QuestionManager{
    
    public PDO $bdd;

public function __construct(PDO $objetBD) 
{
    $this->bdd = $objetBD;
}

//INSERT 
//INSERT INTO `country` (`id`, `country`, `last_update`) VALUES (NULL, 'nomPays', current_timestamp());
public function insert(Pays $unPays):void
{
    $sql = "INSERT INTO country (country, last_update) VALUES (:country, :last_update)";
    $requete = $this->bdd->prepare($sql);
    $requete->bindValue(":country",$unPays->country);
    $requete->bindValue(":last_update",$unPays->last_update);
    $requete->execute();
    // var_dump($requete->errorInfo());
    // die();
    $unPays->hydrate(['id'=>$this->bdd->lastInsertId()]);
}

public function delete(Pays $unPays)
    {
        $sql = "DELETE FROM country WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id", $unPays->getId());
        $requete->execute();
        var_dump($requete->errorInfo());
        var_dump($this->bdd->errorInfo());
    }

public function select(array $filtres = []): array
    {
        $sql = "SELECT * FROM country";
        // SELECT * from country WHERE country=:country AND last_update=:last_update
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

        $arrayObjetsPays = [];
        foreach ($res as $unPaysArray) {
            $arrayObjetsPays[] = new Pays($unPaysArray);
        }
        return $arrayObjetsPays;
    }

    public function selectParId(int $id): Pays
    {
        $sql = "SELECT * FROM country WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id",$id);
        $requete->execute();
        $arrayUnPays = $requete->fetch(PDO::FETCH_ASSOC); // une seule ligne, un seul array
        return new Pays($arrayUnPays);
        
    }
    
    public function update (Pays $unPays) : void {
        $sql = "UPDATE country SET country = :country, 
                                last_update = :last_update
                WHERE id=:id";
        $requete = $this->bdd->prepare($sql);
        $requete->bindValue(":id", $unPays->getId());
        $requete->bindValue(":country",$unPays->getCountry()); 
        $requete->bindValue(":last_update",$unPays->getLast_update());
        $requete->execute();
        
    }
}