<?php

declare(strict_types=1);

namespace Community\Factory;

use Community\Controller\CommunityController;
use Community\Repository\CommunityRepository;
use Psr\Container\ContainerInterface;

/**
 * Class CommunityControllerFactory
 * @package Community\Factory
 */
final class CommunityControllerFactory
{
    /**
     * @param ContainerInterface $container
     * @return CommunityController
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container) : CommunityController
    {
        $communityRepository = $container->get(CommunityRepository::class);
        return new CommunityController($communityRepository);
    }
}
