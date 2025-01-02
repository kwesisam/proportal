document.addEventListener("DOMContentLoaded", function () {
    const trigger = document.getElementById("trigger");
    const contextMenu = document.getElementById("contextMenu");

    // Show the menu on right click
    trigger && trigger.addEventListener("contextmenu", (e) => {
        e.preventDefault();
        const { pageX: mouseX, pageY: mouseY } = e;
        console.log(e)
        contextMenu.style.top = `${mouseY}px`;
        contextMenu.style.left = `${mouseX}px`;
        contextMenu.classList.remove("hidden");
    });

    // Hide the menu on click elsewhere
    contextMenu && document.addEventListener("click", () => {
        contextMenu.classList.add("hidden");
    });
});
