document.addEventListener("DOMContentLoaded", () => {
    const form = document.forms["addprojectdepartment"];
    const createBtn = document.querySelector("#createProjectDeparmentBtn");

    const csrfToken =
        form &&
        document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");
    const departmentname = form && form.elements["department_name"];
    const projectId = form && form.elements["project_id"];
    console.log(projectId);
    let isValid = true;
    createBtn &&
        createBtn.addEventListener("click", async () => {
            console.log(departmentname);
            departmentname.nextElementSibling.classList.add("hidden");
            isValid = validateDepartmentName(departmentname);
            if (!isValid) return;

            const formData = new FormData();
            formData.append("department", departmentname.value);
            formData.append("project_id", projectId.value);
            createBtn.children[0].classList.remove("hidden");
            createBtn.children[1].classList.add("hidden");
            try {
                const response = await fetch("/api/projectdepartment/add", {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                        Accept: "application/json",
                    },
                });

                const result = await response.json();
                if (response.ok) {
                    departmentname.value = "";
                    createBtn.previousElementSibling.click();
                    window.location.reload();
                } else {
                    console.error(result.error || "Unknown error occurred");
                }
            } catch (error) {
                console.error("Submission failed:", error);
            } finally {
                createBtn.children[0].classList.add("hidden");
                createBtn.children[1].classList.remove("hidden");
            }
        });

    const validateDepartmentName = (departmentname) => {
        if (!departmentname.value) {
            departmentname.nextElementSibling.textContent =
                "Department name is required";
            departmentname.nextElementSibling.classList.remove("hidden");
            return false;
        }
        return true;
    };
});
