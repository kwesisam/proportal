let isValid = true;
document.addEventListener("DOMContentLoaded", () => {
    const form = document.forms["forgotpasswordForm"];
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    form &&
        form.addEventListener("submit", async (event) => {
            event.preventDefault();
            const username = form && form.elements["username"];
            const email = form && form.elements["email"];
            const continueBtn = form && form.elements["continuebtn"];
            const usernameError =
                form && document.querySelector("#usernameerror");
            const emailError = form && document.querySelector("#emailerror");
            const formError = form && document.querySelector("#forgotpasswordFormError");
            hideErrorMessage(usernameError, emailError, formError);
            isValid = form && validUsername(username.value, usernameError);
            isValid = form && validEmail(email.value, emailError);

            if (!isValid) return;
            try {
                continueBtn.children[0].classList.remove("hidden");
                continueBtn.children[1].classList.add("hidden");
                const response = await fetch("/recoverpassword", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken,
                    },
                    body: JSON.stringify({
                        username: username.value,
                        email: email.value,
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
                            "An error occurred while confirming details.";
                    }
                    throw new Error(
                        `An error occurred while processing your request`
                    );
                }

              
            } catch (error) {
                console.error(error);
            } finally {
                continueBtn.children[0].classList.add("hidden");
                continueBtn.children[1].classList.remove("hidden");
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

const validEmail = (email, errormessage) => {
    if (!email) {
        errormessage.classList.remove("hidden");
        errormessage.textContent = "Email is required";
        return false;
    }

    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailPattern.test(email)) {
        errormessage.classList.remove("hidden");
        errormessage.textContent = "Invalid email";
        return false;
    }

    return true;
};
