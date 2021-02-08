<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ExtractedImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteImageController extends AbstractController
{
    /**
     * @Route("/delete/image/{imageId}", name="delete_image")
     * @param $imageId
     */
    public function index(int $imageId, ExtractedImageRepository $extractedImageRepository): Response
    {
        $image = $extractedImageRepository->find($imageId);
        $em = $this->getDoctrine()->getManager();
        $em->remove($image);
        $em->flush();
        return $this->redirectToRoute("image_list");
    }
}
