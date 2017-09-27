<div class="container">

    {!! Form::open(['action' => 'QuestionController@index', 'class' => 'form-signin']) !!}
    <h2 class="form-signin-heading">Add question</h2>
    <div class="form-group">
        {!! Form::label('inputName', 'Name', ['class' => 'sr-only']) !!}
        {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Name', 'autofocus' => 'autofocus', 'id' => 'inputName']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Email', 'Email') !!}
        {!! Form::text('author_email', null, ['class' => 'form-control','placeholder' => 'Email']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Theme', 'Theme') !!}
        {!! Form::select('Theme', $them, null, ['class' => 'form-control', 'style' => 'height: 60px', 'value' => 1]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Name question', 'Name question') !!}
        {!! Form::textarea('question',null, ['class' => 'form-control', 'rows'=>3]) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Add question', ['class' => 'btn btn-lg btn-primary btn-block', 'type'=>'submit']) !!}
    </div>
    {!! Form::close() !!}

</div> <!-- /container -->
