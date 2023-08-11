<?php

namespace App\Repository;

use App\Entity\RentalSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RentalSearch>
 *
 * @method RentalSearch|null find($id, $lockMode = null, $lockVersion = null)
 * @method RentalSearch|null findOneBy(array $criteria, array $orderBy = null)
 * @method RentalSearch[]    findAll()
 * @method RentalSearch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RentalSearchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RentalSearch::class);
    }

    //    /**
    //     * @return RentalSearch[] Returns an array of RentalSearch objects
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

    //    public function findOneBySomeField($value): ?RentalSearch
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
