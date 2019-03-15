/*
	 * This is the main car class used to create an Inventory Management System.
	 *
	 * @author   Celine Leano
	 * @author   Adolfo Gonzalez
	 * @version  1.0
	 *
	 * File: admin-login.php
 */

//variable fields
var username = document.getElementById("username");
var password = document.getElementById("password");
var letter = document.getElementById("letter");
var number = document.getElementById("number");

// on click  user field
username.onfocus = function () {
    document.getElementById("username").style.display = "block";
};

// when clicked out
username.onblur = function () {
    document.getElementById("username").style.display = "none";
};

// clicks on password field,
password.onfocus = function () {
    document.getElementById("password").style.display = "block";
};

// when click out
password.onblur = function () {
    document.getElementById("password").style.display = "none";
};

// When the user starts to type something inside the password field
password.onkeyup = function () {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if (password.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if (password.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }


    // Validate numbers
    var numbers = /[0-9]/g;
    if (password.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }

    // Validate length
    if (password.value.length >= 4) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }

};