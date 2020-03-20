<?php
namespace Entity;
use pocketmine\entity\Living;
use pocketmine\entity\Entity;

abstract class EntityBase extends Living{
    public $eid ;
    public $angry;
    public $damage;
    public $damageTick;
    public $damageRange;
    public $name;
    protected function __construct(){
        
    }
    abstract public function seeing();
        
    abstract public function moveing():void;
    public function geteid(){
        return $this->eid;
    }
    
    public function isAngry():bool{
        return $this->angry;
    }
    public function getdamage():int{
        return $this->damage;
    }
    public function getDamageTick():int{
        return $this->damageTick;
    }
    public function getDamageRange():int {
        return $this->damageRange;
    }
    public function getName():string{
        return $this->name;
    }
    
    
}