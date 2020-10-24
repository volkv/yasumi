<?php

declare(strict_types=1);

namespace spec\Yasumi\Provider\Netherlands;

use PhpSpec\ObjectBehavior;
use Yasumi\HolidayInterface;
use Yasumi\Provider\Netherlands\Kingsday;

/**
 * Kings Day.
 *
 * King's Day is celebrated from 2014 onwards on April 27th. If this happens to be on a Sunday, it will be
 * celebrated the day before instead.
 */
class KingsdaySpec extends ObjectBehavior
{
    private const TIMEZONE = 'Europe/Amsterdam';

    public function let(): void
    {
        $this->beConstructedWith(2020, self::TIMEZONE);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(Kingsday::class);
        $this->shouldImplement(HolidayInterface::class);
    }

    public function it_should_return_holiday_key(): void
    {
        $this->getKey()->shouldBe('kingsDayNew');
    }

    public function it_should_not_be_a_working_day(): void
    {
        $this->isWorkingDay()->shouldBe(false);
    }

    public function it_should_return_correct_holiday_date(): void
    {
        $this->format('Y-m-d')->shouldBe('2020-04-27');
    }

    public function it_should_be_celebrated_one_day_earlier_when_it_is_on_a_sunday(): void
    {
        $this->beConstructedWith(2025, self::TIMEZONE);
        $this->format('Y-m-d')->shouldBe('2025-04-26');
    }
}
