<?php

declare(strict_types=1);

namespace Yasumi;

abstract class BaseHoliday extends \DateTimeImmutable implements HolidayInterface
{
    public function __construct($time = 'now', $timezone = null)
    {
        parent::__construct($time, $timezone);
    }
}
