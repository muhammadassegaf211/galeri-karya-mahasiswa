<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Karya
{
    /**
     * Get path to the JSON file.
     */
    protected static function getJsonPath(): string
    {
        if (File::exists(base_path('karya.json'))) {
            return base_path('karya.json');
        }

        return resource_path('data/karya.json');
    }

    /**
     * Retrieve all works from the JSON data source.
     *
     * @return Collection
     */
    public static function all(): Collection
    {
        $path = static::getJsonPath();

        if (!File::exists($path)) {
            return collect();
        }

        $json = File::get($path);
        $data = json_decode($json, true);

        if (!is_array($data)) {
            return collect();
        }

        return collect($data)->map(function ($item) {
            return (object) $item;
        });
    }

    /**
     * Find a work by its ID.
     *
     * @param int|string $id
     * @return object|null
     */
    public static function find($id): ?object
    {
        return static::all()->first(function ($item) use ($id) {
            return (string) $item->id === (string) $id;
        });
    }

    /**
     * Find a work by its ID or throw a 404 exception.
     *
     * @param int|string $id
     * @return object
     * @throws NotFoundHttpException
     */
    public static function findOrFail($id): object
    {
        $karya = static::find($id);

        if (!$karya) {
            throw new NotFoundHttpException('Karya tidak ditemukan.');
        }

        return $karya;
    }

    /**
     * Get unique categories.
     *
     * @return Collection
     */
    public static function categories(): Collection
    {
        return static::all()->pluck('kategori')->unique()->values();
    }

    /**
     * Get related works (from the same category, excluding current).
     *
     * @param int|string $id
     * @param int $limit
     * @return Collection
     */
    public static function related($id, int $limit = 3): Collection
    {
        $current = static::find($id);

        if (!$current) {
            return collect();
        }

        // Prioritize works from same category, fallback to others
        $sameCategory = static::all()
            ->filter(fn($item) => (string) $item->id !== (string) $id && $item->kategori === $current->kategori);

        if ($sameCategory->count() < $limit) {
            $otherCategory = static::all()
                ->filter(fn($item) => (string) $item->id !== (string) $id && $item->kategori !== $current->kategori);
            $combined = $sameCategory->merge($otherCategory);
            return $combined->take($limit);
        }

        return $sameCategory->take($limit);
    }

    /**
     * Get overall statistics.
     *
     * @return array
     */
    public static function stats(): array
    {
        $all = static::all();
        return [
            'total_karya' => $all->count(),
            'total_kategori' => static::categories()->count(),
            'total_mahasiswa' => $all->pluck('mahasiswa')->unique()->count(),
            'total_apresiasi' => $all->sum('apresiasi_count') ?: 750,
        ];
    }
}
