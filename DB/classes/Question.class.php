<?php

class Question {

    public int $ID;
    public string $intitule_question;
    public int $ID_type;

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
     * Get the value of intitule_question
     */ 
    public function getIntitule_question()
    {
        return $this->intitule_question;
    }

    /**
     * Set the value of intitule_question
     *
     * @return  self
     */ 
    public function setIntitule_question($intitule_question)
    {
        $this->intitule_question = $intitule_question;

        return $this;
    }

    /**
     * Get the value of ID_type
     */ 
    public function getID_type()
    {
        return $this->ID_type;
    }

    /**
     * Set the value of ID_type
     *
     * @return  self
     */ 
    public function setID_type($ID_type)
    {
        $this->ID_type = $ID_type;

        return $this;
    }

    // AFFICHER QUESTION
    function afficherQuestion(): void
    {
        echo $this->getIntitule_question();
        // echo '<div>' . $intitule_question . '</div>';
    }
}