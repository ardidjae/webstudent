<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Etudiant;
use App\Entity\Maison;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Form\EtudiantType;
use App\Form\EtudiantModifierType;
use App\Form\EtudiantSupprimerType;

class EtudiantController extends AbstractController
{
    /*
     * @Route("/etudiant", name="etudiant")
     */
    public function index()
    {
     	/* Cette simple instruction permet d'envoyer des informations au navigateur sans passer par une vue.
        return new Response('<html><body>Salut Les SIO</body></html>');
        */
 
         // initialise une variable qui sera exploitée dans la vue
         $annee = '2024';
         return $this->render('etudiant/accueil.html.twig', ['pAnnee' => $annee,
        ]);
    }

    public function consulterEtudiant(ManagerRegistry $doctrine, int $id){

		$etudiant= $doctrine->getRepository(Etudiant::class)->find($id);

		if (!$etudiant) {
			throw $this->createNotFoundException(
            'Aucun etudiant trouvé avec le numéro '.$id
			);
		}

		//return new Response('Etudiant : '.$etudiant->getNom());
		return $this->render('etudiant/consulter.html.twig', [
            'etudiant' => $etudiant,]);
	}

    public function listerEtudiant(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(Etudiant::class);

    $etudiants= $repository->findAll();
    return $this->render('etudiant/lister.html.twig', [
        'pEtudiants' => $etudiants,]);	

    }

    public function mdfEtudiant(ManagerRegistry $doctrine, $id){
 
		//récupération de l'étudiant dont l'id est passé en paramètre
		$etudiant= $doctrine->getRepository(Etudiant::class)->find($id);
 
		if (!$etudiant) {
			throw $this->createNotFoundException(
            'Aucun etudiant trouvé avec le numéro '.$id
			);
		}
		else
		{
 
 
		// récupération de la maison des griffondor à partir du code de la maison
                $maison= $doctrine->getRepository(Maison::class)->findOneBy(['code' => 'GFD']);
 
 
		if (!$maison) {
			throw $this->createNotFoundException(
            'Aucune maison trouvé avec ce nom'
			);
		}
		else
		{
 
		//Affectation de la maison à l'étudiant
		$etudiant->setMaison($maison);
 
		// persistence de l'objet modifié
                $entityManager = $doctrine->getManager();
		$entityManager->persist($etudiant);
		$entityManager->flush();
 
 
 
		//return new Response('Etudiant : '.$etudiant->getNom());
		return $this->render('etudiant/consulter.html.twig', [
            'etudiant' => $etudiant,]);
        }
        }
	}

    public function ajouterEtudiant(ManagerRegistry $doctrine,Request $request){
        $etudiant = new etudiant();
        $form = $this->createForm(EtudiantType::class, $etudiant);
        $form->handleRequest($request);
 
	if ($form->isSubmitted() && $form->isValid()) {
 
            $etudiant = $form->getData();
 
            $entityManager = $doctrine->getManager();
            $entityManager->persist($etudiant);
            $entityManager->flush();
 
	    return $this->render('etudiant/consulter.html.twig', ['etudiant' => $etudiant,]);
	}
	else
        {
            return $this->render('etudiant/ajouter.html.twig', array('form' => $form->createView(),));
	}
    }

    public function modifierEtudiant(ManagerRegistry $doctrine, $id, Request $request){
 
        //récupération de l'étudiant dont l'id est passé en paramètre
        $etudiant = $doctrine->getRepository(Etudiant::class)->find($id);
     
        if (!$etudiant) {
            throw $this->createNotFoundException('Aucun etudiant trouvé avec le numéro '.$id);
        }
        else
        {
                $form = $this->createForm(EtudiantModifierType::class, $etudiant);
                $form->handleRequest($request);
     
                if ($form->isSubmitted() && $form->isValid()) {
     
                     $etudiant = $form->getData();
                     $entityManager = $doctrine->getManager();
                     $entityManager->persist($etudiant);
                     $entityManager->flush();
                     return $this->render('etudiant/consulter.html.twig', ['etudiant' => $etudiant,]);
               }
               else{
                    return $this->render('etudiant/ajouter.html.twig', array('form' => $form->createView(),));
               }
        }
    }

    public function supprimerEtudiant(ManagerRegistry $doctrine, $id, Request $request){
 
        //récupération de l'élève dont l'id est passé en paramètre
        $etudiant = $doctrine->getRepository(Etudiant::class)->find($id);
    
        if (!$etudiant) {
            throw $this->createNotFoundException('Aucun etudiant trouvé avec le numéro '.$id);
        }
        else
        {
                $form = $this->createForm(EtudiantSupprimerType::class, $etudiant);
                $form->handleRequest($request);
    
                if ($form->isSubmitted() && $form->isValid()) {
    
                    $entityManager = $doctrine->getManager();
                    $entityManager ->remove($etudiant);
                    $entityManager->flush();
                    $repository = $doctrine->getRepository(Etudiant::class);
                    $etudiants = $repository->findAll();
                    return $this->render('etudiant/lister.html.twig', [
                        'pEtudiants' => $etudiants,]);	
            }
            else{
                    return $this->render('etudiant/ajouter.html.twig', array('form' => $form->createView(),));
            }
        }
    }
}
