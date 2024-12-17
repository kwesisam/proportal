document.addEventListener("DOMContentLoaded", function () {
    //managers
    const board = document.querySelector("#managerTeamBoard");
    const list = document.querySelector("#managerTeamList");
    const boardContent = document.querySelector("#managerTeamBoardContent")
    const listContent = document.querySelector("#managerTeamListContent");
    if (board) {
        board.addEventListener("click", function () {
            board.classList.remove("text-gray-600");
            board.classList.add("border-b", "text-emerald-400");
            list.classList.remove("border-b", "text-emerald-400");

            boardContent.classList.remove("hidden");
            listContent.classList.add("hidden")
        });
    }

    if (list) {
        list.addEventListener("click", function () {
            list.classList.remove("text-gray-600");
            list.classList.add("border-b", "text-emerald-400");
            board.classList.remove("border-b", "text-emerald-400");
            board.classList.add("text-gray-600");


            listContent.classList.remove("hidden");
            boardContent.classList.add("hidden");
        });
    }
});
