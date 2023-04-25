<?php

namespace GalacticraftPM\DemonicDev;

class GameHandler
{
    public static self $instance;

    public static function getInstance(): GameHandler
    {
        return self::$instance;
    }
    public function __construct(){
        self::$instance = $this;
    }

    public function BreakCalculator($event){
        $name = $event->getBlock()->getName();
        $id = $event->getBlock()->getId();
        $Fullid = $event->getBlock()->getFullId();

        $event->getPlayer()->sendMessage("$name, $id, $Fullid");

        switch($name){
            case"moon_dirt":
                #$event->set;
            break;

        }
    }

    public function interact_handler($event){
        $action = $event->getAction();
        switch($action){
            case 0:

            break;
            case 1:
                //place click
            break;
        }
        $item = $event->getItem()->getId();
        $event->getPlayer()->sendMessage("$item");
    }
}