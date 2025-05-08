# Quiz Application

## Overview

Current version of the quiz (question & answer system) is developed in the simplest manner. It was following a simple **Model-View-Controller (MVC)** approach by using Models to extract data like questions and answers, setting up their relationships and using controllers intermediary between the model and the view. The whole quiz logic is defined by using QuizService class that does all of the heavy lifting. The reason why it was moved to a service class since it can be expanded and re-used in any other areas once the project grows in the future.

## Features

- **MVC Architecture**: The application is built using a simple MVC approach with Laravel Framework.
- **Question and Answer Management**: Questions and answers are dynamically served to the user.
- **Quiz Logic**: The heavy/business lifting is done by the `QuizService` class.
- **Future Expansion**: Designed with future growth in mind, allowing easy addition of features.

## Tasks and Time Estimates

### 1. Create UI for Dynamic Question & Answer Creation

- **Description**: Develop a user interface page where the questions & answers can be created dynamically by system administrators. Each Q&A needs to be split into a particular group that questions are linked to, this way you can create different groups of questions and serve them on the same page based on user selection, allowing for different themed quizzes (e.g., Star Wars, Lord of the Rings).

- **Time Estimate**: ~8 hours

### 2. User Accounts for Custom Question Groups

- **Description**: Allow to create user accounts for application users to create their own question groups by using the same UI page from the first point that they can share with their friends, family, co-workers etc. This can be done by linking question groups to particular user IDs
- **Time Estimate**: ~2-3 hours

### 3. Adding Custom GIFs to Quizzes

- **Description**: Enable users to add custom GIFs to quizzes, including on the result page. This can be achieved by either integrating a service like Giphy or by allowing users to upload GIFs manually, with storage on a cloud service like AWS S3.
- **Time Estimate**: ~2 hours (assuming AWS S3 is already set up)

### 4. Randomize Question and Answer Order

- **Description**: Mix up the questions answers order every time it loads. To make it less predictable, answers can be shuffled so users cannot answer them by just remembering the order from their previous failures. This can be extremely useful if this system is used to check the educational preparation (e.g., Microsoft Certificate Exams, Driving Theory Exams). Answers should be checked on the backend after being submitted to calculate the result instead of just depending on frontend input value, which can be inspected by someone who is more knowledgable of software development. 
- **Time Estimate**: ~3-4 hours

### 5. Multiple Answers & Scoring

- **Description**: Allow users to determine if the question is multi-select or not. This would allow the participants of the quiz to have more than one correct answers with their individual scoring. Scoring can be assigned to each question individually by the creator that will be counted at the end of the results.
- **Time Estimate**: ~2 hours

### 6. Branching Questions

- **Description**: Improvement on question & answer builder page that allows answers to dynamically lead to different questions, for example question 1 can lead to question 16, question 2 can lead to question 17 etc. This can allow users to create data driven quizzes and exams. 
- This would require changing the database structure massively and creating a new UI container that allows connection between answers and questions.
- **Time Estimate**: ~16 hours

## Installation

### Prerequisites
Make sure you have the following installed:
- PHP 8.2
- Laravel 12

### Steps
- Install composer dependancies for Laravel
   ```bash
   composer install
- Set up your .env file
    ```
    cp .env.example .env

- Create database
   ```bash
   php artisan migrate

- Generate application key
    ```bash
    php artisan key:generate

- Run the seeder to generate the questions & answers
   ```bash
   php artisan db:seed

- Run the project
    ```bash
    php artisan serve