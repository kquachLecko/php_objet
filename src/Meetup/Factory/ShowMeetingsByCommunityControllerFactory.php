<?php

declare(strict_types=1);

namespace Meetup\Factory;

use Meetup\Controller\ShowMeetingsByCommunityController;
use Meetup\Repository\MeetingRepository;
use Psr\Container\ContainerInterface;

final class ShowMeetingsByCommunityControllerFactory
{
    public function __invoke(ContainerInterface $container) : ShowMeetingsByCommunityController
    {
        $meetingRepository = $container->get(MeetingRepository::class);

        return new ShowMeetingsByCommunityController($meetingRepository);
    }
}
