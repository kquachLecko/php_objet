<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Provider\DbConfigProvider;
use Application\Provider\EnvDbConfigProvider;

final class DbConfigProviderFactory
{
    public function __invoke() : DbConfigProvider
    {
        return new EnvDbConfigProvider();
    }
}
