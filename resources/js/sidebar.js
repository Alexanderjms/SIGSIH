document.addEventListener('alpine:init', () => {
    window.sidebarDropdown = (key, active = false) => ({
        open: active,
        toggle() {
            this.open = !this.open;
        }
    });
});
