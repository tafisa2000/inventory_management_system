<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class CustomerController extends Controller
{
    public function CustomerAll(){
          $customers = Customer::latest()->get();
          return view('backend.customer.customer_all',compact('customers'));
    } //End method

    public function CustomerAdd(){
         return view('backend.customer.customer_add');
        
    }//End method

    public function CustomerStore(Request $request){
        $image = $request->file('customer_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(100,100)->save('upload/customer/'.$name_gen);
        
        $save_url = 'upload/customer/'.$name_gen;

         Customer::insert([
                'name' => $request->name,   
                'mobile_no' => $request->mobile_no,   
                'email' => $request->email,   
                'address' => $request->address,   
                'customer_image' =>$save_url,   
                'created_by' => Auth::user()->id,   
                'updated_at' => Carbon::now(),   

        ]);

        $notification = array (
            'message' => 'Customer is inserted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);

        
    }//End method

    public function CustomerEdit($id){
        $customer = Customer::findOrFail($id);
        return view('backend.customer.customer_edit',compact('customer'));
        
    }//End method

    public function CustomerUpdate(Request $request){
        
        $customer_id = $request->id;
        if($request->file('customer_image')){

              $image = $request->file('customer_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(100,100)->save('upload/customer/'.$name_gen);
        
        $save_url = 'upload/customer/'.$name_gen;

         Customer::findOrFail($customer_id )->update([
                'name' => $request->name,   
                'mobile_no' => $request->mobile_no,   
                'email' => $request->email,   
                'address' => $request->address,   
                'customer_image' =>$save_url,   
                'created_by' => Auth::user()->id,   
                'updated_at' => Carbon::now(),   

        ]);

        $notification = array (
            'message' => 'Customer is updated successfuly with image',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);



            
        } else{
             Customer::findOrFail($customer_id )->update([
                'name' => $request->name,   
                'mobile_no' => $request->mobile_no,   
                'email' => $request->email,   
                'address' => $request->address,   
                // 'customer_image' =>$save_url,   
                // 'created_by' => Auth::user()->id,   
                'updated_by' =>Auth::user()->id,  

        ]);

        $notification = array (
            'message' => 'Customer is updated successfuly without an image',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);

            
        }
        
    }

    public function CustomerDelete($id){
          Customer::findOrFail($id)->delete();
         $notification = array (
            'message' => 'customer is deleted successfuly',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);

    }
}