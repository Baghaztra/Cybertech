<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResponseRequest;
use App\Http\Requests\UpdateResponseRequest;
use App\Models\Form;
use App\Models\Response;
use Illuminate\Support\Str;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($formId)
    {
        // Ambil form berdasarkan formId
        $form = Form::with('questions')->with('event')->findOrFail($formId);
        $responseToken = Str::uuid();
        // Tampilkan view untuk mengisi form
        return view('cusioner.responses.create', compact('form', 'responseToken'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResponseRequest $request)
    {
        // kode untuk mengelompokkan record
        // $response_code = now()->timestamp .'_'. Str::random(10);
        $response_code = $request->response_token;
        $form_id = $request->form_id;
        $questions = Form::findOrFail($form_id)->questions;
        $answers = [];
        $i = 0;
        // return $request->question_;
        foreach ($request->question_ as $response) {
            $answer = Response::create([
                'form_id' => $form_id,
                'question_id' => $questions[$i]->id,
                'answer' => $response,
                'response_code' => $response_code,
            ]);
            $answers[] = $answer;
            $i++;
        }
        $event_id = Form::findOrFail($form_id)->event->id;
        $event_id = Form::findOrFail($form_id)->event->id;
        return redirect()->route('responses.completed', ['event_id' => $event_id]);
    }

    public function cuisionerComplete($event_id)
    {
        return view('cusioner.complete', compact('event_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Response $response)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResponseRequest $request, Response $response)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Response $response)
    {
        //
    }
}