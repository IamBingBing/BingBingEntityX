<?php
namespace Entity\Animal;

use pocketmine\entity\Entity;

class Mooshroom extends BaseAnimal{
    public const NETWORK_ID = self::MOOSHROOM;
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
