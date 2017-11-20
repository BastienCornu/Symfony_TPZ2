<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Person
 * @package App\Entity
 * @ORM\Table(name="materials")
 * @ORM\Entity
 */
class Material
{
    /**
     * var int
     *
     * @ORM\Column(name="id",type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * var string
     *
     * @ORM\Column(name="name",type="string", length=255)
     */
    protected $name;

    /**
     * var int
     *
     * @ORM\Column(name="weight",type="decimal",precision=3,scale=1)
     */
    protected $weight;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getId()." - ".$this->getName()." - ".$this->getWeight();
    }


}