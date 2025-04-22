<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todolist;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todolists = todolist::orderBy('deadline')->get();
        return view('tasks.index', compact('todolists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'judul' => 'required',
                'deskripsi' => 'nullable',
                'proritas' => 'required|in:priority,non-priority',
                'status' => 'nullable|in:pending,in-progress, completed',
                'deadline' => 'required',
            ]);

            \App\Models\todolist::create($validated);

            return redirect()->route('tasks.index')->with('success', 'Berhasil membuat tugas!');
        }catch(\Exception $e){
            return redirect()->route('tasks.index')->with('error', 'Gagal membuat tugas!' .$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $task = todolist::findOrFail($id);
        // return view(compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = todolist::findOrFail($id);
        return view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $validated = $request->validate([
                'judul' => 'nullable',
                'deskripsi' => 'nullable',
                'proritas' => 'nullable',
                'status' => 'nullable',
                'deadline' => 'nullable',
            ]);

            $task = todolist::findOrFail($id);
            $task->update($validated);

            return redirect()->route('tasks.index')->with('success', 'Berhasil memperbarui tugas!');
        }catch(\Exception $e){
            return redirect()->route('tasks.index')->with('error', 'Gagal memperbarui tugas!' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        todolist::destroy($id);
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
    
    public function updateStatus(Request $request, $id)
    {
        $data = [
            'status' => $request->status
        ];
        todolist::where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Berhasil mengubah status');
    }

}
