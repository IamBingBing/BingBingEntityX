<?php
namespace Entity;
use Entity\EntityBase;
use pocketmine\entity\Entity;
use pocketmine\network\mcpe\protocol\MovePlayerPacket;

class NPC extends EntityBase{
    public function __construct(){
        
    }
    public function seeing($target)
    {
        $horizontal = sqrt(($target->x - $this->x) ** 2 + ($target->z - $this->z) ** 2);
        $vertical = $target->y - $this->y;
        $this->pitch = -atan2($vertical, $horizontal) / M_PI * 180; //negative is up, positive is down
        
        $xDist = $target->x - $this->x;
        $zDist = $target->z - $this->z;
        $this->yaw = atan2($zDist, $xDist) / M_PI * 180 - 90;
        if($this->yaw < 0){
            $this->yaw += 360.0;
        }
        
        $pk = new MovePlayerPacket();
        $pk->position = $this->add(0, 1.62);
        $pk->yaw = $this->yaw;
        $pk->pitch = $this->pitch;
        $pk->entityRuntimeId = $this->id;
        $pk->headYaw = $this->yaw;
        $target->sendDataPacket($pk);
    }

    
    public function moveing(): void
    {}


    

    
}