const firebaseConfig = {
    apiKey: "AIzaSyAtw6tJb4I-kIZH4yipRSHXYBv0aZODvBA",
    authDomain: "pink-cheese-cake.firebaseapp.com",
    projectId: "pink-cheese-cake",
    storageBucket: "pink-cheese-cake.appspot.com",
    messagingSenderId: "501778632124",
    databaseURL: "https://pink-cheese-cake-default-rtdb.firebaseio.com",
    appId: "1:501778632124:web:ed0b1f124f3f5bc6032fb9"
};



firebase.initializeApp(firebaseConfig);

var contactFormDB = firebase.database().ref("contactForm");

document.getElementById("contactForm").addEventListener('submit', submitForm);

function submitForm(e) {
    e.preventDefault();
    var name = getElementVal('NameInput');
    var email = getElementVal('emailInput');

    console.log(name, email);

    saveMessages(name, email);
}

const getElementVal = (id) => {
    return document.getElementById(id).value;
}

const saveMessages = (name, email) =>{
    var newContactForm = contactFormDB.push();
    newContactForm.set({
        name: name,
        email: email
    }).then(() => {
        // После успешного сохранения данных в Firebase отправляем письмо
        sendEmail(name, email);
    }).catch(error => {
        console.error("Error saving to Firebase: ", error);
    });
}

function sendEmail(name, email) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "sender.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("Email sent successfully");
            // Можно добавить дополнительные действия после успешной отправки письма
        }
    };
    xhr.send("name=" + name + "&email=" + email);
}
