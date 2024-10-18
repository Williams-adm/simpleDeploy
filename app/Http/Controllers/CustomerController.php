<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request){
        $perPage = $request->get('per_page', 15);
        $discount = Customer::paginate($perPage);
        return new CustomerCollection($discount);
    }

    public function store(StoreCustomerRequest $request){
        Customer::create($request->all());
        return response()->json(['message' => "El cliente a sido creado"], 201);
    }

    public function show(Customer $customer){
        return new CustomerResource($customer);
    }
    public function update(UpdateCustomerRequest $request, Customer $customer){
        $customer->update($request->all());
        return response()->json(['message' => "El cliente con el id {$customer->id} ha sido actualizado"], 200);
    }

    public function destroy(Customer $customer){
        $customer->delete();
        return response()->json(['message' => "El cliente con el id {$customer->id} ha sido eliminado"], 200);
    }
}
