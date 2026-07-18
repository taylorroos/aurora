<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relationship;
use App\Http\Requests\StoreRelationshipRequest;
use App\Http\Requests\UpdateRelationshipRequest;
use App\Http\Resources\RelationshipResource;

class RelationshipController extends Controller
{
    public function show(Relationship $relationship)
    {
        $relationship->load([
            'people',
            'interactions',
            'memories',
        ]);

        return new RelationshipResource($relationship);
    }

    public function index()
    {
        $relationships = Relationship::query()
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return RelationshipResource::collection($relationships);
    }

    public function store(StoreRelationshipRequest $request)
    {
        $data = $request->validated();

        $relationship = Relationship::create($data);

        return (new RelationshipResource($relationship))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateRelationshipRequest $request, Relationship $relationship)
    {
        $data = $request->validated();

        $relationship->update($data);

        return new RelationshipResource($relationship);
    }

    public function destroy(Relationship $relationship)
    {
        $relationship->delete();

        return response()->noContent();
    }
}
