<html>
<head>
<style>
@page {
	size: 8.5in 11in;
	sheet-size: Letter;
	margin: 7%;
	margin-header: 5mm; 
	margin-footer: 5mm;
	odd-footer-name: html_rxFooter;
	even-footer-name: html_rxFooter;
}

body {
	font-family: Arial, sans-serif;
	font-size: 11;
}

h2 {
	text-align: center;
}

p {
	text-align: center;
}

div.outline {
	border: 1;
	border-style: solid;
}

p.borders {
	border: 1;
	border-style: solid;
}

table.top {
	width: 700;
}

table.order {
	width: 700;
}

th {
	background-color: gray;
	color: #FFFFFF;
}
</style>
</head>
<body>
<div id="clinicDetails">
	<h2>
		<?php echo $practiceName;?>
	</h2>
	<p>
		<?php echo $practiceInfo;?><br>
		<?php echo auto_link(prep_url($website));?><br>
		<?php echo $address->ordering_id;?>
	</p>
</div>
<p><b><?php echo $title;?></b></p>
<table class="top" cellspacing="10">
	<tr>
		<th style="width:350">PATIENT DEMOGRAPHICS</th>
		<th style="width:350">GUARANTOR AND INSURANCE INFORMATION</th>
	</tr>
	<tr>
		<td>
			<?php echo $patientInfo->lastname. ', ' . $patientInfo->firstname;?><br>
			Date of Birth: <?php echo $dob;?><br>
			<?php echo $patientInfo->address;?><br>
			<?php echo $patientInfo->city . ', ' . $patientInfo->state . ' ' . $patientInfo->zip;?><br>
			<?php echo $patientInfo->phone_home;?><br>
		</td>
		<td>
			<?php echo $insuranceInfo;?>
		</td>
	</tr>
</table><br>
<div class="outline">
	<table class="order" cellspacing="10">
		<tr>
			<th style="width:550"><?php echo $title1;?></th>
			<th style="width:150">DATE</th>
		</tr>
		<tr>
			<td>
				<?php echo $address->displayname;?><br>
				<?php echo $address->street_address1;?><br>
				<?php if ($address->street_address2 != '') {echo $address->street_address2 . '<br>';}?>
				<?php echo $address->city . ', ' . $address->state . ' ' . $address->zip;?><br>
				<?php echo $address->phone;?><br>
			</td>
			<td><?php echo $orders_date;?></td>
		</tr>
	</table><br>
	<table class="order" cellspacing="10">
		<tr>
			<th style="width:350">DIAGNOSES</th>
			<th style="width:350">SIGNATURE</th>
		<tr>
		<tr>
			<td><?php echo $dx;?></td>
			<td>
				&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
				<hr/>
				<?php echo $orders->encounter_provider;?><br>
			</td>
	</table><br>
	<table class="order" cellspacing="10">
		<tr>
			<th style="width:700"><?php echo $title2;?></th>
		</tr>
		<tr>
			<td><?php echo $text;?></td>
			</tr>
	</table>
</div>

<htmlpagefooter name="rxFooter" style="display:none">
<p>The information on this page is CONFIDENTIAL.  Any release of this information requires the expressed written authorization of the patient listed above.  For questions regarding this document, please contact the practice.</p>
<p>This document was generated by NOSH EMR.</p>
</htmlpagefooter>
</body>
</html>