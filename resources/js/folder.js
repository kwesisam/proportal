document.addEventListener("DOMContentLoaded", () => {
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    const model = document.createElement("div");
    const rename = document.querySelectorAll(".rename");
    const remove = document.querySelectorAll(".remove");
    const download = document.querySelectorAll(".download");
    const open = document.querySelectorAll(".open");
    const workingData = {
        id: "",
        file_name: "",
        type: "",
        folder: "",
    };

    model.classList.add(
        "fixed",
        "bg-opacity-50",
        "z-50",
        "w-screen",
        "h-screen",
        "hidden",
        "top-0",
        "left-0",
        "flex",
        "items-center",
        "justify-center",
        "bg-white",
        "backdrop-blur-sm",
        "bg-opacity-70",
        "transition-all",
        "duration-500",
        "ease-in-out"
    );

    const modelContent = document.createElement("div");
    modelContent.classList.add(
        "bg-white",
        "mx-auto",
        "mt-20",
        "w-full",
        "rounded-xl",
        "sm:max-w-sm",
        "sm:rounded-lg",
        "shadow-lg",
        "px-7",
        "py-6"
    );

    const modelHeader = document.createElement("div");
    modelHeader.classList.add("flex", "justify-between", "items-center");

    modelContent.appendChild(modelHeader);
    model.appendChild(modelContent);
    document.body.appendChild(model);

    const renameContent = document.createElement("div");

    open &&
        open.forEach((element) => {
            element.addEventListener("click", () => {
                workingData.id = element.getAttribute("data-file-id") || "";
                workingData.type = element.getAttribute("data-type") || "";
                workingData.folder =
                    element.getAttribute("data-folder-name") || "";
                console.log(
                    workingData.id,
                    workingData.type,
                    workingData.folder
                );
                if (workingData.type === "projects")
                    window.location.href = `/project/${workingData.id}`;

                if (
                    workingData.type === "projectsdepartment" &&
                    workingData.folder !== ""
                ) {
                    console.log(workingData);
                    window.location.href = `/project/${workingData.id}/info/${workingData.folder}`;
                }
            });
        });

    rename &&
        rename.forEach((element) => {
            element.addEventListener("click", (e) => {
                //const clickedElement = e.target;
                console.log(element);
                // Extract and assign data attributes
                workingData.id = element.getAttribute("data-file-id") || "";
                workingData.file_name =
                    element.getAttribute("data-file-name") || "";
                workingData.type = element.getAttribute("data-type") || "";

                console.log(workingData.type);
                // If data is valid, update the renameContent HTML
                if (workingData.id && workingData.file_name) {
                    renameContent.innerHTML = `
                    <div>
                        <div class="flex items-center justify-between pb-3">
                            <h3 class="text-lg font-semibold">Update folder</h3>
                            <button @click="modalOpen=false" id="closeRenamePopUp" class="p-2 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <form name="renameForm" class="space-y-2 montserrat-regular">
                            <div>
                                <input 
                                name="renameInput"
                                type="text" 
                                value="${workingData.file_name}" 
                                class="w-full p-2 border outline-none text-sm rounded-md focus:border-primary"/>
                                <p class="text-xs text-red-500 hidden"></p>

                            </div>
                             <div class="flex justify-end w-full sm:flex-row sm:justify-end sm:space-x-2 ">
                                <button name="cancelRename" type="button" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors border rounded-md focus:outline-none">Cancel</button>

                                <button name="renameBtn" type="button" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none  bg-primary hover:opacity-90">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-loader animate-spin hidden"><path d="M12 2v4"/><path d="m16.2 7.8 2.9-2.9"/><path d="M18 12h4"/><path d="m16.2 16.2 2.9 2.9"/><path d="M12 18v4"/><path d="m4.9 19.1 2.9-2.9"/><path d="M2 12h4"/><path d="m4.9 4.9 2.9 2.9"/></svg>
                                    <span>
                                        Update
                                    </span>
                                </button>
                            </div>
                        </form>
                        <p class="text-xs text-red-500 hidden"></p>
                    </div>
                `;

                    // Focus the input and select the base file name
                    setTimeout(() => {
                        const input = renameContent.querySelector("input");
                        input.focus();

                        const fileNameWithoutExtension =
                            input.value.split(".")[0];
                        input.setSelectionRange(
                            0,
                            fileNameWithoutExtension.length
                        );
                    }, 100);
                }

                // Append the renameContent to the modal and show it
                modelContent.appendChild(renameContent);
                model.classList.remove("hidden");

                const closeRenamePopUp =
                    document.getElementById("closeRenamePopUp");
                closeRenamePopUp &&
                    closeRenamePopUp.addEventListener("click", (e) => {
                        model.classList.add("hidden");
                    });

                const renameForm = document.forms["renameForm"];
                console.log(renameForm);
                const renameBtn =
                    renameForm && renameForm.elements["renameBtn"];
                const cancelRename =
                    renameForm && renameForm.elements["cancelRename"];

                cancelRename.addEventListener("click", () => {
                    model.classList.add("hidden");
                });

                renameBtn &&
                    renameBtn.addEventListener("click", async () => {
                        const renameInput =
                            renameForm &&
                            renameForm.elements["renameInput"].value;

                        validateProjectName(renameInput, workingData.type) &&
                            renameFunc(
                                workingData.type,
                                workingData.id,
                                renameInput,
                                renameBtn
                            );
                    });

                const validateProjectName = (projectName) => {
                    if (!projectName.trim()) {
                        projectName.nextElementSibling.classList.remove(
                            "hidden"
                        );
                        projectName.nextElementSibling.innerText =
                            workingData.type === "projects"
                                ? "Project name is required"
                                : "File name is required";
                        return false;
                    }

                    if (projectName.length < 3) {
                        projectName.nextElementSibling.classList.remove(
                            "hidden"
                        );
                        projectName.nextElementSibling.innerText =
                            workingData.type === "projects"
                                ? "Project name must be at least 3 characters"
                                : "File name must be at least 3 characters";
                        return false;
                    }

                    if (projectName.length > 50) {
                        projectName.nextElementSibling.classList.remove(
                            "hidden"
                        );
                        projectName.nextElementSibling.innerText =
                            workingData.type === "projects"
                                ? "Project name must be at most 50 characters"
                                : "File name must be at most 50 characters";
                        return false;
                    }

                    if (!isNaN(projectName)) {
                        projectName.nextElementSibling.classList.remove(
                            "hidden"
                        );
                        projectName.nextElementSibling.innerText =
                            "Invalid name";
                        return false;
                    }
                    return true;
                };
            });
        });

    document.addEventListener("click", (e) => {
        if (e.target === model) {
            model.classList.add("hidden");
        }
    });

    remove && console.log(222, remove);
    remove &&
        remove.forEach((element) => {
            element.addEventListener("click", () => {
                workingData.id = element.getAttribute("data-file-id") || "";
                workingData.type = element.getAttribute("data-type") || "";
                workingData.folder =
                    element.getAttribute("data-folder-name") || "";

                console.log(111111111, workingData);
                if (workingData.id && workingData.type === "projects")
                    deleteProject(workingData.id, workingData.type);
                if (
                    (workingData.id &&
                        workingData.type === "projectsdepartment",
                    workingData.folder)
                )
                    console.log(222);
                deleteProject(
                    workingData.id,
                    workingData.type,
                    workingData.folder
                );

                if (workingData.type === "files") {
                    deleteProject(workingData.id, workingData.type);
                }
            });
        });

    download &&
        download.forEach((element) => {
            element.addEventListener("click", () => {
                workingData.id = element.getAttribute("data-file-id") || "";
                workingData.type = element.getAttribute("data-type") || "";
                workingData.folder =
                    element.getAttribute("data-folder-name") || "";

                if (workingData.id && workingData.type === "files")
                    downloadFunc(workingData.id, workingData.type);
            });
        });

    const deleteProject = async (id, type, folder = "") => {
        //delete project
        console.log(2233);
        if (type === "projects") {
            try {
                const response = await fetch(`/api/project/${id}`, {
                    method: "DELETE",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken,
                    },
                });
                const data = await response.json();
                if (!response.ok) {
                    throw new Error("An error occurred while deleting project");
                }

                window.location.reload();
            } catch (error) {
                console.log(error);
            }
        }
        //delete folder in project
        if (type === "projectsdepartment" && folder)
            try {
                const response = await fetch(
                    `/api/project/${id}/info/${folder}`,
                    {
                        method: "DELETE",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": csrfToken,
                        },
                    }
                );
                if (!response.ok) {
                    throw new Error("An error occurred while deleting project");
                }

                window.location.reload();
            } catch (error) {
                console.log(error);
            }

        if (type === "files") {
            try {
                const response = await fetch(`/api/file/delete/${id}`, {
                    method: "DELETE",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken,
                    },
                });
                if (!response.ok) {
                    throw new Error("An error occurred while deleting project");
                }

                window.location.reload();
            } catch (error) {
                console.log(error);
            }
        }
    };

    const renameFunc = async (type, id, renameInput, element) => {
        element.children[0].classList.remove("hidden");
        element.children[1].classList.add("hidden");
        if (type === "projects") {
            try {
                const response = await fetch(`/api/project/rename/${id}`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken,
                    },
                    body: JSON.stringify({
                        name: renameInput,
                    }),
                });
                const data = await response.json();
                if (!response.ok) {
                    throw new Error("An error occurred while updating user");
                }
                window.location.reload();
            } catch (error) {
                console.log(error);
            } finally {
                element.children[0].classList.add("hidden");
                element.children[1].classList.remove("hidden");
            }
        } else if (type === "files") {
            try {
                const response = await fetch(`/api/file/rename/${id}`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken,
                    },
                    body: JSON.stringify({
                        file_name: renameInput,
                    }),
                });
                const data = await response.json();
                if (!response.ok) {
                    throw new Error("An error occurred while updating user");
                }
                window.location.reload();
            } catch (error) {
                console.log(error);
            } finally {
                element.children[0].classList.add("hidden");
                element.children[1].classList.remove("hidden");
            }
        }
    };

    const downloadFunc = async (id, type) => {
        if (type === "files") {
            try {
                const response = await fetch(`/api/file/download/${id}`, {
                    method: "GET",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                    },
                });

                if (!response.ok) {
                    throw new Error(
                        "An error occurred while downloading the file"
                    );
                }

                // Convert the response into a Blob
                const blob = await response.blob();

                // Create a URL for the Blob
                const url = window.URL.createObjectURL(blob);

                // Create an anchor element to trigger the download
                const a = document.createElement("a");
                a.href = url;

                // Set the file name (you can retrieve it from headers if needed)
                const contentDisposition = response.headers.get(
                    "Content-Disposition"
                );
                const fileName = contentDisposition
                    ? contentDisposition.split("filename=")[1]
                    : "downloaded_file";

                a.download = fileName;

                // Append the anchor to the document and click it
                document.body.appendChild(a);
                a.click();

                // Remove the anchor and revoke the object URL
                document.body.removeChild(a);
                window.URL.revokeObjectURL(url);
            } catch (error) {
                console.log(error);
            }
        }
    };
});
