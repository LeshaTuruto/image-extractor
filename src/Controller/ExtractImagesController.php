<?php

namespace App\Controller;

use App\Service\ImageExtractionService;
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
    public function index(string $url, Request $request): Response
    {
        if($request->request->has('save')){
            echo var_dump($request->request->get('0'));
        }
        $extractionService = new ImageExtractionService();
        $images = $extractionService->extract($url);
        $attributes = [];
        /*foreach($images[0]->attributes as $attribute_name => $attribute_node){
            $attributes[$attribute_name] = $attribute_node->nodeValue;
        }
        */
        $imagesSrcList = [];
        $counter = 0;
        foreach($images as $image){
            if($image->hasAttribute('src')){
                $imagesSrcList[] = $image->getAttribute('src');
            }
        }
        return $this->render('extract_images/index.html.twig', [
            'images_src_list' => $imagesSrcList,
            'counter' => $counter,
        ]);
    }
}
