<?php
namespace Main;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\entity\Entity;
use Entity\NPC;
use Entity\Animal\Chicken;
use Entity\Animal\BaseAnimal;
use Entity\Animal\Cat;
use Entity\Animal\Cow;
use Entity\Animal\Horse;
use Entity\Animal\Mooshroom;
use Entity\Animal\Pig;
use Entity\Animal\Sheep;
use Entity\Mob\Wolf;
use Entity\Mob\Skeleton;
use Entity\Mob\Zombie;



class BingBingEntityX extends PluginBase implements Listener{
    private static $instance;
    public $targetdata = [];
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        Entity::registerEntity(NPC::class , true);
        Entity::registerEntity(Chicken::class , true);
        Entity::registerEntity(Cat::class , true);
        Entity::registerEntity(Cow::class , true);
        Entity::registerEntity(Horse::class , true);
        Entity::registerEntity(Mooshroom::class , true);
        Entity::registerEntity(Pig::class , true);
        Entity::registerEntity(Sheep::class , true);
        Entity::registerEntity(Wolf::class , true);
        Entity::registerEntity(Skeleton::class , true);
        Entity::registerEntity(Zombie::class , true);
        $this->getServer()->broadcastMessage("BingBing 제작  Puki 도움 소스 링크  https://github.com/IamBingBing/BingBingEntityX 본 플러그인은 LGPL 입니다. ");
        
    }
    public function getInstance(): BingBingEntityX{
        return self::$instance;
    }
    
    public function make(string $string , $name, $pos): Entity{
        switch (strtolower($string )){
            case "chicken":
            case "닭":
                return new Chicken($name, $pos);
                
                break;
            case "cat":
            case "고양이":
            case "야옹이":
                return new Cat($name, $pos);
                break;
            case "cow":
            case "소":
                return new Cow($name, $pos);
                break;
            case "horse":
            case "말":
                return new Horse($name, $pos);
                break;
            case "mooshroom":
            case "버섯":
                return new Mooshroom($name, $pos);
                break;
            case "pig":
            case "돼지":
                return new Pig($name, $pos);
                break;
            case "sheep":
            case "양":
                return new Sheep($name, $pos);
                break;
            case "wolf":
            case "늑대":
                return new Wolf($name, $pos);
                break;
            case "skeleton":
            case "스켈레톤":
                return new Skeleton($name, $pos);
                break;
            case "zombie":
            case "좀비":
                return new Zombie($name, $pos);
                break;
        }
    }
    
    
    
}
