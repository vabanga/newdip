<?php

namespace App\Http\Controllers;

use App\Question;
use App\Theme_Question;
use Carbon\Carbon;
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
        return view('page.forms');
    }

    public function addQuest(Request $request){



        $this->validate($request, [
            'name' => 'required|string|max:255',
            'author_email' => 'required|string|email|max:255',
            'question' => 'required|string|max:255'
        ]);
        $input = $request->all();
        $q = $input['question'];
        $n = $input['name'];
        $e = $input['author_email'];
        $arrq = [
            'name' => $q,
            'author' => $n,
            'author_email' => $e,
            'answer' => ''
        ];

        Question::create($arrq);
        $id_questions = Question::all();
        foreach ($id_questions as $id_question){
            list('id'=>$id[])=$id_question;
        }
        $id = array_pop($id);

        $input['published_at'] = Carbon::now();
        array_push($input,$id);
        $r = [
            'theme_id'=>$input['Theme'],
            'question_id'=>$input[0]
        ];

        $r['published_at'] = Carbon::now();
        Theme_Question::create($r);

        return redirect('/');
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
