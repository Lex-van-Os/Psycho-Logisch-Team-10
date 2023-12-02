import Toastify from "toastify-js";

export function displaySuccessToast(toastMessage, callback = null) {
    Toastify({
        text: toastMessage,
        duration: 3000,
        gravity: "top",
        position: "right",
        className: "success-toast",
        onClick: () => {
            if (callback !== null) {
                callback();
            }
        }, // Callback after click
    }).showToast();
}

export function displayErrorToast(toastMessage, callback = null) {
    Toastify({
        text: toastMessage,
        duration: 3000,
        gravity: "top",
        position: "right",
        className: "fail-toast",
        onClick: () => {
            if (callback !== null) {
                callback();
            }
        }, // Callback after click
    }).showToast();
}