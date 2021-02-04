<?php

declare(strict_types=1);

namespace App\Service;

use App\Converter\DOMElementConvertor;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class SaveExtractedImageService
{
    private array $images;
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager =$em;
    }

    public function fill(array $extractedImages){
        $this->images = $extractedImages;
    }

    public function handleRequest(Request $request):bool
    {
        if(!$request->request->has('save')){
            return false;
        }
        $counter = 0;

        $savingImages = [];

        foreach($this->images as $image){
            if($request->request->has((string)$counter)){
                $savingImages[] = $image; 
            }
            $counter++;
        }

        $this->images = $savingImages;
        return true;
    }

    public function save():void
    {
        $domElementConvertor = new DOMElementConvertor();
        foreach($this->images as $image){
            $extractedImage = $domElementConvertor->convert($image);
            foreach($extractedImage->getCharacteristics() as $characteristic){
                $this->entityManager->persist($characteristic);
            }
            $this->entityManager->persist($extractedImage);
        }
        $this->entityManager->flush();
    }

}

