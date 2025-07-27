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
                    });
            } finally {
                this.isTransitioning = false;
            }
        },
    });
});
