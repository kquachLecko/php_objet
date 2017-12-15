<?php

declare(strict_types=1);

namespace Application\Factory;

use DateTimeImmutable;

final class DateTimeImmutableFactory
{
    public function __invoke() : DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}
