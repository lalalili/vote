<?php

namespace Luxgen\Repository;

use App\Models\Photo;
use Auth;
use DB;
use Response;

class PhotoRepository
{

    protected $photo;

    /**
     * EmployeeRepository constructor.
     * @param Photo $photo
     */
    public function __construct(Photo $photo)
    {
        $this->photo = $photo;
    }

    public function choose($type)
    {
        //dd($type);
        switch ($type) {
            case 'la':
                $area = '北智捷';
                break;
            case 'lb':
                $area = '桃智捷';
                break;
            case 'lc':
                $area = '中智捷';
                break;
            case 'ld':
                $area = '南智捷';
                break;
            case 'le':
                $area = '高智捷';
                break;
            case 'luxgen':
                $area = '納智捷汽車';
                break;
        }

        if (isset($area)) {
            $lists = DB::table('photos')
                ->leftjoin('titles', 'photos.title_id', '=', 'titles.id')
                ->leftjoin('albums', 'photos.album_id', '=', 'albums.id')
                ->select('photos.name as name', 'titles.name as title',
                    'albums.name as album', 'albums.type as type', 'photos.id as id')
                ->where('albums.area', $area)
                ->orderBy('photos.album_id', 'asc')->get();
        } else {
            if (Auth::user()->hasRole('admin')) {
                $lists = DB::table('photos')
                    ->leftjoin('titles', 'photos.title_id', '=', 'titles.id')
                    ->leftjoin('albums', 'photos.album_id', '=', 'albums.id')
                    ->select('photos.name as name', 'titles.name as title',
                        'albums.name as album', 'albums.type as type', 'photos.id as id')
                    ->orderBy('photos.album_id', 'asc')->get();
            } else {
                die();
            }
        }
        return $lists;
    }
}
