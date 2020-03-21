<?php
namespace Entity\Animal;

use pocketmine\entity\Entity;

class Sheep extends BaseAnimal{
    public $entity;
    public const NETWORK_ID = self::SHEEP;
    public function __construct($name , $pos){
        parent::__construct($name , $pos);
        $nbt = Entity::createBaseNBT($this->asVector3() , $this->motion , $this->yaw , $this->pitch);
        $this->entity = Entity::createEntity("Chicken", $this->getPosition()->getLevel(), $nbt );
        $this->damage = 1;
        $this->damageTick= 1.5;
        $this->damageRange =1;
        $this->speed = 0.5;
    }
    public function getEntity():Entity{
        
        return $this->entity;
    }
    
    
    

}
