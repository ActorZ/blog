@extends('layouts.manage')

@section('content')
	<div class="flex-container">
		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Manage Users</h1>
			</div>
			<div class="column">
				<a href="{{route('users.create')}}" class="button is-primary"><i class="fa fa-user-add m-r-10"></i>Create New User</a>
			</div>
		</div>
		<hr class="m-t-10">
		<div class="card">
		    <div class="card-content">
				<table class="table is-narrow is-striped">
					<thead>
						<tr>
							<th>id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Date Created</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<th>{{$user->id}}</th>
							<th>{{$user->name}}</th>
							<th>{{$user->email}}</th>
							<th>{{$user->created_at->toFormattedDateString()}}</th>
							<th class="has-text-right">
								<a class="button is-outlined is-primary" href="{{route('users.show',$user->id)}}">View</a>
								<a class="button is-outlined" href="{{route('users.edit',$user->id)}}">Edit</a>
								<a class="button is-danger" href="{{route('users.destroy',$user->id)}}">Delete</a>
							</th>
						</tr>
						@endforeach
					</tbody>
				</table>
		    </div>
		</div>
		{{$users->links()}}
	</div>
@endsection