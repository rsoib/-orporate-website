<div id="content-page" class="content group">
	
	<div class="hentry group">
		@if(count($errors) > 0)
          <div class="box error-box">
           @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
          </div>
      	@endif
		
		{!! Form::open(['url' => (isset($article->id)) ? route('articles.update',['articles'=>$article->art_alias]) : route('articles.store'), 'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}	
		<ul>
			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Название:</span>
					<br>
					<span class="sublabel">Заголовок материала</span><br>
				</label>	

				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('art_title',isset($article->art_title) ? $article->art_title : old('art_title'), ['placeholder' => 'Введите газвание страницы']) !!}
				</div>
			</li>

			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Ключевые слова:</span>
					<br>
					<span class="sublabel">Заголовок материала</span><br>
				</label>	

				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('keywords',isset($article->keywords) ? $article->keywords : old('keywords'), ['placeholder' => 'Введите название страницы']) !!}
				</div>
			</li>

			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Мета описание:</span>
					<br>
					<span class="sublabel">Заголовок материала</span><br>
				</label>	

				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('meta_desc',isset($article->meta_desc) ? $article->meta_desc : old('meta_desc'), ['placeholder' => 'Введите название страницы']) !!}
				</div>
			</li>

			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">псевдоним:</span>
					<br>
					<span class="sublabel">введите псевдоним</span><br>
				</label>	

				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('art_alias',isset($article->art_alias) ? $article->art_alias : old('art_alias'), ['placeholder' => 'Введите название страницы']) !!}
				</div>
			</li>

			<li class="textarea-field">
				<label for="message-contact-us">
					<span class="label">Краткое описание:</span>
				</label>	

				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					{!! Form::textarea('art_desc',isset($article->art_desc) ? $article->art_desc : old('art_desc'), ['id'=>'editor2','placeholder' => 'Введите название страницы']) !!}
				</div>
				<div class="msg-error"></div>
			</li>


			<li class="textarea-field">
				<label for="message-contact-us">
					<span class="label">Описание:</span>
				</label>	
 
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					{!! Form::textarea('art_text',isset($article->art_text) ? $article->art_text : old('art_text'), ['id'=>'editor','placeholder' => 'Введите название страницы']) !!}
				</div>
				<div class="msg-error"></div>
			</li>

		@if(isset($article->art_img->path))
			<li class="textarea-field">
				<label>
					<span class="label">Изображение материала:</span>
				</label>	
					
					{{ Html::image(asset(env('ASSETS')).'./images/articles/'.$article->art_img->path) }}	
					{!! Form::hidden('old_img',$article->art_img->path) !!}
			</li>	
		@endif

			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Изображение:</span>
					<br>
					<span class="sublabel">Изображение материала</span><br>
				</label>	

				<div class="input-prepend">

					{!! Form::file('art_img',['class' => 'filestyle','data-button']) !!}
				</div>
			</li>

			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Категория:</span>
					<br>
					<span class="sublabel">Категория материала</span><br>
				</label>	

				<div class="input-prepend">
					{!! Form::select('category_id',$categories,isset($article->category_id) ? $article->category_id : '') !!}
				</div>
			</li>

			@if(isset($article->id))
				<input type="hidden" name="_method" value="PUT">
			@endif

			<li class="submit-button">
				{!! Form::button('Сохранить',['class' => 'btn btn-primary','type' => 'submit']) !!}
			</li>

		</ul>
	{!! Form::close() !!}

	<script>
		CKEDITOR.replace( 'editor' );
		CKEDITOR.replace( 'editor2' );
	</script>
	</div>
</div>