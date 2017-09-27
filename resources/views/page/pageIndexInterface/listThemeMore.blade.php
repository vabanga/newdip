<?php
use App\Theme_Question;

$getTheme = $_GET;


$publics = App\Theme_Question::join('themes','theme_questions.theme_id','=','themes.id')
    ->join('questions','theme_questions.question_id','=','questions.id')
    ->select('themes.name as theme',
        'questions.name as questions',
        'questions.author as author',
        'questions.status as status',
        'questions.created_at as create',
        'questions.updated_at as update')->where('themes.name', '=', "$getTheme")->where('questions.status', '=', 'public')->get();

$hiddens = App\Theme_Question::join('themes','theme_questions.theme_id','=','themes.id')
    ->join('questions','theme_questions.question_id','=','questions.id')
    ->select('themes.name as theme',
        'questions.name as questions',
        'questions.author as author',
        'questions.status as status',
        'questions.created_at as create',
        'questions.updated_at as update')->where('themes.name', '=', "$getTheme")->where('questions.status', '=', 'hidden')->get();
$unanswereds = App\Theme_Question::join('themes','theme_questions.theme_id','=','themes.id')
    ->join('questions','theme_questions.question_id','=','questions.id')
    ->select('themes.name as theme',
        'questions.name as questions',
        'questions.author as author',
        'questions.status as status',
        'questions.created_at as create',
        'questions.updated_at as update')->where('themes.name', '=', "$getTheme")->where('questions.status', '=', 'unanswered')->get();

$questsP = App\Theme_Question::join('themes','theme_questions.theme_id','=','themes.id')
    ->join('questions','theme_questions.question_id','=','questions.id')
    ->select('themes.name as theme',
        'questions.name as questions',
        'questions.id as questions_id',
        'questions.author as author',
        'questions.status as status',
        'questions.created_at as create',
        'questions.updated_at as update')->where('themes.name', '=', "$getTheme")->where('questions.status', '=', 'public')->get();

foreach ($questsP as $quest){
    list('questions'=>$questin[]) = $quest;
    list('questions_id' =>$id[]) = $quest;
}
$questP = array_combine($id,$questin);






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
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Admin</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="adminPanel.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listAdmin.html">List admins</a>
            </li>
            <li class="nav-item">
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
            <h1><?=$getTheme?> more</h1>

            <h2>Status:public</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Create</th>
                        <th>Update</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($publics as $public)
                    <tr>
                        <td><?=$public->questions?></td>
                        <td><?=$public->author?></td>
                        <td><?=$public->create?></td>
                        <td><?=$public->update?></td>
                        <td><a href="" class="btn btn-primary">Hidden</a></td>
                        <td><a href="" class="btn btn-info">Change</a></td>
                        <td><a href="" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <h1>Theme more</h1>
                <?php /* КАК МНЕ ОБРАДОТАТЬ ЭТУ ФОРМУ? */?>
                <div class="form-control">
                    {!! Form::open(['class' => 'form-signin']) !!}
                    <div class="form-group">
                        {!! Form::label('Theme', 'Theme') !!}
                        {!! Form::select('Theme', $questP, null, ['class' => 'form-control', 'style' => 'height: 60px', 'value' => 1]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Hidden', ['class' => 'btn btn-primary btn-lg btn-block', 'type'=>'submit', 'name' => 'Hidden']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Change', ['class' => 'btn btn-info btn-lg btn-block', 'type'=>'submit', 'name' => 'Change']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-lg btn-block', 'type'=>'submit', 'name' => 'Delete']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <h2>Status:hidden</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Create</th>
                        <th>Update</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hiddens as $hidden)
                        <tr>
                            <td><?=$hidden->questions?></td>
                            <td><?=$hidden->author?></td>
                            <td><?=$hidden->create?></td>
                            <td><?=$hidden->update?></td>
                            <td><a href="" class="btn btn-success">Public</a></td>
                            <td><a href="" class="btn btn-info">Change</a></td>
                            <td><a href="" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <h1>Theme more</h1>
                <div class="form-control">
                    {!! Form::open(['class' => 'form-signin']) !!}
                    <div class="form-group">
                        {!! Form::label('Theme', 'Theme') !!}
                        {!! Form::select('Theme', [], null, ['class' => 'form-control', 'style' => 'height: 60px', 'value' => 1]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('More', ['class' => 'btn btn-info btn-lg btn-block', 'type'=>'submit', 'name' => 'More']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-lg btn-block', 'type'=>'submit', 'name' => 'Delete']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <h2>Status:Unanswered</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Create</th>
                        <th>Update</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($unanswereds as $unanswered)
                        <tr>
                            <td><?=$unanswered->questions?></td>
                            <td><?=$unanswered->author?></td>
                            <td><?=$unanswered->create?></td>
                            <td><?=$unanswered->update?></td>
                            <td><a href="" class="btn btn-success">Answer and public</a></td>
                            <td><a href="" class="btn btn-success">Answer and hidden</a></td>
                            <td><a href="" class="btn btn-info">Change</a></td>
                            <td><a href="" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <h1>Theme more</h1>
                <div class="form-control">
                    {!! Form::open(['class' => 'form-signin']) !!}
                    <div class="form-group">
                        {!! Form::label('Theme', 'Theme') !!}
                        {!! Form::select('Theme', [], null, ['class' => 'form-control', 'style' => 'height: 60px', 'value' => 1]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('More', ['class' => 'btn btn-info btn-lg btn-block', 'type'=>'submit', 'name' => 'More']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-lg btn-block', 'type'=>'submit', 'name' => 'Delete']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
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