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

namespace GalacticraftPM\DemonicDev\World\Generators\Overworld;

use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\Badlands;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\BadlandsPlateau;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\Beach;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\BirchForest;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\DeepOcean;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\Desert;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\DesertHills;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\ExtremeHills;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\ExtremeHillsEdge;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\ExtremeHillsMutated;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\Forest;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\ForestHills;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\FrozenOcean;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\FrozenRiver;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\IceMountains;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\IcePlains;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\Jungle;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\MushroomIsland;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\MushroomIslandShore;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\Ocean;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\Plains;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\River;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\RoffedForestHills;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\RoofedForest;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\Savanna;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\SavannaPlateau;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\SunflowerPlains;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\Swampland;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\Taiga;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\TaigaHills;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\TallBirchForest;
use GalacticraftPM\DemonicDev\World\Generators\Overworld\biome\types\Biome;
use GalacticraftPM\DemonicDev\data\BiomeIds;
use InvalidArgumentException;
use pocketmine\utils\SingletonTrait;
use function array_key_exists;

class BiomeFactory implements BiomeIds {
	use SingletonTrait;

	/** @var Biome[] */
	private array $biomes = [];

	final protected function __construct() {
		$this->registerBiome(BiomeIds::OCEAN, new Ocean());
		$this->registerBiome(BiomeIds::PLAINS, new Plains());
		$this->registerBiome(BiomeIds::DESERT, new Desert());
		$this->registerBiome(BiomeIds::EXTREME_HILLS, new ExtremeHills());
		$this->registerBiome(BiomeIds::FOREST, new Forest());
		$this->registerBiome(BiomeIds::TAIGA, new Taiga());
		$this->registerBiome(BiomeIds::SWAMP, new Swampland());
		$this->registerBiome(BiomeIds::RIVER, new River());
		$this->registerBiome(BiomeIds::FROZEN_OCEAN, new FrozenOcean());
		$this->registerBiome(BiomeIds::FROZEN_RIVER, new FrozenRiver());
		$this->registerBiome(BiomeIds::ICE_PLAINS, new IcePlains());
		$this->registerBiome(BiomeIds::ICE_MOUNTAINS, new IceMountains());
		$this->registerBiome(BiomeIds::MUSHROOM_ISLAND, new MushroomIsland());
		$this->registerBiome(BiomeIds::MUSHROOM_ISLAND_SHORE, new MushroomIslandShore());
		$this->registerBiome(BiomeIds::BEACH, new Beach());
		$this->registerBiome(BiomeIds::DESERT_HILLS, new DesertHills());
		$this->registerBiome(BiomeIds::FOREST_HILLS, new ForestHills());
		$this->registerBiome(BiomeIds::TAIGA_HILLS, new TaigaHills());
		$this->registerBiome(BiomeIds::EXTREME_HILLS_EDGE, new ExtremeHillsEdge());
		$this->registerBiome(BiomeIds::JUNGLE, new Jungle());
		// TODO: Ids 21 - 23
		$this->registerBiome(BiomeIds::DEEP_OCEAN, new DeepOcean());
		// TODO: Ids 25 - 26
		$this->registerBiome(BiomeIds::BIRCH_FOREST, new BirchForest());
		// TODO: Id 28
		$this->registerBiome(BiomeIds::ROOFED_FOREST, new RoofedForest());
		// TODO Ids 30 - 34
		$this->registerBiome(BiomeIds::SAVANNA, new Savanna());
		$this->registerBiome(BiomeIds::SAVANNA_PLATEAU, new SavannaPlateau());
		$this->registerBiome(BiomeIds::BADLANDS, new Badlands());
		$this->registerBiome(BiomeIds::BADLANDS_PLATEAU, new BadlandsPlateau());
		// TODO Ids 39 - 128
		$this->registerBiome(BiomeIds::SUNFLOWER_PLAINS, new SunflowerPlains());
		// TODO Id 130
		$this->registerBiome(BiomeIds::EXTREME_HILLS_MUTATED, new ExtremeHillsMutated());
		// TODO Ids 132 - 154
		$this->registerBiome(BiomeIds::TALL_BIRCH_FOREST, new TallBirchForest());
		// TODO Id 156
		$this->registerBiome(BiomeIds::ROOFED_FOREST_HILLS, new RoffedForestHills());
	}

	public function registerBiome(int $id, Biome $biome): void {
		$biome->setId($id);

		$this->biomes[$id] = $biome;
	}

	public function getBiome(int $id): Biome {
		if(!array_key_exists($id, $this->biomes)) {
			throw new InvalidArgumentException("Biome with id $id is not registered.");
		}

		return $this->biomes[$id];
	}
}