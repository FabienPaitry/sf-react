<?php
/**
 * Created by PhpStorm.
 * User: fabien
 * Date: 28/02/2017
 * Time: 07:50
 */

namespace AppBundle\Provider;


interface DateProviderInterface
{
    /**
     * @return \DateTime
     */
    public function getDateTime(): \DateTime;

}