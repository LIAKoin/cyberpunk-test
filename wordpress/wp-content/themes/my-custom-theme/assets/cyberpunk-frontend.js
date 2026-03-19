(() => {
    const HERO_IMAGE_SIZES = "100vw";
    const DISPLAY_DURATION = 5000;
    const TRANSITION_DURATION = 800;

    const hero = document.querySelector(".hero");
    const heroLayers = hero?.querySelectorAll(".hero__background");

    const createHeroImageSet = (image) => ({
        src: image?.dataset?.pc || image?.currentSrc || image?.src || "",
        srcset: image?.dataset?.srcset || image?.srcset || "",
        sizes: HERO_IMAGE_SIZES,
    });

    const applyHeroImageSet = (imageElement, imageSet) => {
        if (!imageElement || !imageSet) {
            return;
        }

        if (imageSet.sizes) {
            imageElement.sizes = imageSet.sizes;
        }
        if (imageSet.srcset) {
            imageElement.srcset = imageSet.srcset;
        }
        if (imageSet.src) {
            imageElement.src = imageSet.src;
        }
    };

    if (hero && heroLayers?.length === 3) {
        const heroImageSets = Array.from(heroLayers).map((layer) => createHeroImageSet(layer));

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
                    } catch (error) {
                        // ignore decode issues after successful load
                    }

                    resolve(image.currentSrc || imageSet.src);
                };

                if (image.complete) {
                    handleLoad();
                    return;
                }

                image.addEventListener("load", handleLoad, { once: true });
                image.addEventListener("error", () => reject(new Error(`Failed to load hero image: ${imageSet.src}`)), {
                    once: true,
                });
            });

        const scheduleNextSwap = () => {
            if (isDestroyed || prefersReducedMotion.matches) {
                return;
            }

            rotationTimeoutId = window.setTimeout(async () => {
                const nextIndex = (currentIndex + 1) % heroImageSets.length;
                const nextImageSet = heroImageSets[nextIndex];
                const nextLayerIndex = nextIndex;
                const activeLayer = heroLayers[activeLayerIndex];
                const nextLayer = heroLayers[nextLayerIndex];

                try {
                    await loadImage(nextImageSet);
                } catch (error) {
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

        prefersReducedMotion.addEventListener("change", (event) => {
            window.clearTimeout(rotationTimeoutId);
            if (!event.matches) {
                isDestroyed = false;
                scheduleNextSwap();
            }
        });

        window.addEventListener(
            "pagehide",
            () => {
                isDestroyed = true;
                window.clearTimeout(rotationTimeoutId);
            },
            { once: true }
        );

        heroLayers[0].classList.add("is-active");
        scheduleNextSwap();
    }

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
})();
