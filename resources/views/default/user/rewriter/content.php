<div id="content" class="col-xl-8 col-lg-6 col-md-12 col-sm-12">
			<div class="card border-0" id="template-output">
				<div class="card-body p-5">
					<div class="row">						
						<div class="col-lg-4 col-md-12 col-sm-12">								
							<div class="input-box mb-2">								
								<div class="form-group">							    
									<input type="text" class="form-control @error('document') is-danger @enderror" id="document" name="document" value="{{ __('New Document') }}">
									@error('document')
										<p class="text-danger">{{ $errors->first('document') }}</p>
									@enderror
								</div> 
							</div> 
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="form-group">
								<select id="project" name="project" class="form-select" data-placeholder="{{ __('Select Workbook Name') }}">	
									<option value="all"> {{ __('All Workbooks') }}</option>
									@foreach ($workbooks as $workbook)
										<option value="{{ $workbook->name }}" @if (strtolower(auth()->user()->workbook) == strtolower($workbook->name)) selected @endif> {{ ucfirst($workbook->name) }}</option>
									@endforeach											
								</select>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 text-right justify-content-right">
							<div class="d-flex text-right" id="template-buttons-group">	
								<div class="template-action-buttons">
									<div class="btn-group w-100">
										<button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" id="export" data-bs-display="static" aria-expanded="false"><i class="fa-solid fa-download table-action-buttons table-action-buttons-big edit-action-button"></i></button>
										<div class="dropdown-menu" aria-labelledby="export" data-popper-placement="bottom-start">								
											<a class="dropdown-item" id="copy-text"><i class="fa-solid fa-copy fs-13 text-muted mr-2"></i> {{ __('Copy Text') }}</a>
											<a class="dropdown-item" id="copy-html"><i class="fa-brands fa-html5 fs-13 text-muted mr-2"></i>{{ __('Copy HTML') }}</a>
											<a class="dropdown-item" id="export-text" onclick="exportTXTEditor();"><i class="fa-solid fa-text-size fs-13 text-muted mr-2"></i>{{ __('Text File') }}</a>								
											<a class="dropdown-item" id="export-word" onclick="exportWordEditor();"><i class="fa-sharp fa-solid fa-file-word fs-13 text-muted mr-2"></i>{{ __('MS Word') }}</a>
											{{-- <a class="dropdown-item" id="export-pdf" onclick="exportPDFEditor();"><i class="fa-sharp fa-solid fa-file-pdf fs-13 text-muted mr-2"></i>{{ __('PDF Document') }}</a> --}}
										</div>
									</div>
								</div>
								<a id="save-button-template" class="template-button" onclick="return saveText(this);" href="#"><i class="fa-solid fa-floppy-disk-pen table-action-buttons table-action-buttons-big delete-action-button" data-tippy-content="{{ __('Save Document') }}"></i></a>				
							</div>
						</div>

					</div>
					<div>						
						<div id="template-textarea">						
							<textarea class="form-control" id="tinymce-editor" rows="25"></textarea>
							<div>
								<p class="text-muted fs-12 total-words-templates-box">{{ __('Total Words') }}: <span id="total-words-templates"></span></p>
							</div>
						</div>								
					</div>
				</div>
			</div>
		</div>W