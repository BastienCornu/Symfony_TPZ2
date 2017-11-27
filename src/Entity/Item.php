<?php
/**
 * Created by PhpStorm.
 * User: bastien.cornu
 * Date: 27/11/17
 * Time: 14:09
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Item
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="items")
 */
class Item
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(name="name",type="string",length=50)
     */
    private $name;
    /**
     * @var string
     * @ORM\Column(name="type_item",type="string",length=50)
     */
    private $typeItem;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getTypeItem()
    {
        return $this->typeItem;
    }

    /**
     * @param string $typeItem
     */
    public function setTypeItem(string $typeItem)
    {
        $this->typeItem = $typeItem;
    }

    function __toString()
    {
        return $this->getName();
    }


}