<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title;?></title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<style type="text/css">
/**
 * This file NEEDS a locally located stylesheet to generate the appropriate formatting for 
 * transformation into a PDF.  If you alter this file (and you are encouraged to do so) just
 * keep in mind that all of your formatting must be located here.  You might also find that
 * there is limited or no support for a specific CSS style you want (ie: floating) and you'll
 * need to work around with old-school tables.  Sorry for that... ;)  
 */

body {
	margin: 0.5in;
}
h1, h2, h3, h4, h5, h6, li, blockquote, p, th, td {
	font-family: Helvetica, Arial, Verdana, sans-serif; /*Trebuchet MS,*/
}
h1, h2, h3, h4 {
	color: #5E88B6;
	font-weight: normal;
}
h4, h5, h6 {
	color: #5E88B6;
}
h2 {
	margin: 0 auto auto auto;
	font-size: x-large;
}
h2 span {
	text-transform: uppercase;
}

table {
	width: 100%;
}
td p {
	font-size: small;
	margin: 0;
}
th {
	color: #FFF;
	text-align: left;
	background-color:#000000;
}
#footer {
	border-top: 1px solid #CCC;
	text-align: right;
	font-size: 6pt;
	color: #999999;
}
#footer a {
	color: #999999;
	text-decoration: none;
}
table.stripe {
	border-collapse: collapse;
	page-break-after: auto;
}
table.stripe td {
	border-bottom: 1pt solid black;
}
</style>
</head>
<body>
	<table>
		<tr>
			<td width="60%">
				<h2>
					<?php if (isset($practice_logo)) {echo $practice_logo.'<br />';}?>
					<?php echo $practiceInfo->practice_name;?> 
				</h2>
				<p>
					<?php if ($practiceInfo->street_address1 != '') {echo $practiceInfo->street_address1;}?>
					<?php if ($practiceInfo->street_address2 != '') {echo ', ' . $practiceInfo->street_address2;}?>
					<?php if ($practiceInfo->street_address1 != '' || $practiceInfo->street_address2 != '') {echo '<br />';}?>
					<?php if ($practiceInfo->city != '') {echo $practiceInfo->city;}?>
					<?php if ($practiceInfo->state != '') {echo ', ' . $practiceInfo->state;}?>
					<?php if ($practiceInfo->zip != '') {echo ' ' . $practiceInfo->zip;}?>
					<?php if ($practiceInfo->city != '' || $practiceInfo->state != '' || $practiceInfo->zip != '') {echo '<br />';}?>
					<?php echo auto_link(prep_url($practiceInfo->website));?>
				</p>
			</td>
			<td>
				<strong>
					Order Requisition Form<br />
					Date: <?php echo $orders->orders_date;?><br />
				</strong>
			</td>
		</tr>
	</table>

	<table>
		<tr>
			<th width="50%">Patient Name & Address</th>
			<th>Insurance Information</th>
		</tr>
		<tr>
			<td>
				<?php echo $demographics->firstname . ' ' . $demographics->lastname;?><br />
				<?php echo $demographics->address;?><br />
				<?php echo $demographics->city . ', ' . $demographics->state . ' ' . $demographics->zip;?><br />
				DOB: <?php echo $demographics->DOB;?><br />
				Gender: <?php echo $demographics->sex;?><br />
			</td>
			<td>
				Insured Name: <?php echo $insurance->firstname . ' ' . $insurance->lastname;?><br />
				Insurance ID: <?php echo $insurance->id;?><br />
			</td>
		</tr>
	</table>
	
	<table>
		<tr>
			<th width="50%">Diagnoses Codes</th>
			<th>Ordering Provider</th>
		</tr>
		<tr>
			<td>
				<?php if ($type == 'ref') {echo $orders->orders_referrals_icd;}?>
				<?php if ($type == 'labs') {echo $orders->orders_labs_icd;}?>
				<?php if ($type == 'rad') {echo $orders->orders_radiology_icd;}?>
				<?php if ($type == 'cp') {echo $orders->orders_cp_icd;}?>
				<br />
			</td>
			<td>
				<?php echo $orders->encounter_provider;?><br />
				Electronic signature<br />
			</td>
		</tr>
	</table>
	
	<table>
		<tr>
			<th>
				<?php if ($type == 'ref') {echo 'Referrals:';}?>
				<?php if ($type == 'labs') {echo 'Laboratory Studies:';}?>
				<?php if ($type == 'rad') {echo 'Radiology Studies:';}?>
				<?php if ($type == 'cp') {echo 'Cardiopulmonary Studies';}?>
			</th>
		</tr>
		<tr>
			<td>
				<?php if ($type == 'ref') {echo $orders->orders_referrals;}?>
				<?php if ($type == 'labs') {echo $orders->orders_labs;}?>
				<?php if ($type == 'rad') {echo $orders->orders_radiology;}?>
				<?php if ($type == 'cp') {echo $orders->orders_cp;}?>
			</td>
		</tr>
	</table>

	<div id="footer">
		<p>
			Generated by NoshEMR.<br />
			<a href="http://www.noshemr.org/">http://www.noshemr.org</a><br />
			The information on this page is CONFIDENTIAL. Any release of this information requires the expressed written<br/ >
			authorization of the patient listed above. For questions regarding this requisition, please contact the practice.
		</p>
	</div>

</body>
</html>