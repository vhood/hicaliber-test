<?php

declare(strict_types=1);

namespace App\Domain\Properties;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class PropertyRepository
{
    public function __construct(
        private readonly DB $db
    ) { }

    /**
     * @return Collection<int,Property>
     */
    public function allProperties(): Collection
    {
        return $this->db
            ::table('properties')
            ->select(['name', 'price', 'bedrooms', 'bathrooms', 'storeys', 'garages'])
            ->get();
    }

    /**
     * @param PropertiesRequest $request
     * @return Collection<int,Property>
     *
     * @throws InvalidArgumentException
     */
    public function propertiesForRequest(PropertiesRequest $request): Collection
    {
        $query = $this->db
            ::table('properties')
            ->select(['name', 'price', 'bedrooms', 'bathrooms', 'storeys', 'garages']);

        /** @var array<string,int|string> */
        $filters = $request->validated('filters');

        if (array_key_exists('name', $filters) && $filters['name'] !== null) {
            /** @var string */
            $name = $filters['name'];

            $query->whereRaw('LOWER(name) LIKE ?', [sprintf('%%%s%%', strtolower($name))]);
        }

        if (array_key_exists('price_min', $filters) && $filters['price_min'] !== null) {
            $query->where('price', '>=', $filters['price_min']);
        }

        if (array_key_exists('price_max', $filters) && $filters['price_max'] !== null) {
            $query->where('price', '<=', $filters['price_max']);
        }

        foreach (['bedrooms', 'bathrooms', 'storeys', 'garages'] as $filter) {
            if (array_key_exists($filter, $filters) && !empty($filters[sprintf('%s', $filter)])) {
                $query->where($filter, '=', $filters[sprintf('%s', $filter)]);
            }
        }

        return $query->get();
    }
}
