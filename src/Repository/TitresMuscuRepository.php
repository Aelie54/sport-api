<?php

namespace App\Repository;

use App\Entity\TitresMuscu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TitresMuscu|null find($id, $lockMode = null, $lockVersion = null)
 * @method TitresMuscu|null findOneBy(array $criteria, array $orderBy = null)
 * @method TitresMuscu[]    findAll()
 * @method TitresMuscu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TitresMuscuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TitresMuscu::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(TitresMuscu $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(TitresMuscu $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return TitresMuscu[] Returns an array of TitresMuscu objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TitresMuscu
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
