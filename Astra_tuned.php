<?php


API_KEY="YOUR_API_KEY"

curl \
  -X POST https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash-exp:generateContent?key=${API_KEY} \
  -H 'Content-Type: application/json' \
  -d @<(echo '{
  "contents": [
    {
      "role": "user",
      "parts": [
        {
          "text": "input: "
        },
        {
          "text": "Input Sign-up Process = Name, Email, Preferred Programming Level, Preferred Language (optional), Preferred Learning Pace (optional), Professional Goals (optional)"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output User account created, personalized dashboard setup, multilingual preferences stored"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Email Verification= Email address"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Verification link sent, account activated"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Onboarding Guide=User email, basic platform details"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Onboarding guide sent to email, access to platform features explained"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Initial Skill Assessment=Responses to multiple-choice questions, debugging tasks, and coding challenges"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Real-time feedback provided, initial skill level (Beginner, Intermediate, Advanced) determined"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input AI Analysis=Skill assessment results, learning preferences"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Skill gaps identified, programming level confirmed, personalized learning preferences analyzed"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Course Outline Creation=Programming level, skill gaps, professional goals"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Personalized learning path created with tailored content and resources"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Beginner Track=Beginner level"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Tutorials on programming basics, step-by-step guides, and simple projects introduced"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Intermediate Track=Intermediate level"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Resources on APIs, database integration, and debugging; moderate-level projects assigned"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Advanced Track=Advanced level"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Complex projects, advanced topics like AI integration, performance optimization"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Adaptive Learning Updates=User performance and feedback"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Continuous updates to learning path based on progress and evolving preferences"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input User Feedback Form=Course preferences, issues faced"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Feedback analyzed to improve course structure"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Profile Customization=Profile picture, bio, and interests"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Personalized profile page created"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Badge System Activation=User engagement and activity data"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Gamified badges awarded for milestones achieved"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Group Collaboration=Preferred group size, topics of interest"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Learning groups and collaboration opportunities matched"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Progress Tracking=Completed lessons, quizzes, projects"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Visual dashboard updated with progress reports"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Code Review Requests=Submitted code snippets"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Feedback from AI or peers provided"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Certification Request=Completed course milestones"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Digital certificate generated"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Preferred Project Ideas=Project themes, technologies of interest"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Recommended project ideas aligned with user goals"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Platform Demo Interaction=Questions or clicks on guided tour"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Interactive demo provided with step-by-step explanations"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Language Preferences=Selected language for learning"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output All content displayed in the preferred language"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input FAccessibility Settings=ont size, color contrast, text-to-speech options"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Customized accessibility settings applied"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input What is a function in programming?"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output A block of reusable code"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Which tag is used for hyperlinks in HTML?"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output "
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Debugging Task: Find the error in this code snippet: \"print(Hello World)\""
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Missing parentheses"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Write a \"Hello World\" program in Python."
        },
        {
          "text": "output: "
        },
        {
          "text": "Output \"Hello World\" program validated"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Identify the error in this CSS code: \"color; red;\""
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Missing colon"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input What does SQL stand for?"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Structured Query Language"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Which Python library is used for data analysis?"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output NumPy, Pandas, Matplotlib"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input What is the output of 3+\"3\" in JavaScript?"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Error"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Debug this JavaScript code: \"let x == 10;\""
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Change \"==\" to \"=\""
        },
        {
          "text": "input: "
        },
        {
          "text": "Input What is the purpose of version control?"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Track changes"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input What is Portfolio Ready?"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output A personalized learning platform Created by Astra softwares, powered by An Ai Tutor, called AstraAi."
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Who founded Portfolio Ready?"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Ismael Bett famously Known by the name Mr. Hope is th Founder and the CEO of Astra softwares, a tech company which created portfolio ready!"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input Who is the CEO of Astra Softwares?"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output Ismael Kipkoech Bett famously Known by the name Mr. Hope is th Founder and the CEO of Astra softwares, a tech company which created portfolio ready!"
        },
        {
          "text": "input: "
        },
        {
          "text": "Input What is the primary goal of Portfolio Ready?"
        },
        {
          "text": "output: "
        },
        {
          "text": "Output To provide adaptive programming courses."
        },
        {
          "text": "input: "
        },
        {
          "text": "Input "
        },
        {
          "text": "output: "
        }
      ]
    }
  ],
  "generationConfig": {
    "temperature": 0.85,
    "topK": 40,
    "topP": 0.95,
    "maxOutputTokens": 8192,
    "responseMimeType": "text/plain"
  }
}')












?>