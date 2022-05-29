<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Entity\Credit;
use App\Entity\User;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/client", name="api_client_")
 */
class ClientController extends MainController
{
    /**
     * @Route("/comptes", name="list_comptes",methods={"GET"})
     */
    public function ListComptes(Request $request)
    {
        $user = $this->em->getRepository(User::class)->findOneBy(['email' => $this->getUser()->getUserIdentifier()]);
        try {
            $compte = $this->em->getRepository(Compte::class)->findOneBy(['client' => $user->getId()]);

            return $this->successResponse($compte, Response::HTTP_OK);

        } catch (\Exception $e) {
            return $this->successResponse(["msg" => $e->getMessage()], Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * @Route("/comptes", name="add_comptes",methods={"POST"})
     */
    public function comptes(Request $request)
    {
        try {

            $data = $request->getContent();
            $object = $this->deserializeRequest(Compte::class, $data);
            $user = $this->em->getRepository(User::class)->findOneBy(['email' => $this->getUser()->getUserIdentifier()]);

            $object->setClient($user);
            $object->setStatut("desactivated");
            $this->em->persist($object);
            $this->em->flush();
            return $this->successResponse($object, Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->successResponse(["msg" => $e->getMessage()], Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * @Route("/credit", name="add_credit",methods={"POST"})
     */
    public function credit(Request $request, FileUploader $fileUploader)
    {
        try {

            $montant = $request->get("montant");
            $nbMois = $request->get("nbMois");
            $data = $request->files->get("file");
            $credit = new Credit();
            $user = $this->em->getRepository(User::class)->findOneBy(['email' => $this->getUser()->getUserIdentifier()]);
            if ($data) {
                $brochureFileName = $fileUploader->upload($data);
                $credit->setMontant($montant);
                $credit->setFicheDep($brochureFileName);
                $credit->setNbMois($nbMois);
                $credit->setClient($user);
                $credit->setStatut("pending");
                $credit->setClient($user);
                $this->em->persist($credit);
                $this->em->flush();
            }
            return $this->successResponse($credit, Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->successResponse(["msg" => $e->getMessage()], Response::HTTP_UNAUTHORIZED);
        }
    }

}