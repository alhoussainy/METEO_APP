<?php

namespace App\Repository;

use App\Entity\Meteo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Meteo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Meteo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Meteo[]    findAll()
 * @method Meteo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeteoRepository extends ServiceEntityRepository
{

 public function RechercheParVille()
 {
//   $query= "SELECT m.Ville,m.Temperature,
//         m.humidity,m.description,m.vent
//    FROM App:Meteo m
//    WHERE m.Ville=:$ville ";
//
//   return $this->getEntityManager()
//       ->createQuery($query)
//       ->getResult();
 }
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Meteo::class);
    }

    // /**
    //  * @return Meteo[] Returns an array of Meteo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Meteo
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
