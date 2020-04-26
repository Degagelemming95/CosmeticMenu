<?php 

namespace NinjaKnights\CosmeticMenuV2\forms;
    
use NinjaKnights\CosmeticMenuV2\Main;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\item\Item;
    
class MainForm {
    
    private $main;

    public function __construct(Main $main){
        $this->main = $main;
    }
    
    public function menuForm($player) {
        $form = $this->getMain()->getForm()->createSimpleForm(function (Player $player, $data) {
        $result = $data;
            if($result === null) {
                return true;
            }
            switch($result) {
                case 0:
                    if($player->hasPermission("cosmetic.gadgets")){
                        $this->getMain()->getGadgets()->openGadgets($player);
                    } 
                break;

                case 1:
                    if($player->hasPermission("cosmetic.particles")){
                        $this->getMain()->getParticles()->openParticles($player);
                    }
                break;

                case 2:
                    if($player->hasPermission("cosmetic.masks")){
                        $this->getMain()->getHats()->openHats($player);
                    }
                break;

                case 3:
                    if($player->hasPermission("cosmetic.trails")){
                        $this->getMain()->getTrails()->openTrails($player);
                    }
                break;

                case 4:
                    if($player->hasPermission("cosmetic.morphs")){
                        $this->getMain()->getMorphs()->openMorphs($player);
                    }
                break;
            }
        });
           
        $form->setTitle("§l§3Cosmetic§eMenu");
        $form->addButton("§l§8Gadgets\n§r§7Click to Open");
        $form->addButton("§l§8Particles\n§r§7Click to Open");
        $form->addButton("§l§8Hats\n§r§7Click to Open");
        $form->addButton("§l§8Trails\n§r§7Click to Open");
        $form->addButton("§l§8Morphs\n§r§7Click to Open");
        $form->sendToPlayer($player);
    }

    function getMain() : Main {
        return $this->main;
    }

}