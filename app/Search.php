<?php

namespace App;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Search
{
    protected Collection $terms;

    public function __construct(string $search)
    {
        $this->terms = collect(explode(' ', $search))
            ->map(fn (string $word) => Str::of($word)
                ->replace('*', '%')
                ->trim()
                ->prepend('%')
                ->append('%')
            );
    }

    public function getResults(): Collection
    {
        return $this->queryEvents()
            ->union($this->queryTypicalFoods())
            ->union($this->queryPartners())
            ->union($this->queryTouristSpots())
            ->get()
            ->map(function ($result) {
                $result->url = match($result->type) {
                    'Eventos' => route('web.event.show', [$result->id, Str::slug($result->name)]),
                    'Comidas Típicas' => route('web.typicalfood.show', [$result->id, Str::slug($result->name)]),
                    'Parceiros' => route('web.partner.show', [$result->id, Str::slug($result->name)]),
                    'Pontos Turísticos' => route('web.touristspot.show', [$result->id, Str::slug($result->name)]),
                };

                return $result;
            });
    }

    private function queryEvents(): Builder
    {
        return $this->appendSearchTermsTo(
            DB::table('events')
                ->where('status', 'Aprovado')
                ->select(
                    'id',
                    'name',
                    'description',
                    DB::raw('"Eventos" as type')
                ),
            ['name', 'description', 'subtitle', 'address']
        );
    }

    private function queryTypicalFoods(): Builder
    {
        return $this->appendSearchTermsTo(
            DB::table('typical_foods')
                ->select(
                    'id',
                    DB::raw('name as title'),
                    DB::raw('description as body'),
                    DB::raw('"Comidas Típicas" as type')
                ),
            ['name', 'description']
        );
    }
    private function queryPartners(): Builder
    {
        return $this->appendSearchTermsTo(
            DB::table('partners')
                ->select(
                    'id',
                    DB::raw('name as title'),
                    DB::raw('description as body'),
                    DB::raw('"Parceiros" as type')
                ),
            ['name', 'description', 'address']
        );
    }
    private function queryTouristSpots(): Builder
    {
        return $this->appendSearchTermsTo(
            DB::table('tourist_spots')
                ->select(
                    'id',
                    DB::raw('name as title'),
                    DB::raw('description as body'),
                    DB::raw('"Pontos Turísticos" as type')
                ),
            ['name', 'description', 'address']
        );
    }

    private function appendSearchTermsTo(Builder $builder, array $attributes): Builder
    {
        $this->terms->each(function (string $term) use ($builder, $attributes) {
            $builder->where(function ($builder) use ($term, $attributes) {
                collect($attributes)
                    ->each(fn ($attribute) => $builder->orWhere($attribute, 'like', $term));
            });
        });

        return $builder;
    }



}
