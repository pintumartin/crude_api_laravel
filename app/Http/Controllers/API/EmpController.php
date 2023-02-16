<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Customer;
use App\Http\Resources\Customer as CustomerResource;
   
class EmpController extends BaseController
{
    public function index()
    {
        $blogs = Customer::all();
        return $this->sendResponse(CustomerResource::collection($blogs), 'Posts fetched.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name'=>'required',
            'email'=>'required|unique:customers', 
            'gender'=>'required',
            'address'=>'required',
            'state'=>'required',
            'country'=>'required',
            'dob'=>'required',
            'password'=>'required',
            'city'=>'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $input['password'] = md5($input['password']);   
        $blog = Customer::create($input);
        return $this->sendResponse(new CustomerResource($blog), 'Post created.');
    }
   
    public function search($name)
    {
        $a=Customer::where("name",$name)->get();
        if ($a == '[]')
            return $this->sendError("not found");
        else
            return $this->sendResponse($a,'post fetched');
    }
    
    public function update(Request $request,$id)
 {   
    $blog = Customer::find($id);
    $input = $request->all();
    if(is_null($blog) || (!array_key_exists("email", $input) || ($input['email']!=$blog->email))) {
        return $this->sendError("Email not found or Email doesn't match with the existing one.");
    } 
    if(array_key_exists("name", $input) && $input['name']!="")
        $blog->name = $input['name'];
    if(array_key_exists("gender", $input) && $input['gender']!="")
        $blog->gender=$input['gender'];
    if(array_key_exists("address", $input) && $input['address']!="")
        $blog->address=$input['address'];
    if(array_key_exists("state", $input) && $input['state']!="")
        $blog->state=$input['state'];
    if(array_key_exists("country", $input) && $input['country']!="")
        $blog->country=$input['country'];
    if(array_key_exists("dob", $input) && $input['dob']!="")
        $blog->dob=$input['dob'];
    if(array_key_exists("city", $input) && $input['city']!="")    
        $blog->city=$input['city'];
    $blog->save();
    return $this->sendResponse(new CustomerResource($blog), 'Post updated.');
}

    public function destroy($id)
    {   $blog = Customer::find($id);
        $blog->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}