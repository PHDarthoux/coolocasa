<?php

declare(strict_types=1);

namespace App\Repository;

use App\DTO\SearchDTO;
use App\Entity\LodgingType;
use App\Entity\Offer;
use App\Entity\RentalSearch;
use App\Entity\RoommateOffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
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

    public function findBySearch(SearchDTO $searchDTO): Query
    {
        $wish = $searchDTO->getWish();
        $city = $searchDTO->getCity();
        $lodgingIdChoices = [];

        foreach ($searchDTO->getLodgingTypes() as $lodgingType) {
            $lodgingIdChoices[] = $lodgingType->getId();
        }

        $qb = $this->createQueryBuilder('o');

        if (RentalSearch::class === $wish) {
            $qb->leftJoin(RentalSearch::class, 'rs', 'WITH', 'o.rentalSearch = rs.id')
                ->leftJoin(LodgingType::class, 'lt', 'WITH', 'rs.id = lt.id')
                ->where('rs.desiredCity LIKE :city')
                ->setParameter('city', $city);

            if (!empty($lodgingIdChoices)) {
                $qb->andWhere('lt.id IN (:ids)')
                    ->setParameter('ids', $lodgingIdChoices);
            }
        }

        if (RoommateOffer::class === $wish) {
            $qb->leftJoin(RoommateOffer::class, 'ro', 'WITH', 'o.roommateOffer = ro.id')
                ->leftJoin(LodgingType::class, 'lt', 'WITH', 'ro.lodgingType = lt.id')
                ->where('ro.city LIKE :city')
                ->setParameter('city', $city);

            if (!empty($lodgingIdChoices)) {
                $qb->andWhere('lt.id IN (:ids)')
                    ->setParameter('ids', $lodgingIdChoices);
            }
        }

        return $qb
            // ->setMaxResults(10)
            ->getQuery();
        //            ->getResult();
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
