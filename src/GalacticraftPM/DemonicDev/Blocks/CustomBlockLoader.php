<?php

namespace GalacticraftPM\DemonicDev\Blocks;

use customiesdevs\customies\block\CustomiesBlockFactory;
use customiesdevs\customies\item\CreativeInventoryInfo;

use pocketmine\block\BlockBreakInfo;
use pocketmine\block\BlockIdentifier;
use pocketmine\block\Block;
//use pocketmine\block\Liquid???
class CustomBlockLoader
{

    public function LoadAllGalacticBlocks(){
        /** Moon Blocks */
       $creativeInfo = new CreativeInventoryInfo(CreativeInventoryInfo::CATEGORY_NATURE, CreativeInventoryInfo::NONE);
       CustomiesBlockFactory::getInstance()->registerBlock(fn(int $id) => new Block(new BlockIdentifier($id, 0), "moon_turf", new BlockBreakInfo(1)), "customies:moon_turf", null,$creativeInfo);
       CustomiesBlockFactory::getInstance()->registerBlock(fn(int $id) => new Block(new BlockIdentifier($id, 0), "moon_dirt", new BlockBreakInfo(1)), "customies:moon_dirt", null,$creativeInfo);
       CustomiesBlockFactory::getInstance()->registerBlock(fn(int $id) => new Block(new BlockIdentifier($id, 0), "moon_rock", new BlockBreakInfo(1)), "customies:moon_rock", null,$creativeInfo);
       CustomiesBlockFactory::getInstance()->registerBlock(fn(int $id) => new Block(new BlockIdentifier($id, 0), "moon_cheese_ore", new BlockBreakInfo(1)), "customies:moon_cheese_ore", null,$creativeInfo);
       CustomiesBlockFactory::getInstance()->registerBlock(fn(int $id) => new Block(new BlockIdentifier($id, 0), "moon_sapphire_ore", new BlockBreakInfo(1)), "customies:moon_sapphire_ore", null,$creativeInfo);
       CustomiesBlockFactory::getInstance()->registerBlock(fn(int $id) => new Block(new BlockIdentifier($id, 0), "copper_ore_moon", new BlockBreakInfo(1)), "customies:copper_ore_moon", null,$creativeInfo);
       CustomiesBlockFactory::getInstance()->registerBlock(fn(int $id) => new Block(new BlockIdentifier($id, 0), "tin_ore_moon", new BlockBreakInfo(1)), "customies:tin_ore_moon", null,$creativeInfo);
      /** Overworld Blocks */
       CustomiesBlockFactory::getInstance()->registerBlock(fn(int $id) => new Block(new BlockIdentifier($id, 0), "tin_ore", new BlockBreakInfo(1)), "customies:tin_ore", null,$creativeInfo);
       CustomiesBlockFactory::getInstance()->registerBlock(fn(int $id) => new Block(new BlockIdentifier($id, 0), "copper_ore", new BlockBreakInfo(1)), "customies:copper_ore", null,$creativeInfo);
       CustomiesBlockFactory::getInstance()->registerBlock(fn(int $id) => new Block(new BlockIdentifier($id, 0), "silicon_ore", new BlockBreakInfo(1)), "customies:silicon_ore", null,$creativeInfo);
       CustomiesBlockFactory::getInstance()->registerBlock(fn(int $id) => new Block(new BlockIdentifier($id, 0), "aluminium_ore", new BlockBreakInfo(1)), "customies:aluminium_ore", null,$creativeInfo);
    }
}