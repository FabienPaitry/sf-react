<?php

namespace AppBundle\Controller;

use AppBundle\Service\DateService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        return $this->render(
            'default/index.html.twig',
            [
                'timezone' => $this->getDateService()->getTimeZone(),
                'datetime' => $this->getDateService()->getDateTime('d/m/Y H:i:s'),
            ]
        );
    }

    /**
     * @return DateService
     */
    private function getDateService(): DateService
    {
        return $this->get('app.service.date');
    }


}
