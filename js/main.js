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


// Hide / Show password
const password = document.getElementById('password-field');
const view = document.getElementById('hide1');
const hide = document.getElementById('hide2');

function showHide() {
    if (password.type === "password") {
        password.type = "text";
        view.style.display = "block";
        hide.style.display = "none";
    } else {
        password.type = "password";
        view.style.display = "none";
        hide.style.display = "block";
    }
}

// Sidebar Active Link
// Θέλω να υπάρχει το hover effect στο Sidebar στην σελίδα όπου θα βρίσκομαι.