<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use \App\DataProvider\PublisherRepositoryInterface;
use \App\DataProvider\Eloquent\Publisher as EloquentPublisher;
use \App\Domain\Entity\Publisher;

class PublisherRepository implements PublisherRepositoryInterface
{
    private $eloquentPublisher;

    public function __construct(EloquentPublisher $eloquentPublisher)  // CI 
    {
        $this->eloquentPublisher = $eloquentPublisher;
    }

    public function findByName(string $name): ?Publisher
    {
        $record = $this->eloquentPublisher->whereName($name)->first();
        if ($record === null) {
            return null;
        }

        return new Publisher(   // Entity
            $record->id,
            $record->name,
            $record->address,
        );
    }

    public function store(Publisher $publisher): int
    {
        $eloquent = $this->eloquentPublisher->newInstance(); // 모델의 인스턴스 생성
        $eloquent->name = $publisher->getName();
        $eloquent->address = $publisher->getAddress();
        $eloquent->save(); // Eloquent의 save() 메소드

        return (int)$eloquent->id;
    }
}