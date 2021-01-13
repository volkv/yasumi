<?php

declare(strict_types=1);

namespace Yasumi;

abstract class BaseHoliday extends \DateTimeImmutable implements HolidayInterface, \JsonSerializable
{
    protected const DATE_FORMAT = 'Y-m-d';

    public function __construct($time = 'now', $timezone = null)
    {
        parent::__construct($time, $timezone);
    }

    /**
     * Format the instance as a string using the set format.
     *
     * @return string this instance as a string using the set format
     */
    public function __toString(): string
    {
        return $this->format(self::DATE_FORMAT);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     *
     * @return $this
     */
    public function jsonSerialize(): self
    {
        return $this;
    }
}
