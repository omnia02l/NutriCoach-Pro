<?php

namespace App\Repository;

use App\Entity\Convention;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 *
 * @extends ServiceEntityRepository<Convention>
 * 
 * @method Convention|null find($id, $lockMode = null, $lockVersion = null)
 * @method Convention|null findOneBy(array $criteria, array $orderBy = null)
 * @method Convention[]    findAll()
 * @method Convention[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConventionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Convention::class);
    }

    // You can add custom query methods specific to your Convention entity here, if needed.
}
