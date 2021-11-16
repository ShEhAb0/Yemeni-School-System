<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
           'question' => 'required',
           'mark' => 'required',
           'correct' => 'required',
           'answer' => 'required',
        ]);


        $question = new Question();
        $question->title = $request->question;
        $question->choice_1 = $request->answer[0];
        $question->choice_2 = $request->answer[1];
        $question->choice_3 = $request->answer[2];
        $question->choice_4 = $request->answer[3];
        $question->correct_answer = $request->correct;
        $question->mark = $request->mark;
        $question->exam_id = $request->questionExamId;
        $question->save();

        return redirect('/teacher/exam')->withSuccess('New Question has been added successfully..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'question' => 'required',
            'mark' => 'required',
            'correct' => 'required',
            'answer' => 'required',
        ]);


        $question = Question::find($id);
        $question->title = $request->question;
        $question->choice_1 = $request->answer[0];
        $question->choice_2 = $request->answer[1];
        $question->choice_3 = $request->answer[2];
        $question->choice_4 = $request->answer[3];
        $question->correct_answer = $request->correct;
        $question->mark = $request->mark;
        $question->exam_id = $request->questionExamId;
        $question->save();

        return redirect('/teacher/exam')->withSuccess('Question has been updated successfully..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
