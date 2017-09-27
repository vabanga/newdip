<?php
namespace App\Http\Controllers;

use App\Question;
use App\Theme;
use App\Theme_Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListThemeController extends Controller
{
    public function index()
    {
        return view('page.pageIndexInterface.listTheme');
    }

    public function more()
    {
        return view('page.pageIndexInterface.listThemeMore');
    }
    public function moreTheme(Request $request)
    {
        $input = $request->all();
        if(!empty($input['More']))
        {
            $theme = $input['Theme'];

            return redirect("/admin/listTheme/more/$theme");
        }
        if(!empty($input['Delete']))
        {
            $theme = $input['Theme'];

            $quest = DB::table('theme_questions')
                ->join('themes','theme_questions.theme_id','=','themes.id')
                ->join('questions','theme_questions.question_id','=','questions.id')
                ->select('themes.name as theme', 'questions.name as questions', 'questions.id as questions_id')
                ->where('themes.name', '=', "$theme")->pluck('questions');

            $questCount = DB::table('theme_questions')
                ->join('themes','theme_questions.theme_id','=','themes.id')
                ->join('questions','theme_questions.question_id','=','questions.id')
                ->select('themes.name as theme', 'questions.name as questions', 'questions.id as questions_id')
                ->where('themes.name', '=', "$theme")->count();
            $questCount--;

            $quest_id = DB::table('theme_questions')
                ->join('themes','theme_questions.theme_id','=','themes.id')
                ->join('questions','theme_questions.question_id','=','questions.id')
                ->select('themes.name as theme', 'questions.name as questions', 'questions.id as questions_id')
                ->where('themes.name', '=', "$theme")->pluck('questions_id');

            for ($k = 0; $k <= $questCount; $k++)
            {
                Theme_Question::where('question_id', '=', "$quest_id[$k]")->delete();
            }

            for ($k = 0; $k <= $questCount; $k++)
            {
                Question::where('name', '=', "$quest[$k]")->delete();
            }

            Theme::where('name', '=', "$theme")->delete();
            return redirect("/admin/listTheme");
        }
    }
    public function themeMore(Request $request)
    {
        dd($request->all());
    }
}
