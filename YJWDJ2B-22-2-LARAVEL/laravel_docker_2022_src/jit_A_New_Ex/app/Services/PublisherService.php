<?php

declare(strict_types=1);

namespace App\Services;

//use App\DataProvider\Eloquent\Publisher;

use App\DataProvider\PublisherRepositoryInterface;
use App\Domain\Entity\Publisher; 

class PublisherService
{
   private $publisherRepo; // 클래스 속성 변수 정의

    public function __construct(PublisherRepositoryInterface $publisherRepo)  // 생성자 정의, CI
    {
        $this->publisherRepo = $publisherRepo;
    }

    public function exists(string $name): bool
    {
        if (!$this->publisherRepo->findbyName($name)) {
            return false;
        }
        return true;
/*         $count = Publisher::whereName($name)->count();
        if ($count > 0){
            return true;
        }
        return false; */
    }

    public function store(string $name, string $address): int
    {
        return $this->publisherRepo->store(new Publisher(null, $name, $address));
/*       $publisher = Publisher::create([
				'name'=>$name,
				'address'=>$address,
			]);
			return (int)$publisher->id; */
         
    }
}
