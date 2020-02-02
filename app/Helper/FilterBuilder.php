<?php

namespace App\Helper;


class FilterBuilder
{

public $sparator = "/";

 public function filterBuilder($centralData,$filterUri){

    $response = array(
                'data' => null,
                'pages' => null
    );
    
    $centralData = $centralData->newQuery();

    //  if(isset($filterUri->filter))
    //  {
    //    $filter  = explode(",",$filterUri->filter);

    //    if(count($filter) !== 0){

    //     $centralData->where($this->generateFilter($filter));

    //    }
    //  }

    //  if(isset($filterUri->page))
    //  {
    //    if(isset($filterUri->count))
    //    {
    //     $centralData->offset(($filterUri->page * $filterUri->count));
    //    }
    //    else
    //    {
    //     $centralData->offset($filterUri->page);
    //    }
    //  }

    //  if(isset($filterUri->count))
    //  {
    //    $centralData->limit($filterUri->count);
    //  }

    $result = $centralData->get();
    $pages =  ceil(count($result) / $filterUri->show);

    $response['data'] = $result;
    $response['pages'] = $pages;

    return $response;    
 }

 public function generateFilter($filters){
    $filterResult = array();

    foreach($filters as $key => $value)
    {
            $filter = array();
            if(isset($value)){

              $row = explode($this->sparator,$value);
              array_push($filter,$row[0]);
              array_push($filter,$this->operation($row[1]));
              array_push($filter,$row[1] == "like" ? $row[2]."%":$row[2]);
          
             array_push($filterResult,$filter);
           }
    } 
  return $filterResult;
} 
   
public function operation($oprt) {

  $result = "";
  
  switch ($oprt) {
    case "equal":
      $result = "=";
    break;
    case "like":
      $result = "like";
    break;
    default:
    $result = "=";
  }

  return $result;

}

}