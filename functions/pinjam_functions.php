<?php
/*	function total_price($pinjam){
		if(is_array($pinjam)){
		  	foreach($pinjam as $isbn => $qty){
		  		if($bookprice){
		  		}
		  	}
		}
		return $price;
	}*/

	function total_items($pinjam){
		$items = 0;
		if(is_array($pinjam)){
			foreach($pinjam as $isbn => $qty){
				$items += $qty;
			}
		}
		return $items;
	}
?>