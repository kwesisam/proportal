document.addEventListener("DOMContentLoaded", () => {
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    const updateAccount = document.querySelectorAll(".update-account");
    const deleteAccount = document.querySelectorAll(".delete-account");
    const addAccount = document.querySelector(".add-account");
    const updateForm = document.forms["adminupdateaccount"];
    const addForm = document.forms["adminaddaccount"];
    const addFormBtn = document.getElementById("addAccountBtn");
    const messageElement = document.getElementById("deletePopUp");
    const deleteAccountBtn = document.getElementById("deletePopUpBtn");
    const updateAccountBtn = document.getElementById("updatePopUpBtn");

    let workingData = {
        id: "",
        username: "",
        name: "",
        email: "",
        role: "",
        password: "",
    };

    const selectRoleOption = [];
    updateAccount &&
        updateAccount.forEach((element) => {
            element.addEventListener("click", () => {
                workingData.id = element.getAttribute("data-account-id") ?? "";
                workingData.username =
                    element.getAttribute("data-account-username") ?? "";
                workingData.name =
                    element.getAttribute("data-account-name") ?? "";
                workingData.email =
                    element.getAttribute("data-account-email") ?? "";
                workingData.role =
                    element.getAttribute("data-account-role") ?? "";

                if (updateForm) {
                    //  updateForm.elements["updateusername"].value =                         workingData.username;
                    updateForm.elements["updatefullname"].value =
                        workingData.name;
                    updateForm.elements["updateemail"].value =
                        workingData.email;

                    const updateRoleElement = updateForm.elements["updaterole"]; // Access the select element
                    console.log(updateRoleElement.children[0].value);
                    if (
                        updateRoleElement.children[0].value === workingData.role
                    ) {
                        updateRoleElement.children[0].setAttribute(
                            "selected",
                            true
                        );
                        updateRoleElement.children[1].removeAttribute(
                            "selected"
                        );
                    }
                    if (
                        updateRoleElement.children[1].value === workingData.role
                    ) {
                        updateRoleElement.children[1].setAttribute(
                            "selected",
                            true
                        );
                        updateRoleElement.children[0].removeAttribute(
                            "selected"
                        );
                    }
                    // Check and add "User" role
                    /*if (!selectRoleOption.includes("user")) {
                        const userOption = new Option("User", "user");
                        updateRoleElement.appendChild(userOption); // Add "User" option
                        selectRoleOption.push("user"); // Mark as added
                    }

                    // Check and add "Admin" role
                    if (!selectRoleOption.includes("admin")) {
                        const adminOption = new Option("Admin", "admin");

                        // Set "Admin" as selected if workingData.role equals "admin"
                        updateRoleElement.appendChild(adminOption); // Add "Admin" option
                        selectRoleOption.push("admin"); // Mark as added
                    }*/

                    updateAccountBtn &&
                        updateAccountBtn.addEventListener("click", () => {
                            //  const username =                                 updateForm.elements["updateusername"];
                            const name = updateForm.elements["updatefullname"];
                            const email = updateForm.elements["updateemail"];
                            const role = updateForm.elements["updaterole"];

                            let isValid = true;
                            isValid =
                                /* validUsername(
                                    username.value,
                                    username.nextElementSibling
                                ) && */
                                validFullName(
                                    name.value,
                                    name.nextElementSibling
                                ) &&
                                validEmail(
                                    email.value,
                                    email.nextElementSibling
                                ) &&
                                validRole(role.value, role.nextElementSibling);
                            if (isValid)
                                updateUser(
                                    name.value,
                                    email.value,
                                    role.value,
                                    updateAccountBtn
                                );
                        });
                }
            });
        });

    addAccount &&
        addAccount.addEventListener("click", () => {
            console.log(3333333333, addForm);
            if (addForm) {
                addFormBtn &&
                    addFormBtn.addEventListener("click", () => {
                        console.log(addForm);
                        const username = addForm.elements["accountaddusername"];
                        const name = addForm.elements["accountaddname"];
                        const email = addForm.elements["accountaddemail"];
                        const role = addForm.elements["accountaddrole"];
                        const password = addForm.elements["accountaddpassword"];

                        let isValid = true;

                        isValid =
                            validUsername(
                                username.value,
                                username.nextElementSibling
                            ) &&
                            validFullName(
                                name.value,
                                name.nextElementSibling
                            ) &&
                            validEmail(email.value, email.nextElementSibling) &&
                            validRole(role.value, role.nextElementSibling) &&
                            validPassword(
                                password.value,
                                document.getElementById(
                                    "accountaddpassworderror"
                                )
                            );

                        if (isValid)
                            createUser(
                                name.value,
                                username.value,
                                email.value,
                                password.value,
                                role.value,
                                addFormBtn
                            );
                    });
            }
        });

    deleteAccount &&
        deleteAccount.forEach((element) => {
            element.addEventListener("click", () => {
                workingData.id = element.getAttribute("data-account-id") ?? "";
                workingData.username =
                    element.getAttribute("data-account-username") ?? "";
                if (messageElement)
                    messageElement.innerHTML = `Are you sure you want to delete <strong>${workingData.username}</strong>?`;

                deleteAccountBtn &&
                    deleteAccountBtn.addEventListener("click", () => {
                        if (workingData.id !== "") {
                            deleteUser(workingData.id, deleteAccountBtn);
                        }
                    });

                console.log(workingData);
            });
        });
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

        errormessage.classList.add("hidden");
        return true;
    };
    // Validate full_name
    const validFullName = (full_name, errormessage) => {
        if (!full_name) {
            errormessage.classList.remove("hidden");
            errormessage.textContent = "Full name is required";
            return false;
        }

        if (full_name.trim().length > 100) {
            errormessage.textContent =
                "Full name must not exceed 100 characters";
            errormessage.classList.remove("hidden");
            return false;
        }

        errormessage.classList.add("hidden");
        return true;
    };

    // Validate email
    const validEmail = (email, errormessage) => {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email) {
            errormessage.classList.remove("hidden");
            errormessage.textContent = "Email is required";
            return false;
        }

        if (!emailRegex.test(email)) {
            errormessage.textContent = "Please enter a valid email address";
            errormessage.classList.remove("hidden");
            return false;
        }

        errormessage.classList.add("hidden");
        return true;
    };

    // Validate role
    const validRole = (role, errormessage) => {
        if (role.trim().length === 0) {
            errormessage.textContent = "Role is required";
            errormessage.classList.remove("hidden");
            return false;
        }

        if (role && !["user", "admin"].includes(role)) {
            errormessage.textContent = "Role must be 'user' or 'admin'";
            errormessage.classList.remove("hidden");
            return false;
        }

        errormessage.classList.add("hidden");
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
            errormessage.textContent =
                "Password must contain at least one number";
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

    const createUser = async (
        full_name,
        username,
        email,
        password,
        role,
        button
    ) => {
        button.children[0].classList.remove("hidden");
        button.children[1].classList.add("hidden");
        try {
            const response = await fetch("/api/user/add", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
                body: JSON.stringify({
                    full_name: full_name,
                    email: email,
                    username: username,
                    password: password,
                    role: role,
                }),
            });

            if (!response.ok) {
                throw new Error("An error occurred while creating user");
            } else {
                const data = await response.json();
                window.location.reload();
                console.log(data);
            }
        } catch (error) {
            console.log(error);
            document.getElementById("accountadderror").textContent =
                "Adding account failed";
            document
                .getElementById("accountadderror")
                .classList.remove("hidden");
        } finally {
            button.children[0].classList.add("hidden");
            button.children[1].classList.remove("hidden");
        }
    };

    const deleteUser = async (id, button) => {
        button.children[0].classList.remove("hidden");
        button.children[1].classList.add("hidden");
        try {
            const response = await fetch(`/api/user/delete/${id}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
            });

            const data = await response.json();
            if (!response.ok) {
                throw new Error("An error occurred while deleting user");
            }

            window.location.reload();
            console.log(data);
        } catch (error) {
            console.log(error);
        } finally {
            button.children[0].classList.add("hidden");
            button.children[1].classList.remove("hidden");
        }
    };

    const updateUser = async (full_name, email, role, button) => {
        button.children[0].classList.remove("hidden");
        button.children[1].classList.add("hidden");
        try {
            const response = await fetch("/api/user/update/1", {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
                body: JSON.stringify({
                    full_name: full_name,
                    email: email,
                    role: role,
                }),
            });

            const data = await response.json();
            if (!response.ok) {
                throw new Error("An error occurred while updating user");
            }

            window.location.reload();
            console.log(data);
        } catch (error) {
            console.log(error);
        } finally {
            button.children[0].classList.add("hidden");
            button.children[1].classList.remove("hidden");
        }
    };
});
