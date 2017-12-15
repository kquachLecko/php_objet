<?php

declare(strict_types=1);

namespace Application\Repository;

use Application\Repository\Lecturer\FindLecturer;
use Application\Repository\Lecturer\FindAll;

interface LecturerRepository extends FindLecturer, FindAll
{
}
