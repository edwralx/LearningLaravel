<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index(){
        $customers = Customer::all();
        /* $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();
 */
        // dd($customers);

        /* return view('customers.index', [
            'activeCustomers' => $activeCustomers,
            'inactiveCustomers'=> $inactiveCustomers
            ]
        ); */

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();
        return view('customers.create', compact('companies', 'customer'));
    }

    public function store(){
        // dd(request('name'));
        // $data = request()->validate([
        //     'name' => 'required|min:3',
        //     'email'=> 'required|email',
        //     'active'=>'required',
        //     'company_id'=>'required'
        // ]);

        // dd($data);

        /* $customer = new Customer();
        $customer->name = request('name');
        $customer->email= request('email');
        $customer->active = request('active');
        $customer->save(); */
        Customer::create($this->validateRequest());
        // return back();
        return redirect( 'customers' );
    }

    public function show(Customer $customer)
    {
        // $customer = Customer::where('id', $customer)->firstOrFail();
        return view('customers.show', compact('customer'));
        // dd($customer);
    }

    public function edit(Customer $customer)
    {
        // dd($customer);
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {
        // $data = request()->validate([
        //     'name' => 'required|min:3',
        //     'email'=> 'required|email',
        //     'active'=>'required',
        //     'company_id'=>'required'
        // ]);

        $customer->update($this->validateRequest());
        return redirect('customers/'.$customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customers');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email'=> 'required|email',
            'active'=>'required',
            'company_id'=>'required'
        ]);
    }
}
