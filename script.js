/* =========================
   VARIABLES
========================= */

// const variable
const eventName = "TechFest 2026";

// let variable
let participantCount = 120;

// display values in DOM
document.getElementById("eventMessage").textContent =
  "Welcome to " + eventName + " 🚀";

document.getElementById("participantCount").textContent =
  participantCount;

// console logging
console.log("Event Name:", eventName);
console.log("Participants:", participantCount);

// demonstrate let reassignment
document
  .getElementById("updateCountBtn")
  .addEventListener("click", function () {

    participantCount = participantCount + 1;

    document.getElementById("participantCount").textContent =
      participantCount;

    console.log("Updated participants:", participantCount);

  });

// const reassignment attempt
try {
  eventName = "New Event";
} catch (error) {
  console.log("Const cannot be reassigned");
}



/* =========================
   FUNCTIONS
========================= */

// Function Declaration
function showWelcome(name) {
  return "Welcome to TechFest, " + name + "!";
}

// Function Expression
const calculateRegistration = function (price, count) {
  return price * count;
};

// Arrow Function
const changeHeroText = () => {
  document.querySelector(".hero h1").textContent =
    "Build the Future With Us 🚀";
};

// calling function
console.log(showWelcome("Student"));

console.log("Total Price:", calculateRegistration(500, 3));



/* =========================
   OBJECT
========================= */

const event = {

  name: "TechFest 2026",
  location: "Vijayawada",
  days: 3,

};

// dot notation
console.log(event.name);

// bracket notation
console.log(event["location"]);

// update property
event.days = 4;

console.log("Updated days:", event.days);



/* =========================
   METHODS
========================= */

const techEvent = {

  name: "TechFest",
  participants: 120,

  increaseParticipants: function () {

    this.participants++;

    document.getElementById("participantCount").textContent =
      this.participants;

  }

};



/* =========================
   POPUP BOXES
========================= */

window.addEventListener("load", function () {

  alert("Welcome to TechFest 2026!");

  const userName = prompt("Enter your name:");

  if (userName) {

    document.getElementById("eventMessage").textContent =
      "Hello " + userName + ", welcome to TechFest!";

  }

});



/* =========================
   EVENTS
========================= */

// click event

document
.querySelector(".btn-primary")
.addEventListener("click", function (e) {

  e.preventDefault();

  const confirmRegister =
    confirm("Do you want to register for TechFest?");

  if (confirmRegister) {

    alert("Registration Successful!");

  }

});


// mouseover event

document
.querySelector(".hero")
.addEventListener("mouseover", function () {

  this.style.background =
    "linear-gradient(to bottom,#1e293b,#0f172a)";

});


// input event

const feedbackInput =
  document.querySelector("#feedback textarea");

feedbackInput.addEventListener("input", function () {

  console.log("User feedback:", this.value);

});