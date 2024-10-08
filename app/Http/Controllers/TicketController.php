<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(){
        //get ticket
        $ticket = Ticket::latest()->paginate(5);
        //render view with posts
        return view('ticket.index', compact('ticket'));
    }
    /**
     * create
     *
     * @@return void
     */
    public function create(){
        $movie = Movie::get();
        return view('ticket.create', compact('movie'));
    }
    /**
     * store
     *
     * @param Request $request * @return void
     */
    public function store(Request $request){
        //Validasi Formulir
        $this->validate($request, [
            'class' => 'required',
            'price' => 'required',
            'id_movie' => 'required'
        ]);

        //Fungsi Simpan Data ke dalam Database
        Ticket::create([
            'class' => $request->class,
            'price' => $request->price,
            'id_movie' => $request->id_movie
        ]);

        try{
            return redirect()->route('ticket.index');
        }catch(Exception $e){
            return redirect()->route('ticket.index');
        }
    }
    /**
     * edit
     *
     * @param int $id
     * @return void
     */
    public function edit($id){
        $ticket = Ticket::find($id);
        $movie = Movie::get();
        return view('ticket.edit', compact('ticket'), compact('movie'));
    }
    /**
     * update
     *
     * @param mixed $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id){
        $ticket = Ticket::find($id);
        //validate form
        $this->validate($request, [
            'class' => 'required',
            'price' => 'required',
            'id_movie' => 'required'
        ]);
        $ticket->update([
            'class' => $request->class,
            'price' => $request->price,
            'id_movie' => $request->id_movie    
        ]);
        return redirect()->route('ticket.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param int $id
     * @return void
     */
    public function destroy($id){
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect()->route('ticket.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
