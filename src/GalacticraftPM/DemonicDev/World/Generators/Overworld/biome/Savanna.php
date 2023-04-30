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
use GalacticraftPM\DemonicDev\World\Generators\Overworld\populator\impl\LakePopulator;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\populator\impl\plant\Plant;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\populator\impl\PlantPopulator;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\populator\impl\TallGrassPopulator;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\populator\impl\TreePopulator;
use pocketmine\block\utils\TreeType;
use pocketmine\block\VanillaBlocks;

class Savanna extends GrassyBiome {

	public function __construct() {
		parent::__construct(1.2, 0);

		$flowers = new PlantPopulator(6, 7, 80);
		$flowers->addPlant(new Plant(VanillaBlocks::DANDELION()));
		$flowers->addPlant(new Plant(VanillaBlocks::POPPY()));

		$acacia = new TreePopulator(1, 1, 100, TreeType::ACACIA());
		$tallGrass = new TallGrassPopulator(56, 12);

		$this->addPopulators([new LakePopulator(), $flowers, $acacia, $tallGrass]);

		$this->setElevation(67, 70);
	}

	public function getName(): string {
		return "Savanna";
	}
}