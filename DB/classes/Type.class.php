<?php

class Type {

    public int $id;
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
     * Get the value of id
     */ 
    public function getid()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setid($id)
    {
        $this->id = $id;

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

    