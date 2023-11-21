from flask import Flask, request, jsonify
from summarizer import QuestionSummarizer

app = Flask(__name__)

# Functionality for creating a summary of reflection question(s)
@app.route('/psychoLogischInsights/summarizeReflection', methods=['POST'])
def summarizeReflection():
    data = request.get_json()

    question_summarizer = QuestionSummarizer(chunk_limit=400, summary_min_length=30, summary_max_length=120)
    formatted_data = question_summarizer.format_data(data)
    summarized_answer = question_summarizer.summarize_answers(formatted_data)
    
    result = {'summarization': summarized_answer}
    
    return jsonify(result)


# Functionality to generate a shareable summary, with sensitive information filtered out (WIP)
@app.route('/psychoLogischInsights/giveSharingSummary', methods=['POST'])
def calculateBookRecommendations():
    data = request.get_json()
    
    result = {'prediction': 'Sample book recommendations'}
    
    return jsonify(result)


if __name__ == '__main__':
    app.run(debug=True)
