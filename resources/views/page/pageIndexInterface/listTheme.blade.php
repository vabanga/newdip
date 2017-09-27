<?php
use Illuminate\Support\Facades\DB;
use App\Theme_Question;
use App\Theme;

$themes = App\Theme::all();

foreach ($themes as $theme){
    list('name'=>$k[]) = $theme;
    list('id'=>$id[]) = $theme;
}
$them = array_combine($k,$k);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Admin</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="listAdmin.html">List admins</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="listTheme.html">List themes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout">LogOut</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <main class="col">
            <h1>List themes</h1>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Questions</th>
                        <th>Questions public</th>
                        <th>Unanswered questions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($themes as $theme)
                    <tr>
                        <td><?=$theme->name?></td>
                        <td><?php echo $countQuest = App\Theme_Question::join('themes','theme_questions.theme_id','=','themes.id')
                                ->join('questions','theme_questions.question_id','=','questions.id')
                                ->select('themes.name as theme', 'questions.name as questions', 'questions.answer as answer','questions.status as status')->where('themes.name', '=', "$theme->name")->count();?></td>
                        <td><?php echo $countQP = App\Theme_Question::join('themes','theme_questions.theme_id','=','themes.id')
                                ->join('questions','theme_questions.question_id','=','questions.id')
                                ->select('themes.name as theme', 'questions.name as questions', 'questions.answer as answer','questions.status as status')->where('themes.name', '=', "$theme->name")->where('questions.status', '=', 'public')->count();?>
                        </td>
                        <td><?php echo $countQUn = App\Theme_Question::join('themes','theme_questions.theme_id','=','themes.id')
                                ->join('questions','theme_questions.question_id','=','questions.id')
                                ->select('themes.name as theme', 'questions.name as questions', 'questions.answer as answer','questions.status as status')->where('themes.name', '=', "$theme->name")->where('questions.status', '=', 'unanswered')->count();?>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <h1>Theme more</h1>
            <div class="form-control">
                {!! Form::open(['action' => 'ListThemeController@moreTheme','class' => 'form-signin']) !!}
                <div class="form-group">
                    {!! Form::label('Theme', 'Theme') !!}
                    {!! Form::select('Theme', $them, null, ['class' => 'form-control', 'style' => 'height: 60px', 'value' => 1]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('More', ['class' => 'btn btn-info btn-lg btn-block', 'type'=>'submit', 'name' => 'More']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-lg btn-block', 'type'=>'submit', 'name' => 'Delete']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <h1>Create theme</h1>
            <div class="form-control">
                {!! Form::open(['action' => 'ListThemeCreateController@create','class' => 'form-signin']) !!}
                <div class="form-group">
                    {!! Form::label('Name theme', 'Name theme') !!}
                    {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Name', 'autofocus' => 'autofocus']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Create theme', ['class' => 'btn btn-success btn-lg btn-block', 'type'=>'submit', 'name' => 'Create']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>