const onContentClicked = event => {
    event.preventDefault();

    console.log(event);
    document.getElementById('content').innerText = "You clicked!";
}

let content = document.getElementById('content');
content.addEventListener('click', onContentClicked);

const onFormSubmit = event => {
    event.preventDefault();

    console.log("form submitted!");

    const formData = {
        text: document.getElementById('text-input').value
    }

    console.log(formData.text);

    fetch("./info-submitted.php", {
        method: 'POST',
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(response => {
        document.getElementById('content').innerText = response.result;
    });
}

document.getElementById('info-enter').addEventListener('submit', onFormSubmit);