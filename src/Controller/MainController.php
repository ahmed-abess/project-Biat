<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;

class MainController extends AbstractController
{

    public $em;

    public function __construct( EntityManagerInterface $em )
    {
        $this->em = $em;

    }
    /**
     * @param $object
     * @return Response
     */
    public function successResponse($object, $staus = null)
    {

        $data = $this->container->get('serializer')->serialize($object, 'json');
        if ($staus) {
            $response = new Response($data, $staus);
        } else {
            $response = new Response($data);
        }
        $response->headers->set('Content-type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    public function deserializeRequest($entity,$jsonData)
    {
        try {
            $object =$this->container->get('serializer')->deserialize($jsonData, $entity, 'json');
            return $object;
        }catch (\Exception $e){
            return null;
        }
    }
    public function jsonDecode($request)
    {
        return json_decode($request->getContent(), true);
    }
}