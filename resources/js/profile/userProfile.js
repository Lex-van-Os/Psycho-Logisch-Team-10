import { displayErrorToast, displaySuccessToast } from "../shared/toaster";

let shareReflectionBtn;

document.addEventListener("DOMContentLoaded", () => {
    shareReflectionBtn = document.querySelector(".share-reflection-btn");
    const summaryId = shareReflectionBtn.getAttribute("summary-id");

    shareReflectionBtn.addEventListener("click", () => {
        // Disable the button to prevent multiple clicks
        shareReflectionBtn.disabled = true;
        shareSummary(summaryId);
    });
});

function shareSummary(summaryId) {
    axios
        .post("/home/shareSummary", { summaryId })
        .then((response) => {
            if (response.status === 200) {
                console.log(response.data.message);
                if (response.data.message === "Summary shared successfully") {
                    const shared = response.data.shared;
                    const successMessage = shared ? "Samenvatting gedeeld" : "Samenvatting teruggedraaid";
                    displaySuccessToast(successMessage);
                    updateShareButtonStyle(shared);
                }
            } else {
                console.error("An error occurred while sharing the summary");
                displayErrorToast(
                    "Er is iets fout gegaan met het delen van de samenvatting"
                );
            }
        })
        .catch((error) => {
            console.error(error);
            displayErrorToast(
                "Er is iets fout gegaan met het delen van de samenvatting"
            );
        })
        .finally(() => {
            // Enable the button after the request is completed
            shareReflectionBtn.disabled = false;
        });
}

function updateShareButtonStyle(shared) {
    const shareReflectionBtn = document.querySelector(".share-reflection-btn");
    if (shared) {
        shareReflectionBtn.classList.remove("bg-blue-500", "hover:bg-blue-700");
        shareReflectionBtn.classList.add("bg-blue-300", "hover:bg-blue-500");
        shareReflectionBtn.textContent = "Gedeeld";
    } else {
        shareReflectionBtn.classList.remove("bg-blue-300", "hover:bg-blue-500");
        shareReflectionBtn.classList.add("bg-blue-500", "hover:bg-blue-700");
        shareReflectionBtn.textContent = "Reflectie delen";
    }
}