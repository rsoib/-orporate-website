									
								@foreach($items as $item)
									<li id="li-comment-{{ $item->com_id }}" class="comment even {{ ($item->user_id == $article->user_id) ? 'bypostauthor odd' : '' }}">
				                        <div id="comment-{{ $item->com_id }}" class="comment-container">
				                            <div class="comment-author vcard">
				                            	@set($hash, isset($item->com_email) ? md5($item->com_email) : $item->user->email)
				                                <img alt="" src="https://www.gravatar.com/avatar/{{$hash}}?d=mm&s=75" class="avatar" height="75" width="75" />
                                                <cite class="fn">{{ $item->user['name'] }}{{ $item->com_name }}</cite>                 
				                            </div>
				                            <!-- .comment-author .vcard -->
				                            <div class="comment-meta commentmetadata">
				                                <div class="intro">
				                                    <div class"commentDate">
				                                        <a href="">
				                                        {{ is_object($item->created_at) ? $item->created_at->format('F d, Y \a\t H:i') : '' }}</a>                        
				                                    </div>
				                                    <div class="commentNumber">#&nbsp;</div>
				                                </div>
				                                <div class="comment-body">
				                                    <p>{{ $item->com_text }}</p>
				                                </div>
				                                <div class="reply group">
				                                    <a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-{{ $item->com_id }}&quot;, &quot;{{ $item->com_id }}&quot;, &quot;respond&quot;, &quot;{{ $item->article_id }}&quot;)">{{ Lang::get('ru.reply') }}</a>                    
				                                </div>
				                                <!-- .reply -->
				                            </div>
				                            <!-- .comment-meta .commentmetadata -->
				                        </div>
				                        <!-- #comment-##  -->

				                        @if(isset($com[$item->com_id]))

				                        	<ul class="children">
				                        		@include(env('THEME').'.comment',['items'=>$com[$item->com_id]])
				                        	</ul>

				                        @endif
				                    </li>
								@endforeach
