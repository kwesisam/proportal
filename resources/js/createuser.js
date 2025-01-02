document.addEventListener("DOMContentLoaded", function () {
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    console.log(csrfToken);
    const createUserBtn = document.querySelector("#createUser");
    const updateUserBtn = document.querySelector("#updateUser");
    const deleteUserBtn = document.querySelector("#deleteUser");
    const getUserBtn = document.querySelector("#getUser");
    const getUsersBtn = document.querySelector("#getUsers");
    const createUser = async () => {
        try {
            const response = await fetch("/api/user/add", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
                body: JSON.stringify({
                    full_name: "John Doe",
                    email: "jondeadmin@gmail.com",
                    username: "johwndoeadmin",
                    password: "P@55word",
                    role: "admin",
                }),
            });

            if (!response.ok) {
                if (response.status === 419) {
                    console.error("CSRF token mismatch or session expired.");
                    // You can redirect to login or handle it in some other way
                } else {
                    throw new Error("An error occurred while creating user");
                }
            } else {
                const data = await response.json();
                console.log(data);
            }
        } catch (error) {
            console.error(error);
        }
    };

    const updateUser = async () => {
        try {
            const response = await fetch("/api/user/update/1", {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
                body: JSON.stringify({
                    full_name: "Enoch Doe",
                    email: "hello@gmail.com",
                }),
            });

            const data = await response.json();
            if (!response.ok) {
                throw new Error("An error occurred while updating user");
            }

            console.log(data);
        } catch (error) {
            console.log(error);
        }
    };

    const deleteUser = async () => {
        try {
            const response = await fetch("/api/user/delete/3", {
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

            console.log(data);
        } catch (error) {
            console.log(error);
        }
    };

    const getUser = async () => {
        try {
            const response = await fetch("/api/user/1", {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
            });

            const data = await response.json();
            if (!response.ok) {
                throw new Error("An error occurred while fetching user");
            }

            console.log(data);
        } catch (error) {
            console.log(error);
        }
    };

    const getUsers = async () => {
        try {
            const response = await fetch("/api/users", {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
            });

            const data = await response.json();
            if (!response.ok) {
                throw new Error("An error occurred while fetching users");
            }

            console.log(data);
        } catch (error) {
            console.log(error);
        }
    };

    createUserBtn && createUserBtn.addEventListener("click", createUser);
    updateUserBtn && updateUserBtn.addEventListener("click", updateUser);
    deleteUserBtn && deleteUserBtn.addEventListener("click", deleteUser);
    getUserBtn && getUserBtn.addEventListener("click", getUser);
    getUserBtn && getUsersBtn.addEventListener("click", getUsers);
});
