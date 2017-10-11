
<style type="text/css">
  .text-right{
    text-align:right;
}
.text-center{
    text-align:center;
}
.text-left{
    text-align:left;
}
#logo {
	background-image: url('{{URL::to('image/certificate.png')}}');
	background-repeat: no-repeat;
	background-position: 50px 10px;
}

p{
	line-height: 60%;
}

</style>
<div>
	<div id="logo">
		<p class="text-center">Province of Laguna</p>
		<p class="text-center">City of Santa Rosa</p>
		<p class="text-center"><strong>BARANGAY TAGAPO</strong></p>
		<p class="text-center">Tel. No. : (049) 534-5751</p>
	</div>
	
	<div>
		<h3 class="text-center">OFFICE OF THE BARANGAY CHAIRMAN</h3>
		<p class="text-right">Date: <?php echo date('Y-m-d');?></p>
	</div>
	<div>
		<p class="text-left">TO WHOM IT MAY CONCERN:</p>
		<p>&nbsp;&nbsp;&nbsp;
			This is to certify that the undersigned hereby approved the herein application of
		</p>
	</div>
	<div>
		<p class="text-center"><strong>{{$find->fname}} {{$find->mname}} {{$find->lname}}</strong></p>
		<p class="text-center">(Business Owner)</p>
		<p class="text-center">For a Barangay Clearance to operate the business of</p>
	</div>

	<div>
		<p class="text-center"><strong>{{$request->b_name}}</strong></p>
		<p class="text-center">(Business Name)</p>
		<p class="text-center">Located at</p>
	</div>

	<div>
		<p class="text-center"><strong>{{$request->b_address}}</strong></p>
		<p class="text-center">(Business Address)</p>
	</div>
	

	<div>
		<p>
			This certificates that the applicant pledges to abide with laws, rules and regulations regarding the said activity the same is not a nuisance to public order and safety.
		</p>
		
		<p>
			This is being issued to the applicant for presentation to the Business Permits and Licensing Office (BPLO), this city and all offices and agencies concerned prior to the issuance of any permit regarding the said activity pursuant to Republic Act 7160 otherwise known as the Local Government Code of 1991.
		</p>
		<p class="text-center">Issued this <?php echo date('d');?>  day of <?php echo date('F');?> month, year <?php echo date('Y');?>.</p>
	</div>

	<div>
		<p class="text-left">Certified by:</p>
		<h5 class="text-center">HON. ALDRIN M. LUMAGUE</h5>
		<p class="text-center">Punong Barangay</p>
	</div>

	<div>
		<p class="text-left">Assessed by:</p>
		<p class="text-left">____________</p>
	</div>
	<div>
		<p class="text-right">Business Status</p>
		<p class="text-right">{{$request->status}}</p>
	</div>

</div>