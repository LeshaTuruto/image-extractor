<?php

namespace App\Controller;

use App\Form\Type\StartImageExtractionFormType;
use App\Repository\ExtractedImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImageListController extends AbstractController
{
    /**
     * @Route("/imagelist", name="image_list")
     */
    public function index(ExtractedImageRepository $extractedImageRepository, Request $request): Response
    {
        $form = $this->createForm(StartImageExtractionFormType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            return $this->redirectToRoute("extract_images", [
                "url" => $form->get('urlPattern')->getData(),
             ]);
        }
        $imageList = $extractedImageRepository->findAll();        
        return $this->render('image_list/index.html.twig', [
            'controller_name' => 'ImageListController',
            'image_list' => $imageList,
            'form' => $form->createView(),
        ]);
    }
}
