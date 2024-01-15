<?php

namespace App\Operation\Http\Controllers;

use App\Domain\Properties\PropertiesRequest;
use App\Domain\Properties\PropertyRepository;
use Inertia\Inertia;
use Inertia\Response;
use InvalidArgumentException;

class PropertyController extends Controller
{
    public function __construct(
        private readonly PropertyRepository $repository
    ) { }

    /**
     * @param PropertiesRequest $request
     * @return Response
     *
     * @throws InvalidArgumentException
     */
    public function index(PropertiesRequest $request): Response
    {
        $properties = $request->has('filters')
            ? $this->repository->propertiesForRequest($request)
            : $this->repository->allProperties();

        return Inertia::render('Properties/Index', compact('properties'));
    }
}
