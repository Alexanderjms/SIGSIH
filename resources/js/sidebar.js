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
});
