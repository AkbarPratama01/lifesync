# LifeSync

LifeSync is a comprehensive personal life management system designed to help users organize and track various aspects of their daily lives. The application provides integrated tools for spiritual practices, personal development, and life organization.

![LifeSync Login](https://github.com/user-attachments/assets/658c1870-79db-4ebc-bf9a-b306b5427557)

## Features

LifeSync offers a complete suite of personal management tools:

### 🕌 Islamic Features
- **Prayer Tracking (Riwayat Shalat)**: Track and manage daily prayer history
- **Quran Reading**: Browse Quran chapters with bookmarking functionality
- **Spiritual Dashboard**: Integrated view of religious activities

### 📝 Personal Organization
- **Todo Lists**: Create, manage, and track daily tasks
- **Goal Management**: Set and monitor personal goals
- **Daily Journal**: Keep a personal diary with date-based entries

### 💰 Financial Management
- **Financial Records**: Track income and expenses with categorization
- **Transaction History**: View and manage financial transactions
- **Budget Tracking**: Monitor spending patterns

### 👤 User Management
- **User Authentication**: Secure login and registration system
- **Personal Dashboard**: Centralized view of all activities

## System Requirements

- **PHP**: 8.0 or higher
- **Database**: MySQL 5.7+ or MariaDB 10.3+
- **Web Server**: Apache or Nginx
- **Composer**: For dependency management

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/AkbarPratama01/lifesync.git
cd lifesync
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Environment Configuration

Copy the example environment file and configure your settings:

```bash
cp .env.example .env
```

Edit the `.env` file with your database credentials:

```env
# Database configuration
DB_HOST=your_database_host
DB_DATABASE=lifesync
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Application settings
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000
```

### 4. Database Setup

Import the database schema:

```bash
mysql -u your_username -p lifesync < lifesync.sql
```

The database includes the following tables:
- `users` - User accounts
- `prayer_records` - Prayer tracking data
- `todos` - Task management
- `journals` - Daily journal entries
- `financial_records` - Financial transactions
- `goals` - Personal goals
- `surat` - Quran chapters
- `ayat` - Quran verses
- `bookmarks` - Quran bookmarks

### 5. Start the Application

```bash
composer start
```

Or manually:

```bash
php -S localhost:8000 -t public
```

The application will be available at `http://localhost:8000`

## Usage

### Getting Started

1. **Register an Account**: Visit `/register` to create a new user account
2. **Login**: Access the application through `/login`
3. **Dashboard**: View your personalized dashboard with activity overview

### Core Features

#### Prayer Tracking
- Navigate to **Riwayat Shalat** to log your daily prayers
- Track prayer times and completion status
- View prayer history and statistics

#### Quran Reading
- Browse Quran chapters in the **Al-Quran** section
- Bookmark verses for easy reference
- Access bookmarked content anytime

#### Task Management
- Create and manage tasks in the **Todo List**
- Mark tasks as complete
- Edit or delete existing tasks

#### Journaling
- Write daily entries in **Jurnal Harian**
- Organize thoughts and experiences by date
- Edit or review past entries

#### Financial Tracking
- Record income and expenses in **Financial Records**
- Categorize transactions (Pendapatan/Pengeluaran)
- Monitor financial patterns

#### Goal Setting
- Set personal goals in the **Goals** section
- Track progress towards objectives
- Update and manage goal completion

## API Routes

The application uses a RESTful routing structure:

### Authentication
- `GET /login` - Login page
- `GET /register` - Registration page
- `POST /login/submit` - Process login
- `POST /register/submit` - Process registration
- `GET /logout` - User logout

### Dashboard
- `GET /dashboard` - Main dashboard
- `POST /dashboard/update-shalat` - Update prayer status

### Todo Management
- `GET /todolist` - Todo list page
- `POST /todolist/add` - Add new task
- `GET /todolist/complete/{id}` - Mark task complete
- `GET /todolist/delete/{id}` - Delete task
- `GET /todolist/edit/{id}` - Edit task page
- `POST /todolist/edit/submit` - Update task

### Journal
- `GET /jurnal-harian` - Journal list
- `GET /jurnal-harian/create` - New journal form
- `POST /jurnal-harian/store` - Save journal entry
- `GET /jurnal-harian/edit/{id}` - Edit journal form
- `POST /jurnal-harian/update/{id}` - Update journal
- `GET /jurnal-harian/delete/{id}` - Delete journal

### Prayer Records
- `GET /riwayat-shalat` - Prayer history
- `GET /riwayat-shalat/create` - New prayer record form
- `POST /riwayat-shalat/store` - Save prayer record
- `GET /riwayat-shalat/edit/{id}` - Edit prayer record
- `POST /riwayat-shalat/update/{id}` - Update prayer record
- `GET /riwayat-shalat/delete/{id}` - Delete prayer record

### Financial Records
- `GET /financial_records` - Financial records list
- `POST /financial_records/store` - Save financial record
- `GET /financial_records/edit/{id}` - Edit financial record
- `POST /financial_records/update/{id}` - Update financial record
- `GET /financial_records/delete/{id}` - Delete financial record

### Goals
- `GET /goal` - Goals list
- `POST /goal/add` - Add new goal
- `GET /goal/complete/{id}` - Mark goal complete
- `GET /goal/delete/{id}` - Delete goal
- `GET /goal/edit/{id}` - Edit goal page
- `POST /goal/edit/submit` - Update goal

### Quran
- `GET /quran` - Quran chapters list
- `GET /quran/{id}` - View chapter details
- `POST /quran/bookmark/{id}` - Bookmark verse
- `GET /quran/bookmarked` - View bookmarked verses

## Development

### Project Structure

```
lifesync/
├── public/             # Web root directory
│   ├── index.php      # Application entry point
│   ├── css/           # Stylesheets
│   └── js/            # JavaScript files
├── src/               # Application source code
│   ├── Controllers/   # MVC Controllers
│   ├── Models/        # Data models
│   ├── Views/         # HTML templates
│   ├── Config/        # Configuration files
│   └── routes.php     # Route definitions
├── tests/             # Test suite
├── vendor/            # Composer dependencies
├── composer.json      # Composer configuration
├── phpunit.xml        # PHPUnit configuration
├── lifesync.sql       # Database schema
└── .env               # Environment variables
```

### Running Tests

```bash
composer test
```

### Code Style

The project follows PSR-4 autoloading standards and uses:
- MVC architecture pattern
- Bootstrap for frontend styling
- jQuery for client-side interactions

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/new-feature`)
3. Commit your changes (`git commit -am 'Add new feature'`)
4. Push to the branch (`git push origin feature/new-feature`)
5. Create a Pull Request

## Troubleshooting

### Common Issues

**Database Connection Error**
- Verify database credentials in `.env` file
- Ensure MySQL/MariaDB service is running
- Check if database `lifesync` exists

**Permission Errors**
- Ensure web server has read access to application files
- Check PHP file permissions

**Composer Errors**
- Run `composer install` to install dependencies
- Verify PHP version compatibility (≥8.0)

**Session Issues**
- Ensure PHP session support is enabled
- Check session storage permissions

### Support

For issues and questions:
1. Check the troubleshooting section above
2. Review the database schema in `lifesync.sql`
3. Examine error logs in your web server
4. Open an issue in the GitHub repository

## License

This project is open source. Please check the repository for specific license terms.

---

**LifeSync** - Organize your life, strengthen your faith, achieve your goals.