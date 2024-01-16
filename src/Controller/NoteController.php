<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Note;
use App\Form\NoteType;
use App\Form\NoteModifierType;

class NoteController extends AbstractController
{
    /*
     * @Route("/note", name="note")
     */
 


	public function consulterNote(ManagerRegistry $doctrine, int $id){

		$note= $doctrine->getRepository(Note::class)->find($id);

		if (!$note) {
			throw $this->createNotFoundException(
            'Aucun note trouvé avec le numéro '.$id
			);
		}

		return $this->render('note/consulter.html.twig', [
            'note' => $note,]);
	}

	public function ajouterNote(ManagerRegistry $doctrine,Request $request){
        $note = new note();
        $form = $this->createForm(NoteType::class, $note);
        $form->handleRequest($request);
 
	if ($form->isSubmitted() && $form->isValid()) {
 
            $note = $form->getData();
 
            $entityManager = $doctrine->getManager();
            $entityManager->persist($note);
            $entityManager->flush();
 
	    return $this->render('note/consulter.html.twig', ['note' => $note,]);
	}
	else
        {
            return $this->render('note/ajouter.html.twig', array('form' => $form->createView(),));
	}
    }

    public function modifierNote(ManagerRegistry $doctrine, $id, Request $request){
 
        //récupération du note dont l'id est passé en paramètre
        $note = $doctrine->getRepository(Note::class)->find($id);
     
        if (!$note) {
            throw $this->createNotFoundException('Aucun note trouvé avec le numéro '.$id);
        }
        else
        {
                $form = $this->createForm(NoteModifierType::class, $note);
                $form->handleRequest($request);
     
                if ($form->isSubmitted() && $form->isValid()) {
     
                     $note = $form->getData();
                     $entityManager = $doctrine->getManager();
                     $entityManager->persist($note);
                     $entityManager->flush();
                     return $this->render('note/consulter.html.twig', ['note' => $note,]);
               }
               else{
                    return $this->render('note/ajouter.html.twig', array('form' => $form->createView(),));
               }
        }
    }
}
