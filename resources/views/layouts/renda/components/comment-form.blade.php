<div class="row">
  <div class="col-xs-12 text-left">
    <h3>{{ $title }}</h3>

    {!! Form::open(['route' => ['comment.store', $post->id]]) !!}
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('site', 'Site', ['class' => 'control-label']) !!}
          {!! Form::text('site', null, ['class' => 'form-control']) !!}
        </div>
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('email', 'Email *', ['class' => 'control-label']) !!}
      {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('body', 'Comment *', ['class' => 'control-label']) !!}
      {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 5]) !!}
    </div>

    {!! Form::submit('Save comment', ['class' => 'btn btn-primary pull-right', 'required' => 'required']) !!}

    {!! Form::close() !!}
  </div>
</div>
