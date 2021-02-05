<?php

namespace App\Controller;

use App\Repository\ExtractedImageCharacteristicRepository;
use App\Repository\ExtractedImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteImageCharacteriscticController extends AbstractController
{
    /**
     * @Route("/delete/image/characterisctic/{imageId}/{characteristicName}", name="delete_image_characterisctic")
     * @param $imageId
     * @param $characteristicName
     */
    public function index(int $imageId, string $characteristicName, ExtractedImageCharacteristicRepository $extractedImageCharacteristicRepository , ExtractedImageRepository $extractedImageRepository): Response
    {
        $em = $this->getDoctrine()->getManager();
        $image = $extractedImageRepository->find($imageId);
        $imageCharacteristic = $extractedImageCharacteristicRepository->findOneByImageAndName($image, $characteristicName);
        $em->remove($imageCharacteristic);
        $em->flush();
        return $this->redirectToRoute("edit_image",["imageId" => $imageId]);
    }
}
