const loginButton = document.getElementById('login-button');
loginButton.addEventListener('click', (event) => {
	event.preventDefault();

	const loginUsername = document.getElementById('login-username');
	const loginPassword = document.getElementById('login-password');

	const loginUserData = {
		username: loginUsername.value,
		password: loginPassword.value
	};

	console.log(loginUserData);
})