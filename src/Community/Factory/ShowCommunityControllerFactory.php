<?php

declare(strict_types=1);

namespace Community\Factory;

use Community\Controller\ShowCommunityController;
use Community\Repository\CommunityRepository;
use Psr\Container\ContainerInterface;

/**
 * Class ShowCommunityControllerFactory
 * @package Community\Factory
 */
final class ShowCommunityControllerFactory
{
    /**
     * @param ContainerInterface $container
     * @return ShowCommunityController
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container) : ShowCommunityController
    {
        $communityRepository = $container->get(CommunityRepository::class);

        return new ShowCommunityController($communityRepository);
    }
}
