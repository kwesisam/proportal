document.addEventListener("DOMContentLoaded", function () {
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    console.log(csrfToken);
    const addDepartBtn = document.querySelector("#addDepart");
    const updateDepartBtn = document.querySelector("#updateDepart");
    const deleteDepartBtn = document.querySelector("#deleteDepart");
    const getDepartBtn = document.querySelector("#getDepart");
    const getDepartsBtn = document.querySelector("#getDeparts");
    const createDepart = async () => {
        try {
            const response = await fetch("/api/depart/add", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
                body: JSON.stringify({
                    department: "DP5",
                }),
            });

            if (!response.ok) {
                if (response.status === 419) {
                    console.error("CSRF token mismatch or session expired.");
                    // You can redirect to login or handle it in some other way
                } else {
                    throw new Error("An error occurred while creating depart");
                }
            } else {
                const data = await response.json();
                console.log(data);
            }
        } catch (error) {
            console.error(error);
        }
    };

    const updateDepart = async () => {
        try {
            const response = await fetch("/api/depart/update/4", {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
                body: JSON.stringify({
                    department: "dp2",
                }),
            });

            const data = await response.json();
            if (!response.ok) {
                throw new Error("An error occurred while updating depart");
            }

            console.log(data);
        } catch (error) {
            console.log(error);
        }
    };

    const deleteDepart = async () => {
        try {
            const response = await fetch("/api/depart/delete/3", {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
            });

            const data = await response.json();
            if (!response.ok) {
                throw new Error("An error occurred while deleting depart");
            }

            console.log(data);
        } catch (error) {
            console.log(error);
        }
    };

    const getDepart = async () => {
        try {
            const response = await fetch("/api/depart/8", {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
            });

            const data = await response.json();
            if (!response.ok) {
                throw new Error("An error occurred while fetching depart");
            }

            console.log(data);
        } catch (error) {
            console.log(error);
        }
    };

    const getDeparts = async () => {
        try {
            const response = await fetch("/api/depart", {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
            });

            const data = await response.json();
            if (!response.ok) {
                throw new Error("An error occurred while fetching departs");
            }

            console.log(data);
        } catch (error) {
            console.log(error);
        }
    };

    addDepartBtn && addDepartBtn.addEventListener("click", createDepart);
    updateDepartBtn && updateDepartBtn.addEventListener("click", updateDepart);
    deleteDepartBtn && deleteDepartBtn.addEventListener("click", deleteDepart);
    getDepartBtn && getDepartBtn.addEventListener("click", getDepart);
    getDepartBtn && getDepartsBtn.addEventListener("click", getDeparts);
});
