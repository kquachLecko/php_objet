<?php

declare(strict_types=1);

namespace Meetup\Entity;

use DateTimeImmutable;

final class Meeting
{
    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTimeImmutable
     */
    private $date_end;

    /**
     * @var \DateTimeImmutable
     */
    private $date_start;

    public function __construct(string $titre, string $description, \DateTimeImmutable $date_end, \DateTimeImmutable $date_start)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->date_end = $date_end;
        $this->date_start = $date_start;
    }

    public function titre() : string
    {
        return $this->titre;
    }

    public function description() : string
    {
        return $this->description;
    }

    public function endDate() : string
    {
        return $this->date_end->format('Y-m-d H:i:s');
    }

    public function startDate() : string
    {
        return $this->date_start->format('Y-m-d H:i:s');;
    }

}
