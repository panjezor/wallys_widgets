<?php


namespace App\Repositories;


use App\Models\Pack;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class PackRepository
 *
 * @package App\Repositories
 */
class PackRepository
{
    /**
     * @param bool $onlyActive
     *
     * @return Collection
     */
    public function getAll($onlyActive = true): Collection
    {
        $query = Pack::query();
        $query = $onlyActive ? $query->active() : $query;
        return $query->get();
    }

    /**
     * @param $id
     *
     * @return Pack|null
     */
    public function getById($id):Pack|null
    {
        return Pack::query()->find($id);

    }

}
