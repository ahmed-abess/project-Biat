<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api", name="api_")
 */
class UserController extends MainController
{


    /**
     * @Route("/registration", name="registration",methods={"POST"})
     */
    public function register(Request $request,UserPasswordHasherInterface $passwordEncoder)
    {

            $data = $request->getContent();
            $object = $this->deserializeRequest( User::class,$data);
            if ($object) {
                // Encode the new users password
                $object->setPassword($passwordEncoder->hashPassword($object, $object->getPassword()));
                $this->em->persist($object);
                $this->em->flush();
                return $this->successResponse($object, Response::HTTP_OK);
            }

            return $this->successResponse(["msg"=>"erreur"],Response::HTTP_UNAUTHORIZED);

    }

}