<?php
namespace Entity;
use pocketmine\entity\Living;
use pocketmine\entity\Entity;
use pocketmine\level\Location;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\level\Position;

abstract class EntityBase extends Living{
    public $eid ;
    public $angry;
    public $damage;
    public $damageTick;
    public $damageRange;
    public $name;
    public $target; //타겟
    public $speed; //객체 스피드
    static protected $entity = [];
    public function __construct($name, Location $pos){
        $nbt = new CompoundTag("loc" , ["x" => $pos->x , "y"=> $pos->y , "z" => $pos->z ]);
        $this->setPosition($pos);
        parent::__construct($pos->getLevel(), $nbt);
        $this->name = $name;
        $this->eid = Entity::$entityCount++;
        $this->targetpos = $pos;
        array_push (self::$entity , $this->eid);
    }
    public function initEntity(){
        parent::initEntity();
    }
    abstract public function Attack();
    abstract public function jumping();
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
    public function setdamage(int $damage):void{
         $this->damage = $damage;
    }
    public function setDamageTick($damageTick):void{
        $this->damageTick = $damageTick;
    }
    public function setDamageRange($damageRange):void {
        $this->damageRange = $damageRange;
    }
    public function setName($name):void{
        $this->name = $name;
    }
    public function setTarget($player):void{
        $this->target = $player;
    }
        public function setTarget($player){
            return $this->target;
    }
    
    
}
