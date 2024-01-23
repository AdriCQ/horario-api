<?php

namespace App\Http\Controllers;

use App\Http\Requests\Horario\CreateRequest;
use App\Http\Requests\Horario\FilterRequest;
use App\Http\Requests\Horario\UpdateRequest;
use App\Http\Resources\HorarioResponse;
use App\Models\Horario;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HorarioController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['remove', 'store', 'update']);
    }

    /**
     * Filter Horario
     */
    public function filter(FilterRequest $request): AnonymousResourceCollection
    {
        $validated = $request->validated();

        return HorarioResponse::collection(
            Horario::query()
                ->when(
                    array_key_exists('carrera', $validated),
                    function (Builder $query) use ($validated) {
                        $query->where('carrera', 'like', '%'.$validated['carrera'].'%');
                    }
                )
                ->when(
                    array_key_exists('facultad', $validated),
                    function (Builder $query) use ($validated) {
                        $query->where('facultad', 'like', '%'.$validated['facultad'].'%');
                    }
                )
                ->when(
                    array_key_exists('curso', $validated),
                    function (Builder $query) use ($validated) {
                        $query->where('curso', $validated['curso']);
                    }
                )
                ->get()
        );
    }

    /**
     * remove
     */
    public function remove(Horario $horario): JsonResponse
    {
        $horario->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * show
     */
    public function show(Horario $horario): HorarioResponse
    {
        return new HorarioResponse($horario);
    }

    /**
     * store
     */
    public function store(CreateRequest $request): HorarioResponse
    {
        $validated = $request->validated();

        $horario = Horario::create($validated);

        return new HorarioResponse($horario);
    }

    /**
     * update
     */
    public function update(UpdateRequest $request, Horario $horario): HorarioResponse
    {
        $validated = $request->validated();
        $horario->update($validated);

        return new HorarioResponse($horario);
    }
}
