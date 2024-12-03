document.getElementById('alertButton').onclick = function () {
    alert("Thank you for your interest! We're excited to connect with you.");
};
document.getElementById("contactForm").addEventListener("submit", function (event) {
    event.preventDefault();
    alert("Thank you for contacting us!");
    this.reset();
});