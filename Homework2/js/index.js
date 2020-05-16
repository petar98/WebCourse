const saveButton = document.getElementById('save-button')
saveButton.addEventListener('click', (event) => {
    event.preventDefault();

    let personalInfo = {
        firstName: document.getElementById('first-name').value,
        lastName: document.getElementById('last-name').value,
        year: document.getElementById('year').value,
        major: document.getElementById('major').value,
        fn: document.getElementById('fn').value,
        group: document.getElementById('group').value,
        birthdate: document.getElementById('birthdate').valueAsDate,
        link: document.getElementById('link').value,
        image: document.getElementById('image').value,
        motivation: document.getElementById('motivation').value
    };

    let isValidated = true;
    for (const [key, value] of Object.entries(personalInfo)) {
        if (!validateNotEmpty(value)) {
            alert('Please fill in all fields before saving!');
            isValidated = false;
            break;
        }
    }

    if (isValidated) {
        const zodiacSign = getZodiacSign(personalInfo.birthdate.getDate(), personalInfo.birthdate.getMonth() + 1);
        personalInfo.zodiacSign = zodiacSign;
        let zodiacSignText = document.getElementById('zodiac-sign');
        zodiacSignText.innerText = 'Zodiac Sign: ' + zodiacSign;
        zodiacSignText.classList.remove('hidden');
        passDataToServer(personalInfo);
    }
});

function validateNotEmpty(field) {
    if (field === '') {
        console.log('false');
        return false;
    }
    return true;
}

function getZodiacSign(day, month) {
    if((month == 1 && day <= 20) || (month == 12 && day >=22)) {
      return "Capricorn";
    } else if ((month == 1 && day >= 21) || (month == 2 && day <= 18)) {
      return "Aquarius";
    } else if((month == 2 && day >= 19) || (month == 3 && day <= 20)) {
      return "Pisces";
    } else if((month == 3 && day >= 21) || (month == 4 && day <= 20)) {
      return "Aries";
    } else if((month == 4 && day >= 21) || (month == 5 && day <= 20)) {
      return "Taurus";
    } else if((month == 5 && day >= 21) || (month == 6 && day <= 20)) {
      return "Gemini";
    } else if((month == 6 && day >= 22) || (month == 7 && day <= 22)) {
      return "Cancer";
    } else if((month == 7 && day >= 23) || (month == 8 && day <= 23)) {
      return "Leo";
    } else if((month == 8 && day >= 24) || (month == 9 && day <= 23)) {
      return "Virgo";
    } else if((month == 9 && day >= 24) || (month == 10 && day <= 23)) {
      return "Libra";
    } else if((month == 10 && day >= 24) || (month == 11 && day <= 22)) {
      return "Scorpio";
    } else if((month == 11 && day >= 23) || (month == 12 && day <= 21)) {
      return "Sagittarius";
    } else {
        return "None";
    }
}

function passDataToServer(dataObject) {
    fetch('php/saveData.php', {
        method: 'POST',
        body: JSON.stringify(dataObject)
    })
    .then(response => response.json())
    .then(response => {
        if (response.status) {
            emptyFields();
            alert("Your data has successfully been saved!");
        } else if (response.message) {
            alert(response.message);
            emptyFields();
        } else {
            alert("Sorry, your data could not be saved");
        }
    });
}

function emptyFields() {
  document.getElementById('first-name').value = "";
  document.getElementById('last-name').value = "";
  document.getElementById('year').value = "";
  document.getElementById('major').value = "";
  document.getElementById('fn').value = "";
  document.getElementById('group').value = "";
  document.getElementById('birthdate').valueAsDate = new Date;
  document.getElementById('link').value = "";
  document.getElementById('image').value = "";
  document.getElementById('motivation').value = "";
  document.getElementById('zodiac-sign').classList.add('hidden');
}