# Blood Donation Services

A web-based platform designed to connect blood donors with individuals and organizations in need. This application facilitates blood requests, donations, and the management of related services through a user-friendly interface for both regular users and administrators.

## 🌟 Features

### User Features
- **User Authentication:** Secure registration and login system for users.
- **Profile Management:** Users can view and manage their own profile information.
- **Request Blood:** Create and post requests for specific blood types.
- **View Requests:** Browse a list of active blood requests from others.
- **Donate Blood:** Fill out a donation form to register as a donor.
- **View Donors:** See a list of available donors.
- **Campaigns:** View active blood donation campaigns.
- **Trusted Hospitals:** See a list of trusted and verified hospitals.
- **Report System:** Submit reports or issues to the administrators.

### Admin Features
- **Admin Dashboard:** Centralized view for all management tasks.
- **User Management:** View and delete user accounts.
- **Donor Management:** View and delete donor records.
- **Request Management:** View and manage all blood requests.
- **Campaign Management:** Create, view, and manage donation campaigns.
- **Hospital Management:** Add and view trusted hospitals.
- **View Reports:** Review and act on user-submitted reports.

---

## 🛠️ Technology Stack

*   **Backend:** Vanilla PHP
*   **Database:** MySQL / MariaDB
*   **Frontend:** HTML, CSS
*   **Styling Framework:** Tailwind CSS (Configuration present)

---

## 🚀 Getting Started

Follow these instructions to set up and run the project on your local machine.

### Prerequisites

You will need a local server environment that supports PHP and MySQL. The most common setup is using **XAMPP**, but WAMP or MAMP are also suitable alternatives.

*   [Download XAMPP](https://www.apachefriends.org/index.html)

### Installation and Setup

1.  **Clone the Repository:**
    ```bash
    git clone <your-repository-url>
    ```
    Or simply download the project files as a ZIP.

2.  **Place Project in Server Directory:**
    *   Move the entire project folder (`blood_donation_services`) into the `htdocs` directory of your XAMPP installation (e.g., `C:/xampp/htdocs/`).

3.  **Start Apache and MySQL:**
    *   Open the XAMPP Control Panel and start the **Apache** and **MySQL** modules.

4.  **Create the Database:**
    *   Open your web browser and navigate to `http://localhost/phpmyadmin/`.
    *   Click on the **"Databases"** tab.
    *   Create a new database named `blood_donation_services`.
    *   Select the newly created database and go to the **"Import"** tab.
    *   Click **"Choose File"** and select the `blood_donation_services.sql` file located in the `database_file` directory of the project.
    *   Click **"Go"** to import the database schema and data.

5.  **Database Connection:**
    *   This project does not use a centralized configuration file. If the application fails to connect to the database, you may need to manually update the database credentials (`hostname`, `username`, `password`, `database name`) at the top of each `.php` file that interacts with the database.

6.  **Run the Application:**
    *   You can now access the application by navigating to the following URL in your web browser:
        ```
        http://localhost/blood_donation_services/
        ```

---

## 📂 Project Structure

The project follows a flat file structure where each `.php` file generally corresponds to a specific page or feature.

-   `index.php`: The main landing page.
-   `register.php`, `login.php`: User authentication pages.
-   `request_blood.php`, `donation_form.php`: Core feature pages.
-   `admin_*.php`: All files prefixed with `admin_` are part of the admin panel.
-   `*.css`: Each page has its own corresponding CSS file for styling.
-   `database_file/`: Contains the SQL dump for the database setup.
-   `our_team/`: Contains assets and information about the project team.

