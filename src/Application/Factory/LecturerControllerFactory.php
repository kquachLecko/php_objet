<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\LecturerController;
use Application\Repository\LecturerRepository;
use Psr\Container\ContainerInterface;

final class LecturerControllerFactory
{
    public function __invoke(ContainerInterface $container) : LecturerController
    {
        $lecturerRepository = $container->get(LecturerRepository::class);

        return new LecturerController($lecturerRepository);
    }
}
