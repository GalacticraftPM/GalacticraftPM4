<?php

namespace GalacticraftPM\DemonicDev\World\Generators\Moon\biome;


use GalacticraftPM\DemonicDev\World\Generators\Moon\biome\types\MoonSurface;
use pocketmine\block\VanillaBlocks;

class moonBasicBiome extends MoonSurface
{

    public function __construct()
    {
        parent::__construct(2.0, 0.0);


        $this->setElevation(63, 69);
    }

    public function getName(): string
    {
        return "MoonBasicBiome";
    }
}