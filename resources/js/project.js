
document.addEventListener("DOMContentLoaded", () => {
    const projectList = document.querySelector("#projectList");
    const projectListBtn = document.querySelector("#projectListBtn");
    const projectGrid = document.querySelector("#projectGrid");
    const projectGridBtn = document.querySelector("#projectGridBtn");

    //projectGridBtn.classList.add("bg-primary");
    //projectGridBtn.children[0].classList.remove("header");
   // projectGridBtn.children[0].classList.add("text-white");
    if (projectGrid && projectGrid && projectListBtn && projectGridBtn) {
        projectListBtn.addEventListener("click", () => {
            localStorage.setItem("showList", "true");
            projectGridBtn.classList.remove("bg-primary");
            projectGridBtn.children[0].classList.remove("text-white");
            projectGridBtn.children[0].classList.add("header");
            projectGrid.classList.add("hidden");
            projectList.classList.remove("hidden");
            projectListBtn.classList.add("bg-primary");
            projectListBtn.children[0].classList.remove("header");
            projectListBtn.children[0].classList.add("text-white");
        });

        projectGridBtn.addEventListener("click", () => {
            localStorage.setItem("showList", "false");
            projectListBtn.classList.remove("bg-primary");
            projectListBtn.children[0].classList.remove("text-white");
            projectListBtn.children[0].classList.add("header");
            projectList.classList.add("hidden");
            projectGrid.classList.remove("hidden");
            projectGridBtn.classList.add("bg-primary");
            projectGridBtn.children[0].classList.remove("header");
            projectGridBtn.children[0].classList.add("text-white");
        });
    }
});
