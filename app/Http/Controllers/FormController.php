<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Models\Form;

use function PHPUnit\Framework\isEmpty;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.form.create');
    }

    public function all(){
        return response()->json([
            'statusCode' => 200,
            'data' => Form::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormRequest $request)
    {
        // Validasi data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'event_id' => 'required',
            'description' => 'nullable|string',
            'questions' => 'required|array',
            'questions.*.question_text' => 'required|string',
            'questions.*.question_type' => 'required|string'
        ]);

        // Simpan form
        $form = Form::create([
            'title' => $request->title,
            'description' => $request->description,
            'event_id' => $request->event_id,
        ]);

        // Simpan pertanyaan
        foreach ($request->questions as $questionData) {
            $question = $form->questions()->create([
                'question_text' => $questionData['question_text'],
                'question_type' => $questionData['question_type'],
            ]);

            // Simpan opsi jika ada
            if (count($questionData['options'])!=1) {
                foreach ($questionData['options'] as $optionText) {
                    $question->options()->create(['option_text' => $optionText]);
                }
            }
        }

        return response()->json(data: ['statusCode' => 200, 'message'=>"success create form ". $form->title."!"], status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        return response()->json([
            'statusCode'=>200,
            'data'=>$form->with(['questions', 'questions.options', 'questions.answer'])->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormRequest $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)
    {
        //
    }
}