# Mahendrik Sport Centre Subang Android Application README

## Introduction
Welcome to the Mahendrik Sport Centre Subang Android Application README! This document provides an overview of the Android application developed for Mahendrik Sport Centre Subang. The application aims to streamline the process of booking sports facilities and recording rental reports efficiently. It utilizes Web Service technology to enable seamless communication between the Android application and the backend server.

## Features
1. Court Booking: Users can book sports courts through the application. They can select the desired date, time, and type of court, and receive confirmation of their booking.
2. Rental Report Management: The application allows staff to record rental reports easily. Staff members can input details such as the duration of the rental, customer information, and payment status, facilitating efficient management of rental records.
3. Transaction Processing: The application facilitates transaction processes, enabling users to make payments for court bookings directly through the app. It provides secure payment options and generates receipts for completed transactions.
4. Court Schedule Checking: Users can check the availability of sports courts by viewing the schedule within the application. This feature helps users plan their bookings effectively and avoid scheduling conflicts.

## Technologies Used
- Android Studio: The frontend of the application is developed using Android Studio, the official integrated development environment (IDE) for Android app development. Android Studio provides tools for designing user interfaces, writing code, and testing applications on various Android devices.
- Web Service: The application communicates with a backend server using Web Service technology. This enables real-time data exchange between the Android application and the server, ensuring seamless functionality and synchronization of information.

## Installation Instructions
To set up the Immunization Application on your local environment, follow these steps:
1. Clone Repository
   ```
   git clone <repository-url>
   ```
2. Backend Setup:
   - Navigate to the backend directory (cd backend) and install dependencies using Composer:
     ```
     composer install
     ```
   - Rename the .env.example file to .env and configure your database connection details.
   - Generate a new application key
     ```
     php artisan key:generate
     ```
   - Run database migrations to create the necessary tables:
     ```
     php artisan migrate
     ```
3. Frontend Setup:
   - Open the Android project in Android Studio located in the frontend directory.
   - Configure the necessary API endpoints to communicate with the backend.
4. Run the Application:
   - Start the Laravel development server:
     ```
     php artisan serve
     ```
   - Run the Android application on an emulator or physical device from Android Studio.

## Contributing
We welcome contributions from the community to enhance the Immunization Application. If you would like to contribute, please follow these guidelines:
- Fork the repository and create a new branch for your feature or bug fix.
- Ensure that your code adheres to the project's coding standards and conventions.
- Submit a pull request detailing the changes you've made and any relevant information.

## Contact
For any inquiries or support regarding the Mahendrik Sport Centre Subang Android Application, please contact us at gathanafrr@gmail.com.

---

This README provides a comprehensive guide for installing, understanding, and using the Mahendrik Sport Centre Subang Android Application. If you have any further questions or need assistance, don't hesitate to reach out. Enjoy using the application!
