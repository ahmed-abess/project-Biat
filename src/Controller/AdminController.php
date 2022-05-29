<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Entity\User;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/admin", name="api_")
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
        return $this->successResponse(["msg" => "un erreur se produit "], Response::HTTP_UNAUTHORIZED);
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
        return $this->successResponse(["msg" => "un erreur se produit "], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * @Route("/agents", name="add_agent",methods={"POST"})
     */
    public function register(Request $request, UserPasswordHasherInterface $passwordEncoder)
    {
        $data = $request->getContent();
        $object = $this->deserializeRequest(User::class, $data);
        if ($object) {
            // Encode the new users password
            $object->setPassword($passwordEncoder->hashPassword($object, $object->getPassword()));
            $object->setRoles(["ROLE_AGENT"]);
            $this->em->persist($object);
            $this->em->flush();
            return $this->successResponse($object, Response::HTTP_OK);
        }
        return $this->successResponse(["msg" => "un erreur se produit "], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * @Route("/actuialite", name="add_actuialite",methods={"POST"})
     */
    public function actuialite(Request $request, FileUploader $fileUploader)
    {
        $Actualite = new Actualite();
        $date = $request->get("date");
        $titre = $request->get("titre");
        $contenu = $request->get("contenu");
        $data = $request->files->get("file");
        try {
            if ($data) {
                $brochureFileName = $fileUploader->upload($data);
                $Actualite->setPhoto($brochureFileName);
                $Actualite->setTitre($titre);
                $Actualite->setContenu($contenu);
                $Actualite->setDate(new \DateTime($date));
                $this->em->persist($Actualite);
                $this->em->flush();
            }
            return $this->successResponse($Actualite, Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->successResponse($e->getMessage(), Response::HTTP_CONFLICT);
        }
    }

    /**
     * @Route("/actuialite/{id}", name="update_actuialite",methods={"POST"})
     */
    public function updateActu(Request $request, FileUploader $fileUploader, int $id)
    {

        try {
            $date = $request->get("date");
            $titre =  $request->get("titre");
            $contenu = $request->get("contenu");
            $data = $request->files->get("file");
            $Actualite = $this->em->getRepository(Actualite::class)->findOneBy(['id' => $id]);
            if ($data) {
                $brochureFileName = $fileUploader->upload($data);
                $Actualite->setPhoto($brochureFileName);
                $Actualite->setTitre($titre);
                $Actualite->setContenu($contenu);
                $Actualite->setDate(new \DateTime($date));
                $this->em->persist($Actualite);
                $this->em->flush();
            }
            return $this->successResponse($Actualite, Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->successResponse($e->getMessage(), Response::HTTP_CONFLICT);
        }
    }

    /**
     * @Route("/actuialite/{id}", name="delete_actuialite",methods={"DELETE"})
     */
    public function DeleteActu(int $id)
    {
        try {
            $Actualite = $this->em->getRepository(Actualite::class)->findOneBy(['id' => $id]);
            $this->em->remove($Actualite);
            $this->em->flush();

            return $this->successResponse(["msg" => "actuailité supprimer avec succée"], Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->successResponse($e->getMessage(), Response::HTTP_CONFLICT);
        }
    }
}