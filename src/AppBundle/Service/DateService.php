<?php

/**
 * Created by PhpStorm.
 * User: fabien
 * Date: 27/02/2017
 * Time: 22:35
 */

namespace AppBundle\Service;

use AppBundle\Provider\DateProvider;

class DateService
{
    /** @var DateProvider */
    private $dateProvider;

    /**
     * @return DateProvider
     */
    public function getDateProvider(): DateProvider
    {
        return $this->dateProvider;
    }

    /**
     * @param DateProvider $dateProvider
     */
    public function setDateProvider(DateProvider $dateProvider)
    {
        $this->dateProvider = $dateProvider;
    }

    /**
     * @return \DateTimeZone
     */
    public function getTimeZone(): \DateTimeZone
    {
        return $this->getDateProvider()
            ->getDateTime()
            ->getTimezone();
    }

    /**
     * @return string
     */
    public function getDateTime(): ?string
    {
        return $this->getDateProvider()
            ->getDateTime()
            ->format('d/m/Y H:i:s');
    }

}