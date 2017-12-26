<?php

declare(strict_types=1);

namespace User\Factory;

use User\Controller\UserController;
use User\Repository\UserRepository;
use Psr\Container\ContainerInterface;

final class UserControllerFactory
{
    public function __invoke(ContainerInterface $container) : UserController
    {
        $userRepository = $container->get(UserRepository::class);
        return new UserController($userRepository);
    }
}
