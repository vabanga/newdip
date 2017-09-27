<?php

use Illuminate\Support\Facades\DB;
use App\Theme;
use App\Theme_Question;


$themes = App\Theme::all();

foreach ($themes as $theme){
    list('name'=>$them[]) = $theme;
    list('id'=>$id[]) = $theme;
}
array_unshift ($them, ''); unset ($them[0]);
$them = array_combine($id,$them);



$tabJoin = App\Theme_Question::join('themes','theme_questions.theme_id','=','themes.id')
            ->join('questions','theme_questions.question_id','=','questions.id')
            ->select('themes.name as theme', 'questions.name as questions', 'questions.answer as answer')->get();


?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{asset('css/reset.css')}}"> <!-- CSS reset -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}"> <!-- Resource style -->
    <script src="{{asset('js/modernizr.js')}}"></script> <!-- Modernizr -->
    <title>FAQ</title>
</head>
<body>
<header>
    <h1>FAQ</h1>
</header>
<a href="{{action('QuestionController@index')}}">Задать вопрос</a>
<section class="cd-faq">
    @include('page.pageIndexFAQ.mnu')

    @include('page.pageIndexFAQ.questions')
</section> <!-- cd-faq -->
<script src="{{asset('js/jquery-2.1.1.js')}}"></script>
<script src="{{asset('js/jquery.mobile.custom.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script> <!-- Resource jQuery -->
</body>
</html>