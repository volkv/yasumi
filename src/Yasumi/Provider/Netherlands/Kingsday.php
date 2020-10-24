<?php

declare(strict_types=1);

namespace Yasumi\Provider\Netherlands;

use Yasumi\BaseHoliday;
use Yasumi\Provider\DateTimeZoneFactory;

class Kingsday extends BaseHoliday
{
    public const ESTABLISHMENT_YEAR = 2014;

    public function __construct(int $year, string $timezone)
    {
        $date = new \DateTime("$year-4-27", DateTimeZoneFactory::getDateTimeZone($timezone));

        // Should this not be a SubstituteHoliday instance instead?
        if (0 === (int) $date->format('w')) {
            $date->sub(new \DateInterval('P1D'));
        }

        parent::__construct($date->format('Y-m-d'), $date->getTimezone());
    }

    public function getKey(): string
    {
        return 'kingsDayNew';
    }

    public function isWorkingDay(): bool
    {
        return false;
    }
}
