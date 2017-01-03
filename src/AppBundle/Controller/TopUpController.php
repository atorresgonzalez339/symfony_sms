<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("topup")
 */
class TopUpController extends Controller
{
    /**
     * @Route("/", name="tpopup_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle:TopUp:index.html.twig');
    }
}
