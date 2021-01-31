<?php

declare(strict_types=1);

/**
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2020 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me@sachatelgenhof.com>
 */

namespace spec\Yasumi\Provider;

use PhpSpec\ObjectBehavior;
use Yasumi\Provider\AbstractProvider;
use Yasumi\Provider\Japan;

class JapanSpec extends ObjectBehavior
{
    public function let(): void
    {
        $this->beConstructedWith(2020);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(Japan::class);
    }

    public function it_extends_abstract_provider(): void
    {
        $this->shouldBeAnInstanceOf(AbstractProvider::class);
    }
}
