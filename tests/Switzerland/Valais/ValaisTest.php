<?php

declare(strict_types=1);
/*
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2022 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me at sachatelgenhof dot com>
 */

namespace Yasumi\tests\Switzerland\Valais;

use ReflectionException;
use Yasumi\Holiday;
use Yasumi\tests\ProviderTestCase;

/**
 * Class for testing holidays in Valais (Switzerland).
 */
class ValaisTest extends ValaisBaseTestCase implements ProviderTestCase
{
    /**
     * @var int year random year number used for all tests in this Test Case
     */
    protected $year;

    /**
     * Initial setup of this Test Case.
     */
    protected function setUp(): void
    {
        $this->year = $this->generateRandomYear(1945);
    }

    /**
     * Tests if all official holidays in Valais (Switzerland) are defined by the provider class.
     *
     * @throws ReflectionException
     */
    public function testOfficialHolidays(): void
    {
        $officialHolidays = [];
        if ($this->year >= 1994) {
            $officialHolidays[] = 'swissNationalDay';
        }
        $this->assertDefinedHolidays($officialHolidays, self::REGION, $this->year, Holiday::TYPE_OFFICIAL);
    }

    /**
     * Tests if all regional holidays in Valais (Switzerland) are defined by the provider class.
     *
     * @throws ReflectionException
     */
    public function testRegionalHolidays(): void
    {
        $this->assertDefinedHolidays([
            'ascensionDay',
            'newYearsDay',
            'christmasDay',
            'corpusChristi',
            'assumptionOfMary',
            'allSaintsDay',
            'immaculateConception',
            'stJosephsDay',
        ], self::REGION, $this->year, Holiday::TYPE_OTHER);
    }

    /**
     * Tests if all observed holidays in Valais (Switzerland) are defined by the provider class.
     *
     * @throws ReflectionException
     */
    public function testObservedHolidays(): void
    {
        $observedHolidays = [];
        if (($this->year >= 1899 && $this->year < 1994) || 1891 === $this->year) {
            $observedHolidays[] = 'swissNationalDay';
        }

        $this->assertDefinedHolidays($observedHolidays, self::REGION, $this->year, Holiday::TYPE_OBSERVANCE);
    }

    /**
     * Tests if all seasonal holidays in Valais (Switzerland) are defined by the provider class.
     *
     * @throws ReflectionException
     */
    public function testSeasonalHolidays(): void
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_SEASON);
    }

    /**
     * Tests if all bank holidays in Valais (Switzerland) are defined by the provider class.
     *
     * @throws ReflectionException
     */
    public function testBankHolidays(): void
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_BANK);
    }

    /**
     * Tests if all other holidays in Valais (Switzerland) are defined by the provider class.
     *
     * @throws ReflectionException
     */
    public function testOtherHolidays(): void
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_OTHER);
    }

    /**
     * @throws ReflectionException
     */
    public function testSources(): void
    {
        $this->assertSources(self::REGION, 3);
    }
}
