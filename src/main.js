import bg1Mobile from "./assets/backgrounds/bg1-mobile.webp";
import bg1Tablet from "./assets/backgrounds/bg1-tablet.webp";
import bg1Pc from "./assets/backgrounds/bg1-pc.webp";
import bg2Mobile from "./assets/backgrounds/bg2-mobile.webp";
import bg2Tablet from "./assets/backgrounds/bg2-tablet.webp";
import bg2Pc from "./assets/backgrounds/bg2-pc.webp";
import bg3Mobile from "./assets/backgrounds/bg3-mobile.webp";
import bg3Tablet from "./assets/backgrounds/bg3-tablet.webp";
import bg3Pc from "./assets/backgrounds/bg3-pc.webp";

const HERO_IMAGE_SIZES = "100vw";
const DISPLAY_DURATION = 5000;
const TRANSITION_DURATION = 800;

const createHeroImageSet = (mobile, tablet, pc) => ({
    src: pc,
    srcset: `${mobile} 767w, ${tablet} 1280w, ${pc} 1281w`,
    sizes: HERO_IMAGE_SIZES,
});

const HERO_IMAGES = [
    createHeroImageSet(bg1Mobile, bg1Tablet, bg1Pc),
    createHeroImageSet(bg2Mobile, bg2Tablet, bg2Pc),
    createHeroImageSet(bg3Mobile, bg3Tablet, bg3Pc),
];

const hero = document.querySelector(".hero");
const heroLayers = hero?.querySelectorAll(".hero__background");

const applyHeroImageSet = (imageElement, imageSet) => {
    imageElement.sizes = imageSet.sizes;
    imageElement.srcset = imageSet.srcset;
    imageElement.src = imageSet.src;
};

if (hero && heroLayers?.length === 2 && HERO_IMAGES.length > 1) {
    applyHeroImageSet(heroLayers[0], HERO_IMAGES[0]);

    let currentIndex = 0;
    let activeLayerIndex = 0;
    let rotationTimeoutId;
    let isDestroyed = false;

    const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)");

    const loadImage = (imageSet) =>
        new Promise((resolve, reject) => {
            const image = new Image();
            image.decoding = "async";
            image.sizes = imageSet.sizes;
            image.srcset = imageSet.srcset;
            image.src = imageSet.src;

            const handleLoad = async () => {
                try {
                    if (typeof image.decode === "function") {
                        await image.decode();
                    }
                } catch {
                    // decode() может отклониться даже после успешной загрузки — это не критично.
                }

                resolve(image.currentSrc || imageSet.src);
            };

            if (image.complete) {
                handleLoad();
                return;
            }

            image.addEventListener("load", handleLoad, { once: true });
            image.addEventListener(
                "error",
                () => reject(new Error(`Failed to load hero image: ${imageSet.src}`)),
                { once: true }
            );
        });

    const applyCurrentHeroSources = async () => {
        const currentImageSet = HERO_IMAGES[currentIndex];
        const secondaryIndex = (currentIndex + 1) % HERO_IMAGES.length;
        const secondaryImageSet = HERO_IMAGES[secondaryIndex];

        try {
            await loadImage(currentImageSet);
        } catch {
            return;
        }

        if (isDestroyed) {
            return;
        }

        applyHeroImageSet(heroLayers[activeLayerIndex], currentImageSet);
        heroLayers[activeLayerIndex].classList.add("is-active");
        heroLayers[Number(!activeLayerIndex)].classList.remove("is-active");

        applyHeroImageSet(heroLayers[Number(!activeLayerIndex)], secondaryImageSet);
    };

    const scheduleNextSwap = () => {
        if (isDestroyed || prefersReducedMotion.matches) {
            return;
        }

        rotationTimeoutId = window.setTimeout(async () => {
            const nextIndex = (currentIndex + 1) % HERO_IMAGES.length;
            const nextImageSet = HERO_IMAGES[nextIndex];
            const nextLayerIndex = Number(!activeLayerIndex);
            const activeLayer = heroLayers[activeLayerIndex];
            const nextLayer = heroLayers[nextLayerIndex];

            try {
                await loadImage(nextImageSet);
            } catch {
                scheduleNextSwap();
                return;
            }

            if (isDestroyed) {
                return;
            }

            applyHeroImageSet(nextLayer, nextImageSet);

            requestAnimationFrame(() => {
                nextLayer.classList.add("is-active");
                activeLayer.classList.remove("is-active");
            });

            window.setTimeout(() => {
                currentIndex = nextIndex;
                activeLayerIndex = nextLayerIndex;
                scheduleNextSwap();
            }, TRANSITION_DURATION);
        }, DISPLAY_DURATION);
    };

    const stopRotation = () => {
        isDestroyed = true;
        window.clearTimeout(rotationTimeoutId);
    };

    const startRotation = () => {
        if (prefersReducedMotion.matches) {
            return;
        }

        const warmup = () => loadImage(HERO_IMAGES[1]).catch(() => null);

        if ("requestIdleCallback" in window) {
            window.requestIdleCallback(warmup, { timeout: 2000 });
        } else {
            window.setTimeout(warmup, 1200);
        }

        scheduleNextSwap();
    };

    prefersReducedMotion.addEventListener("change", (event) => {
        window.clearTimeout(rotationTimeoutId);

        if (event.matches) {
            return;
        }

        isDestroyed = false;
        scheduleNextSwap();
    });

    window.addEventListener("pagehide", stopRotation, { once: true });
    applyCurrentHeroSources().then(startRotation);
}

document.addEventListener("DOMContentLoaded", function () {
    // Скролл кнопки "Узнать больше" к блоку purchase
    const learnMoreBtn = document.querySelector(".hero__action");
    const purchaseSection = document.getElementById("purchase");

    if (learnMoreBtn && purchaseSection) {
        learnMoreBtn.addEventListener("click", () => {
            purchaseSection.scrollIntoView({ behavior: "smooth" });
        });
    }

    const form = document.getElementById("feedback-form");
    const modal = document.getElementById("success-modal");
    const errorContainer = document.getElementById("form-errors");
    const config = window.cyberpunkFormConfig || {};

    if (!form || !modal || !errorContainer) {
        return;
    }

    const submitButton = form.querySelector('button[type="submit"]');
    const nonceInput = form.querySelector('input[name="nonce"]');
    const pageIdInput = form.querySelector('input[name="page_id"]');
    const ajaxUrl = config.ajaxUrl || form.getAttribute("action") || window.location.href;
    const nonce = config.nonce || nonceInput?.value || "";
    const pageId = `${config.pageId || pageIdInput?.value || ""}`.trim();
    const defaultSubmitText = config.defaultSubmitText || submitButton?.textContent || "Отправить";

    const openModal = () => {
        modal.classList.add("show");
        document.body.style.overflow = "hidden";
    };

    const closeModal = () => {
        modal.classList.remove("show");
        document.body.style.overflow = "";
    };

    modal.querySelector(".modal__close")?.addEventListener("click", closeModal);
    modal.querySelector(".modal__button")?.addEventListener("click", closeModal);
    modal.querySelector(".modal__overlay")?.addEventListener("click", closeModal);

    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape" && modal.classList.contains("show")) {
            closeModal();
        }
    });

    const renderErrors = (errors) => {
        errorContainer.innerHTML = errors.map((item) => `<div>${item}</div>`).join("");
        errorContainer.style.display = "block";
        errorContainer.scrollIntoView({ behavior: "smooth", block: "center" });
    };

    const validate = (formData) => {
        const name = `${formData.get("name") || ""}`.trim();
        const email = `${formData.get("email") || ""}`.trim();
        const file = formData.get("screenshot");
        const agreement = formData.get("agreement");
        const errors = [];

        if (name.length < 2) {
            errors.push("Имя должно быть не короче 2 символов");
        }

        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            errors.push("Введи нормальный email");
        }

        if (!(file instanceof File) || file.size === 0) {
            errors.push("Прикрепи файл");
        } else {
            const allowedTypes = ["image/png", "image/jpeg", "application/pdf"];
            if (!allowedTypes.includes(file.type)) {
                errors.push("Можно только PNG, JPG или PDF");
            }
            if (file.size > 5 * 1024 * 1024) {
                errors.push("Файл не больше 5 МБ");
            }
        }

        if (agreement !== "yes") {
            errors.push("Нужно согласиться на обработку данных");
        }

        return errors;
    };

    form.addEventListener("submit", async (event) => {
        event.preventDefault();
        errorContainer.innerHTML = "";
        errorContainer.style.display = "none";

        const formData = new FormData(form);
        formData.set("action", "cyberpunk_submit_form");
        if (nonce) {
            formData.set("nonce", nonce);
        }
        if (pageId) {
            formData.set("page_id", pageId);
        }

        const errors = validate(formData);
        if (errors.length > 0) {
            renderErrors(errors);
            return;
        }

        if (submitButton) {
            submitButton.disabled = true;
            submitButton.textContent = config.sendingText || "Отправляем...";
        }

        try {
            const response = await fetch(ajaxUrl, {
                method: "POST",
                body: formData,
                credentials: "same-origin",
            });
            const data = await response.json();

            if (!response.ok || !data.success) {
                renderErrors(data?.data?.errors || ["Не удалось отправить форму"]);
                return;
            }

            form.reset();
            if (data?.data?.warning) {
                console.warn(data.data.warning);
            }
            openModal();
        } catch (error) {
            renderErrors(["Не получилось отправить форму. Попробуй ещё раз чуть позже."]);
        } finally {
            if (submitButton) {
                submitButton.disabled = false;
                submitButton.textContent = defaultSubmitText;
            }
        }
    });
});
