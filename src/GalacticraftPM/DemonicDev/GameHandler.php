<?php

namespace GalacticraftPM\DemonicDev;

use customiesdevs\customies\item\CustomiesItemFactory;
use customiesdevs\customies\block\CustomiesBlockFactory;
use pocketmine\math\Vector3;

use GalacticraftPM\DemonicDev\data\GalacticCraft_Item_Block_parserAndItem as GCIBp;
class GameHandler extends GCIBp
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
        $blockId = $event->getBlock()->getId();
        $Fullid = $event->getBlock()->getFullId();
        if($this->isGalacticraftBlockId($blockId) == true and $event->getPlayer()->isSurvival()){
            $GC_item = $this->Block_to_Item($blockId);
            $drops = [$GC_item];
            $event->setDrops($drops);

        }
    }

    public function interact_handler($event){
        $action = $event->getAction();
        switch($action){
            case 0:

            break;
            case 1:
                /** Function for Block Place */
                if($this->isGalacticraftItemBlockId($event->getItem()->getId())){
                    $New_Block = $this->Item_to_Block($event->getItem()->getId());
                    $this->GalacticBlockPlacer($event, $New_Block);
                }
            break;
        }
    }
    public function Middle_click_handler($event)
    {
        $blockId = $event->getBlock()->getId();
        $player = $event->getPlayer();
        if($this->isGalacticraftBlockId($blockId) == true){
            $GC_item = $this->Block_to_Item($blockId);
            $event->cancel();
            $player->getInventory()->addItem($GC_item);
        }
    }
    /**
     * since you cant place Blocks registered by GalacticraftPM4 with help of customies
     * i added a switch to convert it in interact_handler.
     * GalacticBlockPlacer does the calculation work and place work :>
     */
    public function GalacticBlockPlacer($event, $New_Block){
        $TouchedBlock = $event->getBlock();
        $TouchedPos = $TouchedBlock->getPosition();
        $world = $TouchedPos->getWorld();
        $TouchedVector = $TouchedPos->asVector3();
        $face = $event->getFace();
        /** Blocks which get replaced
            if($this->isOverideAbleBlock($TouchedBlock)){
         *      $New_Vector = $TouchedVector;
         * }
         */
        if($face == 5){
            $New_Vector = $TouchedVector->add(1, 0, 0);
        }elseif($face == 4){
            $New_Vector = $TouchedVector->add(-1, 0, 0);
        }elseif($face == 3){
            $New_Vector = $TouchedVector->add(0, 0, 1);
        }elseif($face == 2){
            $New_Vector = $TouchedVector->add(0, 0, -1);
        }elseif($face == 1){
            $New_Vector = $TouchedVector->add(0, 1, 0);
        }elseif($face == 0){
            $New_Vector = $TouchedVector->add(0, -1, 0);
        }
        /**code to check if there is an entity*/
        $WorldEntities = $world->getEntities();
        foreach($WorldEntities as $Entity){
            $EntityPos = $Entity->getPosition();
            $EX = $EntityPos->getFloorX();
            $EY = $EntityPos->getFloorY();
            $EZ = $EntityPos->getFloorZ();
            $EfloorVec = new Vector3($EX, $EY, $EZ);
            $New_Vector2 = $New_Vector->add(0, -1, 0);
            if($EfloorVec == $New_Vector or $EfloorVec == $New_Vector2) return;
            if($EfloorVec->distance($New_Vector) < 2);
        }
        /** code to remove 1 item on block place */
        if($event->getPlayer()->isSurvival()) {
            $item = $event->getItem();
            $item->setCount($item->getCount() - 1);
            $event->getPlayer()->getInventory()->setItemInHand($item);
        }
        $world->setBlock($New_Vector, $New_Block);
    }


    public function Old_GalacticBlockPlacer($event, $New_Block){
        $TouchedBlock = $event->getBlock();
        $TouchedPos = $TouchedBlock->getPosition();
        $world = $TouchedPos->getWorld();
        $TouchedVector = $TouchedPos->asVector3();
        $TouchVector = $event->getTouchVector();
        if($TouchVector->getX() == 1){
            $New_Vector = $TouchedVector->add(1, 0, 0);
        }elseif($TouchVector->getX() == 0){
            $New_Vector = $TouchedVector->add(-1, 0, 0);
        }elseif($TouchVector->getZ() == 1){
            $New_Vector = $TouchedVector->add(0, 0, 1);
        }elseif($TouchVector->getZ() == 0){
            $New_Vector = $TouchedVector->add(0, 0, -1);
        }elseif($TouchVector->getY() == 1){
            $New_Vector = $TouchedVector->add(0, 1, 0);
        }elseif($TouchVector->getY() == 0){
            $New_Vector = $TouchedVector->add(0, -1, 0);
        }else{
            $New_Vector = $TouchedVector;
        }
        /**code to check if there is an entity*/
        $WorldEntities = $world->getEntities();
        foreach($WorldEntities as $Entity){
            $EntityPos = $Entity->getPosition();
            $EX = $EntityPos->getFloorX();
            $EY = $EntityPos->getFloorY();
            $EZ = $EntityPos->getFloorZ();
            $EfloorVec = new Vector3($EX, $EY, $EZ);
            if($EfloorVec == $New_Vector or $EfloorVec == $New_Vector->add(0, -1, 0)) return;
        }
        /** code to remove 1 item on block place */
        if($event->getPlayer()->isSurvival()) {
            $item = $event->getItem();
            $item->setCount($item->getCount() - 1);
            $event->getPlayer()->getInventory()->setItemInHand($item);
        }
        $world->setBlock($New_Vector, $New_Block);
    }
}