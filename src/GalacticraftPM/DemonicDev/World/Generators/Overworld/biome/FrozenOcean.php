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

use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\types\Biome;
use pocketmine\block\VanillaBlocks;

class FrozenOcean extends Biome {

	public function __construct() {
		parent::__construct(0, 0.5);

		$this->setGroundCover([
			VanillaBlocks::GRAVEL(),
			VanillaBlocks::GRAVEL()
		]);

		$this->setElevation(55, 57);
	}

	public function isFrozen(): bool {
		return true;
	}

	public function getName(): string {
		return "Frozen Ocean";
	}
}