<?php

namespace App\SizeEquipment;

use Doctrine\ORM\EntityManagerInterface;

class Equipment
{
    private $em;
    private $player;
    private $playerItem;
    private $size;

    public function __construct(EntityManagerInterface $em, $size)
    {
        $this->em = $em;
        $this->size = $size;
    }

    public function calcul(){
       if($this->playerItem->getPosition() != NULL){
           return;
       }
       if($this->playerItem->getPosition() > $this->size){
           return;
       }

    }


}