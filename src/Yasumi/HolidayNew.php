<?php

declare(strict_types=1);

namespace Yasumi;

abstract class HolidayNew extends \DateTime implements HolidayInterface
{
    public function __construct($time = 'now', $timezone = null)
    {
        parent::__construct($time, $timezone);
    }

    public function __toString()
    {
        return 'dsfs';
    }
}
