<?php

class Type {

    public int $ID;
    public string $type_question;

    public function __construct(array $vals)
    {
        $this->hydrate($vals);
    }

    public function hydrate (array $vals){
        foreach ($vals as $nomPropriete => $valeurPropriete) {
            if (isset($vals[$nomPropriete])) {
                // donner une valeur `a la proprieté
                $this->$nomPropriete = $valeurPropriete;
            } 
        }
    }

    /**
     * Get the value of ID
     */ 
    public function getid()
    {
        return $this->ID;
    }

    /**
     * Set the value of ID
     *
     * @return  self
     */ 
    public function setid($ID)
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * Get the value of type_question
     */ 
    public function getType_question()
    {
        return $this->type_question;
    }

    /**
     * Set the value of type_question
     *
     * @return  self
     */ 
    public function setType_question($type_question)
    {
        $this->type_question = $type_question;

        return $this;
    }

    // AFFICHER TYPE
    public function afficherType(): void
    {
        echo $this->getType_question();
    }

    public function afficherIndexType():void
    {
        echo $this->getid();
    }
}

    