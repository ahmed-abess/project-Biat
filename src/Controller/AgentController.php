<?php

namespace App\Controller;
use App\Entity\Actualite;
use App\Entity\Compte;
use App\Entity\Credit;
use App\Entity\User;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/agent", name="api_")
 */
class AgentController extends  MainController
{
    /**
     * @Route("/client/{id}", name="delete_client",methods={"DELETE"})
     */
    public function deleteClient(Request $request, int $id)
    {
        $user = $this->em->getRepository(User::class)->findOneBy(['id' => $id]);
        if ($user) {
            // Encode the new users password
            $compte = $this->em->getRepository(Compte::class)->findBy(['client' => $user->getId()]);
            if ($compte) $this->em->remove($compte);
            $this->em->remove($user);
            $this->em->flush();
            return $this->successResponse(["msg" => "client supprimer avec succée"], Response::HTTP_OK);
        }

        return $this->successResponse(["msg" => "erreur"], Response::HTTP_UNAUTHORIZED);

    }

    /**
     * @Route("/clients", name="list_client",methods={"GET"})
     */
    public function listClient(Request $request)
    {
        $user = $this->em->getRepository(User::class)->findByRole("ROLE_USER");
        if ($user) {

            return $this->successResponse($user, Response::HTTP_OK);
        }

        return $this->successResponse(["msg" => "erreur"], Response::HTTP_UNAUTHORIZED);

    }

    /**
     * @Route("/clients", name="add_agent",methods={"POST"})
     */
    public function register(Request $request, UserPasswordHasherInterface $passwordEncoder)
    {
        $data = $request->getContent();
        $object = $this->deserializeRequest(User::class, $data);
        if ($object) {
            // Encode the new users password
            $object->setPassword($passwordEncoder->hashPassword($object, $object->getPassword()));
            $object->setRoles(["ROLE_USER"]);
            $this->em->persist($object);
            $this->em->flush();
            return $this->successResponse($object, Response::HTTP_OK);
        }
        return $this->successResponse(["msg" => "un erreur se produit "], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * @Route("/comptes/{id}", name="add_comptes",methods={"PATCH"})
     */
    public function comptes(Request $request, int $id)
    {
        try {

            $compte = $this->em->getRepository(Compte::class)->findOneBy(['id' => $id]);
            $compte->setStatut(true);
            $this->em->persist($compte);
            $this->em->flush();
            return $this->successResponse($compte, Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->successResponse(["msg" => $e->getMessage()], Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * @Route("/comptes", name="list_comptes",methods={"GET"})
     */
    public function listComptes(Request $request)
    {
        $compte = $this->em->getRepository(Compte::class)->findAll();
        if ($compte) {

            return $this->successResponse($compte, Response::HTTP_OK);
        }

        return $this->successResponse(["msg" => "erreur"], Response::HTTP_UNAUTHORIZED);

    }

    /**
     * @Route("/comptes/{id}", name="delete_compte",methods={"DELETE"})
     */
    public function deleteComptes(Request $request, int $id)
    {
        $compte = $this->em->getRepository(Compte::class)->findOneBy(['id' => $id]);
        if ($compte) {
            $this->em->remove($compte);
            $this->em->flush();
            return $this->successResponse(["msg" => "compte supprimer avec succée"], Response::HTTP_OK);
        }

        return $this->successResponse(["msg" => "erreur"], Response::HTTP_UNAUTHORIZED);

    }

    /**
     * @Route("/credits", name="list_credit",methods={"GET"})
     */
    public function listCredits(Request $request)
    {
        $credit = $this->em->getRepository(Credit::class)->findAll();
        if ($credit) {

            return $this->successResponse($credit, Response::HTTP_OK);
        }

        return $this->successResponse(["msg" => "erreur"], Response::HTTP_UNAUTHORIZED);

    }

    /**
     * @Route("/credits/{id}", name="delete_credit",methods={"DELETE"})
     */
    public function deleteCredit(Request $request, int $id)
    {
        $credit = $this->em->getRepository(Credit::class)->findOneBy(['id' => $id]);
        if ($credit) {
            $this->em->remove($credit);
            $this->em->flush();
            return $this->successResponse(["msg" => "compte supprimer avec succée"], Response::HTTP_OK);
        }

        return $this->successResponse(["msg" => "erreur"], Response::HTTP_UNAUTHORIZED);

    }

    /**
     * @Route("/credit/validate/{id}", name="validate_credit",methods={"PATCH"})
     */
    public function validate(Request $request, int $id)
    {
        try {

            $credit = $this->em->getRepository(Credit::class)->findOneBy(['id' => $id]);
            $credit->setStatut("validated");
            $this->em->persist($credit);
            $this->em->flush();
            return $this->successResponse(["msg" => "credit valider avec succes"], Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->successResponse(["msg" => $e->getMessage()], Response::HTTP_UNAUTHORIZED);
        }
    }
    /**
     * @Route("/credit/refus/{id}", name="refus_credit",methods={"PATCH"})
     */
    public function refus(Request $request, int $id)
    {
        try {

            $credit = $this->em->getRepository(Credit::class)->findOneBy(['id' => $id]);
            $credit->setStatut("rejected");
            $this->em->persist($credit);
            $this->em->flush();
            return $this->successResponse(["msg" => "credit rejeté avec succes"], Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->successResponse(["msg" => $e->getMessage()], Response::HTTP_UNAUTHORIZED);
        }
    }
}