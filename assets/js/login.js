document.addEventListener("DOMContentLoaded", function () {
    const glassContainer = document.querySelector(".glassContainer");
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("registerForm");
    const switchToRegister = document.getElementById("switchToRegister");
    const switchToLogin = document.getElementById("switchToLogin");

    const loginBtn = loginForm.querySelector("button[type='submit']");
    const registerBtn = registerForm.querySelector("button[type='submit']");

    // --- Utility functions ---
    let resizeTimeout;
    function updateContainerHeight() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            const currentForm = !loginForm.classList.contains("d-none")
                ? loginForm
                : registerForm;
            const newHeight = currentForm.scrollHeight + 50 + "px";
            glassContainer.style.height = newHeight;
        }, 50);
    }
    function setError(id, message) {
        const errorDiv = document.getElementById(id);
        if (errorDiv) {
            errorDiv.textContent = message;
            errorDiv.classList.remove("d-none");
            updateContainerHeight();
        }
    }

    function clearErrors() {
        document.querySelectorAll(".error-message").forEach(e => {
            e.textContent = "";
            e.classList.add("d-none");
        });
        updateContainerHeight();
    }

    function addInputListeners(form) {
        const inputs = form.querySelectorAll("input");
        inputs.forEach(input => {
            input.addEventListener("input", () => {
                const error = document.getElementById(input.id + "Error");
                if (error) {
                    error.textContent = "";
                    error.classList.add("d-none");
                }
            });
        });
    }

    // Apply auto-hide on typing
    addInputListeners(loginForm);
    addInputListeners(registerForm);

    // --- Login validation ---
    loginBtn.addEventListener("click", (e) => {
        e.preventDefault();
        clearErrors();

        const username = document.getElementById("loginEmail").value.trim();
        const password = document.getElementById("loginPassword").value.trim();
        let valid = true;

        if (username === "") {
            setError("loginEmailError", "Username is required");
            valid = false;
        }

        if (password.length < 6) {
            setError("loginPasswordError", "Password must be at least 6 characters");
            valid = false;
        }

        if (valid) {
            alert("Login successful (demo)");
        }
    });

    // --- Register validation ---
    registerBtn.addEventListener("click", (e) => {
        e.preventDefault();
        clearErrors();

        const username = document.getElementById("registerUsername").value.trim();
        const email = document.getElementById("registerEmail").value.trim();
        const password = document.getElementById("registerPassword").value.trim();
        const confirm = document.getElementById("registerConfirm").value.trim();

        let valid = true;

        if (username === "") {
            setError("registerUsernameError", "Username is required");
            valid = false;
        }

        if (!email.match(/^[^@]+@[^@]+\.[^@]+$/)) {
            setError("registerEmailError", "Invalid email address");
            valid = false;
        }

        if (password.length < 6) {
            setError("registerPasswordError", "Password must be at least 6 characters");
            valid = false;
        }

        if (password !== confirm) {
            setError("registerConfirmError", "Passwords do not match");
            valid = false;
        }

        if (valid) {
            alert("Registration successful (demo)");
        }
    });

    // --- Animated height transitions ---
    glassContainer.style.transition = "height 0.4s cubic-bezier(0.22, 1, 0.36, 1)";

    function animateHeightTo(targetForm) {
        // Temporarily show form (invisible) to measure real height
        targetForm.classList.remove("d-none");
        targetForm.style.position = "absolute";
        targetForm.style.visibility = "hidden";

        const targetHeight = targetForm.scrollHeight + 50 + "px";

        // Restore hidden form
        targetForm.style.position = "";
        targetForm.style.visibility = "";
        targetForm.classList.add("d-none");

        // Animate to target height
        requestAnimationFrame(() => {
            glassContainer.style.height = targetHeight;
        });
    }


    function showRegister() {
        animateHeightTo(registerForm);
        loginForm.classList.remove("fade-in");
        loginForm.classList.add("fade-out");
        setTimeout(() => {
            loginForm.classList.add("d-none");
            registerForm.classList.remove("d-none");
            registerForm.classList.remove("fade-out");
            registerForm.classList.add("fade-in");
            clearErrors(); // clear when switching
        }, 300);
    }

    function showLogin() {
        animateHeightTo(loginForm);
        registerForm.classList.remove("fade-in");
        registerForm.classList.add("fade-out");
        setTimeout(() => {
            registerForm.classList.add("d-none");
            loginForm.classList.remove("d-none");
            loginForm.classList.remove("fade-out");
            loginForm.classList.add("fade-in");
            clearErrors();
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

    glassContainer.style.height = loginForm.scrollHeight + 50 + "px";
});
