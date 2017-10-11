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
</style>
<div>
	
	<div id="logo">
		<p class="text-center">REPUBIC OF THE PHILIPPINES</p>
		<p class="text-center">PROVINCE OF LAGUNA</p>
		<p class="text-center">CITY OF SANTA ROSA</p>
		<p class="text-center"><strong>BARANGAY TAGAPO</strong></p>
		<p class="text-center">Tel. No. : (049) 534-5751</p>
	</div>
	<br>
	<br>
	<div>
		<h4 class="text-center">OFFICE OF THE BARANGAY CHAIRMAN</h4>
		<h4 class="text-center">CERTIFICATION</h4>
	</div>
	<br>
	<div>
		<h4 class="text-left">TO WHOM IT MAY CONCERN:</h4>
		<br>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;
			This is to certify that <strong>{{$find->fname}} {{$find->mname}} {{$find->lname}}</strong> is a bonafide
Resident of this Barangay with postal address at {{$find->address}}
Barangay Tagapo, City of Santa Rosa, Laguna. He/She is of good moral character and has no criminal record in this Barangay.

		</p>
	</div>
	<br>
	<br>
	<div>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;
			This certification issued upon his/her request on this <?php echo date('d');?> day of <?php echo date('F');?> month , of <?php echo date('Y');?> at BarangayTagapo, City of Santa Rosa, Laguna and whatever legal purpose it may serve.

		</p>
	</div>
	<br>
	<br>
	<br>
	<div>
		<p class="text-right">_______________________</p>
		<h4 class="text-right">HON. ALDRIN M. LUMAGUE</h4>
		<p class="text-right">Punong Barangay</p>
	</div>
	<br>
	<br>
	<div>
		<p><strong>NOTE: Not valid w/o Barangay Official Dry Seal</strong></p>
		<p><strong>Barangay Tagapo, City of Santa Rosa Laguna</strong></p>
	</div>
</div>