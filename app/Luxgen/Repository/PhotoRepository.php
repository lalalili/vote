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
            $lists = DB::table('new_employees')
                ->select('name', 'title', 'location', 'type', 'identity')
                ->where('area', $area)
                ->orderBy('location', 'asc')->get();
        } else {
            if (Auth::user()->hasRole('admin')) {
                $lists = DB::table('new_employees')
                    ->select('name', 'title', 'location', 'type', 'identity')
                    ->orderBy('identity', 'asc')->get();
            } else {
                die();
            }
        }
        return $lists;
    }
}
