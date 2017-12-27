<?php

declare(strict_types=1);

namespace Meetup\Controller;

use Application\Controller\ErrorController;
use Meetup\Repository\MeetingRepository;
use User\Repository\UserRepository;
use User\Exception\UserNotFoundException;

/**
 * Class ShowUserController
 * @package User\Controller
 */
final class ShowMeetingDetailsController
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var MeetingRepository
     */
    private $meetingRepository;
    /**
     * ShowUserController constructor.
     * @param UserRepository $userRepository
     * @param MeetingRepository $meetingRepository
     */
    public function __construct(UserRepository $userRepository, MeetingRepository $meetingRepository)
    {
        $this->userRepository = $userRepository;
        $this->meetingRepository = $meetingRepository;
    }

    /**
     * Les utilisateurs et les meetups qu'ils organisent
     * @return string
     */
    public function indexAction() : string
    {
        try {
            $meeting = $this->meetingRepository->getById($_GET['meetingId'] ?? '');
            $users = $this->userRepository->getAttendeesByMeeting($_GET['meetingId'] ?? '');
            ob_start();
            include __DIR__ . '/../../../views/meeting-details.phtml';
            return ob_get_clean();
        } catch (UserNotFoundException $exception) {
            return (new ErrorController($exception))->error404Action();
        }
    }
}
