<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\ExtractedImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExtractedImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExtractedImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExtractedImage[]    findAll()
 * @method ExtractedImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExtractedImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExtractedImage::class);
    }
}
