var opened;
window.addEventListener('click', function(e){
	if (opened)
		if (!opened.parentNode.contains(e.target))
			opened.style.display = "none";

},true);


function validarmenu(e, p_id, ch_id) {
	console.log(document.getElementById(ch_id).style.display);
	if(document.getElementById(ch_id).style.display == "none" || document.getElementById(ch_id).style.display == ""){
		document.getElementById(ch_id).style.display = "block";
	}
	else if (ch_id){
		document.getElementById(ch_id).style.display = "none";
	}
	opened = document.getElementById(ch_id);}


