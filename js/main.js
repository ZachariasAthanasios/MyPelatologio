// Login - SignUp - Forgot Password Focus Input
const inputs = document.querySelectorAll(".input");

function addfocus(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remfocus(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}

inputs.forEach(input => {
	input.addEventListener("focus", addfocus);
	input.addEventListener("blur", remfocus);
});



// Sidebar Active Link
// Θέλω να υπάρχει το hover effect στο Sidebar στην σελίδα όπου θα βρίσκομαι.