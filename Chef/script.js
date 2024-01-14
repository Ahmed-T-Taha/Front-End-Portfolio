class Account {
  constructor(username, email, password) {
    this.username = username;
    this.email = email;
    this.password = password;
  }
}
var registeredAccounts = [];
var storedRegisteredAccounts = sessionStorage.getItem("registeredAccounts");
if (storedRegisteredAccounts !== null) {
  registeredAccounts = JSON.parse(storedRegisteredAccounts);
}

function setAccount() {
  var activeAccount = sessionStorage.getItem("activeAccount");
  if (activeAccount === null) {
    document.getElementById("header-signout").style = "display: none;";
  } else {
    document.getElementById("header-account").style = "display: none;";
    document.getElementById("header-signout").innerHTML =
      "Welcome, " +
      activeAccount +
      '<ul><li><a href="#" onclick="signout()">Sign out</a></ul></li>';
  }
}

function signout() {
  sessionStorage.removeItem("activeAccount");
  window.location = "home.html";
  alert("Successfully signed out!");
}

function login() {
  var usernameOrEmail = document.getElementById("email-or-username").value;
  var password = document.getElementById("password").value;

  for (var i = 0; i < registeredAccounts.length; i++) {
    var account = registeredAccounts[i];
    var found =
      password == account.password &&
      (usernameOrEmail == account.email || usernameOrEmail == account.username);

    if (found) {
      sessionStorage.setItem("activeAccount", account.username);
      window.location = "home.html";
      alert("Login Successful");
      return;
    }
  }
  alert("Login Failed");
}

function signup() {
  var password = document.getElementById("password").value;
  var passwordRepeat = document.getElementById("password-repeat").value;
  if (password != passwordRepeat) {
    alert("Passwords do not match!");
    return;
  }

  var username = document.getElementById("username").value;
  var email = document.getElementById("password").value;

  for (var i = 0; i < registeredAccounts.length; i++) {
    var account = registeredAccounts[i];
    if (username == account.username) {
      alert("Username already exists!");
      return;
    }

    if (email == account.email) {
      alert("Email already exists!");
      return;
    }
  }

  registeredAccounts.push(new Account(username, email, password));
  sessionStorage.setItem(
    "registeredAccounts",
    JSON.stringify(registeredAccounts)
  );
  sessionStorage.setItem("activeAccount", username);
  window.location = "home.html";
  alert("Account created successfully");
}

function addQuote() {
  document.getElementById("footer-quote").innerHTML =
    "“Cooking is like love. It should be entered into with abandon or not at all.” - Harriet Van Horne";
}

function collapse() {
  details = document.getElementsByTagName("details");
  for (var i = 0; i < details.length; i++) {
    details[i].removeAttribute("open");
  }
}

function expand() {
  details = document.getElementsByTagName("details");
  for (var i = 0; i < details.length; i++) {
    details[i].open = true;
  }
}

function contact() {
  var subject = document.getElementById("subject").value;
  var body = document.getElementById("body").value;
  window.location.href =
    "mailto:20p5437@eng.asu.edu.eg?subject=" + subject + "&body=" + body;
}

function setColor(color) {
  document.getElementsByTagName("body")[0].style.color = color;
}

function setSize(size) {
  document.getElementsByTagName("body")[0].style.fontSize = size;
}

function changeRecipe() {
  link = document.getElementById("recipe-link");
  image = document.getElementById("recipe-image");

  if (link.href.endsWith("brownies.html")) {
    link.href = "cookies.html";
    image.style.opacity = "0";
    setTimeout(function () {
      image.src = "img/cookies.jpg";
      image.style.opacity = "1";
    }, 500);
  } else {
    link.href = "brownies.html";
    image.style.opacity = "0";
    setTimeout(function () {
      image.src = "img/brownies.jpg";
      image.style.opacity = "1";
    }, 500);
  }
}

function quiz() {
  var correctAnswers = ["B", "B", "D", "A", "A", "C", "A", "A", "A", "A"];
  var percent = 0;
  for (var i = 0; i < 10; i++) {
    if (document.getElementById("q" + i).value === correctAnswers[i]) {
      percent += 10;
    }
  }

  if (percent >= 70) {
    message =
      "You're a food expert!<br>Boast among your friends that you know food history and culinary techniques.";
  } else if (percent >= 30) {
    message =
      "You have a good knowledge of food history,<br>and possess some idea about culinary techniques.";
  } else {
    message =
      "Alas! You need to read more about food history and culinary techniques.";
  }

  result = document.getElementById("quiz-score").innerHTML =
    "You achieved a score of " + percent + "%";
  result = document.getElementById("quiz-message").innerHTML = message;
  result = document.getElementById("quiz-result").style.display = "block";
}
