<?php

declare(strict_types=1);

namespace Yasumi;

// TODO: For now keep the 'interface' suffix. Will be removed in the future.
interface HolidayInterface
{
    public function getKey(): string;

    public function isWorkingDay(): bool;
}
