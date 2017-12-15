<?php

declare(strict_types=1);

namespace Meetup\Controller;

use Meetup\Repository\MeetingRepository;

final class MeetingController
{
    /**
     * @var MeetingRepository
     */
    private $meetingRepository;

    public function __construct(MeetingRepository $meetingRepository)
    {
        $this->meetingRepository = $meetingRepository;
    }

    public function indexAction() : string
    {

        $meetings = $this->meetingRepository->fetchAll();
        ob_start();
        include __DIR__.'/../../../views/meeting.phtml';
        return ob_get_clean();
    }
}
