<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\ExtractedImage;
use App\Form\Type\ImageFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddImageController extends AbstractController
{
    /**
     * @Route("/add/image", name="add_image")
     */
    public function index(Request $request): Response
    {
        $image = new ExtractedImage();
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
