<?php

namespace App\Helper;


class FilterBuilder
{

public $sparator = "/";

 public function filterBuilder($centralData,$filterUri){

    $response = array(
                'data' => null,
                'pages' => null,
                'count' => null
    );
    
    $centralData = $centralData->newQuery();

     if(isset($filterUri->field))
     {
       $fields  = explode(",",$filterUri->field);

       if(count($fields) !== 0){

        $centralData->where($this->generateFilter($fields));

       }
     }

      if(isset($filterUri->order_by))
    {
        $order = isset($filterUri->order)?$filterUri->order:'asc';
        $centralData->orderBy($filterUri->order_by, $order);
    }

    $result = $centralData;
    $count = count($result->get());
    $pages =  ceil($count / $filterUri->show);

     if(isset($filterUri->page) && $filterUri->page > 0)
     {
       if(isset($filterUri->show))
       {
        $centralData->offset(($filterUri->page * $filterUri->show));
       }
    
       else
       {
        $centralData->offset($filterUri->page);
       }
     }

     
    if(isset($filterUri->show))
    {
      $centralData->limit($filterUri->show);
    }

    $response['data'] = $centralData->get();
    $response['pages'] = $pages;
    $response['count'] = $count;
    

    return $response;    
 }

 public function generateFilter($fields){
    $result = array();

    foreach($fields as $key => $value)
    {
            $field = array();
            if(isset($value)){

              $row = explode($this->sparator,$value);
              array_push($field,$row[0]);
              array_push($field,$this->operation($row[1]));
              array_push($field,$row[1] == "like" ? $row[2]."%":$row[2]);
          
             array_push($result,$field);
           }
    } 
  return $result;
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