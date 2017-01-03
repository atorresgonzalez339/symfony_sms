<?php

namespace AppBundle\Controller;

use Guzzle\Http\Message\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FrontController extends Controller
{

    /**
     * @Route("/", name="send")
     */
    public function indexAction(Request $request)
    {
        $client = $this->get('guzzle.client.api_sms');
        $response = $client->get('/v1/users/' . 'u-iaac6dq3b56jijntljhotni' . '/messages');

        $result = json_decode($response->getBody()->getContents(), true);

        foreach ($result as $row){
            echo 'From: ' . $row['from'] . '<br />';
            echo 'To: ' . $row['to'] . '<br />';
            echo 'Direction: ' . $row['direction'] . '<br />';
            echo 'Text: ' . $row['text'] . '<br />';
            echo 'CallbackUrl: ' . (isset($row['callbackUrl']) ? $row['callbackUrl'] : '')  . '<br />';
            echo '..................................' . '<br />';
        }

        die();
    }

    /**
     * @Route("/send", name="index")
     */
    public function sendAction(Request $request)
    {
        $client = $this->get('guzzle.client.api_sms');

        $callback_url = $this->generateUrl(
            'callback',
            array(),
            true // This guy right here
        );

        $response = $client->post('/v1/users/' . 'u-iaac6dq3b56jijntljhotni' . '/messages', array(
            'json' => [
                array(
                    'from' => '+19782680667',
                    'to' => '+17864245428',
                    'text' => 'Solicitando Informacion',
                    'callbackUrl' => $callback_url
                ),
                array(
                    'from' => '+19782680667',
                    'to' => '+19787616073',
                    'text' => 'Solicitando Informacion',
                    'callbackUrl' => $callback_url
                )
            ]
        ));

        die('Message Sent');
    }

    /**
     * @Route("/callback", name="callback")
     */
    public function callbackAction(Request $request)
    {
        $data_post = json_decode(file_get_contents("php://input"), true);
        $logger = $this->get('logger');
        $logger->info(print_r($data_post, true));
        die('Creamos un log con el resultado de la llamada post');
    }
}
