<?php

declare(strict_types=1);

namespace Cinema\Controller;

use Cinema\Repository\FilmRepository;

final class FilmController
{
    /**
     * @var FilmRepository
     */
    private $filmRepository;

    public function __construct(FilmRepository $filmRepository)
    {
        $this->filmRepository = $filmRepository;
    }

    public function indexAction() : string
    {
        $films = $this->filmRepository->fetchAll();

        ob_start();
        include __DIR__.'/../../../views/film.phtml';
        return ob_get_clean();
    }
}
