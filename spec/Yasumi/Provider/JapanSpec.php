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
use Yasumi\Provider\AbstractProvider;
use Yasumi\tests\YasumiBase;
use Yasumi\Yasumi;

class JapanSpec extends ObjectBehavior
{
    public function let(): void
    {
        $this->beConstructedWith(2021);
    }

    public function it_extends_abstract_provider(): void
    {
        $this->shouldBeAnInstanceOf(AbstractProvider::class);
    }

    public function it_should_have_national_foundation_day(): void
    {
        $this->isHoliday(new \DateTimeImmutable('2021-02-11'))->shouldBe(true);
    }

    /**
     * @throws \Exception
     */
    public function it_should_not_have_national_foundation_day_before_establishment(): void
    {
        $this->beConstructedWith(YasumiBase::numberBetween(Yasumi::YEAR_LOWER_BOUND, 1966));

        $this->getHoliday('nationalFoundationDay')->shouldBeNull();
    }
}
