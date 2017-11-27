<?php
/**
 * Created by PhpStorm.
 * User: bastien.cornu
 * Date: 27/11/17
 * Time: 14:17
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class PlayerItem
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="player_items")
 */
class PlayerItem
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
     * @var player
     * @ORM\ManyToOne(targetEntity="Player")
     * @ORM\JoinColumn(name="player_id",referencedColumnName="id")
     */
    private $player;
    /**
     * @var item
     * @ORM\ManyToOne(targetEntity="Item")
     * @ORM\JoinColumn(name="item_id",referencedColumnName="id")
     */
    private $item;
    /**
     * @var position
     * @ORM\Column(name="position", type="integer")
     */
    private $position;
    /**
     * @var Datetime
     * @ORM\Column(name="created_at",type="datetime")
     */
    private $createdAt;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return player
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param player $player
     */
    public function setPlayer( $player)
    {
        $this->player = $player;
    }

    /**
     * @return item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param item $item
     */
    public function setItem( $item)
    {
        $this->item = $item;
    }

    /**
     * @return position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param position $position
     */
    public function setPosition( $position)
    {
        $this->position = $position;
    }

    /**
     * @return Datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param Datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    function __toString()
    {
        return $this->getId(). " - " . $this->getItem(). " - ". $this->getPosition();
    }


}