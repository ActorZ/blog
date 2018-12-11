@extends('layouts.manage')

@section('content')
	<div class="flex-container">
		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Create New User</h1>
			</div>
			
		</div>
		<hr/>

		<div class="columns">
			<div class="column">
				<form action="{{route('users.store')}}" method="POST">
					{{csrf_field()}}
					<div class="field">
						<label for="name" class="label">Name:</label>
						<input type="text" name="name" class="input" id="name">
					</div>
					<div class="field">
						<label for="email" class="label">Email:</label>
						<input type="email" name="email" class="input" id="email">
					</div>
					<div class="field">
						<label for="password" class="label">Password:</label>
						<input type="password" name="password" class="input" id="password" v-if="!auto_password">
						<b-checkbox class="m-t-15" name="auto_generate"  v-model="auto_password"> Auto Generate Password </b-checkbox>
					</div>

					<button class="button is-success">Create User</button>
				</form>
		    </div>
	    </div>
	</div> <!-- end of .flex-container -->
@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        auto_password: true
        
      }
    });
  </script>
@endsection