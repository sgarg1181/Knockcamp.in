function toast() {
	    var x = document.getElementById("snackbar")
	    var y = document.getElementById("snackbarr")
	    x.className = "show";
	    y.className = "show";
	    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);	  
	    setTimeout(function(){ y.className = y.className.replace("show", ""); }, 3000);	  
}
onload=toast
