<?php declare(strict_types=1);


namespace Yasumi;

interface HolidayInterface
{
    public function getKey(): string;

    public function isWorkingDay(): bool;
}
