<?php

namespace App\Http\Controllers;
use App\Models\UserJob;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\BlogModel;
use DB;

class BlogController extends Controller
{
    use ApiResponser;
    private $request;
    
     
    public function __construct(Request $request)
    {
        $this->request = $request;
        
    }


    public function getUsers()
    {
        $users =  DB::connection('mysql')
        ->select("Select * from tbluser");

        return $this->successResponse($users);
    }


    public function index()
    {
        $users = BlogModel::all();

        return $this->successResponse($users);
    }


    public function add(Request $request)
    {
        $rules = [

            'username' => 'required|max:20',
            'password' => 'required|max:20',
            'jobid' => 'required|numeric|min:1|not_in:0'

        ];


        $this->validate($request, $rules);
        $userjob = UserJob::findOrFail($request->jobid);
        $users = BlogModel::create($request->all());
        return $this->successResponse($users, Response::HTTP_CREATED);

    }


    public function show($id)
    {
        $users = BlogModel::findOrFail($id);
            return $this->successResponse($users);


    }
    
    public function update(Request $request, $id)
    {

        $rules = [

            'username' => 'max:20',
            'password' => 'max:20',
            'jobid' => 'required|numeric|min:1|not_in:0'

        ];

        $this->validate($request, $rules);
        $userjob = UserJob::findOrFail($request->jobid);
        $users = BlogModel::findOrFail($id);

        $users->fill($request->all());
       
        if($users->isClean()){
            return $this->errorResponse("At least one value must change", Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    
        {
           $users->save();
           return $this->successResponse($users);

    }
}

    public function delete($id)
    {
        $users = BlogModel::where('id', $id)->first();
            $users->delete();

            return $this->successResponse($users);
        }
    

    








    
}