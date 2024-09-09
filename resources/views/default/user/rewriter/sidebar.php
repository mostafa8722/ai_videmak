<div id="sidebar" class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
			<div class="card border-0" id="template-input">
				<div class="card-body p-5 pb-0">

					<div class="row">
						<div class="template-view">
							<div class="template-icon mb-2 d-flex">
								<div>
									<i class="fa-solid fa-pen-line rewriter-icon"></i>
								</div>
								<div>
									<h6 class="mt-2 ml-3 fs-16 number-font">{{ __('AI Article ReWriter') }} 										
									</h6>
								</div>									
							</div>								
							<div class="template-info">
								<p class="fs-12 text-muted mb-4">{{ __('Rewrite and improve your academic articles with the help of AI in just a second') }}</p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="text-left mb-4" id="balance-status">
								<span class="fs-11 text-muted pl-3"><i class="fa-sharp fa-solid fa-bolt-lightning mr-2 text-primary"></i>{{ __('Your Balance is') }} <span class="font-weight-semibold" id="balance-number">@if (auth()->user()->available_words == -1) {{ __('Unlimited') }} @else {{ number_format(auth()->user()->available_words + auth()->user()->available_words_prepaid) }} {{ __('Words') }} @endif</span></span>
							</div>							
						</div>				
						
						@if ($brand_feature)
							<div class="col-sm-12">
								<div class="input-box mb-4">									
									<div class="form-group">
										<label class="custom-switch mb-0">
											<input type="checkbox" id="brand" name="brand" class="custom-switch-input">
											<span class="custom-switch-indicator"></span>
											<span class="custom-switch-description">{{ __('Include Your Brand') }}</span>
										</label>
									</div>
								</div>								
							</div>	
						@endif							

						<div class="col-sm-12 brand-details">
							<div class="form-group mb-5">	
								<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Select Company') }}</h6>								
								<select id="company" name="company" class="form-select"  onchange="updateService(this)">		
									<option value="none"> {{ __('Select your Company / Brand') }}</option>
									@foreach ($brands as $brand)
										<option value="{{ $brand->id }}"> {{ __($brand->name) }}</option>
									@endforeach									
								</select>
							</div>
						</div>

						<div class="col-sm-12 brand-details">
							<div class="form-group mb-5">
								<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Select Product / Service') }} </h6>
								<select id="service" name="service" class="form-select">
									<option value="none">{{ __('Select your Product / Service') }}</option>
								</select>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group">	
								<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Language') }}</h6>								
								<select id="language" name="language" class="form-select" data-placeholder="{{ __('Select input language') }}">		
									@foreach ($languages as $language)
										<option value="{{ $language->language_code }}" data-img="{{ URL::asset($language->language_flag) }}" @if (auth()->user()->default_template_language == $language->language_code) selected @endif> {{ $language->language }}</option>
									@endforeach									
								</select>
								@error('language')
									<p class="text-danger">{{ $errors->first('language') }}</p>
								@enderror	
							</div>
						</div>

						<div class="col-sm-12">
							<div class="input-box">	
								<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Target Article') }}  <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>									
								<div class="form-group">						    
									<textarea rows="15" cols="50" type="text" class="form-control @error('prompt') is-danger @enderror" id="prompt" name="prompt" placeholder="{{ __('Paste your academic article that you wish to rewrite or improve...') }}" required></textarea>
									@error('prompt')
										<p class="text-danger">{{ $errors->first('prompt') }}</p>
									@enderror
								</div> 
							</div> 
						</div>						
	
						<div class="col-lg-6 col-md-12 col-sm-12">
							<div id="form-group">
								<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Creativity') }} <i class="ml-1 text-dark fs-12 fa-solid fa-circle-info" data-tippy-content="{{ __('Increase or decrease the creativity level to get various results') }}"></i></h6>
								<select id="creativity" name="creativity" class="form-select">
									<option value=0>{{ __('Repetitive') }}</option>
									<option value=0.25> {{ __('Deterministic') }}</option>																															
									<option value=0.5 selected> {{ __('Original') }}</option>																															
									<option value=0.75> {{ __('Creative') }}</option>																															
									<option value=1> {{ __('Imaginative') }}</option>																																							
								</select>
							</div>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12">
							<div id="form-group">
								<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Tone of Voice') }} <i class="ml-1 text-dark fs-12 fa-solid fa-circle-info" data-tippy-content="{{ __('Set result tone of the text as needed') }}"></i></h6>
								<select id="tone" name="tone" class="form-select" >
									<option value="Professional" selected> {{ __('Professional') }}</option>	
									<option value="Exciting"> {{ __('Exciting') }}</option>	
									<option value="Friendly"> {{ __('Friendly') }}</option>	
									<option value="Witty"> {{ __('Witty') }}</option>	
									<option value="Humorous"> {{ __('Humorous') }}</option>	
									<option value="Convincing"> {{ __('Convincing') }}</option>	
									<option value="Empathetic"> {{ __('Empathetic') }}</option>	
									<option value="Inspiring"> {{ __('Inspiring') }}</option>	
									<option value="Supportive"> {{ __('Supportive') }}</option>	
									<option value="Trusting"> {{ __('Trusting') }}</option>	
									<option value="Playful"> {{ __('Playful') }}</option>	
									<option value="Excited"> {{ __('Excited') }}</option>	
									<option value="Positive"> {{ __('Positive') }}</option>	
									<option value="Negative"> {{ __('Negative') }}</option>	
									<option value="Engaging"> {{ __('Engaging') }}</option>	
									<option value="Worried"> {{ __('Worried') }}</option>	
									<option value="Urgent"> {{ __('Urgent') }}</option>	
									<option value="Passionate"> {{ __('Passionate') }}</option>	
									<option value="Informative"> {{ __('Informative') }}</option>
									<option value="Funny">{{ __('Funny') }}</option>
									<option value="Casual"> {{ __('Casual') }}</option>																																																														
									<option value="Sarcastic"> {{ __('Sarcastic') }}</option>																																																																																												
									<option value="Dramatic"> {{ __('Dramatic') }}</option>																																																													
								</select>
							</div>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 mt-5">
							<div id="form-group">
								<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Point of View') }}</h6>
								<select id="view_point" name="view_point" class="form-select">
									<option value="none">{{ __('Default') }}</option>
									<option value="first">{{ __('First Person') }}</option>
									<option value="second"> {{ __('Second Person') }}</option>																															
									<option value="third"> {{ __('Third Person') }}</option>																																															
								</select>
							</div>
						</div>
												
						<div class="col-lg-6 col-md-12 col-sm-12">
							<div class="input-box mt-5">
								<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Number of Results') }} <i class="ml-1 text-dark fs-12 fa-solid fa-circle-info" data-tippy-content="{{ __('Maximum supported results is 50') }}"></i></h6>
								<div class="form-group">
									<input type="number" class="form-control @error('max_results') is-danger @enderror" id="max_results" name="max_results" placeholder="e.g. 5" max="50" min="1" value="1">
									@error('max_results')
										<p class="text-danger">{{ $errors->first('max_results') }}</p>
									@enderror
								</div>
							</div>
						</div>

					</div>						

					<div class="card-footer border-0 text-center p-0">						
						<div class="w-100 pt-2 pb-2">
							<div class="text-center">
								<button type="submit" name="submit" class="btn btn-primary  pl-9 pr-9 fs-11 pt-2 pb-2" id="generate">{{ __('Rewrite') }}</button>
							</div>
						</div>							
					</div>	
			
				</div>
			</div>			
		</div>