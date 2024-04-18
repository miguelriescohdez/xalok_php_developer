<?php

namespace App\Repository;

use App\Entity\Drivers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

/**
 * @extends ServiceEntityRepository<Drivers>
 *
 * @method Drivers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Drivers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Drivers[]    findAll()
 * @method Drivers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DriversRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Drivers::class);
    }

    /**
    * @return Drivers[] Returns an array of Vehicles 
    */
    public function findByAvailableDate($date, $license) : array {

        return $this->createQueryBuilder('d')
            ->leftJoin('d.trips', 't', 'WITH', 't.date = :date')
            ->andWhere('t.id IS NULL')
            ->andWhere('d.license = :license')
            ->setParameter('date', $date)
            ->setParameter('license', $license)
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);

    }
//    /**
//     * @return Drivers[] Returns an array of Drivers objects
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

//    public function findOneBySomeField($value): ?Drivers
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
