<?php

namespace App\Controller;

use App\Service\ImageExtractionService;
use App\Service\SaveExtractedImageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExtractImagesController extends AbstractController
{
    /**
     * @Route("/extract/images/{url}", name="extract_images")
     * @param $url
     */
    public function index(string $url, Request $request, ImageExtractionService $imageExtractionService, SaveExtractedImageService $saver ): Response
    {
        $images = $imageExtractionService->extract($url);
        $saver->fill($images);
        if($saver->handleRequest($request)){
            $saver->save();
            return $this->redirectToRoute("image_list");
        }
        $imagesSrcList = $imageExtractionService->getExtractedImagesSrc($images);
        $counter = 0;
        return $this->render('extract_images/index.html.twig', [
            'images_src_list' => $imagesSrcList,
            'counter' => $counter,
        ]);
    }
}
