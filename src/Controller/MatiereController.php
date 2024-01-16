<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Matiere;

class MatiereController extends AbstractController
{
    /*
     * #[Route('/matiere', name: 'app_matiere')]
     */
    public function index(): Response
    {
        return $this->render('matiere/index.html.twig', [
            'controller_name' => 'MatiereController',
        ]);
    }

    public function listerMatiere(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(Matiere::class);

        $matieres= $repository->findAll();
        return $this->render('matiere/lister.html.twig', [
            'pMatieres' => $matieres,]);

    }

    public function consulterMatiere(ManagerRegistry $doctrine, int $id){

		$matiere= $doctrine->getRepository(Matiere::class)->find($id);

		if (!$matiere) {
			throw $this->createNotFoundException(
            'Aucun matiere trouvé avec le numéro '.$id
			);
		}

		//return new Response('Matiere : '.$matiere->getLibelle());
		return $this->render('matiere/consulter.html.twig', [
            'matiere' => $matiere,]);
	}
}
