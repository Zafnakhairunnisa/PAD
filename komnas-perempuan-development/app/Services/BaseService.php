<?php

namespace App\Services;

use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class BaseRepository.
 *
 * Modified from: https://github.com/kylenoland/laravel-base-repository
 */
abstract class BaseService
{
    /**
     * The repository model.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * The query builder.
     *
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $query;

    /**
     * Alias for the query limit.
     *
     * @var int
     */
    protected $take;

    /**
     * Alias for the query select.
     *
     * @var string|array
     */
    protected $select;

    /**
     * Array of related models to eager load.
     *
     * @var array
     */
    protected $with = [];

    /**
     * Array of related models to eager load.
     *
     * @var array
     */
    protected $whereHas = [];

    /**
     * Array of related models to eager load count.
     *
     * @var array
     */
    protected $withCount = [];

    /**
     * Array of one or more where clause parameters.
     *
     * @var array
     */
    protected $wheres = [];

    /**
     * Array of one or more where in clause parameters.
     *
     * @var array
     */
    protected $whereIns = [];

    /**
     * Array of one or more where between date parameters.
     *
     * @var array
     */
    protected $whereBetween = [];

    /**
     * Array of one or more ORDER BY column/value pairs.
     *
     * @var array
     */
    protected $orderBys = [];

    /**
     * Array of scope methods to call on the model.
     *
     * @var array
     */
    protected $scopes = [];

    /**
     * Get all the model records in the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(array $columns = ['*'])
    {
        $this->newQuery()->eagerLoad();

        $models = $this->query->get($columns);

        $this->unsetClauses();

        return $models;
    }

    /**
     * Count the number of specified model records in the database.
     *
     * @return int
     */
    public function count()
    {
        return $this->get()->count();
    }

    /**
     * Get the first specified model record from the database.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function first()
    {
        $this->newQuery()->eagerLoad()->setClauses()->setScopes();

        $model = $this->query->first();

        $this->unsetClauses();

        return $model;
    }

    /**
     * Get the first specified model record from the database or throw an exception if not found.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function firstOrFail()
    {
        $this->newQuery()->eagerLoad()->setClauses()->setScopes();

        $model = $this->query->firstOrFail();

        $this->unsetClauses();

        return $model;
    }

    /**
     * Get all the specified model records in the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function get()
    {
        $this->newQuery()->eagerLoad()->setClauses()->setScopes();

        $models = $this->query->get();

        $this->unsetClauses();

        return $models;
    }

    /**
     * Get the specified model record from the database.
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getById($id)
    {
        $this->unsetClauses();

        $this->newQuery()->eagerLoad();

        return $this->query->findOrFail($id);
    }

    /**
     * Get the specified model record from the database.
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getBySlug(string $slug)
    {
        $this->unsetClauses();

        $this->newQuery()->eagerLoad();

        return $this->query->whereSlug($slug);
    }

    /**
     * @param $item
     * @param $column
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getByColumn($item, $column, array $columns = ['*'])
    {
        $this->unsetClauses();

        $this->newQuery()->eagerLoad();

        return $this->query->where($column, $item)->first($columns);
    }

    /**
     * Delete the specified model record from the database.
     *
     * @param $id
     * @return bool|null
     *
     * @throws \Exception
     */
    public function deleteById($id)
    {
        $this->unsetClauses();

        return $this->getById($id)->delete();
    }

    /**
     * Set the query limit.
     *
     * @param  int  $limit
     * @return $this
     */
    public function limit($limit)
    {
        $this->take = $limit;

        return $this;
    }

    /**
     * Set an ORDER BY clause.
     *
     * @param  string  $column
     * @param  string  $direction
     * @return $this
     */
    public function orderBy($column, $direction = 'asc')
    {
        $this->orderBys[] = compact('column', 'direction');

        return $this;
    }

    /**
     * @param  int  $limit
     * @param  array  $columns
     * @param  string  $pageName
     * @param  null  $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($limit = 25, array $columns = ['*'], $pageName = 'page', $page = null)
    {
        $this->newQuery()->eagerLoad()->setClauses()->setScopes();

        $models = $this->query->paginate($limit, $columns, $pageName, $page);

        $this->unsetClauses();

        return $models;
    }

    /**
     * Add a simple where clause to the query.
     *
     * @param  string|array  $column
     * @return $this
     */
    public function select($column = ['*'])
    {
        $this->select = $column;

        return $this;
    }

    /**
     * Add a simple where clause to the query.
     *
     * @param  string  $column
     * @param  string  $value
     * @param  string  $operator
     * @return $this
     */
    public function where($column, $value, $operator = '=')
    {
        $this->wheres[] = compact('column', 'value', 'operator');

        return $this;
    }

    /**
     * Add a simple where clause to the query.
     *
     * @param  string  $column
     * @param  string  $value
     * @param  string  $operator
     * @return $this
     */
    public function whereHas($relations)
    {
        if (is_string($relations)) {
            $relations = func_get_args();
        }

        $this->whereHas = $relations;

        return $this;
    }

    /**
     * Add a simple where in clause to the query.
     *
     * @param  string  $column
     * @param  mixed  $values
     * @return $this
     */
    public function whereIn($column, $values)
    {
        $values = is_array($values) ? $values : [$values];

        $this->whereIns[] = compact('column', 'values');

        return $this;
    }

    /**
     * Add a where between clause to the query.
     *
     * @param  string  $column
     * @param  mixed  $values
     * @return $this
     */
    public function whereBetween($column, $values)
    {
        $values = is_array($values) ? $values : [$values];

        $this->whereBetween[] = compact('column', 'values');

        return $this;
    }

    /**
     * Set Eloquent relationships to eager load.
     *
     * @param $relations
     * @return $this
     */
    public function with($relations)
    {
        if (is_string($relations)) {
            $relations = func_get_args();
        }

        $this->with = $relations;

        return $this;
    }

    /**
     * Set Eloquent relationships to count.
     *
     * @param $relations
     * @return $this
     */
    public function withCount($relations)
    {
        if (is_string($relations)) {
            $relations = func_get_args();
        }

        $this->withCount = $relations;

        return $this;
    }

    /**
     * Create a new instance of the model's query builder.
     *
     * @return $this
     */
    protected function newQuery()
    {
        $this->query = $this->model->newQuery();

        return $this;
    }

    /**
     * Add relationships to the query builder to eager load.
     *
     * @return $this
     */
    protected function eagerLoad()
    {
        foreach ($this->whereHas as $relation) {
            $this->query->whereHas($relation);
        }

        foreach ($this->with as $relation) {
            $this->query->with($relation);
        }

        return $this;
    }

    /**
     * Set clauses on the query builder.
     *
     * @return $this
     */
    protected function setClauses()
    {
        if (isset($this->select) and ! is_null($this->select)) {
            $this->query->select($this->select);
        }

        foreach ($this->withCount as $relation) {
            $this->query->withCount($relation);
        }

        foreach ($this->wheres as $where) {
            $this->query->where($where['column'], $where['operator'], $where['value']);
        }

        foreach ($this->whereIns as $whereIn) {
            $this->query->whereIn($whereIn['column'], $whereIn['values']);
        }

        foreach ($this->whereBetween as $whereBetween) {
            $this->query->whereBetween($whereBetween['column'], $whereBetween['values']);
        }

        foreach ($this->orderBys as $orders) {
            $this->query->orderBy($orders['column'], $orders['direction']);
        }

        if (isset($this->take) and ! is_null($this->take)) {
            $this->query->take($this->take);
        }

        return $this;
    }

    /**
     * Set query scopes.
     *
     * @return $this
     */
    protected function setScopes()
    {
        foreach ($this->scopes as $method => $args) {
            $this->query->$method(implode(', ', $args));
        }

        return $this;
    }

    /**
     * Reset the query clause parameter arrays.
     *
     * @return $this
     */
    protected function unsetClauses()
    {
        $this->wheres = [];
        $this->whereIns = [];
        $this->scopes = [];
        $this->take = null;

        return $this;
    }

    protected function uploadFile(array $files, string $path, ?string $category = 'images')
    {
        $data = [];

        /**
         * @var \Illuminate\Http\UploadedFile|\Illuminate\Http\UploadedFile[]|array|null $file
         */
        foreach ($files as $file) {
            if ($file->isValid()) {
                $options = ['disk' => 'public'];
                $usingS3 = strtolower(config('filesystems.default')) === 's3';
                if ($usingS3) {
                    $options = [];
                }

                $data[] = [
                    'name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'mime' => $file->getMimeType(),
                    'path' => $file->store("$path/$category", $options),
                    'category' => $category,
                ];
            }
        }

        return $data;
    }

    protected function getAllFiles(string $path)
    {
        $files = \Storage::allFiles($path);

        return $files;
    }

    /**
     * Build api query
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Spatie\QueryBuilder\QueryBuilder
     */
    public function api($query = null): QueryBuilder
    {
        return QueryBuilder::for($query ?? $this->model::class);
    }

    public function documents(string $slug)
    {
        $documents = $this->whereHas('images')
            ->with('documents:id,name,size,fileable_id,fileable_type,path,created_at')
            ->getBySlug($slug)
            ->firstOrFail()
            ->documents();

        if (request('order')) {
            $sort = explode(':', request('order'));
            $sortColumn = $sort[0];
            $sortOrder = $sort[1];
            $documents = $documents
                ->orderBy($sortColumn, $sortOrder);
        }

        $documents = $documents
            ->paginate(10)
            ->through(function ($item) {
                $path = url("storage/".$item->path);
                $usingS3 = strtolower(config('filesystems.default')) === 's3';
                if ($usingS3) {
                    $path = \Storage::temporaryUrl($item->path, \Carbon\Carbon::now()->addMinutes(10));
                }
                
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'size' => $item->size,
                    'path' => $path,
                    'is_s3' => $usingS3
                ];
            });

        return $documents;
    }

    public function images(string $slug)
    {
        $images = $this->whereHas('images')
            ->with('images:id,name,size,fileable_id,fileable_type,path,created_at')
            ->getBySlug($slug)
            ->firstOrFail()
            ->images()
            ->paginate(12)
            ->through(function ($item) {
                $path = url("storage/".$item->path);
                $usingS3 = strtolower(config('filesystems.default')) === 's3';
                if ($usingS3) {
                    $path = \Storage::temporaryUrl($item->path, \Carbon\Carbon::now()->addMinutes(10));
                }

                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'size' => $item->size,
                    'path' => $path,
                    'is_s3' => $usingS3
                ];
            });

        return $images;
    }
}
