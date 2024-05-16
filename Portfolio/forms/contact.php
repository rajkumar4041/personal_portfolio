<script>
  // Function to handle form submission
  function submitForm(event) {
    event.preventDefault(); // Prevent default form submission

    // Collect form data
    var formData = {
      name: document.getElementById("name").value,
      email: document.getElementById("email").value,
      subject: document.getElementById("subject").value,
      message: document.getElementById("message").value
    };

    // Send form data to PHP script using Fetch API
    fetch('contact.php', {
      method: 'POST',
      body: JSON.stringify(formData),
      headers: {
        'Content-Type': 'application/json'
      }
    })
    .then(response => response.json())
    .then(data => {
      if (data.status === "success") {
        // Form submission successful, display success modal
        document.getElementById("emailModalBody").innerText = "Your message has been sent. Thank you!";
        $("#emailModal").modal("show");

        // Hide the success modal after 2 seconds
        setTimeout(function() {
          $("#emailModal").modal("hide");
        }, 2000);
      } else {
        // Form submission failed, display error modal
        document.getElementById("emailModalBody").innerText = "There was an error sending your message. Please try again later.";
        $("#emailModal").modal("show");

        // Hide the error modal after 2 seconds
        setTimeout(function() {
          $("#emailModal").modal("hide");
        }, 2000);
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }

  // Attach event listener to form submit event
  document.getElementById("contactForm").addEventListener("submit", submitForm);
</script>
