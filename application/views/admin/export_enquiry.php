<?php	
	
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=export_enquiry.xls");
header("Pragma: no-cache");
header("Expires: 0");
	//set "code" for searches
	
	$out='<table class="gc_table" cellspacing="0" cellpadding="0">
	<thead>
	<tr>';
	$out.='<th >'."No".'</th>';
	$out.='<th >'."Name".'</th>';
	$out.='<th >'."City".'</th>';
	$out.='<th >'."Email".'</th>';
	$out.='<th >'."Mobile".'</th>';
	
	$out.='<th >'."Quotation Sub".'</th>';
	
	
	$out.='</tr>';
	$out.='</thead>';

	if($banners):
	$out.='<tbody id="wildlifes_sortable">';
	$i =1; foreach($banners as $ban)
	{   
	
	    $out.='<tr id="wildlifes-'.$ban->id.'">';
	    $out.='<td>'.$i.'</td>';
	    $out.='<td>'.$ban->client_name .'</td>';
        $out.='<td>'.$ban->cityName .'</td>';
	    $out.='<td>'.$ban->email.'</td>';
	    $out.='<td>'.$ban->mobile.'</td>';
	    $out.='<td>'.$ban->quotation_sub.'</td>';
	    $out.='</tr>';
	$i++; }
	
	$out.='</tbody>';
	 endif;
	$out.='</table>';
	echo $out;

