<?php

class Persona
{
    private $id;
    private $name;
    private $lastName;

    public function __construct($id = NULL, $name = NULL, $lastName = '')
    {
        if (!is_null($id) && !is_null($name))
        {
            $this->id = $id;
            $this->name = $name;
        }
        else
        {
            $this->id = -1;
            $this->name = 'ERROR ID OR NAME WAS NULL';
        }
        $this->lastName = $lastName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLastName()
    {
        return $this->lastName;
    }
}

?>
