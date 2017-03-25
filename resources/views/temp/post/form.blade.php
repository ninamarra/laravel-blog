<div class="form-group">
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('subtitle', 'Subtitle', ['class' => 'control-label']) !!}
    {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="category_id" class="control-label">Category</label>
    <select class="form-control" name="category_id">
        <option>Chose one</option>
        @foreach ($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="body" class="control-label">Body</label>
    <textarea class="form-control" rows="6" name="body"></textarea>
</div>

{!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}
