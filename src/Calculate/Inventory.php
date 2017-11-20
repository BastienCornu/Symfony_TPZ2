<?php

namespace App\Calculate;

use App\Entity\Person;
use Doctrine\ORM\EntityManager;

class Inventory
{
    private $em;
    private $person;
    private $inventory;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function calcul(){
        $sum = 0;
        foreach($this->person->getInventories() as $i){
            $sum += $i->getMaterial()->getWeight() * $i->getNumberOfItem();
        }
        $sum += $this->inventory->getMaterial()->getWeight() * $this->inventory->getNumberOfItem();

        if($sum > $this->person->getMaxWeight()){
            return false;
        }
    }
    /**
     * @return mixed
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param mixed $person
     */
    public function setPerson(Person $person)
    {
        $this->person = $person;
    }

    /**
     * @return mixed
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * @param mixed $inventory
     */
    public function setInventory($inventory)
    {
        $this->inventory = $inventory;
    }


}