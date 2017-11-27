<?php
/**
 * Created by PhpStorm.
 * User: bastien.cornu
 * Date: 27/11/17
 * Time: 14:04
 */

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Class PlayerItem
 * @package App\Entity
 * @ORM\Table(name="players")
 * @ORM\Entity
 */
class Player
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
    function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->name;
    }


}