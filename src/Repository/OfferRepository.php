<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Offer;
use App\Entity\RentalSearch;
use App\Entity\RoommateOffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Offer>
 *
 * @method Offer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offer[]    findAll()
 * @method Offer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offer::class);
    }

    /**
     * @return Offer[] Returns an array of Offer objects
     */
    public function findBySearch(string $wish, int $lodgingId, string $city): array
    {
        $qb = $this->createQueryBuilder('o');

        if (RentalSearch::class === $wish) {
            $qb->leftJoin('l.rentalSearches', 'rs')
                ->andWhere('rs.desiredCity = :city')
                ->setParameter('city', $city)
                ->andWhere('ro.lodgingType = :lodgingId')
                ->setParameter('lodgingId', $lodgingId)
            ;
        }

        if (RoommateOffer::class === $wish) {
            $qb->leftJoin(RoommateOffer::class, 'ro', 'WITH', 'o.roommateOffer = ro.id')
                ->andWhere('ro.city Like :city')
                ->setParameter('city', '%'.$city.'%')
                ->andWhere('ro.lodgingType = :lodgingId')
                ->setParameter('lodgingId', $lodgingId)
            ;
        }

        return $qb
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    //    /**
    //     * @return Offer[] Returns an array of Offer objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('o.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Offer
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
