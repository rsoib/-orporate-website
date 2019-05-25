@extends(env('THEME').'.layouts.site')

@section('content')	
	
<div id="content-page" class="content group">
	<div class="hentry group">
		
		<form id="contact-form-contact-us" class="contact-form" method="post" action="{{ url('login') }}">
		{{ csrf_field() }}
			<fieldset>
				  	<ul>
				      	<li class="text-field">
				          	<label for="login">
				                <span class="label">Name</span>
				                <br/><span class="sublabel">This is the name</span><br />
				            </label>
					        
					        <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span> <input id="login" type="login" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" required autofocus></div>
					            
					            @if($errors->has('login'))
								
									<span class="help-block">	
								
										<strong style="color:red">{{ $errors->first('login') }}</strong>
								
									</span>
								
								@endif
						</li>
						
						<li class="text-field">
				            
				            <label for="passwors">
				                <span class="label">Password</span>
				                <br/><span class="sublabel">This is the name</span><br />
				            </label>
				            
				            <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required></div>
				                
				                @if($errors->has('password'))
								
									<span class="help-block">
														
										<strong>{{ $errors->first('password') }}</strong>

									</span>
								@endif
				        </li>
				                            
				                            <li class="submit-button">
				                                
				                                <input type="submit" name="yit_sendmail" value="Send Message" class="sendmail alignright" />			
				                            </li>
				                        </ul>
				                    </fieldset>
				                </form>
				            </div>
				        </div>

@endsection