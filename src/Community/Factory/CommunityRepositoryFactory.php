<?php

declare(strict_types=1);

namespace Community\Factory;

use Community\Repository\CommunityRepository;
use PDO;
use Psr\Container\ContainerInterface;

/**
 * Class CommunityRepositoryFactory
 * @package Community\Factory
 */
final class CommunityRepositoryFactory
{
    /**
     * @param ContainerInterface $container
     * @return CommunityRepository
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container) : CommunityRepository
    {
        $pdo = $container->get(PDO::class);

        return new CommunityRepository($pdo);
    }
}