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
class AdminController extends MainController
{

    /**
     * @Route("/deleteuser/{id}", name="delete_user",methods={"DELETE"})
     */
    public function deleteUser(Request $request, int $id)
    {
        $user = $this->em->getRepository(User::class)->findOneBy(['id' => $id]);
        if ($user) {
            $this->em->remove($user);
            $this->em->flush();
            return $this->successResponse(["msg" => "utilisateur supprimer avec succée"], RESPONSE::HTTP_OK);
        }
        return $this->successResponse(["msg" => "jjj"], Response::HTTP_UNAUTHORIZED);
    }
    /**
     * @Route("/agents", name="getAgents",methods={"GET"})
     */
    public function agents(Request $request)
    {
        $user = $this->em->getRepository(User::class)->findByRole("ROLE_AGENT");
        if ($user) {
            return $this->successResponse($user, RESPONSE::HTTP_OK);
        }
        return $this->successResponse(["msg" => "jjj"], Response::HTTP_UNAUTHORIZED);
    }
}