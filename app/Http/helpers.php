<?php 
	
function formatDate($date_column) {
	echo date('F jS, Y - g:iA', strtotime($date_column));
}