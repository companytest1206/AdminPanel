<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Product;
use App\Customer;
use App\Invoice;
use App\User;
use auth;
use View;
use Carbon;
use League\Flysystem\Adapter\Local;
use Log;
use Mail;
use App\Jobs\SendEmailJob;

class ProductController extends Controller
{
    public function index()
	{
		$products = DB::table('product')->paginate(5);
		//dd($products);
		return view('Product.products', compact('products'));
	}
	public function create()
	{						
		return view('Product.create');
	}
	
	public function store(Request $request)
	{
			$messages = [
				'prod_name.required' => 'Product name is required',        
				'prod_name.regex' => 'Product name has invalid format',    
				'prod_description.required' => 'Product description is required',
				'prod_price.required' => 'Product price is required',
				'prod_price.integer' => 'Product price should be numeric value only',
			];
		
			$request->validate([
				'prod_name' => 'required|regex:/^[a-zA-Z ]*$/|string|max:255',
				'prod_description' => 'required|string|max:255',
            	'prod_price' => 'required|integer',
			], $messages);	
		
			$p = new Product();
			
    		$p->prod_name = $request->prod_name;
    		$p->prod_description = $request->prod_description;	
    		$p->prod_price = $request->prod_price;		
			$p->save();
		
	\LogActivity::addToLog('Admin added product successfully');		
	$request->session()->flash('alert-success', 'Admin added product successfully !!!');
	return redirect('/products');
	}
	public function edit(Request $request)
	{	
		//dd($request->prod_id);
		$product = Product::find($request->prod_id);
		
		return view('Product.edit', compact('product'));
	}
	public function update(Request $request)
	{
		$product = Product::find($request->prod_id);
		$messages = [
				'prod_name.required' => 'Product name is required',        
				'prod_name.regex' => 'Product name has invalid format',    
				'prod_description.required' => 'Product description is required',
				'prod_price.required' => 'Product price is required',
				'prod_price.integer' => 'Product price should be numeric value only',				
			];
		
			$request->validate([
				'prod_name' => 'required|regex:/^[a-zA-Z ]*$/|string|max:255',
				'prod_description' => 'required|string|max:255',
            	'prod_price' => 'required|integer',
			], $messages);	
		
			$product->prod_name = $request->prod_name;
    		$product->prod_description = $request->prod_description;
    		$product->prod_price = $request->prod_price;
			$product->save();
		
	\LogActivity::addToLog('Admin updated product successfully');		
	$request->session()->flash('alert-warning', 'Admin updated product successfully !!!');
	return redirect('/products');
	}
	
	public function delete(Request $request)
	{
		//dd($request->cid);
		$product = Product::find($request->prod_id);
		$product->delete();
		
		\LogActivity::addToLog('Admin deleted product successfully');	
		$request->session()->flash('alert-danger', 'Admin deleted product successfully !!!');
   		return redirect('/products');
	}
	
	public function invoice()
	{
		return view('invoice');
	}
	
	public function autoComplete(Request $request) 
	{
        $query = $request->get('term','');
        
        $products=Product::where('prod_name','LIKE','%'.$query.'%')->pluck('prod_name');
 
		//return $query;
		return response()->json($products);
    }
	
	public function autoCompleteName(Request $request) 
	{
        $query = $request->get('term','');
        
        $customers=Customer::where('name','LIKE','%'.$query.'%')->pluck('name');

		return response()->json($customers);
    }
	
	public function customerdata(Request $request)
	{
		$name = $request->get('name');
		$address = Customer::where('name',$name)->pluck('address');
		return response()->json($address);
           //return $name;
	}
	
	public function productdata(Request $request)
	{
		$name = $request->get('name');
		$product = DB::table('product')->select('prod_description','prod_price')->where('prod_name',$name)->get()->toArray();
		return response()->json($product);
           //return $name;
	}
	
	public function generateInvoice(Request $request)
	{
		$messages = [
				'cust_name.required' => 'Customer name is required',        
				'cust_name.regex' => 'Customer name has invalid format',     
				'address.required' => 'Product name is required',                
				'product_qty.required' => 'Product quantity is required',
				'price.required' => 'Product Price is required',
				'subtotal.required' => 'Product sub-total is required',
				'total.required' => 'Product total is required',
			];
		
			$request->validate([
				'cust_name' => 'required|regex:/^[a-zA-Z ]*$/|string|max:255',
				'product_name' => 'required|max:255',
				'address' => 'required|string|max:255',
            	'price' => 'required',
            	'product_qty' => 'required',
            	'subtotal' => 'required',
            	'total' => 'required',
			], $messages);	
		
		//dd($request);
		$inv = new Invoice();	
		$customer = Customer::where('name',$request->cust_name)->get();
		$admin = User::find(Auth::user()->id);
		//dd($admin->name);
    	$inv->cust_id = $customer[0]->cust_id;		
		$inv->prod_name = $request->product_name ? implode(",", $request->product_name) : '';
		$inv->prod_qty = $request->product_qty ? implode(",", $request->product_qty) : '';
		if(is_numeric($request->tax))
		{
			$tax = $request->tax ? implode(",", $request->tax) : '';
		}
		$inv->prod_price = $request->price ? implode(",", $request->price) : '';
		$inv->prod_description = $request->product_description ? implode(",", $request->product_description) : '';
		$inv->sub_total = $request->subtotal ? implode(",", $request->subtotal) : '';
		$inv->total = $request->total;
	
		$inv->save();
		
	$id = DB::getPdo()->lastInsertId();
	//print_r($invoice); exit();
//	$pn = explode(",", $invoice->prod_name);
//	$pq = explode(",", $invoice->prod_qty);
//	$pp = explode(",", $invoice->prod_price);
//	if(!is_numeric($request->tax))
//	{
//		$tax = $request->tax ? explode(",", $invoice->tax) : '';
//	}
//	$subt = explode(",", $invoice->sub_total);
//	$t = explode(",", $invoice->total);
	\LogActivity::addToLog('Admin created customer invoice successfully');		
	$request->session()->flash('alert-success', 'Admin created customer invoice successfully !!!');
	return view('finalInvoice', compact('request','customer','admin','id'));
		
	}
	
	public function getInvoice(Request $request)
	{
		$invoice = DB::table('customer')->join('invoice','invoice.cust_id','customer.cust_id')->where('name',$request->name)->get()->toArray();
		//dd($invoice);
		if($invoice == [])
		{		
			$request->session()->flash('alert-danger', 'Sorry we dont have any invoice data stored for this customer!!!');
			return redirect('/invoice');
		}
		$admin = User::find(Auth::user()->id);
		return view('finalInvoice', compact('invoice','admin'));
	}
	
	public function printInvoice(Request $request)
	{
			//dd($request->id);
		$invoice = Invoice::find($request->id);	
		//dd($invoice->prod_name);
		$customer = Customer::find($invoice->cust_id);
		$admin = User::find(Auth::user()->id);

	return view('invoice-print', compact('invoice','customer','admin'));
		
	}
	
	
	public function pdfview(Request $request)
    {
        $invoice = Invoice::find($request->id);	
		//dd($invoice->prod_name);
		$customer = Customer::find($invoice->cust_id);
		$admin = User::find(Auth::user()->id);
		//dd($product);
		
        view()->share('invoice',$invoice);
        view()->share('customer',$customer);
        view()->share('admin',$admin);

        if($request->has('download')){
			// Set extra option
			//dd(base_path().'\vendor\league\flysytem\src\Adapter\Local');
			$view = View('invoicepdf');
			//        	$pdf = PDF::loadHTML($view->render());
			//			//dd(storage_path().'\pdfs'.'\invoice'.$invoice->inv_id.'.pdf');
			//			$pdf->save(storage_path().'\app'.'\pdfs'.'\invoice'.$invoice->inv_id.'.pdf');
			//          return $pdf->download('invoice'.$invoice->inv_id.'.pdf');
		
			//$pdf = \App::make('snappy.pdf.wrapper');
			$pdf = PDF::loadHTML($view->render());
			$pdf->save('invoice'.$invoice->inv_id.'.pdf', new Local(storage_path().'\app\pdfs'));
			return $pdf->download();
        }
		else{

			$view = View('invoicepdf');

			$pdf = PDF::loadHTML($view->render());
      		return $pdf->stream();
		}
        //return view('invoicepdf');
    }
	
	public function sendEmail(Request $request, $email, $id)
    {
//		$invoice = Invoice::find($id);
//		//dd($invoice[0]->cust_id);
//		$customer = Customer::find($invoice->cust_id);
//		
//		$admin = User::find(Auth::user()->id);
//		view()->share('invoice',$invoice);
//		view()->share('customer',$customer);
//        view()->share('admin',$admin);
		//dd($email);
		$data=['id'=>$id,'email'=>$email];
       $emailjob = (new SendEmailJob($data))->delay(60 * 5);
	   dispatch($emailjob);
       $request->session()->flash('alert-success', 'Invoice send in email successfully !!!');
		return redirect('/invoice');
    }
}
