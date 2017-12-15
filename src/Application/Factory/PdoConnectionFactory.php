<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Provider\DbConfigProvider;
use PDO;
use Psr\Container\ContainerInterface;

final class PdoConnectionFactory
{
    public function __invoke(ContainerInterface $container) : PDO
    {
        /** @var DbConfigProvider $configProvider */
        $configProvider = $container->get(DbConfigProvider::class);
        $dbConn = new PDO(
            "mysql:host={$configProvider->host()};dbname={$configProvider->name()}",
            $configProvider->user(),
            $configProvider->pass()
        );
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $dbConn;
    }
}
