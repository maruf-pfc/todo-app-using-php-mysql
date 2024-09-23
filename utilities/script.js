// Get modal element
const modal = document.getElementById("modal");

// Get open modal button
const addStudentBtn = document.getElementById("addStudentBtn");

// Get close button
const closeBtn = document.getElementById("closeBtn");

// Listen for open click
addStudentBtn.onclick = function() {
    modal.style.display = "block";
}

// Listen for close click
closeBtn.onclick = function() {
    modal.style.display = "none";
}

// Listen for outside click
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
}

// Function to remove the <p> tag after 2 seconds
setTimeout(function() {
    var messageElement = document.getElementById("message");
    if (messageElement) {
        messageElement.remove(); // Removes the entire <p> element
    }
}, 2000); // 2000 milliseconds = 2 seconds