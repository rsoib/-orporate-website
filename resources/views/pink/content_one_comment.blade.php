
									<li id="li-comment-{{ $data['com_id'] }}" class="comment even borGreen">
				                        <div id="comment-{{ $data['com_id'] }}" class="comment-container">
				                            <div class="comment-author vcard">
				                                <img alt="" src="https://www.gravatar.com/avatar/{{ $data['hash'] }}?d=mm&s=75" class="avatar" height="75" width="75" />
                                                <cite class="fn">{{ $data['com_name'] }}</cite>                 
				                            </div>
				                            <!-- .comment-author .vcard -->
				                            <div class="comment-meta commentmetadata">
				                                <div class="intro">
				                                    
				                                    <div class="commentNumber">#&nbsp;</div>
				                                </div>
				                                <div class="comment-body">
				                                    <p>{{ $data['com_text'] }}</p>
				                                </div>
				                             
				                            </div>
				                            <!-- .comment-meta .commentmetadata -->
				                        </div>
				                        <!-- #comment-##  -->				         
				                    </li>

	