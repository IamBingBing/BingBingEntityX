<?php
namespace Main;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\entity\Entity;
use Entity\NPC;
use Entity\Animal\Chicken;
use Entity\Animal\BaseAnimal;

class BingBingEntityX extends PluginBase implements Listener{
    private static $instance;
    
    public function onEnable(){
        //$this->getServer()->getPluginManager()->registerEvents($this, $this);
        Entity::registerEntity(NPC::class , true);
    }
    public function getInstance(): BingBingEntityX{
        return self::$instance;
    }
    public function makeNPC(){
        return new NPC($name, $pos, $skin);
        //TODO 
        //엔피시 생성 가능하게 
    }
    public function makeAnimal(){
        
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
    
}