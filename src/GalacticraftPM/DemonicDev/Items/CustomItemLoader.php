<?php

namespace GalacticraftPM\DemonicDev\Items;

use customiesdevs\customies\item\CustomiesItemFactory;
use GalacticraftPM\DemonicDev\Items\CustomItems\moon_dirt;
use GalacticraftPM\DemonicDev\Items\CustomItems\moon_rock;

class CustomItemLoader
{

    public function LoadAllGalacticItems(){
        CustomiesItemFactory::getInstance()->registerItem(moon_dirt::class, "customies:moon_dirt", "Moon Dirt");
        CustomiesItemFactory::getInstance()->registerItem(moon_rock::class, "customies:moon_rock", "Moon Rock");
    }
}