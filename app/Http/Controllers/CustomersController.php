<?php

namespace App\Http\Controllers;

use App\Events\NewCustomerHasRegisteredEvent;
use App\Mail\WelcomeNewUserMail;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;


class CustomersController extends Controller
{
    /* public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    } */

    public function index(){
        // $customers = Customer::all();
        $customers = Customer::with('company')->paginate();
        // dd($customers->toArray());
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
        $customer = Customer::create($this->validateRequest());
        $this->storeImage($customer);
        event(new NewCustomerHasRegisteredEvent($customer));
        // Mail::to($customer->email)->send(new WelcomeNewUserMail());
        //Register to Newsletter
        // dump('Registered to NewsLetter');
        //Slack notification to the admin
        // dump('Slack notification to the admin');
        // return redirect('contact')->with('message', 'Thanks for your message.  We\'ll be in touch!');
        return redirect( 'customers' )->with('updatemsg', 'Customer details have been Successfully saved!');
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
            $this->storeImage($customer);
        return redirect('customers/'.$customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customers');
    }

    private function validateRequest()
    {
        /* return tap(request()->validate([
            'name' => 'required|min:3',
            'email'=> 'required|email',
            'active'=>'required',
            'company_id'=>'required',
            // 'image'=> 'sometimes|file|image|max:5000',
        ]), function(){
            if(request()->hasFile('image'))
            {
                request()->validate([
                    'image'=>'file|image|max:5000'
                ]);
            }
        }); */
        return request()->validate([
            'name' => 'required|min:3',
            'email'=> 'required|email',
            'active'=>'required',
            'company_id'=>'required',
            'image'=> 'sometimes|file|image|max:5000',
        ]);

    }

    private function storeImage($customer)
    {
        if(request()->has('image')){
            $customer->update([
                'image'=> request()->image->store('uploads', 'public'),
            ]);

            // $image = Image::make(public_path('storage'.$customer->image))-fit(300, 300);
            $image = Image::make(public_path('storage/'.$customer->image))->fit(200,200);
            $image->save();

        }
    }
}
