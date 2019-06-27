<div class="id content-page" class="content-group">
		<div class="hentry-group">
			<h2>Меню</h2>
			<div class="short-table white">
				<table style="width:100%;" cellspacing = "0" cellpadding = "0">
					
					<thead>
						<tr>
							<th>Name</th>
							<th>Link</th>
							<th>Удалить</th>
						</tr>
					</thead>	
					@if($menus)
						@include(env('THEME').'.admin.menus.custom-menu-items',array('items' => $menus->roots(), 'paddingLeft' => ''))
					@endif
					
				</table>
				<a href="{{ route('articles.create') }}"><button class="btn btn-primary">Добавить</button></a>
			</div>
		</div>	
	</div>
