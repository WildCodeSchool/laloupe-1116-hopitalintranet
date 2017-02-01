<?php

namespace HopitalBundle\Repository;

use Doctrine\ORM\EntityRepository;

class AbstractRepository extends EntityRepository
{
    /**
     * @return mixed
     */
    public function findLast()
    {
        $qb = $this->_em->createQueryBuilder()
            ->select('e')
            ->from($this->_entityName, 'e')
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(1);
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }
}
