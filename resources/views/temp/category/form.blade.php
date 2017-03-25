<div class="form-group">
    {!! Form::label('title', 'Title *', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="">Parent Category</label>
    <select class="form-control" name="category_id">
        <option>Chose one</option>
        @foreach ($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
        @endforeach
    </select>
</div>

{!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}
