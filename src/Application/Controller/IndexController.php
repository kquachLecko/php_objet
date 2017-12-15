<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Repository\LecturerRepository;

final class IndexController
{
    /**
     * @var \Application\Repository\LecturerRepository
     */
    private $lecturerRepository;

    public function __construct(LecturerRepository $lecturerRepository)
    {
        $this->lecturerRepository = $lecturerRepository;
    }

    public function indexAction() : string
    {
        $lecturers = $this->lecturerRepository->fetchAll();

        ob_start();
        include __DIR__.'/../../../views/index.phtml';
        return ob_get_clean();
    }
}
