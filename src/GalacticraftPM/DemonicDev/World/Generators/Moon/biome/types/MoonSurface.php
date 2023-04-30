<?php

namespace GalacticraftPM\DemonicDev\World\Generators\Moon\biome\types;
use customiesdevs\customies\block\CustomiesBlockFactory;
abstract class MoonSurface extends Biome {

    public function __construct(float $temperature, float $rainfall) {
        $this->setGroundCover([
            CustomiesBlockFactory::getInstance()->get("customies:moon_turf"),
            CustomiesBlockFactory::getInstance()->get("customies:moon_dirt"),
            CustomiesBlockFactory::getInstance()->get("customies:moon_dirt")

        ]);

        parent::__construct($temperature, $rainfall);
    }
}