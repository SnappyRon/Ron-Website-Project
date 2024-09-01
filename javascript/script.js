document.addEventListener("DOMContentLoaded", function() {
    // Define the bookCar function
    function bookCar(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Get the form element
        const form = event.target;

        // Create FormData object to collect form data
        const formData = new FormData(form);

        // Submit the form asynchronously using fetch
        fetch("connectdb.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json()) // Parse response as JSON
        .then(data => {
            if (data.success) {
                // Display a success message if the response indicates success
                alert("Booking successful!");
                // Redirect the user after displaying the success message
                window.location.href = "index.php";
            } else {
                // Display an error message if the response indicates failure
                alert("Booking failed. " + data.error);
            }
        })
        .catch(error => {
            // Handle error as needed
            console.error('Error:', error);
            alert("An error occurred. Please try again later.");
        });
    }
    // Check if the form has been submitted
    if(document.getElementById("booking-form").checkValidity() === true) {
        // Display an alert message
        alert("Your rental has been successfully submitted!");
        // Redirect to the index page
        window.location.href = "index.php";
    }
});