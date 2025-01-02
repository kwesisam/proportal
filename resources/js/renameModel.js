document.addEventListener("DOMContentLoaded", () => {
    const model = document.createElement("div");
    const removeFile = document.querySelectorAll(".grid-remove-file");
    const workingData = {
        id: "",
        file_name: "",
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
        "duration-300",
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

    removeFile.forEach((element) => {
        element.addEventListener("click", (e) => {
            const clickedElement = e.target;
    
            // Extract and assign data attributes
            workingData.id = clickedElement.getAttribute("data-file-id") || "";
            workingData.file_name = clickedElement.getAttribute("data-file-name") || "";
    
            // If data is valid, update the renameContent HTML
            if (workingData.id && workingData.file_name) {
                renameContent.innerHTML = `
                    <div>
                        <input 
                            type="text" 
                            value="${workingData.file_name}" 
                            class="w-full text-sm border p-2 montserrat-regular outline-none rounded"
                        >
                        <p class="text-xs text-red-500 hidden"></p>
                    </div>
                `;
    
                // Focus the input and select the base file name
                setTimeout(() => {
                    const input = renameContent.querySelector("input");
                    input.focus();
    
                    const fileNameWithoutExtension = input.value.split(".")[0];
                    input.setSelectionRange(0, fileNameWithoutExtension.length);
                }, 100);
            }
    
            // Append the renameContent to the modal and show it
            modelContent.appendChild(renameContent);
            model.classList.remove("hidden");
        });
    });
    
    document.addEventListener("click", (e) => {
        if (e.target === model) {
            model.classList.add("hidden");
        }
    });
});
