<?php
/**
 * Created by PhpStorm.
 * User: bastien.cornu
 * Date: 27/11/17
 * Time: 14:04
 */

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Class Player
 * @package App\Entity
 * @ORM\Table(name="players")
 * @ORM\Entity
 * @UniqueEntity(fields="name",message="choose a other name")
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
     * @Assert\NotBlank()
     * @Assert\Type("alpha")
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="roles",type="string")
     * @Assert\Choice({"ADC", "JUNG", "TOP", "MID", "SUP"})
     */
    private $roles;

    /**
     * @var integer
     * @ORM\Column(name="money",type="integer",nullable=true)
     */
    private $money;
    /**
     * @var string
     * @ORM\Column(name="experience",type="integer",nullable=true)
     */
    private $experience;
    /**
     * @var string
     * @ORM\Column(name="created_at",type="datetime")
     */
    private $createdAt;
    /**
     * @var string
     * @ORM\Column(name="updated_at",type="datetime")
     */
    private $updatedAt;

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
    public function setName( $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param string $roles
     */
    public function setRoles( $roles)
    {
        $this->roles = $roles;
    }

    /**
     * @return string
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param string $money
     */
    public function setMoney( $money)
    {
        $this->money = $money;
    }

    /**
     * @return string
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param string $experience
     */
    public function setExperience( $experience)
    {
        $this->experience = $experience;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt( $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     */
    public function setUpdatedAt( $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    function __toString()
    {
        return $this->getName()." - ". $this->getRoles();
    }


}