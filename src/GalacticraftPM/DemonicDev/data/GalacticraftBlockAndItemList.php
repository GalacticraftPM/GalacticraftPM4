<?php

namespace GalacticraftPM\DemonicDev\data;
use customiesdevs\customies\item\CustomiesItemFactory;
use customiesdevs\customies\block\CustomiesBlockFactory;
class GalacticraftBlockAndItemList
{
    public function isGalacticraftBlock($Block){
        $isBlock = $this->BlockList($Block->getId());
        return $isBlock;
    }
    public function isGalacticraftBlockId($BlockId){
        $isBlock = $this->BlockList($BlockId);
        return $isBlock;
    }
    public function isGalacticraftItem($Item){
        $isItem = $this->ItemList($Item->getId());
        return $isItem;
    }
    public function isGalacticraftItemId($ItemId){
        $isItem = $this->ItemList($ItemId);
        return $isItem;
    }

    public function isGalacticraftItemBlock($Item){
        $isItem = $this->ItemList($Item->getId());
        return $isItem;
    }
    public function isGalacticraftItemBlockId($ItemId){
        $isItem = $this->ItemBlockList($ItemId);
        return $isItem;
    }

    public function BlockList($id){
        switch($id){
            default:
                return false;
            case CustomiesItemFactory::getInstance()->get("customies:moon_turf")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:moon_dirt")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:moon_rock")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:moon_cheese_ore")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:moon_sapphire_ore")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:copper_ore_moon")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:tin_ore_moon")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:tin_ore")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:copper_ore")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:silicon_ore")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:aluminium_ore")->getId():
                return true;
        }
    }
    public function ItemList($id){
        switch($id){
            default:
                return false;
            case CustomiesItemFactory::getInstance()->get("customies:moon_turf")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:moon_dirt")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:moon_rock")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:moon_cheese_ore")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:moon_sapphire_ore")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:copper_ore_moon")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:tin_ore_moon")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:tin_ore")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:copper_ore")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:silicon_ore")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:aluminium_ore")->getId():
                return true;
        }
    }
    /** list of Items which have a block form */
    public function ItemBlockList($id){
        switch($id){
            default:
                return false;
            case CustomiesItemFactory::getInstance()->get("customies:moon_turf")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:moon_dirt")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:moon_rock")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:moon_cheese_ore")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:moon_sapphire_ore")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:copper_ore_moon")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:tin_ore_moon")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:tin_ore")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:copper_ore")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:silicon_ore")->getId():
                return true;
            case CustomiesItemFactory::getInstance()->get("customies:aluminium_ore")->getId():
                return true;
        }
    }
}