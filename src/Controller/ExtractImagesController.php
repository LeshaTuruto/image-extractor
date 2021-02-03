<?php

namespace App\Controller;

use App\Service\ImageExtractionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExtractImagesController extends AbstractController
{
    /**
     * @Route("/extract/images/{url}", name="extract_images")
     * @param $url
     */
    public function index(string $url): Response
    {
        $extractionService = new ImageExtractionService();
        $images = $extractionService->extract($url);
        $attributes = [];
        foreach($images[0]->attributes as $attribute_name => $attribute_node){
            $attributes[$attribute_name] = $attribute_node->nodeValue;
        }
        echo var_dump($attributes);
        return $this->render('extract_images/index.html.twig', [
            'controller_name' => 'ExtractImagesController',
        ]);
    }
}
