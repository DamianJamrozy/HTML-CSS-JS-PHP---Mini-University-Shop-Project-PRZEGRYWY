
function open_curr(clicked_id){
	sessionStorage.setItem("clicked_id", clicked_id);
	//alert(clicked_id);
	const win = open('../sites/product.php','_self');
}

