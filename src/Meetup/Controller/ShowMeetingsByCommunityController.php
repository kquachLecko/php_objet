<?php

declare(strict_types=1);

namespace Meetup\Controller;

use Application\Controller\ErrorController;
use Meetup\Repository\MeetingRepository;
use Meetup\Exception\MeetingNotFoundException;

final class ShowMeetingsByCommunityController
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
        try {
            $meetings = $this->meetingRepository->get_Meetings_by_Community($_GET['communityId'] ?? '');

            ob_start();
            include __DIR__.'/../../../views/meeting.phtml';
            return ob_get_clean();
        } catch (MeetingNotFoundException $exception) {
            return (new ErrorController($exception))->error404Action();
        }
    }
}
