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
	
	<div>
		<p class="text-center"><b>TANGGAPAN NG PUNONG BARANGAY</b></p>
		<p class="text-center"><b>KATIBAYAN NG ANTAS NG KABUHAYANG PANLIPUNAN</b></p>
		<p class="text-center"><b>(CERTIFICATE OF INDIGENCY)</b></p>
	</div>
	<br>
	<div>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;
			Pina tutunayanng tanggapang ito sa abot ng aking kaalaman at pinanaligang impormasyon na si {{$find->fname}} {{$find->lname}} ng {{$find->address}} ay nabibiliang sa pinakamahirap na mamamayang Barangay Tagapo.	

		</p>
	</div>
	<div>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;
			Ginawa sa kahilingan ng nasa itaas para sa: {{$request['b_purpose']}}
		<p>&nbsp;&nbsp;&nbsp;&nbsp;
			Bilang patunay ng lahat ng ito, inilalakip ko ang aking lagda sa ibabaw ng aking pangalan ngayong ika- <?php echo date('d');?> buwanng <?php echo date('F');?>, taong <?php echo date('Y');?> ng Barangay Tagapo,Lungsod ng Santa Rosa Laguna.
		</p>
	</div>
	
	<div>
		<p class="text-right">Nagpapatunay:</p>
		<br>
		<p class="text-right">__________________</p>
		<h4 class="text-right">HON. ALDRIN M. LUMAGUE</h4>
		<p class="text-right">Punong Barangay</p>
	</div>
	
</div>