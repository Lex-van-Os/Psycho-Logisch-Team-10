import axios from "axios";

async function getReflectionAnswer(questionId) {
    try {
        const response = await axios.get(
            `/question/get/${$questionId}`
        );

        const results = response.data;

        return results;
    } catch (error) {
        console.log("Failed sending request");
        console.log(error.response);
        throw error; // Rethrow the error to handle it in the calling function
    }
}

function displayShareButton() {
    shareBtn = document.getElementById('share-answer-btn');

}

async function displayReflectionAnswer(questionId) {
    answerTitle = document.getElementById('selected-answer-title');
    answerText = document.getElementById('selected-answer-text');

    let reflectionAnswer = await getReflectionAnswer(questionId);

    if (reflectionAnswer != null) {
        answerTitle.value = reflectionAnswer.title;
        answerText = reflectionAnswer.title
    }
}