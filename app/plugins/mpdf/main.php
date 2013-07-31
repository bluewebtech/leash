<?php

require_once 'mpdf.php';

function pdf( $content, $filename = null ) {
	ob_end_clean();
	$mpdf = new mPDF(); 
	$mpdf->debug = true;
	$mpdf->WriteHTML( $content );
	
	if( isset( $filename ) ) {
		$mpdf->Output( $filename . '.pdf', 'D' );
	} else {
		$mpdf->Output();
	}

	exit;
}
