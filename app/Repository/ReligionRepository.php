<?php

namespace App\Repository;


use App\Religion;
use App\Helper\Principal;
use App\Helper\FilterBuilder;

class ReligionRepository 
{

    public $principal;

    function __construct(Principal $_principal) {
        $this->principal = $_principal;
    }

    public function all($request)
    {
        $data = array();
        $query = Religion::where('is_active',1);

        $filter_builder = new FilterBuilder;
        $result = $filter_builder->filterBuilder($query,$request);

        foreach($result['data'] as $key => $value)
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
            array_push($data,$item);
        }
        $result['data'] = $data;
        return $result;
    }

    public function create($data)
    {
       return Religion::create([
                        "name" => $data->name, 
                        "is_active" => 1,
                        "description" => $data->description,
                        "created_by" => $this->principal->principalUser(), 
                        "modified_by" => $this->principal->principalUser(), 
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

    public function update($id,$data)
    {
        $religion = Religion::find($id);
        $religion->name = $data->name;
        $religion->description = $data->description;
        $religion->modified_by = $this->principal->principalUser();
        $religion->updated_at = Date("Y-m-d h:i:s") ;
        return $religion->save();

    }
}
