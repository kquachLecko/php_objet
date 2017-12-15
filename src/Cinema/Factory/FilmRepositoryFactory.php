<?php

declare(strict_types=1);

namespace Cinema\Factory;

use Cinema\Repository\FilmRepository;
use PDO;
use Psr\Container\ContainerInterface;

final class FilmRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : FilmRepository
    {
        $pdo = $container->get(PDO::class);

        return new FilmRepository($pdo);
    }
}
