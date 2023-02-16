<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class Registrationcontroller extends Controller
{
    //
    public function index()
    {
        
        return view('form2');
    }
    public function index2()
    {
        return view('loginpg');
    }

    public function index3()
    {
        return view('home'); 
    }

    public function login(Request $request) {
        if($request->session()->get('status'))
        {
            return redirect('/register/home');
        }
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email =$request['email'];
        $password = $request['password'];   
        $password = md5($password);
        $customer = Customer::where('email', $email)->where('password', $password)->first();
        if ($customer) {
            // Store the customer details in a session
            // Redirect to the home page 
            session(['status' => 'active']);
            return redirect('/register/home');
        } else {
            // Show an error message and redirect back to the login page
            $request->session()->flash('error', 'Email or password is incorrect');
            return redirect('/register/login');
        }       
    }
    public function logout(Request $request)
    {     
          $request->Session()->flush();
        return redirect('/');
    }
    public function register(Request $request){
        $request->validate(
                [
                    'name'=>'required',
                    'email'=>'required|email',
                    // 'password'=>'required|confirmed',
                    'address'=>'required',
                    'city'=>'required',
                    'country'=>'required',
                    'dob'=>'required',
                     'password'=>'required',
                    'confirm_password'=>'required|same:password'
                ]
        );
        // echo "<pre>";
        // print_r($request->all());
        //inserting in database
        $customer = new Customer;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender=$request['gend'];
        $customer->address=$request['address'];
        $customer->state=$request['state'];
        $customer->country=$request['country'];
        $customer->dob=$request['dob'];
        $customer->password=md5($request['password']);
        $customer->city=$request['city'];
        $customer->save();
        return redirect('/register/view');
    }
    public function view()
    {
        $customers = Customer::get();
        $data = compact('customers');
        return view('customer-view')->with($data);
    }
    public function delete($id)
    {       
        $customer = Customer::find($id);
        if($customer)
        {
            $customer->delete();
        }
        return redirect('register/view');     
    }
    public function edit($id)
    {
        $customer = Customer::find($id);
        if(is_null($customer))
        {
            return redirect('register');
        }
        else {
            //$title = " Update Customer ";
            $url = url('/register/update')."/".$id ;
            $data = compact('customer','url');
            return view('form')->with($data);
        }
    }
    public function update($id,Request $request){

        $customer = Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender=$request['gend'];
        $customer->address=$request['address'];
        $customer->state=$request['state'];
        $customer->country=$request['country'];
        $customer->dob=$request['dob'];
        $customer->password=md5($request['password']);
        $customer->city=$request['city'];
        $customer->save();
        return redirect('/register/view');
    }
}
