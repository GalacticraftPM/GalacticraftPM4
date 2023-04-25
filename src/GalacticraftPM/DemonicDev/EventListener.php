<?php

namespace GalacticraftPM\DemonicDev;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\entity\EntityTeleportEvent;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\entity\effect\Effect;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\color\Color;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\player\PlayerInteractEvent;
class EventListener implements Listener
{
    public function onJoin(PlayerJoinEvent $event){
        #$num = mt_rand(1, 100);
        #Main::getInstance()->SaveToArray($event->getPlayer()->getName(), $num);
        Main::getInstance()->createPlanets();
    }
    public function onTeleport(EntityTeleportEvent $event){
        $player = $event->getEntity();
        if(!$player instanceof Player) return;
        $WorldName = $event->getTo()->getWorld()->getFolderName();
        $player->sendMessage("Event called (EntityTeleportEvent) to $WorldName");
        $this->New_GravityManager($player, $WorldName);
       # if($WorldName == "Moon"){
            /** cuz pm's set Gravity is trash */
           # $this->GravityManager($player, $WorldName);#
        #   $this->New_GravityManager($player, $WorldName);#

        #}else{
            //
        #}

    }

    public function New_GravityManager($player, $planet){
        Main::getInstance()->DeleteFromArray($player->getName());
        switch($planet){
            case "Moon":
                $amplifier = 0.1;
                #$player->setHasGravity(false);
            break;
            Default:
                return;
            break;
        }
        Main::getInstance()->SaveToArray($player->getName(), $amplifier);
    }


    public function GravityManager($player, $planet){
        /** $entity->addMotion(0, ($instance->getEffectLevel() / 20 - $entity->getMotion()->y) / 5, 0);
         * this is pocketmines Levitation effect
         * i will use this for my uses
         */
        $onNormalGravity = false;
            $EffectManager = $player->getEffects();
            $color = new Color(100, 100, 100);
            #$old_effect = new Effect("levitation", $color);
        $old_effect = VanillaEffects::LEVITATION();
        switch($planet){
            case "Moon":
                $effect = new EffectInstance($old_effect);
                $effect->setVisible(false);
                $effect->setAmplifier(0.0);
                $effect->setDuration(99999);
            break;
            Default:
                $onNormalGravity = true;
            break;
        }
        if($onNormalGravity == false) {
            $EffectManager->add($effect);
        }elseif($EffectManager->has($old_effect)){
            $EffectManager->remove($old_effect);
        }
        $player->setHasGravity(true);
    }

    public function onBreak(BlockBreakEvent $event)
    {
        #Main::getInstance()->RunCommandIntoGameHandler($event);
        GameHandler::getInstance()->BreakCalculator($event);
    }
    public function onPlace(BlockPlaceEvent $event)
    {
        #Main::getInstance()->RunCommandIntoGameHandler($event);
    }
    public function onInteract(PlayerInteractEvent $event){
        GameHandler::getInstance()->interact_handler($event);
    }
}