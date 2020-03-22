<?php
namespace Main;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\entity\Entity;
use Entity\NPC;
use Entity\Animal\Chicken;
use Entity\Animal\BaseAnimal;

use pocketmine\event\entity\{
	EntityDamageEvent, EntityDamageByEntityEvent
};

class BingBingEntityX extends PluginBase implements Listener{
    private static $instance;
    public $targetdata = [];
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        Entity::registerEntity(NPC::class , true);
        Entity::registerEntity(Chicken::class , true);
    }
    public function getInstance(): BingBingEntityX{
        return self::$instance;
    }
    public function makeNPC(){
        //TODO 
        //엔피시 생성 가능하게 
    }
    public function makeAnimal() :BaseAnimal{
        
        return $this->animal();
        //TODO
        //동물 생성 가능하게 
    }
    public function makeMob(){
        //TODO
        //몹 생성 가능하게 
    }
    private function animal(string $string , $name, $pos): BaseAnimal{
        switch (strtolower($string )){
            case "chicken":
            case "닭":
                return new Chicken($name, $pos);
                
                break;
            
                
        }
    }
    
    public function onTargetDamage(EntityDamageEvent $event) {
        if($event instanceof EntityDamageByEntityEvent) {
            $entity = $event->getEntity();
            $target = $event->getDamager();
            if($entity instanceof Player && $target instanceof Wolf){
                foreach(Server::getInstance()->getLevels()->getEntities() as $entity) { 
                    if(isset($this->targetdata[$entity->getId() ) return true; //이미 늑대들이 타켓을 고르면 다른사람이 떄려도 타켓으로 안정함
                    if($entity->distance($entity) <= 10) {  //늑대 주변에 10칸안에 다른 늑대들이 있다면 그늑대들도 때린 사람 공격
                        $entity->setTarget($target->getId()); // AI 만들꺼에요 -푸키-
                        $this->targetdata[$entity->getId()] = $target->getId();
                    }
                }
            }
        }
    }
    
}
