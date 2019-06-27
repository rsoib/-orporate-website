@if($articles)
	
	<div class="id content-page" class="content-group">
		<div class="hentry-group">
			<h2>Добавленные статьи</h2>
			<div class="short-table white">
				<table style="width:100%;" cellspacing = "0" cellpadding = "0">
					
					<thead>
						<tr>
							<th class="align-left">ID</th>
							<th>Заголовок</th>
							<th>Текст</th>
							<th>Изображение</th>
							<th>Категории</th>
							<th>Псевдоним</th>
							<th>Действие</th>
						</tr>
					</thead>	
					
					<tbody>
						@foreach($articles as $article)
							<tr>
								<td class="align-left">{{ $article->id }}</td>
								<td class="align-left">{!! Html::link(route('articles.edit',['articles'=>$article->art_alias]),$article->art_title) !!}</td>
								<td class="align-left">{{ str_limit($article->art_text,200) }}</td>
								<td>
									@if(isset($article->art_img->mini))
										{!! Html::image(asset('assets').'/images/articles/'.$article->art_img->mini) !!}
									@endif
								</td>
								<td>{{ $article->category->cat_title }}</td>
								<td>{{ $article->art_alias }}</td>
								<td>
								{!!Form::open(['url' => route('articles.destroy',['articles' => $article->art_alias]),'class'=>'form-horizontal','method'=>'POST']) !!}
										{{ method_field('DELETE') }}
										{!! Form::button('Удалить',['class'=> 'btn btn-french-5','type'=>'submit' ]) !!}
								{!! Form::close() !!}	
								</td>
							</tr>
						@endforeach
				</table>
				<a href="{{ route('articles.create') }}"><button class="btn btn-primary">Добавить</button></a>
			</div>
		</div>	
	</div>

@endif