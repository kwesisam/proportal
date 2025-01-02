document.addEventListener("DOMContentLoaded", () => {
    const projectList = document.querySelector("#projectList");
    const projectListBtn = document.querySelector("#projectListBtn");
    const projectGrid = document.querySelector("#projectGrid");
    const projectGridBtn = document.querySelector("#projectGridBtn");

    if (projectGrid && projectGrid && projectListBtn && projectGridBtn) {
        projectListBtn.addEventListener("click", () => {
            projectGrid.classList.add("hidden");
            projectList.classList.remove("hidden");
        });

        projectGridBtn.addEventListener("click", () => {
            projectList.classList.add("hidden");
            projectGrid.classList.remove("hidden");
        });
    }
});

