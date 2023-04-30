<?php

namespace GalacticraftPM\DemonicDev\Items;

use customiesdevs\customies\item\CustomiesItemFactory;
use GalacticraftPM\DemonicDev\Items\CustomItems\ItemBlocks\moon\{copper_ore_moon, moon_cheese_ore, moon_dirt, moon_rock, moon_sapphire_ore, moon_turf, tin_ore_moon};
use GalacticraftPM\DemonicDev\Items\CustomItems\ItemBlocks\overworld\{aluminium_ore, copper_ore, silicon_ore, tin_ore};
class CustomItemLoader
{

    public function LoadAllGalacticItems(){
        /** later perhabs if i write another Mod to Plugin i will write a StandAlone Plugin for the Ores which will be used of GalacticraftPM, and is usable by others too */
        /** Moon ItemBlocks */
        CustomiesItemFactory::getInstance()->registerItem(copper_ore_moon::class, "customies:copper_ore_moon", "Moon Copper Ore");
        CustomiesItemFactory::getInstance()->registerItem(moon_cheese_ore::class, "customies:moon_cheese_ore", "Moon Chesse Ore");
        CustomiesItemFactory::getInstance()->registerItem(moon_dirt::class, "customies:moon_dirt", "Moon Dirt");
        CustomiesItemFactory::getInstance()->registerItem(moon_rock::class, "customies:moon_rock", "Moon Rock");
        CustomiesItemFactory::getInstance()->registerItem(moon_sapphire_ore::class, "customies:moon_sapphire_ore", "Moon Sapphire Ore");
        CustomiesItemFactory::getInstance()->registerItem(moon_turf::class, "customies:moon_turf", "Moon Turf");
        CustomiesItemFactory::getInstance()->registerItem(tin_ore_moon::class, "customies:tin_ore_moon", "Moon Tin Ore");
        /** OverWorld ItemBlocks */
        CustomiesItemFactory::getInstance()->registerItem(aluminium_ore::class, "customies:aluminium_ore", "Aluminium Ore");
        /** Copper ore can be replaced later by the default copper ore */
        CustomiesItemFactory::getInstance()->registerItem(copper_ore::class, "customies:copper_ore", "Copper Ore");
        CustomiesItemFactory::getInstance()->registerItem(silicon_ore::class, "customies:silicon_ore", "Silicon Ore");
        CustomiesItemFactory::getInstance()->registerItem(tin_ore::class, "customies:tin_ore", "Tin Ore");
    }
}