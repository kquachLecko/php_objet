<?php

declare(strict_types=1);

namespace Application\Collection;

use Application\Entity\Lecturer;

final class LecturerCollection
{
    private $lecturers;

    public function __construct(Lecturer ...$lecturers)
    {
        $this->lecturers = $lecturers;
    }

    public function getLecturers(): array
    {
        return $this->lecturers;
    }
}
