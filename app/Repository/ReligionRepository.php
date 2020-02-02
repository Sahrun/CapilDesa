<?php

namespace App\Repository;


use App\Religion;

class ReligionRepository 
{

    public function all()
    {
        $result = array();
        $query = Religion::where('is_active',1)->get();
        foreach($query as $key => $value)
        {
            $item = array(
                'id' => $value->id,
                'name' => $value->name,
                'active' => $value->is_active == 1?'Active':'Non-Active',
                'created' => '', 
                'created_at' => date("j F Y , g:i a",strtotime($value->created_at)),
                'midified' => '',
                'modified_at' => $value->updated_at? date("j F Y , g:i a",strtotime($value->updated_at)) : "" 
            );
            array_push($result,$item);
        }
        return $result;
    }

    public function create($data)
    {
       return Religion::create([
                        "name" => $data->name, 
                        "is_active" => $data->is_active,
                        "description" => $data->description,
                        "created_by" => 0, 
                        "modified_by" => 0, 
                        "created_at" => Date("Y-m-d h:i:s")
        ]);
    }
    public function inActive($id)
    {
        
        $religion = Religion::find($id);
        $religion->is_active = 0;
        return $religion->save();
    }

    public function getById($id)
    {
        return Religion::find($id);
    }
}
