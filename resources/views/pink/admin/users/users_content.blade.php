@if($users)
<div class="id content-page" class="content-group">
		<div class="hentry-group">
			<h2>Пользователи</h2>
			<div class="short-table white">
				<table style="width:100%;" cellspacing = "0" cellpadding = "0">
					
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Login</th>
							<th>Role</th>
							<th>Удалить</th>
						</tr>
					</thead>	
					<tbody>
						@foreach($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{!! Html::link(route('users.edit',['users' => $user->id]),$user->name) !!}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->login }}</td>
								<td>{{ $user->roles->implode('name',', ') }}</td>
								<td>
									{!!Form::open(['url' => route('users.destroy',['users' => $user->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
										{{ method_field('DELETE') }}
										{!! Form::button('Удалить',['class'=> 'btn btn-french-5','type'=>'submit' ]) !!}
									{!! Form::close() !!}	
								</td>
							
							</tr>
						@endforeach
					</tbody>
					
				</table>
				<a href="{{ route('users.create') }}"><button class="btn btn-primary">Добавить</button></a>
			</div>
		</div>	
	</div>
@endif