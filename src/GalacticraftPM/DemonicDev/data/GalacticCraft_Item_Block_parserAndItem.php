<?php

namespace GalacticraftPM\DemonicDev\data;

use customiesdevs\customies\item\CustomiesItemFactory;
use customiesdevs\customies\block\CustomiesBlockFactory;

use http\Exception\RuntimeException;
use pocketmine\block\Block;
use pocketmine\item\Item;
class GalacticCraft_Item_Block_parserAndItem extends GalacticraftBlockAndItemList
{
    public function Block_to_Item($BlockId){
        if(is_int($BlockId)) {
            $GC_Block = $this->Block_to_ItemTranslator($BlockId);
        }elseif($BlockId instanceof Block){
            $GC_Block = $this->Block_to_ItemTranslator($BlockId->getId());
        }
        else{
            throw new \RuntimeException("[var BlockId] has to be type Int or Pocketmine\block\Block (or CustomiesBlockFactory::getInstance()->get('customies:example_block')");
        }
        return $GC_Block;
    }
    public function Block_to_ItemId($BlockId){
        return $this->Block_to_Item($BlockId)->getId();
    }
    public function Item_to_Block($ItemId){
        if(is_int($ItemId)) {
            $GC_Item = $this->Item_to_BlockTranslator($ItemId);
        }elseif($ItemId instanceof Item){
            $GC_Item  = $this->Item_to_BlockTranslator($ItemId->getId());
        }
        else{
            throw new \RuntimeException("[var ItemId] has to be type Int or Pocketmine\item\Item (or CustomiesItemFactory::getInstance()->get('customies:example_block')");
        }
        return  $GC_Item;
    }
    public function Item_to_BlockId($ItemId){
        return $this->Item_to_Block($ItemId)->getId();
    }

    /** TranslatorList */
    public function Block_to_ItemTranslator($BlockId){
        switch($BlockId){
            default:
                return null;
            case CustomiesBlockFactory::getInstance()->get("customies:moon_dirt")->getId():
                return CustomiesItemFactory::getInstance()->get("customies:moon_dirt");

            #  case CustomiesBlockFactory::getInstance()->get("customies:moon_rock")->getId():
            #     return CustomiesItemFactory::getInstance()->get("customies:moon_rock")->getId();
        }
    }
    public function Item_to_BlockTranslator($ItemId){
        switch($ItemId){
            default:
                return null;
            case CustomiesItemFactory::getInstance()->get("customies:moon_dirt")->getId():
                return CustomiesBlockFactory::getInstance()->get("customies:moon_dirt");

            #  case CustomiesBlockFactory::getInstance()->get("customies:moon_rock")->getId():
            #     return CustomiesItemFactory::getInstance()->get("customies:moon_rock")->getId();
        }
    }
















}