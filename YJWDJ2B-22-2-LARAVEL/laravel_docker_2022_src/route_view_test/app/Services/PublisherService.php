<?php

// namespace App\Services;

// //use App\DataProvider\PublisherRepositoryInterface;
// //use App\Domain\Entity\Publisher;
// use App\DataProvider\Eloquent\Publisher;

// class PublisherService
// {
// /*     private $publisher;

//     public function __construct(PublisherRepositoryInterface $publisher)
//     {
//         $this->publisher = $publisher;
//     } */

//     public function exists(string $name): bool
//     {
// /*         if (!$this->publisher->findbyName($name)) {
//             return false;
//         }
//         return true; */
//         $count = Publisher::whereName($name)->count();
//         if($count>0){
//             return true;
//         }
//         return false;
//     }

//     public function store(string $name, string $address): int
//     {
//         $publisher = Publisher::create(
//             ['name'=>$name, 'address'=>$address,]
//         );
//         return (int)$publisher->id; // id bigint type
//         //return $this->publisher->store(new Publisher(null, $name, $address));
//     }
// }

namespace App\Services;

use App\DataProvider\PublisherRepositoryInterface;
use App\Domain\Entity\Publisher;
//use App\DataProvider\Eloquent\Publisher;

class PublisherService
{
    private $publisher;

    public function __construct(PublisherRepositoryInterface $publisher)  // CI, 의존성주입
    {
        $this->publisher = $publisher;
    } 

    public function exists(string $name): bool
    {
        if (!$this->publisher->findbyName($name)) {
            return false;
        }
        return true;
        /* $count = Publisher::whereName($name)->count();
        if($count>0){
            return true;
        }
        return false; */
    }

    public function store(string $name, string $address): int
    {
/*         $publisher = Publisher::create(
            ['name'=>$name, 'address'=>$address,]
        );
        return (int)$publisher->id; // id bigint type */
        return $this->publisher->store(new Publisher(null, $name, $address));
    }
}
