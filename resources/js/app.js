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

Chart.defaults.font.family = "'Inter', sans-serif";
Chart.defaults.color = "#6B7280";

const ordenesCtx = document.getElementById("ordenesChart").getContext("2d");
new Chart(ordenesCtx, {
    type: "doughnut",
    data: {
        labels: ["Abiertas", "En Proceso", "Cerradas"],
        datasets: [
            {
                data: [45, 123, 1079],
                backgroundColor: ["#EF4444", "#F59E0B", "#10B981"],
                borderWidth: 2,
                borderColor: "#FFFFFF",
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: "bottom",
                labels: {
                    padding: 20,
                    usePointStyle: true,
                    font: {
                        size: 12,
                    },
                },
            },
        },
    },
});

const cotizacionesCtx = document
    .getElementById("cotizacionesChart")
    .getContext("2d");
new Chart(cotizacionesCtx, {
    type: "line",
    data: {
        labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago"],
        datasets: [
            {
                label: "Cotizaciones",
                data: [65, 78, 90, 81, 96, 87, 102, 115],
                borderColor: "#6366F1",
                backgroundColor: "rgba(99, 102, 241, 0.1)",
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: "#6366F1",
                pointBorderColor: "#FFFFFF",
                pointBorderWidth: 2,
                pointRadius: 5,
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            },
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: "#F3F4F6",
                },
            },
            x: {
                grid: {
                    display: false,
                },
            },
        },
    },
});

const proyectosCtx = document.getElementById("proyectosChart").getContext("2d");
new Chart(proyectosCtx, {
    type: "bar",
    data: {
        labels: ["En Proceso", "Finalizados", "Pendientes", "Cancelados"],
        datasets: [
            {
                data: [234, 187, 23, 12],
                backgroundColor: ["#06B6D4", "#10B981", "#F59E0B", "#EF4444"],
                borderRadius: 6,
                borderSkipped: false,
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        indexAxis: "y",
        plugins: {
            legend: {
                display: false,
            },
        },
        scales: {
            x: {
                beginAtZero: true,
                grid: {
                    color: "#F3F4F6",
                },
            },
            y: {
                grid: {
                    display: false,
                },
            },
        },
    },
});
