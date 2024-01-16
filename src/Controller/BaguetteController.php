<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Baguette;
use App\Form\BaguetteType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class BaguetteController extends AbstractController
{
    /*
     * @Route("/baguette", name="baguette")
     */
 
	public function consulterBte(ManagerRegistry $doctrine, $id){
		$repository = $doctrine->getRepository(Baguette::class);
		$baguette= $doctrine->getRepository(Baguette::class)->findOneBy(['id' => $id]);
 
		return $this->render('baguette/consulter.html.twig', ['pBaguette' => $baguette,]);
	}

	public function consulterBaguette(ManagerRegistry $doctrine, int $id){

		$baguette= $doctrine->getRepository(Baguette::class)->find($id);

		if (!$baguette) {
			throw $this->createNotFoundException(
            'Aucun baguette trouvé avec le numéro '.$id
			);
		}


		return $this->render('baguette/consulter.html.twig', [
            'baguette' => $baguette,]);
	}

	public function ajouterBaguette(ManagerRegistry $doctrine,Request $request){
        $baguette = new baguette();
        $form = $this->createForm(BaguetteType::class, $baguette);
        $form->handleRequest($request);
 
	if ($form->isSubmitted() && $form->isValid()) {
 
            $baguette = $form->getData();
 
            $entityManager = $doctrine->getManager();
            $entityManager->persist($baguette);
            $entityManager->flush();
 
	    return $this->render('baguette/consulter.html.twig', ['baguette' => $baguette,]);
	}
	else
        {
            return $this->render('baguette/ajouter.html.twig', array('form' => $form->createView(),));
	}
    }
}
