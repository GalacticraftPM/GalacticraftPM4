<?php

namespace GalacticraftPM\DemonicDev\Items\CustomItems\ItemBlocks\moon;

use customiesdevs\customies\item\ItemComponents;
use customiesdevs\customies\item\ItemComponentsTrait;
use customiesdevs\customies\item\CreativeInventoryInfo;
use customiesdevs\customies\item\component\MaxStackSizeComponent;
use pocketmine\item\Item;
use pocketmine\item\ItemIdentifier;
class copper_ore_moon extends Item implements ItemComponents {
    use ItemComponentsTrait;

    public function __construct(ItemIdentifier $identifier, string $name = "Unknown") {
        parent::__construct($identifier, $name);
        $creativeInfo = new CreativeInventoryInfo(CreativeInventoryInfo::CATEGORY_NATURE, CreativeInventoryInfo::NONE);
        $this->initComponent("copper_ore_moon", $creativeInfo);
        $this->addComponent(new MaxStackSizeComponent(64));
    }
}