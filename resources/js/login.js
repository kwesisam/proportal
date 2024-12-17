let isValid = true;
document.addEventListener("DOMContentLoaded", () => {
    const form = document.forms["loginform"];
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    form &&
        form.addEventListener("submit", async (event) => {
            event.preventDefault();
            const username = form && form.elements["username"];
            const password = form && form.elements["password"];
            const loginBtn = form && form.elements["loginbtn"];
            const usernameError =
                form && document.querySelector("#usernameerror");
            const passwordError =
                form && document.querySelector("#passworderror");
            const formError = form && document.querySelector("#loginFormError");
            hideErrorMessage(usernameError, passwordError, formError);
            isValid = form && validUsername(username.value, usernameError);
            isValid = form && validPassword(password.value, passwordError);

            if (!isValid) return;
            try {
                loginBtn.children[0].classList.remove("hidden");
                loginBtn.children[1].classList.add("hidden");
                const response = await fetch("/login", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken,
                    },
                    body: JSON.stringify({
                        username: username.value,
                        password: password.value,
                    }),
                });

                const data = await response.json();

                if (!response.ok) {
                    formError.classList.remove("hidden");
                    if (response.status === 404) {
                        formError.textContent = data.error;
                    } else if (response.status === 401) {
                        formError.textContent = data.error;
                    } else {
                        formError.textContent =
                            "An error occurred while logging in try again later.";
                    }
                    throw new Error(
                        `An error occurred while processing your request`
                    );
                }

                if (data.error) {
                    if (data.error === "User not found") {
                        usernameError.textContent = "User not found";
                        usernameError.classList.remove("hidden");
                    } else if (data.error === "Invalid password") {
                        passwordError.textContent = "Invalid password";
                        passwordError.classList.remove("hidden");
                    }
                    return;
                }
            } catch (error) {
                console.error(error);
            } finally {
                loginBtn.children[0].classList.add("hidden");
                loginBtn.children[1].classList.remove("hidden");
            }
        });
});

const hideErrorMessage = (usernameerror, passwroderror, formerror) => {
    usernameerror.classList.add("hidden");
    passwroderror.classList.add("hidden");
    formerror.classList.add("hidden");
};
const validUsername = (username, errormessage) => {
    if (!username) {
        errormessage.classList.remove("hidden");
        errormessage.textContent = "Username is required";
        return false;
    }

    if (username.trim().length < 3) {
        errormessage.textContent = "Username must be at least 3 characters";
        errormessage.classList.remove("hidden");

        return false;
    }

    return true;
};

const validPassword = (password, errormessage) => {
    if (!password) {
        errormessage.textContent = "Password is required";
        errormessage.classList.remove("hidden");

        return false;
    }

    if (password.trim().length < 6) {
        errormessage.textContent = "Password must be at least 6 characters";
        errormessage.classList.remove("hidden");
        return false;
    }

    if (!/[a-z]/.test(password)) {
        errormessage.textContent =
            "Password must contain at least one lowercase letter";
        errormessage.classList.remove("hidden");
        return false;
    }

    if (!/[A-Z]/.test(password)) {
        errormessage.textContent =
            "Password must contain at least one uppercase letter";
        errormessage.classList.remove("hidden");

        return false;
    }

    if (!/[0-9]/.test(password)) {
        errormessage.textContent = "Password must contain at least one number";
        errormessage.classList.remove("hidden");

        return false;
    }

    if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
        errormessage.textContent =
            "Password must contain at least one special character";
        errormessage.classList.remove("hidden");

        return false;
    }

    return true;
};
