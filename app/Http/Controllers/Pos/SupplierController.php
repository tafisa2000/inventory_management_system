<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function SupplierAll(){
        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.supplier_all',compact('suppliers'));
    }//end function

    public function SupplierAdd(){
    return view('backend.supplier.supplier_add');
   
    }//end function

     public function SupplierStore(Request $request){
        Supplier::insert([
                'name' => $request->name,   
                'mobile_no' => $request->mobile_no,   
                'email' => $request->email,   
                'address' => $request->address,   
                'created_by' => Auth::user()->id,   
                'updated_at' => Carbon::now(),   

        ]);
        
         $notification = array (
            'message' => 'suplier is inserted successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);


    }//end function


    public function SupplierEdit($id){

        $supplier = Supplier::findOrFail($id);
        
        return view('backend.supplier.supplier_edit',compact('supplier'));
        
    }//end function


    public function SupplierUpdate(Request $request){
$supplier_id = $request->id;
        Supplier::findOrfail($supplier_id)->update([
                'name' => $request->name,   
                'mobile_no' => $request->mobile_no,   
                'email' => $request->email,   
                'address' => $request->address,   
                'updated_by' =>  Auth::user()->id,   
                'updated_at' => Carbon::now(),   

        ]);
        
         $notification = array (
            'message' => 'suplier is updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);


    }//end function


    public function SupplierDelete($id){
        Supplier::findOrFail($id)->delete();
         $notification = array (
            'message' => 'suplier is deleted successfuly',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);

    }//end function
}