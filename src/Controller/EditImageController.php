<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\Type\ImageFormType;
use App\Repository\ExtractedImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditImageController extends AbstractController
{
    /**
     * @Route("/edit/image/{imageId}", name="edit_image")
     *
     * @param $imageId
     */
    public function index(int $imageId, ExtractedImageRepository $extractedImageRepository, Request $request): Response
    {
        $image = $extractedImageRepository->find($imageId);
        $form = $this->createForm(ImageFormType::class, $image);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('image_list');
        }

        return $this->render('edit_image/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
