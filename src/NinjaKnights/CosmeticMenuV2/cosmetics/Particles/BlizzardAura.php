<?php 

namespace NinjaKnights\CosmeticMenuV2\cosmetics\Particles;

use pocketmine\level\Location;
use pocketmine\level\Position;
use pocketmine\Player;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\math\Vector2;
use pocketmine\scheduler\Task as PluginTask;

use pocketmine\level\particle\DustParticle;

use NinjaKnights\CosmeticMenuV2\Main;

class BlizzardAura extends PluginTask {
	
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
            if(in_array($name, $this->main->particle3)) {
                $size = 0.6;
                $a = cos(deg2rad($this->r/0.06))* $size;
                $b = sin(deg2rad($this->r/0.06))* $size;
                $level->addParticle(new DustParticle((new Vector3($x - $a, $y + 2, $z - $b)), 250, 250, 250));
                $level->addParticle(new DustParticle((new Vector3($x + $a, $y + 2, $z + $b)), 250, 250, 250));
                $this->r++;
            } 	
        }
    }

}