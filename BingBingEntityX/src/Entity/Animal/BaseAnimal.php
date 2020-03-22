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
        $x = $this->target->x - $this->x;
        $y = $this->target->y - $this->y;
        $z = $this->target->z - $this->z;
        $abs = abs($x) + abs($z);
        $main_xyz = sqrt(pow($x, 2) + pow($z, 2));
        
        $this->yaw = -atan2($x / $abs, $z / $abs) * 180 / M_PI;
        $this->pitch = -atan2($y, $main_xyz) * 180 / M_PI;
        $this->move ($this->motion->x, $this->motion->y, $this->motion->z);
        
    }
    
    
    
    public function moveing(): void
    {
        $x = $this->target->x - $this->x;
        $z = $this->target->z - $this->z;
        $main_xyz = sqrt(pow($x, 2) + pow($z, 2));
        if($main_xyz < 1.0) return true;
        $this->motion->x =  $this->speed *($x / $main_xyz);
        $this->motion->z =$this->speed *($z / $main_xyz);
        
        $this->move ($this->motion->x, $this->motion->y, $this->motion->z);
        
        
    }
    public function onUpdate(int $currentTick) : bool{
        if ($this->target->getLevel() == $this->pos->getLevel()){
            $this->moveing();
            $this->jumping();
            $this->seeing();
        }
        else {
            $this->teleport(new Position($this->target->x, $this->target->y, $this->target->z, $this->target->level) );
        }
    }
    public function jumping()
    {
        $x= $this-> x + 1 * sin($this-> getYaw());
        $z = $this-> z + 1 * cos($this-> getYaw());
        $block = $this->target->level->getBlock(new Vector3($x, $this->y, $z));
        if($block->getId() != 0){
            parent::jump();
            $this->jump();
        }
    }
    /*public function Attack(){ //빙빙님 Attack 부분 
        if ($this->getTargetEntity()->distance($this->asPosition()) <= $this->damageRange && $this->isAngry()){
            $event = new EntityDamageByEntityEvent($this, $this->getTargetEntity(), EntityDamageByEntityEvent::CAUSE_ENTITY_ATTACK, $this->damage);
            $event->call();
        }
    }*/
    
    public function Attack() { //푸키 Attack부분
        if($this->target == null) return;
        //if($this->traget->distance($this) <=  0.5) { 타켓 엔티티 0.5 범위에 엔티티 있으면 공격 이거는 따로 몬스터 클래스안에서 하는게 간편할꺼 같습니다.
           $this->target->attack (new EntityDamageByEntityEvent ($this, $this->target, EntityDamageByEntityEvent::CAUSE_ENTITY_ATTACK, $this->damage));
        }
    //}
    

}
