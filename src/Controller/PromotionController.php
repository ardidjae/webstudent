<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Promotion;
use Doctrine\Persistence\ManagerRegistry;

class PromotionController extends AbstractController
{
    /*
     * @Route("/promotion", name="promotion")
     */
 
	public function consulterPromotion(ManagerRegistry $doctrine, $code){
		$repository = $doctrine->getRepository(Promotion::class);
		$promotion= $doctrine->getRepository(Promotion::class)->findOneBy(['code' => $code]);
 
		return $this->render('promotion/consulter.html.twig', ['pPromotion' => $promotion,]);
	}	
}
