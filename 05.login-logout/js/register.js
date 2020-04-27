const registerButton = document.getElementById('register-button');
registerButton.addEventListener('click', (event) => {
	event.preventDefault();

	const registerUsername = document.getElementById('register-username');
	const registerName = document.getElementById('register-name');
	const registerPassword = document.getElementById('register-password');
	const registerConfirmPassword = document.getElementById('register-confirm-password');

	const registerUserData = {
		username: registerUsername.value,
		name: registerName.value,
		password: registerPassword.value,
		confirmPassword: registerConfirmPassword.value
	};

	console.log(registerUserData);

	fetch('./php/register.php', {
		method: 'POST',
		body: JSON.stringify(registerUserData)
	})
	.then(response => response.json())
	.then(response => {
		console.log(response);
	});
})