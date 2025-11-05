document.addEventListener("DOMContentLoaded", function () {
    const container = document.querySelector(".items-container");
    if (!container) return;

    const items = Array.from(container.querySelectorAll(".category-item"));
    const paginationContainer = document.querySelector(".pagination");
    let currentPage = 1;

    function getColCount() {
        return getComputedStyle(container).gridTemplateColumns.split(" ").length;
    }

    function scrollToTopSmooth() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }

    function renderPagination(totalPages) {
        paginationContainer.innerHTML = "";
        const ul = document.createElement("ul");
        ul.classList.add("pagination");

        function createPageItem(label, page, disabled = false, active = false, extraClass = "") {
            const li = document.createElement("li");
            li.classList.add("page-item");
            if (extraClass) li.classList.add(extraClass); // extra class for styling
            if (disabled) li.classList.add("disabled");
            if (active) li.classList.add("active");

            const el = disabled ? document.createElement("span") : document.createElement("a");
            el.classList.add("page-link");
            el.textContent = label;
            if (!disabled) {
                el.href = "#";
                el.addEventListener("click", (e) => {
                    e.preventDefault();
                    currentPage = page;
                    renderPage();
                    scrollToTopSmooth();
                });
            }
            li.appendChild(el);
            return li;
        }

        // Previous
        ul.appendChild(createPageItem("Back", currentPage - 1, currentPage <= 1, false, "prev"));

        // Page number logic
        const range = 1; // how many around current
        let pages = [];

        if (totalPages <= 5) {
            pages = Array.from({ length: totalPages }, (_, i) => i + 1);
        } else {
            pages.push(1);
            if (currentPage - range > 2) pages.push("...");
            for (let i = Math.max(2, currentPage - range); i <= Math.min(totalPages - 1, currentPage + range); i++) {
                pages.push(i);
            }
            if (currentPage + range < totalPages - 1) pages.push("...");
            pages.push(totalPages);
        }

        pages.forEach(p => {
            if (p === "...") {
                ul.appendChild(createPageItem("...", null, true));
            } else {
                ul.appendChild(createPageItem(p, p, false, p === currentPage));
            }
        });

        // Next
        ul.appendChild(createPageItem("Next", currentPage + 1, currentPage >= totalPages, false, "next"));

        paginationContainer.appendChild(ul);
    }



    function renderPage() {
        const colCount = getColCount();
        const maxItems = colCount * 4; // always 4 rows
        const totalPages = Math.ceil(items.length / maxItems);

        // Ensure currentPage is valid
        if (currentPage > totalPages) {
            currentPage = totalPages || 1;
        }

        items.forEach(item => item.style.display = "none");

        const start = (currentPage - 1) * maxItems;
        const end = start + maxItems;
        items.slice(start, end).forEach(item => item.style.display = "");

        renderPagination(totalPages);
    }

    // Initial load
    renderPage();

    // Adjust dynamically when screen size changes
    window.addEventListener("resize", renderPage);
});
