<?php
namespace Entity\Animal;


class Chicken extends BaseAnimal{
    
    public function __construct($name , $pos){
        parent::__construct($name , $pos);
        
        $this->damage = 1;
        $this->damageTick= 1.5;
        $this->damageRange =1;
        $this->speed = 0.5;
    }
    
    

}