<?php

declare(strict_types=1);

/**
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2020 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me@sachatelgenhof.com>
 */

namespace spec\Yasumi\Provider;

use PhpSpec\ObjectBehavior;
use Yasumi\Provider\AbstractProvider;
use Yasumi\Provider\Netherlands;

class NetherlandsSpec extends ObjectBehavior
{
    public function let(): void
    {
        $this->beConstructedWith(2020);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(Netherlands::class);
    }

    public function it_extends_abstract_provider(): void
    {
        $this->shouldBeAnInstanceOf(AbstractProvider::class);
    }

    public function it_should_have_new_years_day(): void
    {
        $this->isHoliday(new \DateTimeImmutable('2020-01-01'))->shouldBe(true);
    }

    public function it_should_have_international_workers_day(): void
    {
        $this->isHoliday(new \DateTimeImmutable('2020-05-01'))->shouldBe(true);
    }

    public function it_should_have_valentines_day(): void
    {
        $this->isHoliday(new \DateTimeImmutable('2020-02-14'))->shouldBe(true);
    }

    public function it_should_have_world_animal_day(): void
    {
        $this->isHoliday(new \DateTimeImmutable('2020-10-04'))->shouldBe(true);
    }

    public function it_should_not_have_world_animal_day_on_or_before_1931(): void
    {
        $this->isHoliday(new \DateTimeImmutable('1931-10-04'))->shouldBe(false);
        $this->isHoliday(new \DateTimeImmutable('1911-10-04'))->shouldBe(false);
    }
}
