<?php

use App\User;

$admins = User::all();


foreach ($admins as $admin){
    list('name'=>$k[]) = $admin;
    list('id'=>$id[]) = $admin;
}
$nameAd = array_combine($id,$k);




?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Template for Bootstrap</title>

    <link href="{{asset('css/signin.css')}}" rel="stylesheet">
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
    <li class="dropdown navbar-brand">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <ul class="dropdown-menu" role="menu">
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="listAdmin.html">List admins</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listTheme.html">List themes</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <main class="col">
            <h1>List admins</h1>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Admins</th>
                        <th>Create date</th>
                        <th>Update date</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $admin)
                        <tr>
                            <td><?=$admin->name?></td>
                            <td><?=$admin->created_at?></td>
                            <td><?=$admin->updated_at?></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <h1>Create admins</h1>
            <div class="form-control">
                {!! Form::open(['action' => 'CreateAdminController@create','class' => 'form-signin']) !!}
                <div class="form-group">
                    {!! Form::label('Name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Name', 'autofocus' => 'autofocus']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Email', 'Email') !!}
                    {!! Form::email('email', null, ['class' => 'form-control','placeholder' => 'Email']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Password', 'Password') !!}
                    {!! Form::text('password',null, ['class' => 'form-control','placeholder' => 'Password']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Create admin', ['class' => 'btn btn-success btn-lg btn-block', 'type'=>'submit', 'name' => 'Create']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="form-control">
                <a href="{{action('AdminController@index')}}" class="btn btn-success btn-lg btn-block">Change password</a>
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