<style>
	input[type="radio" i] {
    -webkit-appearance: radio;
}
</style>

<div id="content-page" class="content group">
	<div class="hentry group">
		
		{!! Form::open(['url' => (isset($menu->id)) ? route('menus.update',['menus'=>$menu->id]) : route('menus.store'), 'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}	

		<ul>
			
			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Заголовок:</span>
					<br>
					<span class="sublabel">Заголовок пункта</span><br>
				</label>	

				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('title',isset($menu->title) ? $menu->title : old('title'), ['placeholder' => 'Введите название пункта']) !!}
				</div>
			</li>

			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Родительский пункт меню:</span>
					<br>
					<span class="sublabel">Родитель:</span><br>
				</label>	

				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					{!! Form::select('parent',$menus,isset($menu->parent) ? $menu->parent : null) !!}
				</div>
			</li>

		</ul>		
		
		<h1>Тип меню:</h1>

		<div id="accordion">

			<h3>
				{!! Form::radio('type','customLink',(isset($type) && $type == 'blogLink') ? TRUE : '') !!}
				<span class="label">Пользовательская ссылка</span>	
			</h3>

			<ul>
				<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Путь для ссылки:</span>
					<br>
					<span class="sublabel">Путь для ссылки:</span><br>
				</label>	

				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('title',isset($menu->title) ? $menu->title : old('title'), ['placeholder' => 'Введите название пункта']) !!}
					<!-- {!! Form::text('custom_link',isset($menu->path) ? $menu->path : old('title'), ['placeholder' => 'Введите название пункта'] ) !!} -->
				</div>
			</li>
				<div style="clear: both;"></div>
			</ul>

			<h3>
				{!! Form::radio('type','customLink',(isset($type) && $type == 'blogLink') ? TRUE : '') !!}
				<span class="label">Раздель Блога</span></h3>

				<ul>
					<li class="text-field">
						<label for="name-contact-us">
							<span class="label">Ссылка на категорию блога:</span>
							<br>
							<span class="sublabel">Ссылка на категорию блога:</span><br>
						</label>	

						<div class="input-prepend">

							@if($categories)
								{!! Form::select('category_alias',$categories,isset($category->cat_title) ? $category->cat_title : null) !!}
							@endif
						</div>
					</li>

					<li class="text-field">
						<label for="name-contact-us">
							<span class="label">Ссылка на материал блога:</span>
							<br>
							<span class="sublabel">Ссылка на материал блога:</span><br>
						</label>	

						<div class="input-prepend">
							{!! Form::select('article_alias',$articles) !!}
						</div>
					</li>
			</li>
				</ul>	
			


			<h3>
				{!! Form::radio('type','customLink',(isset($type) && $type == 'blogLink') ? TRUE : '') !!}
				<span class="label">Раздель Портфолио</span>
			</h3>

				<ul>
					<li class="text-field">
						<label for="name-contact-us">
							<span class="label">Ссылка на запись портфолио:</span>
							<br>
							<span class="sublabel">Ссылка на запись портфолио:</span><br>
						</label>	

						<div class="input-prepend">

							{!! Form::select('portfolios_alias',$portfolios) !!}

						</div>
					</li>

					<li class="text-field">
						<label for="name-contact-us">
							<span class="label">Портфолио:</span>
							<br>
							<span class="sublabel">Портфолио:</span><br>
						</label>	

						<div class="input-prepend">
							{!! Form::select('filter_alias',$filters) !!}
						</div>
					</li>
			</li>
				</ul>	
			
		</div>

		<br>

		@if(isset($menu->id))
			<input type="hidden" name="_method" value="PUT">
		@endif

		<ul>
			<li class="submit-button">
				{!! Form::button('Сохранить',['class' => 'btn btn-default','type' => 'submit']) !!}
			</li>
		</ul>
	
	{!! Form::close() !!}


	</div>
</div>

<script>
	
	jQuery(function($) {
    	$("#accordion").accordion();

    		

  });
</script>

