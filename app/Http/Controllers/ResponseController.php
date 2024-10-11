<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResponseRequest;
use App\Http\Requests\UpdateResponseRequest;
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
        $responses = Response::with('question')->where('form_id', $form_id)
                        ->latest()->get()->groupBy('question_id');

        return response()->json([
            'statusCode' => 200,
            'data' => $responses
        ]);
    }

    

    // User ------------------------------------------------


    public function create($formId)
    {
        $form = Form::with('questions')->with('event')->findOrFail($formId);
        $responseToken = Str::uuid();
        return view('cusioner.responses.create', compact('form', 'responseToken'));
    }

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
}