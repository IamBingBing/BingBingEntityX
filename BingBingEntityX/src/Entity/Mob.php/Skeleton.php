<?php
namespace Entity\Mob;

use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;

class Skeleton extends BaseAnimal{
    public $entity;
    public const NETWORK_ID = self::SKELETON;
    public function __construct($name , $pos){
        parent::__construct($name , $pos);
        $nbt = Entity::createBaseNBT($this->asVector3() , $this->motion , $this->yaw , $this->pitch);
        $this->entity = Entity::createEntity("Skeleton", $this->getPosition()->getLevel(), $nbt );
        $this->setEntityInventory();
        $this->damage = 1;
        $this->damageTick= 1.5;
        $this->damageRange =1;
        $this->speed = 0.5;
    }
    public function getEntity():Entity{
        
        return $this->entity;
    }
    
    public function setEntityInventory() { 
    $inventory = $this->getEntity()->getInventory();
    $inventory->setItemInHand(ItemFactory::get(Item::BOW));
    }
    
    
    

}
