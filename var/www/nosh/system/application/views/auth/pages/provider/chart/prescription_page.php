<html>
	<head>
		<style>
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
			b.smallcaps {
				font-variant: small-caps;
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
			table.rx {
				width: 700;
			}
			th {
				background-color: gray;
				color: #FFFFFF;
			}
		</style>
	</head>
	<body>
		<div style="float:left;width:300px;">
			<b><?php echo $practiceName;?></b><br><?php echo $practiceInfo;?><br><?php echo auto_link(prep_url($website));?>
		</div>
		<div style="float:left;width:380px;">
			<?php echo $practiceLogo;?>
		</div>
		<div style="border-bottom: 1px solid #000000; text-align: center; padding-bottom: 3mm; ">
			<img src="<?php echo base_url();?>images/rxicon.png" border='0' height="30" width="30"><b class="smallcaps">Prescription</b>
		</div>
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
			<table class="rx" cellspacing="10">
				<tr>
					<th style="width:550">MEDICATION</th>
					<th style="width:150">DATE</th>
				</tr>
				<tr>
					<td><?php echo $rx->rxl_medication. ' ' . $rx->rxl_dosage . ' ' . $rx->rxl_dosage_unit;?></td>
					<td><?php echo $rx_date;?></td>
				</tr>
			</table><br>
			<table class="rx" cellspacing="10">
				<tr>
					<th style="width:400">INSTRUCTIONS</th>
					<th style="width:150">QUANTITY</th>
					<th style="width:150">REFILLS</th>
				</tr>
				<tr>
					<td><?php if ($rx->rxl_instructions != '') {echo $rx->rxl_instructions . ' for ' . $rx->rxl_reason;} else {echo $rx->rxl_sig . ' ' . $rx->rxl_route . ' ' . $rx->rxl_frequency . ' for ' . $rx->rxl_reason;}?></td>
					<td>***<?php echo $rx->rxl_quantity;?>*** <?php echo $quantity_words;?></td>
					<td>***<?php echo $rx->rxl_refill;?>*** <?php echo $refill_words;?></td>
				</tr>
			</table>
			<table class="rx" cellspacing="10">
				<tr>
					<th style="width:350">SPECIAL INSTRUCTIONS</th>
					<th style="width:350">SIGNATURE</th>
				<tr>
				<tr>
					<td><?php if ($rx->rxl_daw != '') {echo $rx->rxl_daw . '<br>';}?></td>
					<td>
						<?php echo $signature;?>
						<!-->&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>-->
						<p style="font-size:2pt;">THIS IS AN ORIGINAL PRESCRIPTION-THIS IS AN ORIGINAL PRESCRIPTION-THIS IS AN ORIGINAL PRESCRIPTION-THIS IS AN ORIGINAL PRESCRIPTION-THIS IS AN ORIGINAL PRESCRIPTION-THIS IS AN ORIGINAL PRESCRIPTION</p>
						<?php echo $rx->rxl_provider;?><br>
						<?php if ($rx->rxl_dea != '') {echo 'DEA Number: ' . $rx->rxl_dea . '<br>';}?>
					</td>
			</table>
		</div>
		<p>Security features: (*) bordered and spelled quantities, microprint signature line visible at 5x or > magnification that must show "THIS IS AN ORIGINAL PRESCRIPTION", and this description of features.</p>
		<p><b>Allergies:</b><br><?php echo $allergyInfo;?></p>
		<htmlpagefooter name="rxFooter" style="display:none">
			<p>The information on this page is CONFIDENTIAL.  Any release of this information requires the expressed written authorization of the patient listed above.  For questions regarding this prescription, please contact the practice.<br>
			Please reference the prescription ID for security purposes: <?php echo $rx->rxl_id . '-' . $rx->pid;?></p>
			<p>This prescription was generated by NOSH ChartingSystem.</p>
		</htmlpagefooter>
	</body>
</html>