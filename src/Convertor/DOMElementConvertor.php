<?php

declare(strict_types=1);

namespace App\Convertor;

use App\Entity\ExtractedImage;
use App\Entity\ExtractedImageCharacteristic;
use DOMElement;

class DOMElementConvertor
{
    public function convert( DOMElement $element): ExtractedImage
    {
        $convertedElement = new ExtractedImage();
        foreach($element->attributes as $attributeName => $attributeNode){
            $characteristic = new ExtractedImageCharacteristic();
            $characteristic->setName($attributeName);
            $characteristic->setValue($attributeNode->nodeValue);
            $convertedElement->addCharacteristic($characteristic);
        }
        $url = $element->getAttribute('src');
        $convertedElement->setImageUrl($url);
        return $convertedElement;
    }
}

