<div class="row" style="margin-top:2rem">
	@foreach($comments as $c)
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<p style="font-size:1.6rem">"{{ $c->body }}"</p>
				<p style="font-size:1.6rem">by <b>{{ $c->name or 'anon' }}</b></p>
			</div>
			@if(!\Auth::guest())
			<div class="panel-footer">
				<div class="row">
					<div class="col-sm-2">
						@if($c->approved == true)
						<button class="btn btn-sm btn-success" disabled>Approved</button>
						@else
						<a href="{{ route('comment.approve', $c->id) }}" class="btn btn-sm btn-info">Approve</a>
						@endif
					</div>
					<div class="col-sm-2">
						{!! Form::open([
							'method' => 'DELETE',
							'route' => ['comment.destroy', $c->id]
						]) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
						{!! Form::close() !!}
					</div>
					<div class="col-sm-8 text-right">{{ $c->created_at->toFormattedDateString() }}</div>
				</div>
			</div>
			@endif
		</div>
	</div>
	@endforeach
</div>
