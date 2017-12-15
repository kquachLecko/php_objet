<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Exception\LecturerNotFoundException;
use Application\Repository\LecturerRepository;

final class LecturerController
{
    /**
     * @var LecturerRepository
     */
    private $lecturerRepository;

    public function __construct(LecturerRepository $lecturerRepository)
    {
        $this->lecturerRepository = $lecturerRepository;
    }

    public function indexAction() : string
    {
        $searchName = $_GET['lecturer'] ?? '';
        $selectedLecturer = $this->lecturerRepository->findByName($searchName);

        if ($selectedLecturer === null) {
            return (new ErrorController(new LecturerNotFoundException($searchName)))->error404Action();
        }

        ob_start();
        include __DIR__.'/../../../views/lecturer.phtml';
        return ob_get_clean();
    }
}
