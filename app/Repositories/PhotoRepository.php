<?php namespace app\Repositories;

use App\Models\Photo;
use Bosnadev\Repositories\Eloquent\Repository;
use Schema;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PhotoRepository extends Repository
{
    /**
    * Configure the Model
    *
    **/
    public function model()
    {
        return 'App\Models\Photo';
    }

    public function search($input)
    {
        $query = Photo::query();

        $columns = Schema::getColumnListing('photos');
        $attributes = array();

        foreach ($columns as $attribute) {
            if (isset($input[$attribute]) and !empty($input[$attribute])) {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] = $input[$attribute];
            } else {
                $attributes[$attribute] =  null;
            }
        }

        return [$query->get(), $attributes];
    }

    public function apiFindOrFail($id)
    {
        $model = $this->find($id);

        if (empty($model)) {
            throw new HttpException(1001, "Photo not found");
        }

        return $model;
    }

    public function apiDeleteOrFail($id)
    {
        $model = $this->find($id);

        if (empty($model)) {
            throw new HttpException(1001, "Photo not found");
        }

        return $model->delete();
    }
}
