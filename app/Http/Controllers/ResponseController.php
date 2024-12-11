<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResponseRequest;
use App\Http\Requests\UpdateResponseRequest;
use App\Models\Answer;
use App\Models\Form;
use App\Models\Response;
use Illuminate\Support\Str;

class ResponseController extends Controller
{
    public function index()
    {
        return view("admin.form.responses");
    }
    
    public function seeResponses($form_id)
    {
        // $form = Form::with('questions')->with('responses')->findOrFail($form_id);
        $form = Form::with('questions')->findOrFail($form_id);
        return view('admin.form.response', ['form' => $form]);
    }

    public function getAll()
    {
        $responses = Response::with('form')->latest()->get()->groupBy('form_id');

        return response()->json([
            'statusCode' => 200,
            'data' => $responses
        ]);
    }

    public function getOne($form_id)
    {
        // Ambil responses beserta answers dan questions
        $responses = Response::with(['answers.question']) // Memuat answers dan relasi ke questions
                            ->where('form_id', $form_id)
                            ->latest()
                            ->get()
                            ->groupBy('question_id'); // Mengelompokkan responses berdasarkan question_id

        return response()->json([
            'statusCode' => 200,
            'data' => $responses
        ]);
    }

    
    public function toggleClose($formId)
    {
        $form = Form::findOrFail($formId);
        $form->update(['open' => !$form->open]);
        $message = $form->open ? 'Form dibuka' : 'Form ditutup';
        return response()->json([
            'statusCode' => 200,
            'data' => $message
        ]);
    }
    
    

    // User ------------------------------------------------


    public function create($formId)
    {
        $form = Form::with('questions')->with('event')->findOrFail($formId);

        if (!$form->open) {
            return view('cusioner.closed', ['event_id' => $form->event->id]);
        }
        $responseToken = Str::uuid();
        return view('cusioner.responses.create', compact('form', 'responseToken'));
    }

    public function store(StoreResponseRequest $request)
    {
        $questions = Form::findOrFail($request->form_id)->questions;
        $answers = [];

        $response = Response::create([
            'form_id' => $request->form_id
        ]);
        $i = 0;
        
        foreach ($request->question_ as $answer) {
            $answer = Answer::create([
                'response_id' => $response->id,
                'question_id' => $questions[$i]->id,
                'value' => $answer,
            ]);
            $answers[] = $answer;
            $i++;
        }
        $event_id = Form::findOrFail($request->form_id)->event->id;
        return redirect()->route('responses.completed', ['event_id' => $event_id]);
    }

    public function cuisionerComplete($event_id)
    {
        return view('cusioner.complete', compact('event_id'));
    }
}