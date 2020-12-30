<?php

namespace App\Repository;
use App\Entity\Search;
use App\Entity\Bijoux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bijoux|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bijoux|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bijoux[]    findAll()
 * @method Bijoux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BijouxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bijoux::class);
    }
     /**
      * @return Query
    **/
    public function findAllVisibleQuery(Search $search):Query
    {
      $query=$this->findVisibleQuery($search);
      if ($search->getMaxPrix()) {
          $query=$query->where('p.prix < :maxprix')
            ->setParameter('maxprix',$search->getMaxPrix());
      }
       return $query->getQuery();
      
    } 

     /**
      * @return Bijoux[] Returns an array of Bijoux objects
      */
    
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Bijoux
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
