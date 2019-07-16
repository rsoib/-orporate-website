<style>
	input[type="radio" i] {
    -webkit-appearance: radio;
}
</style>

<div id="content-page" class="content group">
	<div class="hentry group">

		@if(count($errors) > 0)
          <div class="box error-box">
           @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
          </div>
      	@endif
		
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
				{!! Form::radio('type','customLink',(isset($type) && $type == 'customLink') ? TRUE : FALSE) !!}
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
					
					{!! Form::text('custom_link',isset($menu->path) ? $menu->path : old('title'), ['placeholder' => 'Введите название пункта'] ) !!} 
				</div>
			</li>
				<div style="clear: both;"></div>
			</ul>

			<h3>
				{!! Form::radio('type','blogLink',(isset($type) && $type == 'blogLink') ? TRUE : FALSE) !!}
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
								{!! Form::select('category_alias',$categories,(isset($option) && $option) ? $option : FALSE) !!}
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
							{!! Form::select('article_alias',$articles,(isset($option) && $option) ? $option : FALSE) !!}
						</div>
					</li>
			</li>
				</ul>	
			


			<h3>
				{!! Form::radio('type','portLink',(isset($type) && $type == 'portLink') ? TRUE : FALSE) !!}
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

							{!! Form::select('portfolios_alias',$portfolios,(isset($option) && $option) ? $option : FALSE) !!}

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
    	$("#accordion").accordion({

    		activate: function(e, obj) {
    			obj.newPanel.prev().find('input[type=radio]').attr('checked','checked');
    		}

    	});

    	var active = 0;
    	$('#accordion input[type=radio]').each(function(ind,it){
    		if ($(this).prop('checked')) {
    			active = ind;
    		}
    	});

    	$('#accordion').accordion('option','active', active);
  });
</script>

