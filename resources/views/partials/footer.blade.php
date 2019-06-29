 <!-- start Footer  -->
     <div class="footer">
	      <section class="page-footer">
	        <div class="container">
	         <div class="row">
	           <div class="widget col-lg-3 col-md-3 col-sm-6 col-xs-6 mt-5">
	             <h3 class="mb-3">Medicines</h3>
	             <ul class="list-unstyled ">
	             	@if(isset ($Medi))	
	        			@foreach($Medi as $Medicine)
	               <li><i class="fas fa-chevron-right"> </i> <a href ="{{ route('BookNow',['id'=> $Medicine['id'] ]) }}">{{ strtoupper($Medicine['Medicine_Name']) }}</a></li>
	               		@endforeach
	               	@else
	               		{{"No Data Found"}}
	             	@endif
	             </ul>
	           </div>
	           		<div class="widget col-lg-3 col-md-3 col-sm-6 col-xs-6 mt-5">
	             <h3 class="mb-3">Categores</h3>
	             <ul class="list-unstyled ">
	             	@if(isset ($cate))	
	        			@foreach($cate as $category)
	               <li><i class="fas fa-chevron-right"> </i> <a href ="{{ route('Medicinefilter',['filter'=> $category['Category_name'] ] ) }}">{{ strtoupper($category['Category_name']) }}</a></li>
	               		@endforeach
	               	@else
	               		{{"No Data Found"}}
	             	@endif
	             </ul>
	           </div>
	           <div class="widget col-lg-3 col-md-3 col-sm-6 col-xs-6 mt-5" >
	            	<h3 class="mb-3">Pharmacies</h3>
	             <ul class="list-unstyled">
	        		@if(isset ($Pharm))	
	        			@foreach($Pharm as $pharm)
	               <li><i class="fas fa-chevron-right"> </i> <a href ="{{ route('Medicinefilter',['filter'=> $pharm['PharmacyName'] ] ) }}">{{ strtoupper($pharm['PharmacyName']) }}</a></li>
	               		@endforeach
	               	@else
	               		{{"No Data Found"}}
	             	@endif
	             </ul>
	           </div>
	           <div  class="widget col-lg-3 col-md-3 col-sm-6 col-xs-6 mt-5">
	           <h3 class="mb-3">Contact-Us</h3>
		           <i class="fab fa-facebook-f pr-4"></i>
		           <i class="fab fa-google-plus-g pr-4"></i>
		           <i class="fab fa-twitter pr-4"></i>
		           <i class="fab fa-facebook-messenger "></i>
	           </div>
	         </div>
	        </div>

	      </section>
	        <div class="alert  text-center m-0" role="alert">
	           Pharmcy 2019 | Created with  by AEATemplates
	        </div>
      </div>
     <!-- End Footer  -->
