<?php

namespace App\Http\Controllers\Api;

use App\Repository\ReligionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\General\FilterBuilder;

class ReligionController extends Controller
{
    public $successStatus = 200;
    public $success ="OK";
    public $religion;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(ReligionRepository $_religion) {
        $this->religion = $_religion;
    }

    public function index(Request $request)
    {
       ///$religion = new Religion();
        // $filter = new FilterBuilder();
        // $resut = $filter->filterBuilder($warga,$request);
         return $this->religion->all($request);
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $result = $this->religion->create($request);
        return response()->json(['success'=> $this-> success,'data' =>  $result  ], $this-> successStatus);
    }

    public function delete($id)
    {
        $result = $this->religion->inActive($id);
        return response()->json(['success'=> $this-> success,'data' =>  $result  ], $this-> successStatus);
    }

    public function getById(Request $request){
        
        $result = $this->religion->getById($request->id);
        return response()->json(['success'=> $this-> success,'data' =>  $result  ], $this-> successStatus);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->religion->update($id,$request);
        return response()->json(['success'=> $this-> success], $this-> successStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
   public function existingNIK($NIK)
   {
    $existing = Warga::isExist($NIK);
    return response()->json(['success'=> $this->success, 'data'=> $existing ], $this-> successStatus); 
   }
   
}