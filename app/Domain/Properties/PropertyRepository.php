<?php

declare(strict_types=1);

namespace App\Domain\Properties;

// use App\Domain\Properties\Property;
use Illuminate\Http\Request;
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
     * @param Request $request
     * @return Collection<int,Property>
     *
     * @throws InvalidArgumentException
     */
    public function propertiesForRequest(Request $request): Collection
    {
        $query = $this->db
            ::table('properties')
            ->select(['name', 'price', 'bedrooms', 'bathrooms', 'storeys', 'garages']);

        if ($request->has('filters.name')) {
            $query->where('name', 'like', sprintf('%%%s%%', $request->input('filters.name')));
        }

        if ($request->has('filters.price_min') && $request->has('filters.price_max')) {
            $query->whereBetween('price', [$request->input('filters.price_min'), $request->input('filters.price_max')]);
        }

        foreach (['bedrooms', 'bathrooms', 'storeys', 'garages'] as $filter) {
            if ($request->has(sprintf('filters.%s', $filter))) {
                $query->where($filter, '=', $request->input(sprintf('filters.%s', $filter)));
            }
        }

        return $query->get();
    }
}
