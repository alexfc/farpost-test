<?php

namespace BlogBundle\Repository;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class PostRepository extends EntityRepository
{
    const POSTS_PER_PAGE = 10;

    /**
     * @param int $currentPage
     * @return Paginator
     */
    public function getLatestPosts($currentPage = 1)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->orderBy('p.created_at', 'DESC')
            ->getQuery();

        $paginator = $this->paginate($query, $currentPage);

        return $paginator;
    }

    /**
     * @param $dql
     * @param int $page
     * @return Paginator
     */
    public function paginate($dql, $page = 1)
    {
        $paginator = new Paginator($dql);

        $paginator->getQuery()
            ->setFirstResult(self::POSTS_PER_PAGE * ($page - 1))
            ->setMaxResults(self::POSTS_PER_PAGE);

        return $paginator;
    }
}