<?php

namespace Tests\Unit\Domain\Properties;

use App\Domain\Properties\PropertiesRequest;
use App\Domain\Properties\PropertyRepository;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Mockery;
use PHPUnit\Framework\TestCase;

class PropertiesRepositoryTest extends TestCase
{
    private PropertyRepository $repository;
    private Collection $collection;

    protected function setUp(): void
    {
        $this->collection = Mockery::mock(Collection::class);

        $builder = Mockery::mock(Builder::class);
        $builder->shouldReceive('select')->once()->andReturn($builder);
        $builder->shouldReceive('get')->once()->andReturn($this->collection);

        $db = new DB();
        $db::shouldReceive('table')->once()->andReturn($builder);

        $this->repository = new PropertyRepository($db);
    }

    public function test_all_properties_fetching(): void
    {
        $this->assertSame($this->repository->allProperties(), $this->collection);
    }

    public function test_properties_for_request_fetching(): void
    {
        $request = Mockery::mock(PropertiesRequest::class);
        $request->shouldReceive('validated')->once()->andReturn([]);

        $this->assertSame($this->repository->propertiesForRequest($request), $this->collection);
    }
}
