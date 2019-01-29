<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Event|null find($id, $lockMode = null, $lockVersion = null)
 * @method Event|null findOneBy(array $criteria, array $orderBy = null)
 * @method Event[]    findAll()
 * @method Event[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Event::class);
    }

    public function recup(){

        return $this->createQueryBuilder('e')
            ->getQuery()
            ->getResult()
        ;
    
    }

    public function lastFiveEvent(){

        return $this->createQueryBuilder('e')
            ->andWhere('e.date BETWEEN :start AND :end')
            ->setParameter('start', new \Datetime('1972-01-01'))
            ->setParameter('end',   new \Datetime('2000-12-31'))
            ->orderBy('e.date', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
        ;

    }

    public function fistAndLastEvent(){

       /*
          - Dans le controlleur :
     $em =  $this->get('doctrine')->getManager();
        $data = $em->getRepository(Event::class)->findAll();
        $limites = $em->getRepository(Event::class)->limites($data);
    
    - Dans le repository:
        public function limites($date_arr){
  
        $min_key = array_search(min($date_arr), $date_arr );
        $max_key = array_search(max($date_arr), $date_arr );

         $date1 = 'la première date : '.$date_arr[$min_key]->getDate()->format('Y:m:d');

         $date2 = 'la dernière date : '.$date_arr[$max_key]->getDate()->format('Y:m:d');
         }
        return array($date1, $date2);
       */

    }


    public function datePart(){

        $asc =  $this->createQueryBuilder('e')
            ->andWhere('e.date = :datep')
            ->setParameter('datep', new \Datetime('1997-06-29'))
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
    ;

    }

    // /**
    //  * @return Event[] Returns an array of Event objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Event
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
