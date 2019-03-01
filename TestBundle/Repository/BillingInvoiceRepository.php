<?php

namespace Bluesquare\TestBundle\Repository;

use Bluesquare\TestBundle\Entity\BillingInvoice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BillingInvoice|null find($id, $lockMode = null, $lockVersion = null)
 * @method BillingInvoice|null findOneBy(array $criteria, array $orderBy = null)
 * @method BillingInvoice[]    findAll()
 * @method BillingInvoice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BillingInvoiceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BillingInvoice::class);
    }

    // /**
    //  * @return BillingInvoice[] Returns an array of BillingInvoice objects
    //  */
    /*
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
    */

    /*
    public function findOneBySomeField($value): ?BillingInvoice
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
