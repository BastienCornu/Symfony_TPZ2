<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Person
 * @package App\Entity
 * @ORM\Table(name="personnes")
 * @ORM\Entity
 */
class Person
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
     * @ORM\Column(name="max_weight",type="decimal",precision=3,scale=1)
     */
    protected $maxWeight;

    /**
     * @var Inventory[]
     *
     * @ORM\OneToMany(targetEntity="Inventory",mappedBy="person")
     */
    protected $inventories;

    public function __construct()
    {
        $this->inventories = new ArrayCollection();
    }

    /**
     * @return Inventory[]
     */
    public function getInventories()
    {
        return $this->inventories;
    }

    /**
     * @param Inventory[] $inventories
     */
    public function setInventories($inventories)
    {
        $this->inventories = $inventories;
    }

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
    public function getMaxWeight()
    {
        return $this->maxWeight;
    }

    /**
     * @param mixed $maxWeight
     */
    public function setMaxWeight($maxWeight)
    {
        $this->maxWeight = $maxWeight;
    }

    function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getId()." - ".$this->getName()." - ".$this->getMaxWeight();
    }


}