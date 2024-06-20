<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnswerRequest $request)
    {
        $data = $request->validated();
        $answer = Answer::create($data);
        $subject = $answer->subject;
        return redirect()->route('subject.show', ['subject' => $subject]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {
        $this->authorize('update', $answer);

        // $user = Formation::orderBy("name","asc")->get();
        // $subject = Group::orderBy('name','asc')->get();
        return view('answer.edit', [
            'answer' => $answer, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnswerRequest $request, Answer $answer)
    {
        $this->authorize('update', $answer);
        $data = $request->validated();
        // la méthode fill est possible grâce à la variable fillable dans le model. 
        $answer->fill($data);
        $answer->save();

        return redirect()->route('subject.show', $answer->subject);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        
    }
}
