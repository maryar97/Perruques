<?php

namespace App\Repository;

use App\Entity\Detailscommandes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Detailscommandes>
 *
 * @method Detailscommandes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Detailscommandes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Detailscommandes[]    findAll()
 * @method Detailscommandes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailscommandesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Detailscommandes::class);
    }

//    /**
//     * @return Detailscommandes[] Returns an array of Detailscommandes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Detailscommandes
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
