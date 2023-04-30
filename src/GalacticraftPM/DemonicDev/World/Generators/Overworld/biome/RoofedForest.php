<?php

/**
 * MultiWorld - PocketMine plugin that manages worlds.
 * Copyright (C) 2018 - 2022  CzechPMDevs
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace GalacticraftPM\DemonicDev\World\Generators\Overworld\biome;

use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\types\GrassyBiome;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\populator\impl\plant\Plant;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\populator\impl\PlantPopulator;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\populator\impl\TallGrassPopulator;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\populator\impl\TreePopulator;
use pocketmine\block\utils\TreeType;
use pocketmine\block\VanillaBlocks;

class RoofedForest extends GrassyBiome {

	public function __construct() {
		parent::__construct(0.7, 0.8);

		$mushrooms = new PlantPopulator(2, 2, 95);
		$mushrooms->addPlant(new Plant(VanillaBlocks::RED_MUSHROOM()));
		$mushrooms->addPlant(new Plant(VanillaBlocks::BROWN_MUSHROOM()));

		$roses = new PlantPopulator(5, 4, 80);
		$roses->addPlant(new Plant(VanillaBlocks::LILAC()));

		$peonys = new PlantPopulator(5, 4, 80);
		$peonys->addPlant(new Plant(VanillaBlocks::PEONY()));

		$tree = new TreePopulator(4, 2, 100, TreeType::DARK_OAK());
//        $mushroom = new TreePopulator(1, 1, 95, Tree::MUSHROOM); // TODO
		$birch = new TreePopulator(1, 2, 100, TreeType::BIRCH());
		$oak = new TreePopulator(1, 2, 100, TreeType::OAK());

		$grass = new TallGrassPopulator(56, 20);

		$this->addPopulators([$tree, $peonys, $roses, $mushrooms, /*$mushroom,*/ $birch, $oak, $grass]);
		$this->setElevation(63, 70);
	}

	public function getName(): string {
		return "Roofed Forest";
	}
}