<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\IndexController;
use Application\Repository\LecturerRepository;
use Psr\Container\ContainerInterface;

final class IndexControllerFactory
{
    public function __invoke(ContainerInterface $container) : IndexController
    {
        $lecturerRepository = $container->get(LecturerRepository::class);

        return new IndexController($lecturerRepository);
    }
}
