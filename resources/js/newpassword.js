let isValid = true;
document.addEventListener("DOMContentLoaded", () => {
    const form = document.forms["newpasswordForm"];
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    form &&
        form.addEventListener("submit", async (event) => {
            event.preventDefault();
            const npassword = form && form.elements["npassword"];
            const cpassword = form && form.elements["cpassword"];
            const changeBtn = form && form.elements["changebtn"];
            const npasswordError =
                form && document.querySelector("#npassworderror");
            const cpasswordError =
                form && document.querySelector("#cpassworderror");
            const formError =
                form && document.querySelector("#newpasswordFormError");
            hideErrorMessage(npasswordError, cpasswordError, formError);
            isValid = form && validPassword(npassword.value, npasswordError);
            isValid = form && validPassword(cpassword.value, cpasswordError);
            isValid =
                form &&
                checkPasswords(
                    npassword.value,
                    cpassword.value,
                    cpasswordError
                );

            if (!isValid) return;
            try {
                changeBtn.children[0].classList.remove("hidden");
                changeBtn.children[1].classList.add("hidden");
                const response = await fetch("/newpassword", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken,
                    },
                    body: JSON.stringify({
                        npassword: npassword.value,
                        cpassword: cpassword.value,
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
                changeBtn.children[0].classList.add("hidden");
                changeBtn.children[1].classList.remove("hidden");
            }
        });
});

const hideErrorMessage = (npassword, cpassword, formerror) => {
    npassword.classList.add("hidden");
    cpassword.classList.add("hidden");
    formerror.classList.add("hidden");
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

const checkPasswords = (npassword, cpassword, errormessage) => {
    if (npassword !== cpassword) {
        errormessage.classList.remove("hidden");
        errormessage.textContent = "Passwords do not match";
        return false;
    }
    return true;
};
