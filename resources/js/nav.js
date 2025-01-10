document.addEventListener("DOMContentLoaded", function () {
    activeNav();

    console.log(
        window.matchMedia("(prefers-color-scheme: dark)").matches
            ? "dark"
            : "light"
    );
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

            console.log(currentPath, href+"/");
            console.log(currentPath.split("/")[1] === href.split("/")[1])

            //href === currentPath || currentPath.startsWith(`/${href}`)
            const isActive = currentPath.split("/")[1] === href.split("/")[1]
            console.log(isActive)
            if (isActive) {
                link.children[i].classList.add(
                    "bg-primary",
                    "rounded-md",
                    "hover:opacity-100",
                    "hover:text-black"
                );
                link.children[i].children[0].children[0].classList.remove(
                    "text-tertiary"
                );
                link.children[i].children[0].children[0].classList.add(
                    "text-primary-foreground",
                    "hover:opacity-100",
                );

                link.children[i].children[0].children[1].classList.remove(
                    "text-tertiary"
                );

                link.children[i].children[0].children[1].classList.add(
                    "text-primary-foreground",
                    "hover:opacity-100"
                );

                if (currentPath !== "/") {
                    if (
                        href === "/project" ||
                        currentPath.startsWith(`/project/`)
                    ) {
                        /*setTimeout(() => {
                            link.children[i].children[1].classList.remove(
                                "hidden"
                            );

                            link.children[
                                i
                            ].children[1].children[0].children[0].children[0].classList.add(
                                "text-emerald-400",
                                "bg-emerald-50"
                            );
                        }, 1000);*/
                    } else if (
                        href === "/profile" ||
                        currentPath.startsWith(`/profile/`)
                    ) {
                        setTimeout(() => {
                            link.children[i].children[3].classList.remove(
                                "hidden"
                            );

                            link.children[
                                i
                            ].children[3].children[0].children[0].children[0].classList.add(
                                "text-emerald-400",
                                "bg-emerald-50"
                            );
                        }, 1000);
                    }
                }
            }
        }
    });
};
