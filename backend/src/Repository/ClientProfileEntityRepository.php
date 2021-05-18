<?php

namespace App\Repository;

use App\Entity\ClientProfileEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClientProfileEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClientProfileEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClientProfileEntity[]    findAll()
 * @method ClientProfileEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientProfileEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClientProfileEntity::class);
    }

    public function getClientProfileByUserID($userID)
    {
        return $this->createQueryBuilder('clientProfile')
            ->select('clientProfile.id', 'clientProfile.userName','clientProfile.userID', 'clientProfile.image', 'clientProfile.phone', 'clientProfile.uuid')

            ->andWhere('clientProfile.userID = :userID')

            ->setParameter('userID', $userID)

            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getClientProfileByID($id)
    {
        return $this->createQueryBuilder('clientProfile')
            ->select('clientProfile.id', 'clientProfile.userName','clientProfile.userID', 'clientProfile.image', 'clientProfile.phone', 'clientProfile.uuid')

            ->andWhere('clientProfile.id = :id')

            ->setParameter('id', $id)

            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getClientsProfile()
    {
        return $this->createQueryBuilder('clientProfile')
            ->select('clientProfile.id', 'clientProfile.userName','clientProfile.userID', 'clientProfile.image', 'clientProfile.phone', 'clientProfile.uuid')

            ->getQuery()
            ->getResult();
    }

}