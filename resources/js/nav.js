document.addEventListener("DOMContentLoaded", function () {
    activeNav();
});

const activeNav = () => {
    document.querySelectorAll("#navlinks").forEach((link) => {
        const links = link.children.length;
        for (let i = 0; i < links; i++) {
            const href = link.children[i].children[0].getAttribute("href");
            const currentPath = window.location.pathname;
            let prams = window.location.search
                ? window.location.search.split("?")[1].split("&")
                : null;

            console.log(currentPath, href, prams);
            const isActive =
                href === currentPath || currentPath.startsWith(`/ ${href} `);
            if (isActive) {
                link.children[i].children[0].children[0].classList.remove(
                    "text-gray-600"
                );
                link.children[i].children[0].children[0].classList.add(
                    "text-black"
                );

                if (currentPath !== "/") {
                    if (
                        href === "/project" ||
                        currentPath.startsWith(`/project/`)
                    ) {
                        setTimeout(() => {
                            link.children[i].children[1].classList.remove(
                                "hidden"
                            );
                            console.log(
                                link.children[i].children[1].children[0]
                                    .children[1].children[0]
                            );
                            if(prams && prams[0].split("=")[1] === "add" && prams[0].split("=")[0] === "projectloc"){
                                link.children[
                                    i
                                ].children[1].children[0].children[1].children[0].classList.add(
                                    "text-emerald-400",
                                    "bg-emerald-50"
                                );
                            } else if (prams && prams[0].split("=")[1] === "closed" && prams[0].split("=")[0] === "projectloc") {
                                link.children[
                                    i
                                ].children[1].children[0].children[2].children[0].classList.add(
                                    "text-emerald-400",
                                    "bg-emerald-50"
                                );
                            } else if (
                                prams &&
                                prams[0].split("=")[1] === "expired" && prams[0].split("=")[0] === "projectloc"
                            ) {
                                link.children[
                                    i
                                ].children[1].children[0].children[3].children[0].classList.add(
                                    "text-emerald-400",
                                    "bg-emerald-50"
                                );
                            } else {
                                link.children[
                                    i
                                ].children[1].children[0].children[0].children[0].classList.add(
                                    "text-emerald-400",
                                    "bg-emerald-50"
                                );
                            }
                        }, 1000);
                    } else if (
                        href === "/team" ||
                        currentPath.startsWith(`/team/`)
                    ) {
                        setTimeout(() => {
                            link.children[i].children[2].classList.remove(
                                "hidden"
                            );
                            link.children[i].children[2].children[0].children[0].children[0].classList.add(
                                "text-emerald-400",
                                "bg-emerald-50"
                            )
                            /*if(prams && prams[0].split("=")[1] === "add" && prams[0].split("=")[0] === "teamloc") {
                                    link.children[i].children[2].children[0].children[1].children[0].classList.add(
                                        "text-emerald-400",
                                        "bg-emerald-50"
                                    )
                            }else{
                               
                            }*/
                        }, 1000);
                    } else if (  href === "/profile" ||
                        currentPath.startsWith(`/profile/`)){
                            setTimeout(() => {
                                link.children[i].children[3].classList.remove(
                                    "hidden"
                                );
                                if (prams && prams[0].split("=")[1] === "edit" && prams[0].split("=")[0] === "profileloc") {
                                        link.children[i].children[3].children[0].children[1].children[0].classList.add(
                                            "text-emerald-400",
                                            "bg-emerald-50"
                                        )
                                }else{
                                    link.children[i].children[3].children[0].children[0].children[0].classList.add(
                                        "text-emerald-400",
                                        "bg-emerald-50"
                                    )
                                }
                            }, 1000);
                    }
                }
            }
        }
    });
};
