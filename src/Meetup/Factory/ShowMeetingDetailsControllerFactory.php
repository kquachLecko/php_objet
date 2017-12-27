<?php

declare(strict_types=1);

namespace Meetup\Factory;

use Meetup\Controller\ShowMeetingDetailsController;
use Meetup\Repository\MeetingRepository;
use User\Repository\UserRepository;
use Psr\Container\ContainerInterface;

final class ShowMeetingDetailsControllerFactory
{
    public function __invoke(ContainerInterface $container) : ShowMeetingDetailsController
    {
        $meetingRepository = $container->get(MeetingRepository::class);
        $userRepository = $container->get(UserRepository::class);

        return new ShowMeetingDetailsController($userRepository, $meetingRepository);
    }
}
