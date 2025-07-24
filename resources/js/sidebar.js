document.addEventListener('alpine:init', () => {
    window.sidebarDropdown = (key) => ({
    open: localStorage.getItem('sidebar-' + key) === 'true' ? true : false,
        toggle() {
            this.open = !this.open;
            localStorage.setItem('sidebar-' + key, this.open);
        }
    });
});
