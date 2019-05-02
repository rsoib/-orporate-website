%				            
				            <div class="widget-first widget recent-posts">
				                <h3>{{ Lang::get('ru.latest_projects') }}</h3>
				                <div class="recent-post group">

				                	@if(!$portfolios->isEmpty())
										@foreach($portfolios as $portfolio)
											<div class="hentry-post group">
				                        		<div class="thumb-img"><img style="width:55px;" src="{{ asset('assets') }}/images/projects/{{ $portfolio->port_img->mini }}" alt="001" title="001" /></div>
				                        		<div class="text">
				                           			<a href="{{ route('portfolios.show',['alias'=>$portfolio->alias]) }}" title="{{ $portfolio->port_title }}" class="title">{{ $portfolio->port_title }}</a>
				                           			<p>{{ str_limit($portfolio->port_text,130) }} </p>
				                           			<a class="read-more" href="{{ route('portfolios.show',['alias'=>$portfolio->alias]) }}">&rarr; {{ Lang::get('ru.read_more') }}</a>
				                        		</div>
				                    		</div>
										@endforeach
									@endif
				                    
				  
				                </div>
				            </div>


				            @if(!$comments->isEmpty())
								<div class="widget-last widget recent-comments">
				                	<h3>{{ Lang::get('ru.latest_comments') }}</h3>
				                	<div class="recent-post recent-comments group">
				                		@foreach($comments as $comment)
											<div class="the-post group">
				                        		<div class="avatar">
				                        			@set($hash, ($comment->com_email) ? md5($comment->com_email) : $comment->user->email)
				                            		<img alt="" src="https://www.gravatar.com/avatar/{{$hash}}?d=mm&s=55" class="avatar" />   
				                        		</div>
				                        		<span class="author"><strong><a href="#">{{ isset($comment->user) ? $comment->user->name : $comment->com_name }}</a></strong> in</span> 
				                        		<a class="title" href="{{ route('articles.show',['alias'=>$comment->article->art_alias]) }}">{{ $comment->article->art_title }}</a>
				                        		<p class="comment">
                                            		{{ $comment->com_text }}<a class="goto" href="{{ route('articles.show',['alias'=>$comment->article->art_alias]) }}">&#187;</a>
                                       			</p>
				                    </div>
				                		@endforeach
				                	</div>

				                </div>	
				            @endif

				        