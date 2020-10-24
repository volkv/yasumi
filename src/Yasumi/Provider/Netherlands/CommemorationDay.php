<?php

declare(strict_types=1);

namespace Yasumi\Provider\Netherlands;

use Yasumi\BaseHoliday;
use Yasumi\Provider\DateTimeZoneFactory;

class CommemorationDay extends BaseHoliday
{
    public const ESTABLISHMENT_YEAR = 1947;

    public function __construct(int $year, string $timezone)
    {
        $date = new \DateTime("$year-5-4", DateTimeZoneFactory::getDateTimeZone($timezone));

        parent::__construct($date->format(self::DATE_FORMAT), $date->getTimezone());
    }

    public function getKey(): string
    {
        return 'commemorationDay';
    }

    public function isWorkingDay(): bool
    {
        return true;
    }
}
