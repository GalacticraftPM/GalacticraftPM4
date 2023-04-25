<?php

namespace GalacticraftPM\DemonicDev\Blocks;

use customiesdevs\customies\block\CustomiesBlockFactory;
use customiesdevs\customies\item\CreativeInventoryInfo;

use pocketmine\block\BlockBreakInfo;
use pocketmine\block\BlockIdentifier;
use pocketmine\block\Block;

class CustomBlockLoader
{

    public function LoadAllGalacticBlocks(){
       # CustomiesBlockFactory::getInstance()->registerBlock(fn(int $id) => new Block(new BlockIdentifier($id, 0), "Example Block", new BlockBreakInfo(1)), "customies:example_block");
       $creativeInfo = new CreativeInventoryInfo(CreativeInventoryInfo::CATEGORY_NATURE, CreativeInventoryInfo::NONE);
       CustomiesBlockFactory::getInstance()->registerBlock(fn(int $id) => new Block(new BlockIdentifier($id, 0), "moon_dirt", new BlockBreakInfo(1)), "customies:moon_dirt", null,$creativeInfo);
    }
}