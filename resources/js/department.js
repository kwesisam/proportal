document.addEventListener("DOMContentLoaded", () => {
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    const departmentDelete = document.querySelectorAll(".department-delete");
    const departmentUpdate = document.querySelectorAll(".department-update");
    const updateForm = document.forms["departmentupdate"];
    const addForm = document.forms["departmentadd"];
    const messageElement = document.getElementById("deletePopUp");
    const deleteDepartmentBtn = document.getElementById("deletePopUpBtn");
    const updateDepartmentBtn = document.getElementById("updatePopUpBtn");
    const addDepartmentBtn = document.getElementById("addDepartmentBtn");
    let workingData = {
        id: "",
        name: "",
    };
    departmentDelete &&
        departmentDelete.forEach((element) => {
            element.addEventListener("click", () => {
                workingData.id =
                    element.getAttribute("data-department-id") ?? "";
                workingData.name =
                    element.getAttribute("data-department-name") ?? "";
                if (messageElement)
                    messageElement.innerHTML = `Are you sure you want to delete  <strong>${workingData.name}</strong>?`;

                deleteDepartmentBtn &&
                    deleteDepartmentBtn.addEventListener("click", () => {
                        if (workingData.id !== "" && workingData.name !== "") {
                            deleteDepartmentFunc(workingData.id);
                        }
                    });
            });
        });
    departmentUpdate &&
        departmentUpdate.forEach((element) => {
            element.addEventListener("click", () => {
                workingData.id =
                    element.getAttribute("data-department-id") ?? "";
                workingData.name =
                    element.getAttribute("data-department-name") ?? "";
                if (updateForm) {
                    updateForm.elements["departmentupdatename"].value =
                        workingData.name;
                }

                updateDepartmentBtn &&
                    updateDepartmentBtn.addEventListener("click", () => {
                        if (workingData.id !== "") {
                            const errorMessage =
                                updateForm.elements["departmentupdatename"]
                                    .nextElementSibling;

                            validDateDepartment(
                                updateForm.elements["departmentupdatename"]
                                    .value,
                                errorMessage
                            ) &&
                                updateDepartmentFunc(
                                    workingData.id,
                                    updateForm.elements["departmentupdatename"]
                                        .value
                                );
                        }
                    });
            });
        });

    addDepartmentBtn &&
        addDepartmentBtn.addEventListener("click", () => {
            const errorMessage =
                addForm.elements["departmentaddname"].nextElementSibling;
            validDateDepartment(
                addForm.elements["departmentaddname"].value,
                errorMessage
            ) && addDepartmentFunc(addForm.elements["departmentaddname"].value);
        });

    const deleteDepartmentFunc = async (id) => {
        deleteDepartmentBtn.children[0].classList.remove("hidden");
        deleteDepartmentBtn.children[1].classList.add("hidden");
        try {
            const response = await fetch(`/api/depart/delete/${id}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
            });

            const data = await response.json();

            if (!response.ok) {
                throw new Error("An error occurred while deleting department");
            }

            window.location.reload();
        } catch (error) {
            console.log(error);
        } finally {
            deleteDepartmentBtn.children[0].classList.add("hidden");
            deleteDepartmentBtn.children[1].classList.remove("hidden");
        }
    };

    const updateDepartmentFunc = async (id, departmentName) => {
        updateDepartmentBtn.children[0].classList.remove("hidden");
        updateDepartmentBtn.children[1].classList.add("hidden");
        console.log(departmentName);
        try {
            const response = await fetch(`/api/depart/update/${id}`, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
                body: JSON.stringify({
                    department: departmentName,
                }),
            });

            const data = await response.json();

            if (!response.ok) {
                throw new Error("An error occurred while updating department");
            }

            window.location.reload();
        } catch (error) {
            console.log(error);
        } finally {
            updateDepartmentBtn.children[0].classList.add("hidden");
            updateDepartmentBtn.children[1].classList.remove("hidden");
        }
    };

    const addDepartmentFunc = async (departmentName) => {
        addDepartmentBtn.children[0].classList.remove("hidden");
        addDepartmentBtn.children[1].classList.add("hidden");
        try {
            const response = await fetch("/api/depart/add", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
                body: JSON.stringify({
                    department: departmentName,
                }),
            });

            if (!response.ok) {
                throw new Error("An error occurred while creating depart");
            } else {
                const data = await response.json();
                console.log(data);
                window.location.reload();
            }
        } catch (error) {
            console.error(error);
        } finally {
            addDepartmentBtn.children[0].classList.add("hidden");
            addDepartmentBtn.children[1].classList.remove("hidden");
        }
    };

    const validDateDepartment = (inputValue, errorElement) => {
        errorElement.classList.remove("hidden");
        if (!inputValue || inputValue.trim() === "") {
            errorElement.textContent = "Department is required.";
            return false;
        }

        // Check if the value is a string (not strictly necessary in JavaScript)
        if (typeof inputValue !== "string") {
            errorElement.textContent = "Department must be a valid string.";
            return false;
        }

        // Check minimum length
        if (inputValue.length < 3) {
            errorElement.textContent =
                "Department must be at least 3 characters.";
            return false;
        }

        // Check maximum length
        if (inputValue.length > 50) {
            errorElement.textContent =
                "Department must not exceed 50 characters.";
            return false;
        }

        // Check if the value is purely numeric
        if (/^\d+$/.test(inputValue)) {
            errorElement.textContent = "Department cannot be purely numeric.";
            return false;
        }

        errorElement.innerHTML = "";
        errorElement.classList.add("hidden");
        return true;
    };
});
