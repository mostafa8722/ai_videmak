
var Cite = require('citation-js');

	let sort_by = "relevance";
	let modal_articles =[];
	let added_citation_articles =[];
	let tinyEditor =  null;
	let selected_template = "apa";
	let collection_file = "";
    let collection_articles = [];




	const style_citation_format = [
  {
  name: "apa",
  in_text_citation: "Author's last name, First initial. (Publication year). ",
  reference_list_format: "Author's last name, First initial. (Publication year). Title of the work. Publisher.",
 style :"apa.csl"
},
  {
  name: "mla 9",
  in_text_citation: "(Author's last name Page number)",
  reference_list_format: "Author's last name, First name. Title of the Work. Publisher, Publication date.",
  style :"modern-language-association.csl", // 9
  },
  {
  name: "mla 7",
  in_text_citation: "(Author's last name Page number)",
  reference_list_format: "Author's last name, First name. Title of the Work. Publisher, Publication date.",
  style :"modern-language-association-7th-edition.csl" // 7
  },
  {
  name: "chicago",
  in_text_citation: "(Author's last name Year, Page number)",
  reference_list_format: "Author's last name, First name. Title of the Work. Place of publication: Publisher, Year of publication.",
  style :"chicago-fullnote-bibliography.csl", // 9
  },
  {
  name: "harvard",
  in_text_citation: "(Author's last name Year, Page number)",
  reference_list_format: "Author's last name, First initial. (Year) Title of the Work. Edition. Place of publication: Publisher.",
  style :"harvard-york-st-john-university.csl"
  },
  {
  name: "Vancouver",
  in_text_citation: "Number in square brackets",
  reference_list_format: "Author's last name First initial. Title of the Work. Edition. Place of publication: Publisher; Year.",
  style:"vancouver.csl"
  },
  {
  name: "ieee",
  in_text_citation: "[Number]",
  reference_list_format: "[Number] Author's initials. Last name, Title of the Work. Place of publication: Publisher, Year.",
  style:"ieee.csl"
  },
  {
  name: "oscola",
  in_text_citation: "(Author's last name Year, Page number)",
  reference_list_format: "Author's last name, First initial, Title of the Work (Edition, Place of publication, Year).",
  style:"oscola.csl"
  },
  {
  name: "mhra",
  in_text_citation: "(Author's last name Year, Page number)",
  reference_list_format: "Author's last name, First name, Title of the Work (Place of publication: Publisher,Year.",
  style:"modern-humanities-research-association.csl"
  },
  {
  name: "turabian",
  in_text_citation: "(Author's last name Year, Page number)",
  reference_list_format: "Author's last name, First name. Title of the Work. Place of publication: Publisher, Year of publication.",
  style:"turabian-fullnote-bibliography.csl"
  }
  ]
  document.getElementById("my-collection").addEventListener("click",function(e){
	//getCitation2();
		let iframe = document.getElementById("tinymce-editor_ifr");

	if(!iframe.contentWindow.document.getElementById("refrence-header")){
		tinyEditor.dom.add(tinyEditor.getBody(), 'div', {'id' : 'refrence-header'});
		tinyEditor.dom.add(tinyEditor.getBody(), 'div', {'id' : 'refrence-content'});
	}



	                        let sidebar = document.getElementById("sidebar");
	                        let content = document.getElementById("content");
							let collection = document.getElementById("collection-file-citation");
                            content_show = document.getElementById("content-show");
							collection.style.display ="block"
							if(content_show){
                                content_show.classList.remove("col-xl-9");
                                content_show.classList.add("col-xl-6");
							}else if(sidebar){
							
							sidebar.classList.remove("col-xl-4");
							content.classList.remove("col-xl-8");
							sidebar.classList.add("col-xl-3");
							content.classList.add("col-xl-6");
                            }
							document.getElementById("my-collection").style.display="none";
							seachCollection("");
});

document.getElementById("close-collection").addEventListener("click",function(e){
	document.getElementById("my-collection").style.display="flex";
	let sidebar = document.getElementById("sidebar");
	let content = document.getElementById("content");
	let collection = document.getElementById("collection-file-citation");
	content_show = document.getElementById("content-show");
	collection.style.display ="none"
	if(content_show){
		content_show.classList.add("col-xl-9");
		content_show.classList.remove("col-xl-6");
	}else if(sidebar){
	
	sidebar.classList.add("col-xl-4");
	content.classList.add("col-xl-8");
	sidebar.classList.remove("col-xl-3");
	content.classList.remove("col-xl-6");
	}
});
	function parseArxivObject(entry) {
	return {
		id:entry?.id,
		title: entry?.title,
		abstract: entry?.summary.trim(),
		author:Array.isArray(entry?.author)?false: entry?.author?.name,
		authors:Array.isArray(entry?.author)?entry?.author?.map(author=>{
			return {
				name:author.name
			}
		}):false,
		openAccessPdf:{url:convertLinkArxiv(entry?.link)},
		year: entry?.published?.slice(0,4),
		updated: entry?.updated,
		doi: entry?.doi?.__text,
		category:Array.isArray(entry?.category)?false: entry?.category?._term,
		categories: Array.isArray(entry?.category)?entry?.category?.map(cat=>cat?._term):false,

	};
}

function convertLinkArxiv(link){
	let href ="";
   for(let i=0;i<link.length;i++){
     if(link[i]?._href && link[i]?._title==="pdf")
	 href = link[i]?._href;
   }
   return href;
}

function convertLinkCustom(link){
	let href ="";
   for(let i=0;i<link.length;i++){

     if(link[i]?.URL && link[i]["content-type"]==="application/pdf")
	 href = link[i]?.URL;
   }
   return href;
}




async function setRefrenceCitation(article,template){
	const style_citation = style_citation_format.find(style=>style.name===template)??style_citation_format[0];



let url = `website?url=${article.id}`;
let doi = article.doi;
if(doi)
url =  `doi?url=${doi}`;
  let res = {}
try{
    res = await fetch(`https://bibserver.fly.dev/api/${url}`);
}catch(e){

}

if(res.status !== 200) 
 return {status:res.status,result:""} ;

	let res2 = await res.json();
	

	let url_res = "";
	for (const key in res2) {
		url_res += `${key}=${res2[key]}&`
}
url_res += `style=${style_citation.style}`


	let res3 ={}
	try{
		 res3 = await fetch(`https://bibserver.fly.dev/api/cite?${url_res}`,{
		authority:"bibserver.fly.dev"
	});
}catch(e){

}
	if(res3.status !== 200) 
	 return {status:res3.status,result:""} ;

	let res4 = await res3.json();
	return {status:res3.status,result:res4};
}


function getCitation(doi,update){

	let res = "";
	try{
		
		var data = new Cite(doi);

		res = data?.data[0];
		let title = res?.title;


		if(update){
		let formData = new FormData();
    
		formData.set("title",title);
		formData.set("doi",doi);
		formData.set("path",collection_file);
	 $.ajax( {
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		type: "post",
		url: "/user/update/collection",
		data: formData,
		contentType: false,
		processData: false,
		success: function ( data ) {

		
		},
		error: function ( e ) {
			console.log("errr",e)
			
		}
	} );
}
	}catch(e){

	}
	return res;
	
}



						let showDialogContent ="";
						let uploadContextDialog =`
						<div class="upload-pdf-context">
						<span>
						Generate text from your existing sources and research papers.Please use PDF format
						</span>
 
						<span class="upload-warning">
						Please only upload research papers, academic journals , or sources you 'd like to cite within jenni documents.
						</span>
						<div id="upload-file-section" class="btn-upload-section">
						<img src="/images/pdf-file.png" />
					
						<span id="dropContainer" class="choose-files">Choose Files
						<input type="file"  id="fileInput"  accept="application/pdf"/>
						</span>
						</div>
						<span>
						Or drag & drop PDFs (up to 15MB)
						</span>
						</div>
						`;
	
	function getAuthors (authors){
       const count = 3;
	   const authors_name = [];
		 authors.map((author,index)=>{
			if(index<count)
			authors_name.push(author.name)
		})
		return authors_name.toString();
	}
	async function addCitation(event,id){

		let add_citation =  event.target;
		add_citation.innerHTML = `<div class="loading-add-citation"><span ></span></div>`;

		
		let article =  modal_articles?.find(article=>article.id===id) ||  collection_articles?.find(article=>article.id===id)  ;

		let doi = article.doi;
	 
		let year =  `${article?.year}`?.slice(0,4);
		let author = article.author?article.author:(article.authors[0].name+" et al");
		let output = await setRefrenceCitation(article,selected_template);
		if(output.status===200){
		let cite = output.result
         text_in_cite = selected_template==="ieee" ?`${year}`:(`${author},${year}`);
		tinyEditor.selection.setContent(tinyEditor.selection.getContent()+`<a id="text-in-style-${article.id}" class="text-in-style" href="#">(${text_in_cite})</a>`)
	
		let iframe = document.getElementById("tinymce-editor_ifr");

			if(!iframe.contentWindow.document.getElementById("refrence-header")){
		tinyEditor.dom.add(tinyEditor.getBody(), 'div', {'id' : 'refrence-header'});
		tinyEditor.dom.add(tinyEditor.getBody(), 'div', {'id' : 'refrence-content'});
	}


		let elmnt = iframe.contentWindow.document.getElementById("refrence-header");
		let elmntContent = iframe.contentWindow.document.getElementById("refrence-content");
		elmnt.innerHTML = "<h3>Refrences</h3>";
		elmntContent.innerHTML += `<div id="refrence-in-style-${article.id}" class="refrence-in-style">${cite}</div>`;
		added_citation_articles.push(article);
		showArticles(modal_articles);
			showArticlesCollection(collection_articles);

		}else{
			add_citation.innerHTML = `Add Citation`;
			toastr.warning(`this citation can't be added`);
		}
		
	}
	async function changeStyle(template){
		selected_template = template;
		let iframe = document.getElementById("tinymce-editor_ifr")

		let elements_refrence = iframe.contentWindow.document.getElementsByClassName("refrence-in-style");
	
		for(let i=0 ; i<elements_refrence.length;i++){
		
			let id = elements_refrence.item(i)?.id?.slice(18);
			let article =  modal_articles?.find(article=>article.id===id);
			if(article){
			let cite = await setRefrenceCitation(article,selected_template);
		
			if(cite.status===200)
			elements_refrence.item(i).innerHTML = cite.result;
		     else
			 toastr.warning(`this style can't be added`);
			}
		}
		let elements_text_in = iframe.contentWindow.document.getElementsByClassName("text-in-style");
		for(let i=0 ; i<elements_text_in.length;i++){
			let id = elements_text_in.item(i)?.id?.slice(14);
			let article =  modal_articles?.find(article=>article.id===id);
		
			if(article){
			let year = article.year;
		   let author = article.author?article.author:(article.authors[0].name+" et al");
			 let text_in_cite = selected_template==="ieee" ?`${year}`:(`${author},${year}`);
		
			 elements_text_in.item(i).innerHTML = `(${text_in_cite})`;
			}
		}
	}
	function article(article){
		
		return `<div class="dialog-article">
		<div class="logo">
	
		</div>
		<div class="content">
		  <h2 class="title">
		 ${article.title}
		  </h2>
		  <span class="writer">
		  ${article.author?article.author:getAuthors(article.authors)}
		  		  </span>
		  <span class="journal">
		  ${article?.journal?.name??''}  ${article.year}
		  </span>
		  ${
			article?.abstract ? `<div class="section-body">	  <span class="abstract">
		  ${article?.abstract}
		  </span><span onclick="seeMore(event)" class="see-more">see more</span></div>`:`<span></span>`
		  }
	
		  <div class="footer">
		  ${
			added_citation_articles.find(added_article=>added_article.id===article.id)? 
			`<span  class="add-citation-text">  citation added</span>`:
			`<span onclick='addCitation(event,"${article.id}")'  class="add-citation"> Add Citation</span>`
		  }
		  <a href="${article?.openAccessPdf?.url}" target="_blank" class="new-tab">View in new Tab</a>
		  </div>
		</div>
	
		</div>
							`
		}
							;

							function articleSideBar(article){
						
								return `<div class="card-upload-citations" >
							<div class="card-upload-citation-image">
                                      
									  </div>
									  <div class="card-upload-citation-content">
										 <h5 > ${article.title}</h5>
										 <span>  ${article.author?article.author:getAuthors(article.authors)}</span>
										 <span>${article?.journal?.name??''}  ${article.year}</span>
										   <div class="card-upload-citation-btn">
																			${
												added_citation_articles.find(added_article=>added_article.id===article.id)? 
												`<p  class="add-citation-text">  citation added</p>`:
												`<span onclick='addCitation(event,"${article.id}")'  class="add-citation"> Add Citation</span>`
											}
											
											   <a href="${article?.openAccessPdf?.url}" target="_blank" class="new-tab">View </a>
											 </div>
											   
										   </div>
										</div>
										</div>
							`
										}
							;

							const  libraryContent=()=>{
								return `
								<div class="upload-library-content">
								<h5>Not Found</h5>

								<span>Upload a PDF  to start building your library </span>
								<a href="#">Upload PDF</a>
								</div>
								
								`;
							}
					function getAll(searchQuery){
					
				
						tinyEditor.dom.add(tinyEditor.getBody(), 'p', {'class' : 'text_it'});
						let semanticscholar_articles =[];
					
						let input_data = {
	searchQuery:searchQuery, sortBy:sort_by, sortOrder:"descending", start:0, maxResults:20
}
					
let dialog_body =document.getElementById("dialog-articles");
							dialog_body.innerHTML = `<div class="loading-articles"><span ></span></div>`;
					
							$.ajax( {
								headers: { 
									//'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') ,
									'x-api-key':'XJd3rIHoMq8ytm6DIZMcP8dP01f5SOt84JhagCc3'
								},
								type: "get",
								url: `https://api.semanticscholar.org/graph/v1/paper/search?query=${searchQuery}&limit=10&fields=title,year,abstract,authors.name,journal,citationCount,publicationTypes,fieldsOfStudy,openAccessPdf,isOpenAccess,externalIds`,
						
								contentType: false,
								processData: false,
								success: function ( data ) {

									
                                 const articles =data?.data?.map(article=>{
									return {
										id:article?.paperId,
										title:article?.title,
										abstract:article?.abstract,
										authors:article?.authors,
										citationCount:article?.citationCount,
										fieldsOfStudy:article?.fieldsOfStudy,
										isOpenAccess:article?.isOpenAccess,
										year:article?.year,
										openAccessPdf:article?.openAccessPdf,
										journal:article?.journal,
										doi:article?.externalIds?.DOI,
										publicationTypes:article?.publicationTypes
,
									}
								 })
								 semanticscholar_articles = articles?.filter(article=>article.doi)??[]
                             
								 arxivApi(input_data,semanticscholar_articles);
							
                              
								
					
						
								
									
								},
								error: function ( data ) {
									
									document.querySelector('#loader-line')?.classList?.add('opacity-on'); 
									semanticscholar_articles=[];
									arxivApi(input_data,semanticscholar_articles);
								}
							} );
					}	
					async function arxivApi({searchQuery, sortBy, sortOrder, start, maxResults},semanticscholar_articles){
						
					
						let arxiv_articles =[];
					$.ajax({
							type: "GET",
							url: `https://export.arxiv.org/api/query?search_query=${searchQuery}&start=${start}&max_results=${maxResults}${
							sortBy ? `&sortBy=${sortBy}` : ''
						}${sortOrder ? `&sortOrder=${sortOrder}` : ''}`,
							dataType: "xml",
							success: function(xmlDoc) {
								var x2js = new X2JS();
							
							
								
								var parsedData = x2js.xml2json(xmlDoc);
							
								let articles = [];
								if(parsedData?.feed?.entry)
								articles = parsedData?.feed?.entry?.map(parseArxivObject);
								//arxiv_articles = articles?.filter(article=>article.doi);
								arxiv_articles = articles??[];
							
								unpaywall(searchQuery,[...arxiv_articles,...semanticscholar_articles]);
							
							},	error: function ( data ) {
									
									document.querySelector('#loader-line')?.classList?.add('opacity-on'); 
									arxiv_articles=[];
									unpaywall(searchQuery,[...arxiv_articles,...semanticscholar_articles]);
								}
						});



  				}

				  async function unpaywall(searchQuery,all_articles){
					let unpaywalls =[];
			
				$.ajax({
						type: "GET",
						url: `https://api.unpaywall.org/v2/search?query=${searchQuery}&is_oa=true&email=ssemma442@gmail.com`,
						
						success: async function(res) {
							const results = res?.results ;
				
							  const len= results.length>10 ? 10:results.length;
						
							for(let i=0;i<len;i++){
								const doi = results[i]?.response?.doi;
						

							let article =  null;
							try{
								article =await getCitation(doi,false);
					
							}catch(e){
								console.log("errr",e)
							}
							if(article){
								let data =  {
							  id:article?.id,
							  title: article?.title,
							  abstract: article?.abstract?.trim()??"",
							  author:article?.author?.length!==1?false:`${article?.author[0].given} ${article?.author[0].family}`,
							  authors:article?.author?.length!==1?article?.author?.map(author=>{
								  return {
									  name:`${author?.given} ${author?.family}`
								  }
							  }):false,
							  openAccessPdf:{url:results[i]?.response?.best_oa_location?.url_for_pdf},
							  year: results[i]?.response?.year,
							  updated:  results[i]?.response?.updated,
							  doi:doi,
							  category:"",
							  categories: "",
					  
						  };
						  unpaywalls=[...unpaywalls,data];
						}
					
						}
					
				
						showArticles([...unpaywalls,...all_articles]);
						},	error: function ( data ) {
							showArticles([...unpaywalls,...all_articles]);
							}
					});



			  }

					function showArticles(articles){
						 modal_articles = articles
						let innerHtml = "";
						let innerHtml2 = "";
						if(articles?.length>0){
								 for(let i=0;i<articles.length;i++){
									console.log("article",article)
									innerHtml += article(articles[i]);
									innerHtml2 += articleSideBar(articles[i]);
								 }
								}else{
									innerHtml=`<div style="display:flex;align-items:center;justify-content:center;width:100%;height:100%"><span style="color:#d16f6f;font-size:20px">No Article Found </span></div>`;
								}
								 let dialog_body =document.getElementById("dialog-articles");
								 let sidebar_citations =document.getElementById("sidebar-upload-citations");
							
								 dialog_body && ( dialog_body.innerHTML = innerHtml);
								 sidebar_citations && ( sidebar_citations.innerHTML = innerHtml2);
								
					}

					function showArticlesCollection(articles){
						modal_articles = articles
					 
					   let innerHtml = "";
					   if(articles?.length>0){
								for(let i=0;i<articles.length;i++){
								   innerHtml += articleSideBar(articles[i]);
								}
							   }else{
								   innerHtml=`<div style="display:flex;align-items:center;justify-content:center;width:100%;height:100%"><span style="color:#d16f6f;font-size:20px">No Article Found </span></div>`;
							   }
					
								let sidebar_citations =document.getElementById("sidebar-collection-citations");
						   
								
								sidebar_citations && ( sidebar_citations.innerHTML = innerHtml);
							   
				   }
					function getDiscover(){
						showDialogContent = `${uploadContextDialog}`;
					
						return showDialogContent;
					}

					function getLibaray(){
					
						setTimeout(() => {
						
							const dropContainer = document.getElementById("dropContainer");
const fileInput = document.getElementById("fileInput");
							dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
  evt.preventDefault();
};

dropContainer.ondrop = function(evt) {
  // pretty simple -- but not for IE :(

  fileInput.files = evt.dataTransfer.files;
  uploadFilePdf(evt.dataTransfer.files[0]);


  evt.preventDefault();
};

document.getElementById("fileInput").addEventListener("change",function(e){

	uploadFilePdf(e.target.files[0]);
});
						}, 100);
					
					}
				


					function getTextNodes(node, nodeType, result){

var children = node.childNodes;
var nodeType = nodeType ? nodeType : 3;

var result = !result ? [] : result;
if (node.nodeType == nodeType) {
	result.push(node);
}

for (var i=0; i<children.length; i++) {
	result = this.getTextNodes(children[i], nodeType, result)
}

return result;
};

  async function uploadFilePdf(file){
   let loading =`<div class="loading-articles"><span ></span></div>`;
   document.getElementById("upload-file-section").innerHTML = loading;
	let formData = new FormData();
    
	formData.set("file",file);
	const rawResponse = await fetch( '/user/rewriter/upload', {
    method: 'POST',
	headers: { 'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content') },

    body:formData
  });

  const res = await rawResponse.json();
 
  doi = res?.doi;
  collection_file = res?.path;



  if(doi)
  convertDoi2Article(doi)
else
toastr.error(`This document doesn't have doi`);


 }
		function changeBtn(type){
	
			let tabs = document.getElementById("tabs-btn");
			let articles_id = document.getElementById("dialog-articles");
			let discover_id = document.getElementById("dialog-discover");
			let library_id = document.getElementById("dialog-library");
			let innerHTML = 
			type==="all"?
			`<span onclick="changeBtn('all')" class="dialog-btn tab-selected">All</span>
			<span onclick="changeBtn('discover')" class="dialog-btn">Discover</span>
			<span onclick="changeBtn('library')" class="dialog-btn">Library</span>` :
			type==="discover"?
			`<span onclick="changeBtn('all')" class="dialog-btn ">All</span>
			<span onclick="changeBtn('discover')" class="dialog-btn tab-selected">Discover</span>
			<span onclick="changeBtn('library')" class="dialog-btn">Library</span>` :
			`<span onclick="changeBtn('all')" class="dialog-btn ">All</span>
			<span onclick="changeBtn('discover')" class="dialog-btn">Discover</span>
			<span onclick="changeBtn('library')" class="dialog-btn tab-selected">Library</span>` ;
			
			tabs.innerHTML = innerHTML;
			if(type==="all"){
				articles_id.style.display ="block"
				discover_id.style.display ="none"
				library_id.style.display ="none"
			}else if(type==="discover"){
				discover_id.style.display ="block"
				articles_id.style.display ="none"
				library_id.style.display ="none"
			}else if(type==="library"){
				library_id.style.display ="block"
				discover_id.style.display ="none"
				articles_id.style.display ="none"
				library_id.innerHTML =uploadContextDialog;
				getLibaray();

			}
	
		}

		function seeMore(e){
			let elm = e.target;
		
			let parent_elm = elm.closest(".section-body");
			let fourChildNode = parent_elm.querySelector('.abstract');
	
			if(fourChildNode.style.height!=="auto"){
			
			fourChildNode.setAttribute("style", "-webkit-line-clamp:unset;height:auto");
			elm.innerHTML ="less more";
			
		   }else{
			
			fourChildNode.setAttribute("style", "-webkit-line-clamp:5;height:100px");
			elm.innerHTML ="see more";
			
		}
	
		}
		async function convertDoi2Article(doi){
		
			let sidebar = document.getElementById("sidebar");
							let content = document.getElementById("content");
							let upload_citation = document.getElementById("upload-citation");
                            content_show = document.getElementById("content-show");
                            upload_citation.style.display = "block";
                            if(content_show){
                                content_show.classList.remove("col-xl-9");
                                content_show.classList.add("col-xl-6");
							}else if(sidebar){
							
							sidebar.classList.remove("col-xl-4");
							content.classList.remove("col-xl-8");
							sidebar.classList.add("col-xl-3");
							content.classList.add("col-xl-6");
                            }else{
                                 sidebar = document.getElementById("right-tools-top-box");
							
                                sidebar.style.display = "none";
                            }
			tinyEditor.windowManager.close()
			let article =  null;
			try{
				article =await getCitation(doi,true);
			
			}catch(e){
				console.log("errr",e)
			}
		

			setTimeout(() => {
				document.getElementById('search-citation-btn').innerHTML = `<img src="/img/search.svg" />`

		

	     if(article){
		  let data =  {
		id:article?.id,
		title: article?.title,
		abstract: article?.abstract?.trim()??"",
		author:article?.author?.length!==1?false:`${article?.author[0].given} ${article?.author[0].family}`,
		authors:article?.author?.length!==1?article?.author?.map(author=>{
			return {
				name:`${author?.given} ${author?.family}`
			}
		}):false,
		openAccessPdf:{url:convertLinkCustom(article?.link)},
		year: article?.published["date-parts"][0][0],
		updated:  article?.published["date-parts"][0][0],
		doi:doi,
		category:"",
		categories: "",

	};

	
	if(modal_articles?.find(article=>article.doi==doi)){
		toastr.error(`this doi's article is existed on article list `);
	}else{
		modal_articles =[data,...modal_articles];
		showArticles(modal_articles);
		document.getElementById('custom-ciation').value = ""
	}
		}else{
			toastr.error(`article can't be obtained,please try later `);
		}
	},1500 );
		}
    
	document.getElementById('search-citation-btn')?.addEventListener('click', function(e) {
		let cite_value = 	document.getElementById('custom-ciation').value;

		if(	document.getElementById('custom-ciation').value == "")
		toastr.error(`please type a doi `);
	    else{
		
		document.getElementById('search-citation-btn').innerHTML = `<div class="loading-add-citation"><span ></span></div>`;
		  convertDoi2Article(cite_value.trim());
		}
		});

		document?.getElementById('search-collection-btn')?.addEventListener('click', function(e) {
	
			let search = 	document.getElementById('collection-ciation').value;
	
			seachCollection(search);
			
			
			
			});

			function seachCollection(search){
				document.getElementById('search-collection-btn').innerHTML = `<div class="loading-add-citation"><span ></span></div>`;
	
			 const input =  {title:search};
			 let formData = new FormData();
    
	            formData.set("title",search);
			 $.ajax( {
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				type: "post",
				url: "/user/search/collection",
				data: formData,
				contentType: false,
				processData: false,
				success:async function ( data ) {
                     const articles = data.data;
				collection_articles =[];
                
					for(let i=0;i<articles.length;i++){
					    const doi = articles[i].doi;
					     
						let article =await getCitation(doi,false);

						if(article){
							let data =  {
						  id:article?.id,
						  title: article?.title,
						  abstract: article?.abstract?.trim()??"",
						  author:article?.author?.length!==1?false:`${article?.author[0].given} ${article?.author[0].family}`,
						  authors:article?.author?.length!==1?article?.author?.map(author=>{
							  return {
								  name:`${author?.given} ${author?.family}`
							  }
						  }):false,
						  openAccessPdf:{url:convertLinkCustom(article?.link)},
						  year: article?.published["date-parts"][0][0],
						  updated:  article?.published["date-parts"][0][0],
						  doi:doi,
						  category:"",
						  categories: "",
				  
					  };
					  collection_articles = [data,...collection_articles];
				  
					}
					}
					showArticlesCollection(collection_articles);
					document.getElementById('search-collection-btn').innerHTML = `<img src="/img/search.svg" />`

				},
				error: function ( data ) {
					toastr.error('There was an unexpected error, please contact support');
					document.getElementById('search-collection-btn').innerHTML = `<img src="/img/search.svg" />`

					
				}
			} );
			}
			document.getElementById('close-search-doi').addEventListener('click', function(e) {
			document.getElementById('custom-ciation').value ="";

			let sidebar = document.getElementById("sidebar");
						
                            let content = document.getElementById("content");
							let upload_citation = document.getElementById("upload-citation");
                            content_show = document.getElementById("content-show");
                            upload_citation.style.display = "none";
                            if(content_show){
                                content_show.classList.remove("col-xl-6");
                                content_show.classList.add("col-xl-9");
							}else if(sidebar){
							
                                sidebar.classList.add("col-xl-4");
                                content.classList.add("col-xl-8");
                                sidebar.classList.remove("col-xl-3");
                                content.classList.remove("col-xl-6");
                            
                            }else{
                                 sidebar = document.getElementById("right-tools-top-box");
							
                                sidebar.style.display = "block";
                            }
							
							
		});
		
		let filter_select_style ="";

		for(let i=0;i<style_citation_format.length;i++){
			filter_select_style+= `<option value="${style_citation_format[i].name}">${style_citation_format[i].name.toUpperCase()}</option>`
		}
		document.getElementById('filter-select-style').innerHTML =filter_select_style;
		document.getElementById('filter-select-style').addEventListener('change', function(e) {
		changeStyle(e?.target?.value);
		});