<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Repository\PdoLecturerRepository;
use PDO;
use Psr\Container\ContainerInterface;

final class LecturerRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : PdoLecturerRepository
    {
        $databaseConnection = $container->get(PDO::class);

        return new PdoLecturerRepository($databaseConnection);
    }
}
