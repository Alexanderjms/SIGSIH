import "./bootstrap";

// Alpine.js collapse plugin
document.addEventListener("alpine:init", () => {
    Alpine.plugin(collapse);
});

function collapse(Alpine) {
    Alpine.directive(
        "collapse",
        (el, { expression }, { effect, evaluateLater }) => {
            let duration = 200;
            el.style.height = "0px";
            el.style.overflow = "hidden";
            el.style.transitionProperty = "height";
            el.style.transitionDuration = `${duration}ms`;
            el.style.transitionTimingFunction = "ease-in-out";

            effect(() => {
                let show = evaluateLater(expression);
                show((value) => {
                    if (value) {
                        el.style.height = el.scrollHeight + "px";
                    } else {
                        el.style.height = "0px";
                    }
                });
            });
        }
    );
}

// Navigation store for SPA-like navigation
document.addEventListener("alpine:init", () => {
    Alpine.store("navigation", {
        isTransitioning: false,

        async navigate(url) {
            this.isTransitioning = true;

            try {
                await fetch(url)
                    .then((response) => response.text())
                    .then((html) => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, "text/html");
                        const newContent = doc.querySelector("main").innerHTML;

                        document.querySelector("main").innerHTML = newContent;
                        window.history.pushState({}, "", url);

                        // Actualizar el estado activo de los enlaces en la barra lateral
                        this.updateActiveLinks(url);
                    });
            } finally {
                this.isTransitioning = false;
            }
        },

        // Método para actualizar los enlaces activos en la barra lateral
        updateActiveLinks(url) {
            // Eliminar la clase activa de todos los enlaces
            document.querySelectorAll(".sidebar-link").forEach((link) => {
                link.classList.remove("bg-gray-800", "text-blue-400");
                link.classList.add("hover:bg-gray-800", "hover:text-blue-400");
            });

            // Encontrar y marcar el enlace activo actual
            document.querySelectorAll(".sidebar-link").forEach((link) => {
                if (link.getAttribute("href") === url) {
                    link.classList.add("bg-gray-800", "text-blue-400");
                    link.classList.remove(
                        "hover:bg-gray-800",
                        "hover:text-blue-400"
                    );

                    // Encontrar y abrir el menú padre si existe
                    const parentDropdown = link.closest(
                        '[x-data^="sidebarDropdown"]'
                    );
                    if (parentDropdown) {
                        const dropdownKey = parentDropdown
                            .getAttribute("x-data")
                            .match(/sidebarDropdown\('([^']+)'/)[1];
                        localStorage.setItem(`sidebar-${dropdownKey}`, "true");

                        // Forzar actualización del menú desplegable
                        const event = new CustomEvent(
                            "update-sidebar-dropdown",
                            {
                                detail: { key: dropdownKey, open: true },
                            }
                        );
                        document.dispatchEvent(event);
                    }
                }
            });
        },
    });
});
