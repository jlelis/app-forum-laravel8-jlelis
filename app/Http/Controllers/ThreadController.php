<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    private $thread;

    public function __construct(Thread $thread)
    {
        $this->thread = $thread;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = $this->thread->paginate(15);

        return view('threads.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->thread->create($request->all());
            dd('criado com sucesso!');


        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thread = $this->thread->find($id);
        return view('threads.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {

        try {
            $thread = $this->thread->find($thread->id);
            $thread->update($request->all());
            dd('update com sucesso!');


        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        try {
            $thread = $this->thread->find($thread->id);
            $thread->delete();
            dd('delete com sucesso!');


        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
