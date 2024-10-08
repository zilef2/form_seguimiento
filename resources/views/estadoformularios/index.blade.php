@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('estadoformularios.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>nombre</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($estadoformularios as $estadoformulario)

				<tr>
					<td>{{ $estadoformulario->id }}</td>
					<td>{{ $estadoformulario->nombre }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('estadoformularios.show', [$estadoformulario->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('estadoformularios.edit', [$estadoformulario->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['estadoformularios.destroy', $estadoformulario->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
