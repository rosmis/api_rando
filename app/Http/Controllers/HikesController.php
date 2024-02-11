<?php

namespace App\Http\Controllers;

use App\Dto\CreateHikeDto;
use App\Http\Requests\HikesRequest;
use App\Http\Resources\HikeRessource;
use App\Models\Hike;
use App\Services\HikesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class HikesController extends Controller
{

    public function __construct(
        private readonly HikesService $hikesService
    ){
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
