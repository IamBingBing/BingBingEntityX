<?php
namespace Entity\Animal;
use Entity\EntityBase;
use pocketmine\entity\Entity;
use pocketmine\network\mcpe\protocol\AddActorPacket;
use pocketmine\math\Vector3;
use pocketmine\level\Position;
use pocketmine\event\entity\EntityDamageByEntityEvent;


class BaseAnimal extends EntityBase{
    
    public function __construct($name , $pos){
        parent::__construct($name, $pos);
        $this->isAngry() = false;
        
        
    }
    public function seeing()
    {
        $x = $this->targetpos->x - $this->x;
        $y = $this->targetpos->y - $this->y;
        $z = $this->targetpos->z - $this->z;
        $abs = abs($x) + abs($z);
        $main_xyz = sqrt(pow($x, 2) + pow($z, 2));
        
        $this->yaw = -atan2($x / $abs, $z / $abs) * 180 / M_PI;
        $this->pitch = -atan2($y, $main_xyz) * 180 / M_PI;
        $this->move ($this->motion->x, $this->motion->y, $this->motion->z);
        
    }
    
    
    
    public function moveing(): void
    {
        $x = $this->targetpos->x - $this->x;
        $z = $this->targetpos->z - $this->z;
        $main_xyz = sqrt(pow($x, 2) + pow($z, 2));
        if($main_xyz < 1.0) return true;
        $this->motion->x =  $this->speed *($x / $main_xyz);
        $this->motion->z =$this->speed *($z / $main_xyz);
        
        $this->move ($this->motion->x, $this->motion->y, $this->motion->z);
        
        
    }
    public function onUpdate(int $currentTick) : bool{
        if ($this->targetpos->getLevel() == $this->pos->getLevel()){
            $this->moveing();
            $this->jumping();
            $this->seeing();
        }
        else {
            $this->teleport(new Position($this->targetpos->x, $this->targetpos->y, $this->targetpos->z, $this->targetpos->level) );
        }
    }
    public function jumping()
    {
        $x= $this-> x + 1 * sin($this-> getYaw());
        $z = $this-> z + 1 * cos($this-> getYaw());
        $block = $this->targetpos->level->getBlock(new Vector3($x, $this->y, $z));
        if($block->getId() != 0){
            parent::jump();
            $this->jump();
        }
    }
    public function Attack(){
        if ($this->getTargetEntity()->distance($this->asPosition()) <= $this->damageRange && $this->isAngry()){
            $event = new EntityDamageByEntityEvent($this, $this->getTargetEntity(), EntityDamageByEntityEvent::CAUSE_ENTITY_ATTACK, $this->damage);
            $event->call();
        }
    }
    

}