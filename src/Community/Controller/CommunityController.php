<?php

declare(strict_types=1);

namespace Community\Controller;

use Community\Repository\CommunityRepository;

/**
 * Class CommunityController
 * @package Community\Controller
 */
final class CommunityController
{
    /**
     * @var CommunityRepository
     */
    private $communityRepository;

    /**
     * CommunityController constructor.
     * @param CommunityRepository $communityRepository
     */
    public function __construct(CommunityRepository $communityRepository)
    {
        $this->communityRepository = $communityRepository;
    }

    /**
     * @return string
     */
    public function indexAction() : string
    {
        $communities = $this->communityRepository->fetchAll();
        ob_start();
        include __DIR__.'/../../../views/communities.phtml';
        return ob_get_clean();
    }
}

