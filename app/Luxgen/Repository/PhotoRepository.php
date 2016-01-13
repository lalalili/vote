<?php

namespace Luxgen\Repository;

use App\Models\Photo;
use Auth;
use DB;

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

        if ($type == 'la') {
            $area = '北智捷';
        } elseif ($type == 'lb') {
            $area = '桃智捷';
        } elseif ($type == 'lc') {
            $area = '中智捷';
        } elseif ($type == 'ld') {
            $area = '南智捷';
        } elseif ($type == 'le') {
            $area = '高智捷';
        } elseif ($type == 'luxgen') {
            $area = '納智捷汽車';
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

        //dd($lists);
        //return view('admin.choose', compact('lists'));
        $data = array();
        foreach ($lists as $list) {
            $data [] = (array)$list;
        }
        //dd(Response::json($data));
        return $data;
    }
}
