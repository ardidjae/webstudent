<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Maison;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Form\MaisonType;
use App\Form\MaisonModifierType;

class MaisonController extends AbstractController
{
    /*
     * @Route("/maison", name="maison")
     */
 
	public function consulterMaison(ManagerRegistry $doctrine, $code){
		$repository = $doctrine->getRepository(Maison::class);
		$maison= $doctrine->getRepository(Maison::class)->findOneBy(['code' => $code]);
 
		return $this->render('maison/consulter.html.twig', ['pMaison' => $maison,]);
	}

	public function listerMaison(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(Maison::class);

        $maison = $repository->findAll();
        return $this->render('maison/lister.html.twig', [
            'pMaisons' => $maison,]);

    }

	public function ajouterMaison(ManagerRegistry $doctrine,Request $request){
        $maison = new maison();
        $form = $this->createForm(MaisonType::class, $maison);
        $form->handleRequest($request);
 
	    if ($form->isSubmitted() && $form->isValid()) {
 
            $maison = $form->getData();
 
            $entityManager = $doctrine->getManager();
            $entityManager->persist($maison);
            $entityManager->flush();
 
	    return $this->render('maison/consulter.html.twig', ['pMaison' => $maison,]);
	}
	else
        {
            return $this->render('maison/ajouter.html.twig', array('form' => $form->createView(),));
	}
    }

	public function modifierMaison(ManagerRegistry $doctrine, $id, Request $request){

        //récupération de l'étudiant dont l'id est passé en paramètre
        $maison = $doctrine->getRepository(Maison::class)->find($id);

        if (!$maison) {
            throw $this->createNotFoundException('Aucun maison trouvé avec le numéro '.$id);
        }
        else
        {
                $form = $this->createForm(MaisonModifierType::class, $maison);
                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {

                     $maison = $form->getData();
                     $entityManager = $doctrine->getManager();
                     $entityManager->persist($maison);
                     $entityManager->flush();
                     return $this->render('maison/consulter.html.twig', ['maison' => $maison,]);
               }
               else{
                    return $this->render('maison/ajouter.html.twig', array('form' => $form->createView(),));
               }
            }
     }

}
