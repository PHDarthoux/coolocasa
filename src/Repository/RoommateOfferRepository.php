<?php

namespace App\Repository;

use App\Entity\RoommateOffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RoommateOffer>
 *
 * @method RoommateOffer|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoommateOffer|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoommateOffer[]    findAll()
 * @method RoommateOffer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoommateOfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoommateOffer::class);
    }

    //    /**
    //     * @return RoommateOffer[] Returns an array of RoommateOffer objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?RoommateOffer
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
