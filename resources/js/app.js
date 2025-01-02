import "./bootstrap";
import "./nav";
import "preline";
import "apexcharts/dist/apexcharts.css";
import "./addprojectform";
import "./member";
import "./login";
import "./forgotpasswordform";
import "./newpassword";
import "./charts";
import "./projectlogic";
import _ from "lodash";
import "dropzone";
import "@preline/file-upload";
import "./createuser";
import "./project";
import "./createDepartment";
import "./projectDeparment";
import "./fileUpload";
import "./renameModel";
window._ = _;

window.addEventListener("load", () => {
    const fileUpload = document.querySelector("#hs-file-upload-to-destroy");
    const destroyBtn = document.querySelector("#hs-destroy-file-upload");
    const autoInitBtn = document.querySelector("#hs-auto-init-file-upload");

    // Check if elements exist
    if (fileUpload && destroyBtn && autoInitBtn) {
        // Destroy file upload instance
        destroyBtn.addEventListener("click", () => {
            const instance = HSFileUpload.getInstance(fileUpload, true);
            if (instance) {
                instance.element.destroy();
                destroyBtn.setAttribute("disabled", "disabled");
                autoInitBtn.removeAttribute("disabled");
            }
        });

        // Auto-init file upload instance
        autoInitBtn.addEventListener("click", () => {
            HSFileUpload.autoInit();
            autoInitBtn.setAttribute("disabled", "disabled");
            destroyBtn.removeAttribute("disabled");
        });
    }
});
