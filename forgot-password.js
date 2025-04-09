// forgot-password.js
const form = document.getElementById("forgotPasswordForm");

form.addEventListener("submit", async (e) => {
  e.preventDefault();
  const emailInput = document.getElementById("email").value;

  // Validate email (you can use a regular expression or a library like validator.js)
  if (!isValidEmail(emailInput)) {
    alert("Please enter a valid email address.");
    return;
  }

  // Send a request to your server (replace with your actual API endpoint)
  try {
    const response = await fetch("/api/reset-password", {
      method: "POST",
      body: JSON.stringify({ email: emailInput }),
      headers: {
        "Content-Type": "application/json",
      },
    });

    if (response.ok) {
      alert("Password reset instructions sent to your email.");
    } else {
      alert("Something went wrong. Please try again later.");
    }
  } catch (error) {
    console.error("Error sending request:", error);
  }
});

function isValidEmail(email) {
  // Implement your email validation logic here
  // (e.g., regex or external library)
  return true;
}
