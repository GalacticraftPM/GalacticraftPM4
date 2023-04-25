<?php

namespace GalacticraftPM\DemonicDev;



use GalacticraftPM\DemonicDev\tasks\UpdateTask;
use pocketmine\plugin\PluginBase;
use pocketmine\world\generator\GeneratorManager;

use GalacticraftPM\DemonicDev\World\Generators\Moon\MoonGen;
use GalacticraftPM\DemonicDev\Blocks\CustomBlockLoader as CBL;
use GalacticraftPM\DemonicDev\Items\CustomItemLoader as CIL;

use pocketmine\world\WorldCreationOptions;
use pocketmine\block\BlockBreakInfo;
use pocketmine\block\BlockIdentifier;
use pocketmine\block\Block;
use pocketmine\math\Vector3;

use GalacticraftPM\DemonicDev\GameHandler;
class Main extends PluginBase
{

    public static self $instance;
    public $PlayersGravityArray = array();
    public $PlayersInArray = [];

    public static function getInstance(): Main
    {
        return self::$instance;
    }

    public function onLoad(): void
    {
        new GameHandler();
        self::$instance = $this;
        $CBL = new CBL();
        $CBL->LoadAllGalacticBlocks();
        $CIL = new CIL();
        $CIL->LoadAllGalacticItems();
        $generators = ["Moon" => MoonGen::class];
        foreach($generators as $name => $class) {
            GeneratorManager::getInstance()->addGenerator($class, $name, fn() => null, true);
        }
    }

    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
        #$this->createPlanets();
        $task = new UpdateTask($this);
        #$this->getScheduler()->scheduleRepeatingTask($task, 10);
        #$this->getScheduler()->scheduleRepeatingTask($task, 20);
    }
    public function onDisable(): void
    {

    }

    public function Update(){
        foreach($this->PlayersInArray as $player){
            $num = $this->PlayersGravityArray[$player];
            $entity = $this->getServer()->getPlayerExact($player);
            if(!$entity == null) {
                #$entity->addMotion(0, - ($num / 20 - $entity->getMotion()->y) / 5, 0);
               # $entity->setMotion(new Vector3($entity->getMotion()->x, $entity->getMotion()->y + $num, $entity->getMotion()->z));
                $entity->sendMessage("motion is working");
                $this->getLogger()->info("§a $num, $player");
            }else{
                $this->DeleteFromArray($player);
            }
        }
    }

    public function SaveToArray($player, $num){
        $this->PlayersGravityArray[$player] = $num;
        $this->PlayersInArray[] = $player;
    }
    public function DeleteFromArray($player){
        unset($this->PlayersGravityArray[$player]);
        unset($this->PlayersInArray[$player]);
    }

    public function createPlanets(){
            $this->getServer()->getWorldManager()->generateWorld(
                name: "Moon_broken",
                options: WorldCreationOptions::create()
                    ->setSeed(mt_rand(98234, 2389423945982345))
                    ->setGeneratorClass(MoonGen::class)
            );
        }


}