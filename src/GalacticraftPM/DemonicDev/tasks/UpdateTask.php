<?php

namespace GalacticraftPM\DemonicDev\tasks;

use pocketmine\scheduler\Task;
use GalacticraftPM\DemonicDev\Main;
class UpdateTask extends Task
{
    public function __construct(Main $main){
        $this->main = $main;
    }

    public function onRun() :void{
        $this->main->Update();
    }
}