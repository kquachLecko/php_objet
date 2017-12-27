<?php
/**
 * Created by PhpStorm.
 * User: Kevin Quach
 * Date: 26/12/2017
 * Time: 15:43
 */

declare(strict_types=1);

namespace Community\Entity;


class Community
{

    /**
     * @var string
     */
    private $name;

    /**
     * Community constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }



}