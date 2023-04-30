<?php

namespace GalacticraftPM\DemonicDev\Entities\Rockets;

use pocketmine\entity\Entity;

class Tier1 extends Entity
{
    public static function getNetworkTypeId(): string {
        return "customies:rocket_tier1";
    }
}