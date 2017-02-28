<?php
/**
 * Created by PhpStorm.
 * User: fabien
 * Date: 27/02/2017
 * Time: 22:20
 */

namespace AppBundle\Provider;


class DateProvider implements DateProviderInterface
{
    /**
     * @return \DateTime
     */
    public function getDateTime(): \DateTime
    {
        return new \DateTime();
    }
}