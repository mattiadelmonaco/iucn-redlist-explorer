function switchView(view) {
    const btnList = document.getElementById("btn-list");
    const btnCard = document.getElementById("btn-card");
    const listView = document.getElementById("list-view");
    const cardView = document.getElementById("card-view");

    // salva in localstorage la scelta
    localStorage.setItem("viewMode", view);

    if (view === "list") {
        listView.classList.remove("hidden");
        listView.classList.add("block");
        cardView.classList.remove("block");
        cardView.classList.add("hidden");

        btnList.classList.remove(
            "bg-gray-200",
            "text-gray-700",
            "hover:bg-gray-300",
        );
        btnList.classList.add("bg-red-700", "text-white");
        btnCard.classList.remove("bg-red-700", "text-white");
        btnCard.classList.add(
            "bg-gray-200",
            "text-gray-700",
            "hover:bg-gray-300",
        );
    } else if (view === "card") {
        listView.classList.remove("block");
        listView.classList.add("hidden");
        cardView.classList.remove("hidden");
        cardView.classList.add("block");

        btnList.classList.remove("bg-red-700", "text-white");
        btnList.classList.add(
            "bg-gray-200",
            "text-gray-700",
            "hover:bg-gray-300",
        );
        btnCard.classList.remove(
            "bg-gray-200",
            "text-gray-700",
            "hover:bg-gray-300",
        );
        btnCard.classList.add("bg-red-700", "text-white");
    }
}

// quando cambio pagina legge la scelta dal localstorage e mantiene la vista selezionata nella pagina precedente
window.addEventListener("DOMContentLoaded", function () {
    const savedView = localStorage.getItem("viewMode") || "list";
    switchView(savedView);
});
