from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
import psycopg2
from summarizer import QuestionSummarizer
import os
from dotenv import load_dotenv
from datetime import datetime

app = Flask(__name__)

# Load environment variables from .env file
load_dotenv()

# Get the database settings from the .env file
db_username = os.getenv('DB_USERNAME')
db_password = os.getenv('DB_PASSWORD')
db_host = os.getenv('DB_HOST')
db_name = os.getenv('DB_DATABASE')
db_type = os.getenv('DB_TYPE')  # Environment variable to determine the database type

# Set the SQLAlchemy database URI based on the database type
if db_type == 'postgres':
    app.config['SQLALCHEMY_DATABASE_URI'] = f'postgresql://{db_username}:{db_password}@{db_host}/{db_name}'
elif db_type == 'mysql':
    app.config['SQLALCHEMY_DATABASE_URI'] = f'mysql://{db_username}:{db_password}@{db_host}/{db_name}'
else:
    raise ValueError('Invalid database type specified in the environment variable')

app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)


# Functionality for creating a summary of reflection question(s)
@app.route('/psychoLogischInsights/summarizeReflection', methods=['POST'])

def summarizeReflection():
    try:
        data = request.get_json()

        answerData = data['answers']
        user_id = data['user_id']
        reflection_id = data['reflection_id']

        question_summarizer = QuestionSummarizer(chunk_limit=400, summary_min_length=30, summary_max_length=120)
        formatted_data = question_summarizer.format_data(answerData)
        summarized_answer = question_summarizer.summarize_answers(formatted_data)

        created_at = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

        new_summary = ReflectionSummaries(user_id=user_id, reflection_id=reflection_id, summary=summarized_answer, created_at=created_at)
        db.session.add(new_summary)
        db.session.commit()

        return jsonify({'message': 'Summary inserted successfully'}), 200
    except Exception as e:
        print(e)
        return jsonify({'error': str(e)}), 500


# Functionality to generate a shareable summary, with sensitive information filtered out (WIP)
@app.route('/psychoLogischInsights/giveSharingSummary', methods=['POST'])
def calculateBookRecommendations():
    data = request.get_json()

    result = {'prediction': 'Sample book recommendations'}

    return jsonify(result)


if __name__ == '__main__':
    app.run(debug=True)


class ReflectionSummaries(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    user_id = db.Column(db.Integer)
    reflection_id = db.Column(db.Integer)
    summary = db.Column(db.Text)
    created_at = db.Column(db.DateTime, default=datetime.utcnow)
    updated_at = db.Column(db.DateTime, default=datetime.utcnow, onupdate=datetime.utcnow)