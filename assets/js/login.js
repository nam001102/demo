document.addEventListener("DOMContentLoaded", function () {
  const loginForm = document.getElementById("loginForm");
  const registerForm = document.getElementById("registerForm");
  const switchToRegister = document.getElementById("switchToRegister");
  const switchToLogin = document.getElementById("switchToLogin");

  function showRegister() {
    // Fade out login
    loginForm.classList.remove("fade-in");
    loginForm.classList.add("fade-out");

    // After fade-out, hide login and show register
    setTimeout(() => {
      loginForm.classList.add("d-none");
      registerForm.classList.remove("d-none");
      registerForm.classList.remove("fade-out");
      registerForm.classList.add("fade-in");
    }, 300); // must match fade animation duration
  }

  function showLogin() {
    // Fade out register
    registerForm.classList.remove("fade-in");
    registerForm.classList.add("fade-out");

    // After fade-out, hide register and show login
    setTimeout(() => {
      registerForm.classList.add("d-none");
      loginForm.classList.remove("d-none");
      loginForm.classList.remove("fade-out");
      loginForm.classList.add("fade-in");
    }, 300);
  }

  switchToRegister.addEventListener("click", (e) => {
    e.preventDefault();
    showRegister();
  });

  switchToLogin.addEventListener("click", (e) => {
    e.preventDefault();
    showLogin();
  });
});