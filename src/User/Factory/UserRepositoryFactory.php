<?php

declare(strict_types=1);

namespace User\Factory;

use User\Repository\UserRepository;
use PDO;
use Psr\Container\ContainerInterface;

final class UserRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : UserRepository
    {
        $pdo = $container->get(PDO::class);

        return new UserRepository($pdo);
    }
}
