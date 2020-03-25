<?php
namespace Entity\Mob;

use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\network\mcpe\protocol\AddActorPacket;
use pocketmine\entity\projectile\Arrow;
use pocketmine\event\entity\EntityShootBowEvent;

class Skeleton extends BaseMob{
    public const NETWORK_ID = self::SKELETON;
    public function __construct($name , $pos){
        parent::__construct($name , $pos);
       
        $this->setItemInHand(new Item(Item::BOW));
        $this->damage = 1;
        $this->damageTick= 1.5;
        $this->damageRange =1;
        $this->speed = 0.5;
    }
    public function getEntity():Entity{
        
        return $this;
    }
   /* public function Attack(){
        if($this->getTargetEntity()== null) return;
        $nbt = Entity::createBaseNBT($this, $motion , $this->yaw , $this->pitch);
        $a = new Arrow($this->level, $nbt);
        $e = new EntityShootBowEvent($this, , $a, 1.2);

    }*/
    
    
    
    
    

}
