function toastr() {
	    var x = document.getElementById("snackbarr")
	    x.className = "show";
	    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);	    
}
onload=toastr