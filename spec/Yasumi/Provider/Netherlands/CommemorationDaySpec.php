<?php

declare(strict_types=1);

namespace spec\Yasumi\Provider\Netherlands;

use PhpSpec\ObjectBehavior;
use Yasumi\HolidayInterface;
use Yasumi\Provider\Netherlands\CommemorationDay;

/**
 * Commemoration Day.
 *
 * Liberation Day was instituted after WWII in 1947.
 */
class CommemorationDaySpec extends ObjectBehavior
{
    private const TIMEZONE = 'Europe/Amsterdam';

    public function let(): void
    {
        $this->beConstructedWith(2020, self::TIMEZONE);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(CommemorationDay::class);
        $this->shouldImplement(HolidayInterface::class);
    }

    public function it_should_return_holiday_key(): void
    {
        $this->getKey()->shouldBe('commemorationDay');
    }

    public function it_should_be_a_working_day(): void
    {
        $this->isWorkingDay()->shouldBe(true);
    }

    public function it_should_return_correct_holiday_date(): void
    {
        $this->format('Y-m-d')->shouldBe('2020-05-04');
    }
}
