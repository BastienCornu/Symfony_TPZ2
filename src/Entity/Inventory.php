<?php
/**
 * Created by PhpStorm.
 * User: bastien.cornu
 * Date: 20/11/17
 * Time: 13:59
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Inventory
 * @package App\Entity
 * @ORM\Table(name="inventory")
 * @ORM\Entity
 */
class Inventory
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
     * @var Personne
     *
     * @ORM\ManyToOne(targetEntity="Person",inversedBy="inventories")
     * @ORM\JoinColumn(name="person_id",referencedColumnName="id")
     */
    protected $person;

    /**
     * @var Material
     *
     * @ORM\ManyToOne(targetEntity="Material")
     * @ORM\JoinColumn(name="material_id",referencedColumnName="id")

     */
    protected $material;

    /**
     * @var int
     *
     * @ORM\Column(name="stock",type="integer")
     */
    protected $numberOfItem;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Personne
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param Personne $person
     */
    public function setPerson( $person)
    {
        $this->person = $person;
    }

    /**
     * @return Material
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * @param Material $material
     */
    public function setMaterial( $material)
    {
        $this->material = $material;
    }

    /**
     * @return int
     */
    public function getNumberOfItem()
    {
        return $this->numberOfItem;
    }

    /**
     * @param int $numberOfItem
     */
    public function setNumberOfItem( $numberOfItem)
    {
        $this->numberOfItem = $numberOfItem;
    }

}