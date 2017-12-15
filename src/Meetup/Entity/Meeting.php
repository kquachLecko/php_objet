<?php

declare(strict_types=1);

namespace Meetup\Entity;

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
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var \DateTime
     */
    private $startDate;

    public function __construct(string $titre, string $description, \DateTime $endDate, \DateTime $startDate)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->endDate = $endDate;
        $this->startDate = $startDate;
    }

    public function titre() : string
    {
        return $this->titre;
    }

    public function description() : string
    {
        return $this->description;
    }

    public function endDate() : \DateTime
    {
        return $this->endDate;
    }

    public function startDate() : \DateTime
    {
        return $this->startDate;
    }
}
