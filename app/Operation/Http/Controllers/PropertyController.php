<?php

namespace App\Operation\Http\Controllers;

use App\Domain\Properties\PropertyRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PropertyController extends Controller
{
    public function __construct(
        private readonly PropertyRepository $repository
    ) { }

    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $properties = $request->has('filters')
            ? $this->repository->propertiesForRequest($request)
            : $this->repository->allProperties();

        return Inertia::render('Properties/Index', compact('properties'));
    }
}
