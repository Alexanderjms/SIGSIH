document.addEventListener("alpine:init", () => {
    window.sidebarDropdown = (key, active = false) => ({
        open:
            localStorage.getItem(`sidebar-${key}`) !== null
                ? JSON.parse(localStorage.getItem(`sidebar-${key}`))
                : active,
        toggle() {
            this.open = !this.open;
            localStorage.setItem(`sidebar-${key}`, this.open);
        },
        init() {
            document.addEventListener("update-sidebar-dropdown", (event) => {
                if (event.detail.key === key) {
                    this.open = event.detail.open;
                }
            });
        },
    });

    window.sidebarScrollManager = {
        init() {
            const sidebar = document.querySelector("aside");
            if (!sidebar) return;

            this.restoreScrollPosition(sidebar);

            this.setupScrollListener(sidebar);
        },

        restoreScrollPosition(sidebar) {
            const savedScrollTop = localStorage.getItem(
                "sidebar-scroll-position"
            );
            if (savedScrollTop !== null) {
                requestAnimationFrame(() => {
                    sidebar.scrollTop = parseInt(savedScrollTop, 10);
                });
            }
        },

        setupScrollListener(sidebar) {
            let scrollTimeout;

            sidebar.addEventListener("scroll", () => {
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(() => {
                    localStorage.setItem(
                        "sidebar-scroll-position",
                        sidebar.scrollTop
                    );
                }, 100);
            });
        },
    };
});

document.addEventListener("DOMContentLoaded", () => {
    setTimeout(() => {
        if (window.sidebarScrollManager) {
            window.sidebarScrollManager.init();
        }
    }, 100);
});
