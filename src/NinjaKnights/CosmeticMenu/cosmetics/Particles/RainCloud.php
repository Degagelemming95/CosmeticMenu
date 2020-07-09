<?php 

namespace NinjaKnights\CosmeticMenu\cosmetics\Particles;

use pocketmine\math\Vector3;
use pocketmine\scheduler\Task;

use pocketmine\level\particle\GenericParticle;
use pocketmine\level\particle\Particle;

use NinjaKnights\CosmeticMenu\Main;

class RainCloud extends Task {
	
	public function __construct(Main $main) {
        $this->main = $main;
        $this->r = 0;
    }
    
    public function onRun($tick) {
        foreach($this->main->getServer()->getOnlinePlayers() as $player) {
            $name = $player->getName();
            $level = $player->getLevel();
        
            $x = $player->getX();
            $y = $player->getY();
            $z = $player->getZ();
            if(in_array($name, $this->main->particle1)) {
                if($this->r < 0){
                    $this->r++;
                    return true;
                }							  						 
                $a = cos(deg2rad($this->r/0.04))* 0.5;
                $b = sin(deg2rad($this->r/0.04))* 0.5;
                $c = cos(deg2rad($this->r/0.04))* 0.8;
                $d = sin(deg2rad($this->r/0.04))* 0.8;

                $level->addParticle(new GenericParticle(new Vector3($x - $a, $y + 3, $z - $b), Particle::TYPE_EVAPORATION ));
				$level->addParticle(new GenericParticle(new Vector3($x - $b, $y + 3, $z - $a), Particle::TYPE_EVAPORATION ));
                
                $level->addParticle(new GenericParticle(new Vector3($x - $a, $y + 2.3, $z - $b), Particle::TYPE_WATER_SPLASH));
				$level->addParticle(new GenericParticle(new Vector3($x - $b, $y + 2.3, $z - $a), Particle::TYPE_WATER_SPLASH));
                
                $level->addParticle(new GenericParticle(new Vector3($x + $c, $y + 3, $z + $d), Particle::TYPE_EVAPORATION ));
				$level->addParticle(new GenericParticle(new Vector3($x + $c, $y + 3, $z + $d), Particle::TYPE_EVAPORATION ));
                
                $level->addParticle(new GenericParticle(new Vector3($x, $y + 3, $z), Particle::TYPE_EVAPORATION ));
				$level->addParticle(new GenericParticle(new Vector3($x, $y + 2.3, $z), Particle::TYPE_WATER_SPLASH));
				
                $this->r++;
            } 	
        }
    }

}