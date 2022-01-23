<?php

declare(strict_types=1);

namespace Yasumi\Provider\Netherlands;

use Yasumi\HolidayNew;

class Kingsday extends HolidayNew
{
    /**
     * @var int
     */
    private $year;

    public function __construct(int $year)
    {
        $this->year = $year;

        //if ($this->year >= 2014) {
        parent::__construct();
        // }
    }

    public function getKey(): string
    {
        return 'kingsDayNew';
    }

    public function getType(): string
    {
        return 'official';
    }

    public function isWorkingDay(): bool
    {
        return false;
    }
}
