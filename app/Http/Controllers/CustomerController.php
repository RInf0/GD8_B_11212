<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Ticket;

class CustomerController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(){
        //get customer
        $customer = Customer::latest()->paginate(2);
        //render view with posts
        return view('customer.index', compact('customer'));
    }
    /**
     * create
     *
     * @@return void
     */
    public function create(){
        $ticket = Ticket::get();
        return view('customer.create', compact('ticket'));
    }
     /**
     * store
     *
     * @param Request $request * @return void
     */
    public function store(Request $request){
        //Validasi Formulir
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'quantity' => 'required',
            'id_ticket' => 'required'
        ]);

        //Fungsi Simpan Data ke dalam Database
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'quantity' => $request->quantity,
            'id_ticket' => $request->id_ticket
        ]);

        try{
            return redirect()->route('customer.index');
        }catch(Exception $e){
            return redirect()->route('customer.index');
        }
    }
    /**
     * edit
     *
     * @param int $id
     * @return void
     */
    public function edit($id){
        $customer = Customer::find($id);
        $ticket = Ticket::get();
        return view('customer.edit', compact('customer'), compact('ticket'));
    }
    /**
     * update
     *
     * @param mixed $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id){
        $customer = Customer::find($id);
        //validate form
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'quantity' => 'required',
            'id_ticket' => 'required'
        ]);
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'quantity' => $request->quantity,
            'id_ticket' => $request->id_ticket
        ]);
        return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param int $id
     * @return void
     */
    public function destroy($id){
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
