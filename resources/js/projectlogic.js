document.addEventListener("DOMContentLoaded", () => {
    /*const fetchProject = async () => {
        try {
            const response = await fetch("/api/project");
            if (!response.ok) {
                throw new Error("An error occurred");
            }

            const data = await response.json();
            if (!data) {
                throw new Error("An error occurred");
            }

            if (data.data.length === 0) {
                console.log(data.message);
                return 0;
            }

            processProjectData(data.data);
        } catch (error) {
            console.log(error);
        }
    };

    const processProjectData = (data) => {
        console.log(data[0]);
        data.forEach((project) => {
            const projectItem = document.createElement("div");
            projectItem.classList.add(
                "border",
                "p-2",
                "rounded-md",
                "flex",
                "justify-between",
                "cursor-pointer"
            );
            projectItem.innerHTML = `
                <div  class="flex items-center w-[80%] gap-2">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-closed text-gray-600"><path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/><path d="M2 10h20"/></svg>
                     <span class="w-[80%] truncate">
                            ${project.name}
                    </span>
                </div>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis-vertical text-gray-600"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                </button>
            `;

            console.log(displayProjectGrid);
            displayProjectGrid.appendChild(projectItem);

            const projectItem2 = document.createElement("div");
            projectItem2.classList.add(
                "grid",
                "grid-cols-7",
                "py-3",
                "border-t",
                "cursor-pointer"
            );
            projectItem2.innerHTML = `
                <div class="text-sm col-span-4 truncate montserrat-regular items-center flex gap-2">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-closed text-gray-600 w-full h-full">
                            <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z" />
                            <path d="M2 10h20" />
                        </svg>
                    </div>
                    <div class="w-[70%] truncate">
                        ${project.name}
                    </div>
                </div>
                <div class="text-sm truncate montserrat-regular relative top-2">
                    ${project.owner_name}
                </div>
                <div>
                    ${new Date(project.created_at).toLocaleDateString()}
                </div>
                <div class="text-sm relative truncate montserrat-regular hs-dropdown inline-flex items-center justify-between text-gray-600">
                    <div>
                        _
                    </div>
                    <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle border px-1 rounded-md py-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                    </button>
                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden ml-10" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-default">
                        <div class="p-1 space-y-0.5 relative -top-10 -right-[68px] montserrat-regular rounded-md text-sm bg-gray-50 border">
                            <div>Hello</div>
                        </div>
                    </div>
                </div>
            `;

            displayProjectList.appendChild(projectItem2);
        });
    };

    const displayProjectList = document.getElementById("displayProjectList");
    const displayProjectGrid = document.getElementById("displayProjectGrid");*/
    //displayProjectGrid && displayProjectList && fetchProject();

    const form = document.forms["addproject"];
    const createBtn = document.querySelector("#createBtn");
    //const createBtn2 = document.querySelector("#createBtn2");

    const csrfToken =
        form &&
        document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");
    const projectname = form && form.elements["project_name"];

    let isValid = true;
    createBtn &&
        createBtn.addEventListener("click", async () => {
            console.log(projectname);
            projectname.nextElementSibling.classList.add("hidden");
            isValid = validateProjectName(projectname);

            if (!isValid) return;

            const formData = new FormData();
            formData.append("project_name", projectname.value);
            createBtn.children[0].classList.remove("hidden");
            createBtn.children[1].classList.add("hidden");
            try {
                const response = await fetch("/api/project/add", {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                        Accept: "application/json",
                    },
                });

                const result = await response.json();
                if (response.ok) {
                    projectname.value = "";
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

    const validateProjectName = (projectName) => {
        if (!projectName.value.trim()) {
            projectName.nextElementSibling.classList.remove("hidden");
            projectName.nextElementSibling.innerText =
                "Project name is required";
            return false;
        }

        if (projectName.value.length < 3) {
            projectName.nextElementSibling.classList.remove("hidden");
            projectName.nextElementSibling.innerText =
                "Project name must be at least 3 characters";
            return false;
        }

        if (projectName.value.length > 50) {
            projectName.nextElementSibling.classList.remove("hidden");
            projectName.nextElementSibling.innerText =
                "Project name must be less than 50 characters";
            return false;
        }

        if (!isNaN(projectName.value)) {
            projectName.nextElementSibling.classList.remove("hidden");
            projectName.nextElementSibling.innerText =
                "Project name cannot be a number";
            return false;
        }
        return true;
    };
});
