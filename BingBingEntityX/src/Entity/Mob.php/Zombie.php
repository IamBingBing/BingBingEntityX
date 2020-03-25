<?php
namespace Entity\Mob;

use pocketmine\entity\Entity;

class Zombie extends BaseMob{
    public $entity;
    public const NETWORK_ID = self::ZOMBIE;
    public function __construct($name , $pos){
        parent::__construct($name , $pos);
        
        $this->damage = 1;
        $this->damageTick= 1.5;
        $this->damageRange =1;
        $this->speed = 0.5;
    }
    public function getEntity():Entity{
        
        return $this;
    }
    
    
    

}
