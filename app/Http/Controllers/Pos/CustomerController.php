<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;
use App\Models\Payment;
use App\Models\PaymentDetail;

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

    public function CreditCustomer(){
        $alldata = Payment::WhereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.customer.customer_credit',compact('alldata'));
    }

    public function CreditCustomerPrintPdf(){
          $alldata = Payment::WhereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.pdf.customer_credit_pdf',compact('alldata'));
         
    }

    public function CustomerEditInvoice($invoice_id){

        $payment = Payment::where('invoice_id',$invoice_id)->first();
        return view('backend.customer.edit_customer_invoice',compact('payment'));

    }// End Method

    public function CustomerUpdateInvoice(Request $request,$invoice_id){
        if($request->new_paid_amount < $request->paid_amount) {
             $notification = array (
            'message' => 'sorry you paid maximum value',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

        }else{
                   $payment = Payment::where('invoice_id',$invoice_id)->first();
            $payment_details = new PaymentDetail();
            $payment->paid_status = $request->paid_status;

            if ($request->paid_status == 'full_paid') {
                 $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
                 $payment->due_amount = '0';
                 $payment_details->current_paid_amount = $request->new_paid_amount;

            } elseif ($request->paid_status == 'partial_paid') {
                $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
                $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
                $payment_details->current_paid_amount = $request->paid_amount;

            }

            $payment->save();
            $payment_details->invoice_id = $invoice_id;
            $payment_details->date = date('Y-m-d',strtotime($request->date));
            $payment_details->updated_by = Auth::user()->id;
            $payment_details->save();

              $notification = array(
            'message' => 'Invoice Update Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('credit.customer')->with($notification); 
        }
        
    }

    public function CustomerInvoiceDetails($invoice_id){
        $payment = Payment::where('invoice_id',$invoice_id)->first();
        return view('backend.pdf.invoice_details_pdf',compact('payment'));
        
    }

    public function PaidCustomer(){
        $alldata = Payment::where('paid_status','!=','full_due')->get();
        return view('backend.customer.customer_paid',compact('alldata'));
    }

    public function PaidCustomerPrintPdf(){
          $alldata = Payment::where('paid_status','!=','full_due')->get();
        return view('backend.pdf.customer_paid_pdf',compact('alldata'));
        
    }

    public function CustomerWiseReport(){
        $customers = Customer::all();
        return view('backend.customer.customer_wise_report',compact('customers'));
    }

    public function CustomerWiseCreditReport(Request $request){
          $alldata = Payment::where('customer_id',$request->customer_id)->whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.pdf.customer_wise_credit_pdf',compact('alldata'));
        
        
    }

    public function CustomerWisePaidReport(Request $request){
         $alldata = Payment::where('customer_id',$request->customer_id)->where('paid_status','!=','full_due')->get();
        return view('backend.pdf.customer_wise_paid_pdf',compact('alldata'));
    }
} 