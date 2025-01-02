document.addEventListener("DOMContentLoaded", () => {
    const fileTrigger = document.querySelector("#file-trigger");
    const filePreview = document.querySelector("#file-preview");
    const projectID = document.querySelector("#project_id").value;
    const folder = document.querySelector("#folder").value;
    fileTrigger.addEventListener("click", () => {
        const fileInput = document.createElement("input");
        fileInput.type = "file";
        fileInput.accept = ".jpg, .jpeg, .png";
        fileInput.multiple = true;
        fileInput.addEventListener("change", handleFiles);
        fileInput.click();
    });


    const handleFiles = (e) => {
        const files = e.target.files;
        const formData = new FormData();
        formData.append("project_id", projectID);
        formData.append("folder", folder);
        for (const file of files) {
            console.log(file);
            const { preview, isValid } = createFilePreview(file);
            if (isValid) {
                console.log(`valid file ${file.name}`);
                formData.append("files[]", file);
            }
            filePreview.appendChild(preview);
        }

        if (formData.has("files[]")) {
            console.log("Uploading files...");
            uploadFiles(formData);
        }
    };

    function createFilePreview(file) {
        const preview = document.createElement("div");
        preview.classList.add(
            "p-3",
            "bg-white",
            "border",
            "border-solid",
            "border-gray-300",
            "rounded-xl",
            "dark:bg-neutral-800",
            "dark:border-neutral-600"
        );

        const fileName = file.name;
        const fileSize = (file.size / 1024).toFixed(2) + " KB"; // Convert bytes to KB
        const fileType = file.type;
        let errorMessage = "";
        const validImageTypes = ["image/jpeg", "image/png", "image/jpg"];
        let isValid = true;
        if (!validImageTypes.includes(fileType)) {
            errorMessage = "File type not supported";
            isValid = false;
        }

        if (fileSize > 10000) {
            errorMessage = "File size too large";
            isValid = false;
        }
        preview.innerHTML = `
        <div class="mb-1 flex justify-between items-center">
          <div class="flex items-center gap-x-3">
            <span class="size-10 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg dark:border-neutral-700 dark:text-neutral-500">
              <img class="rounded-lg" data-dz-thumbnail="">
            </span>
            <div>
              <div class="text-sm font-medium text-gray-800 dark:text-white">
                <p class="truncate inline-block max-w-[250px]">${fileName}</p>
               <p class="text-xs truncate max-w-[300px] text-red-500 ${
                   errorMessage ? "block" : "hidden"
               }">${errorMessage}</p>
              </div>
            </div>
          </div>
        
        </div>
      `;
        return { preview, isValid };
    }
});

function uploadFiles(formData) {
    fetch("/api/file/upload", {
        method: "POST",
        body: formData,
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("Upload success:", data);
        })
        .catch((error) => {
            console.error("Upload error:", error);
        });
}
