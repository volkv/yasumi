<?php declare(strict_types=1);

namespace spec\Yasumi;

use PhpSpec\ObjectBehavior;
use Yasumi\Holiday;

class HolidaySpec extends ObjectBehavior
{
    public function let(): void
    {
        $this->beConstructedWith(
            'my_holiday',
            ['en_US' => 'My Holiday'],
            new \DateTimeImmutable('2020-08-21')
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(Holiday::class);
    }

    public function it_implements_json_serializable_interface(): void
    {
        $this->shouldImplement(\JsonSerializable::class);
    }

    public function it_extends_datetime(): void
    {
        $this->shouldBeAnInstanceOf(\DateTime::class);
    }

    public function it_should_be_an_official_type(): void
    {
        $this->getType()->shouldBe(Holiday::TYPE_OFFICIAL);
    }

    public function it_should_return_the_key_name(): void
    {
        $this->getKey()->shouldBe('my_holiday');
    }

    public function it_should_return_date_string_when_called_as_string(): void
    {
        $this->__toString()->shouldBe('2020-08-21');
    }
}
