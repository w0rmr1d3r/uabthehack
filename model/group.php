<?php

class Group
{
    private $id;
    private $name;

    public function __construct($id = NULL, $name = '')
    {
        if (!is_null($id))
        {
            $this->id = $id;
        }
        else
        {
            $this->id = -1;
        }
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
}

?>