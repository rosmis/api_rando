<?php

namespace App\Http\Controllers;

use App\Dto\CreateHikeDto;
use App\Http\Requests\HikesRequest;
use App\Http\Resources\HikeRessource;
use App\Models\Hike;
use App\Services\HikesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

class HikesController extends Controller
{

    public function __construct(
        private readonly HikesService $hikesService
    ){
    }

    public function index(): AnonymousResourceCollection
    {
        return HikeRessource::collection(
            $this->hikesService->list()
        );
    }

    public function show(int $id): JsonResponse
    {
        return HikeRessource::make(
            $this->hikesService->show($id)
        )->response();
    }

    public function store(HikesRequest $request): JsonResponse
    {
        $hikeData = $request->safe()->toArray();

        /** @var Hike $hike */
        $hike = DB::transaction(
            fn (): Hike => $this->hikesService
                ->store(CreateHikeDto::fromArray($hikeData))
        );

        return HikeRessource::make($hike)->response();
    }
}
