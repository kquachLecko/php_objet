<?php

declare(strict_types=1);

namespace Meetup\Factory;

use Meetup\Controller\ShowMeetingController;
use Meetup\Repository\MeetingRepository;
use Psr\Container\ContainerInterface;

final class ShowMeetingControllerFactory
{
    public function __invoke(ContainerInterface $container) : ShowMeetingController
    {
        $meetingRepository = $container->get(MeetingRepository::class);

        return new ShowMeetingController($meetingRepository);
    }
}
