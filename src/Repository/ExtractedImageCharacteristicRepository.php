<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\ExtractedImageCharacteristic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExtractedImageCharacteristic|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExtractedImageCharacteristic|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExtractedImageCharacteristic[]    findAll()
 * @method ExtractedImageCharacteristic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExtractedImageCharacteristicRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExtractedImageCharacteristic::class);
    }

    // /**
    //  * @return ExtractedImageCharacteristic[] Returns an array of ExtractedImageCharacteristic objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExtractedImageCharacteristic
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
