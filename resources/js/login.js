let isValid = true;
document.addEventListener("DOMContentLoaded", () => {
    const form = document.forms["loginform"];
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
            hideErrorMessage(usernameError, passwordError);
            isValid = form && validUsername(username.value, usernameError);
            isValid = form && validPassword(password.value, passwordError);
            loginBtn.children[0].classList.remove("hidden");
            loginBtn.children[1].classList.add("hidden");
            if (!isValid) { 
                loginBtn.children[0].classList.add("hidden");
                loginBtn.children[1].classList.remove("hidden");
                return false
            };
            form.submit();
        });
});

const hideErrorMessage = (usernameerror, passwroderror, formerror) => {
    usernameerror.classList.add("hidden");
    passwroderror.classList.add("hidden");
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
