<div id="content-page" class="content group">
	<div class="hentry group">
		<h3 class="title_page">Привилегии</h3>

		<form action="{{ route('permissions.store') }}" method="POST">
			{{ csrf_field() }}

			<div class="short-table white">
				<table style="width:100%">
					<thead>
						<th>Привилегии</th>
				
						@if(!$roles->isEmpty())
				
							@foreach($roles as $role)
							
								<th>{{ $role->name }}</th>

							@endforeach
				
						@endif
					</thead>

					<tbody>
						@if(!$permissions->isEmpty())
				
							@foreach($permissions as $permission)
							
								<tr>
									<td>{{ $permission->name }}</td>

									@foreach($roles as $role)
										<td>
											@if($role->hasPermission($permission->name))
												<input checked name="{{ $role->id }}[]" type="checkbox" value="{{ $permission->id }}">
											@else
												<input name="{{ $role->id }}[]" type="checkbox" value="{{ $permission->id }}">
											@endif
										</td>		
									@endforeach	
								</tr>

							@endforeach
				
						@endif
					</tbody>
				</table>
				
			</div>

			<input class="btn btn-the-salmon-dance-3" type="submit" value="Обновить">
		</form>
	</div>
</div>