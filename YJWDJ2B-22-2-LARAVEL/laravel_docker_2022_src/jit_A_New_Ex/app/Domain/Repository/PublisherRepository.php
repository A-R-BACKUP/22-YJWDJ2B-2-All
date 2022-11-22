<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use \App\DataProvider\PublisherRepositoryInterface;
use \App\DataProvider\Eloquent\Publisher as EloquentPublisher;
use \App\Domain\Entity\Publisher;

class PublisherRepository implements PublisherRepositoryInterface
{
    private $eloquentPublisher;

    public function __construct(EloquentPublisher $eloquentPublisher) // 의존성 주입, 모델 인스턴스
    {
        $this->eloquentPublisher = $eloquentPublisher;
    }

    public function findByName(string $name): ?Publisher
    {
        $record = $this->eloquentPublisher->whereName($name)->first();
        if ($record === null) {
            return null;
        }

        return new Publisher(  // Entity 클래스
            $record->id,
            $record->name,
            $record->address,
        );
    }

    public function store(Publisher $publisher): int  // Entity 클래스, MI
    {
        $eloquent = $this->eloquentPublisher->newInstance(); // 새 Publisher모델의 인스턴스 
        $eloquent->name = $publisher->getName();
        $eloquent->address = $publisher->getAddress();
        $eloquent->save();

        return (int)$eloquent->id;
    }
}
