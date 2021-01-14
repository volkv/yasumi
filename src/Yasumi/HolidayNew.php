<?php

declare(strict_types=1);

namespace Yasumi;

abstract class HolidayNew extends \DateTimeImmutable implements HolidayInterface, \JsonSerializable
{
    /**
     * @var array list of translations of this holiday
     */
    public $translations;

    public function __construct(\DateTimeInterface $date)
    {
        parent::__construct($date->format('Y-m-d'), $date->getTimezone());
    }

    /**
     * Format the instance as a string using the set format.
     */
    public function __toString(): string
    {
        return $this->format('Y-m-d');
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     */
    public function jsonSerialize(): self
    {
        return $this;
    }
}
