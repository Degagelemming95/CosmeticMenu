<?php 

namespace NinjaKnights\CosmeticMenuV2\forms;
    
use NinjaKnights\CosmeticMenuV2\Main;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\level\Level;
use pocketmine\item\Item;
use pocketmine\item\ItemIds;
use pocketmine\inventory\PlayerInventory;
    
class GadgetForm {
    
    private $main;

    public function __construct(Main $main){
        $this->main = $main;
    }

     public function openGadgets($player) {
        $form = $this->getMain()->getForm()->createSimpleForm(function (Player $player, $data) {
            $result = $data;
            if($result === null) {
                return true;
            }
            switch($result) {
                case 0:
                    if($player->hasPermission("cosmetic.gadgets.tntlauncher")){
		                $inv = $player->getInventory();
		
		                $item = Item::get(352, 0, 1);
                        $item->setCustomName("TNT-Launcher");
                        $inv->setItem(0, $item);
                    
                        $item1 = Item::get(355, 0 , 1);
                        $item1->setCustomName("§l§4<< Back");
                        $inv->setItem(8, $item1);

                        $item2 = Item::get(0, 0 , 1);
			            $slot = $this->main->config->getNested("Cosmetic.Slot");
				        $player->getInventory()->setItem($slot,$item2,true);
			
                    }
                break;

                case 1:
                    if($player->hasPermission("cosmetic.gadgets.lightningstick")){
                        $inv = $player->getInventory();
		
                        $item = Item::get(369, 0, 1);
                        $item->setCustomName("Lightning Stick");
                        $inv->setItem(0, $item);

                        $item1 = Item::get(355, 0 , 1);
                        $item1->setCustomName("§l§4<< Back");
                        $inv->setItem(8, $item1);

                        $item2 = Item::get(0, 0 , 1);
			            $slot = $this->main->config->getNested("Cosmetic.Slot");
				        $player->getInventory()->setItem($slot,$item2,true);
                    }
                break;

                case 2:
                    if($player->hasPermission("cosmetic.gadgets.leaper")){
                        $inv = $player->getInventory();
		
		                $item = Item::get(288, 0, 1);
		                $item->setCustomName("Leaper");
                        $inv->setItem(0, $item);
                        
                        $item1 = Item::get(355, 0 , 1);
                        $item1->setCustomName("§l§4<< Back");
                        $inv->setItem(8, $item1);

                        $item2 = Item::get(0, 0 , 1);
			            $slot = $this->main->config->getNested("Cosmetic.Slot");
				        $player->getInventory()->setItem($slot,$item2,true);
                    }
                break;

                case 3:
                    if($player->hasPermission("cosmetic.gadgets.smokebomb")){
                        $inv = $player->getInventory();
                        
	    	            $item = Item::get(385, 0, 1);
		                $item->setCustomName("Smoke Bomb");   
                        $inv->setItem(0, $item);
                    
                        $item1 = Item::get(355, 0 , 1);
                        $item1->setCustomName("§l§4<< Back");
                        $inv->setItem(8, $item1);

                        $item2 = Item::get(0, 0 , 1);
			            $slot = $this->main->config->getNested("Cosmetic.Slot");
				        $player->getInventory()->setItem($slot,$item2,true);
                    }
                break;

                /*case 4:
                    if($player->hasPermission("cosmetic.gadgets.paintballgun")){
                        $inv = $player->getInventory();
                        
	    	            $item = Item::get(418, 0, 1);
		                $item->setCustomName("PaintBall Gun");   
                        $inv->setItem(0, $item);
                    
                        $item1 = Item::get(355, 0 , 1);
                        $item1->setCustomName("§l§4<< Back");
                        $inv->setItem(8, $item1);

                        $item2 = Item::get(0, 0 , 1);
			            $slot = $this->main->config->getNested("Cosmetic.Slot");
				        $player->getInventory()->setItem($slot,$item2,true);
                    }
                break;*/

                case 4:
                    $this->getMain()->getForms()->menuForm($player);
                break;
            }
        });
           
        $form->setTitle("Gadgets");
        $form->setContent("Pick One");
        $form->addButton("TNT-Launcher");
        $form->addButton("Lightning Stick");
        $form->addButton("Leaper");
        $form->addButton("Smoke Bomb");
        //$form->addButton("PaintBall Gun");
        $form->addButton("§l§8<< Back");
        $form->sendToPlayer($player);
        return $form;
    }

     function getMain() : Main {
        return $this->main;
    }

}