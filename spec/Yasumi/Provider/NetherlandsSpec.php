<?php

declare(strict_types=1);

/**
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2021 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me@sachatelgenhof.com>
 */

namespace spec\Yasumi\Provider;

use PhpSpec\ObjectBehavior;
use Yasumi\Holiday;
use Yasumi\Provider\AbstractProvider;
use Yasumi\tests\YasumiBase;
use Yasumi\Yasumi;

class NetherlandsSpec extends ObjectBehavior
{
    private const KINGS_DAY = 'kingsDay';

    private const QUEENSDAY = 'kingsDay';

    public function let(): void
    {
        $this->beConstructedWith(2021);
    }

    public function it_extends_abstract_provider(): void
    {
        $this->shouldBeAnInstanceOf(AbstractProvider::class);
    }

    public function it_should_have_new_years_day(): void
    {
        $this->isHoliday(new \DateTimeImmutable('2021-01-01'))->shouldBe(true);
    }

    public function it_should_have_international_workers_day(): void
    {
        $this->isHoliday(new \DateTimeImmutable('2021-05-01'))->shouldBe(true);
    }

    public function it_should_have_valentines_day(): void
    {
        $this->isHoliday(new \DateTimeImmutable('2021-02-14'))->shouldBe(true);
    }

    public function it_should_have_world_animal_day(): void
    {
        $this->isHoliday(new \DateTimeImmutable('2021-10-04'))->shouldBe(true);
    }

    public function it_should_not_have_world_animal_day_on_or_before_1931(): void
    {
        $this->isHoliday(new \DateTimeImmutable('1931-10-04'))->shouldBe(false);
        $this->isHoliday(new \DateTimeImmutable('1911-10-04'))->shouldBe(false);
    }

    public function it_should_have_st_martins_day(): void
    {
        $this->isHoliday(new \DateTimeImmutable('2021-11-11'))->shouldBe(true);
    }

    public function it_should_have_fathers_day(): void
    {
        $key = 'fathersDay';

        $this->getHoliday($key)->shouldBeAnInstanceOf(Holiday::class);
        $this->getHoliday($key)->format('Y-m-d')->shouldBe('2021-06-20');
    }

    public function it_should_have_mothers_day(): void
    {
        $key = 'mothersDay';

        $this->getHoliday($key)->shouldBeAnInstanceOf(Holiday::class);
        $this->getHoliday($key)->format('Y-m-d')->shouldBe('2021-05-09');
    }

    public function it_should_have_easter(): void
    {
        $key = 'easter';

        $this->getHoliday($key)->shouldBeAnInstanceOf(Holiday::class);
        $this->getHoliday($key)->format('Y-m-d')->shouldBe('2021-04-04');
    }

    public function it_should_have_easter_monday(): void
    {
        $key = 'easterMonday';

        $this->getHoliday($key)->shouldBeAnInstanceOf(Holiday::class);
        $this->getHoliday($key)->format('Y-m-d')->shouldBe('2021-04-05');
    }

    public function it_should_have_kingsday(): void
    {
        $this->getHoliday(self::KINGS_DAY)->shouldBeAnInstanceOf(Holiday::class);
        $this->getHoliday(self::KINGS_DAY)->format('Y-m-d')->shouldBe('2021-04-27');
    }

    public function it_should_have_kingsday_on_2014(): void
    {
        $this->beConstructedWith(2014);

        $this->getHoliday(self::KINGS_DAY)->shouldBeAnInstanceOf(Holiday::class);
        $this->getHoliday(self::KINGS_DAY)->format('Y-m-d')->shouldBe('2014-04-26');
    }

    public function it_should_not_have_kingsday_before_2014(): void
    {
        $this->beConstructedWith(YasumiBase::numberBetween(Yasumi::YEAR_LOWER_BOUND, 2013));

        $this->getHoliday(self::KINGS_DAY)->shouldBeNull();
    }

    public function it_should_not_have_queensday_before_1891(): void
    {
        $this->beConstructedWith(YasumiBase::numberBetween(Yasumi::YEAR_LOWER_BOUND, 1890));

        $this->getHoliday(self::QUEENSDAY)->shouldBeNull();
    }
}
