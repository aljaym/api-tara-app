# TaraApp API

A modern Laravel API application with Docker containerization for easy development and deployment.

## 🚀 Features

- **Laravel 10+** - Modern PHP framework
- **PHP 8.3** - Latest PHP version with FPM
- **MySQL 8.0** - Reliable database server
- **phpMyAdmin** - Web-based MySQL administration
- **Redis 7** - Caching and session storage
- **Nginx** - High-performance web server
- **Mailpit** - Email testing tool
- **Docker Compose** - Easy container orchestration

## 📋 Prerequisites

Before you begin, ensure you have the following installed:

- [Docker](https://www.docker.com/get-started) (version 20.10+)
- [Docker Compose](https://docs.docker.com/compose/install/) (version 2.0+)
- [Git](https://git-scm.com/downloads)

## 🛠️ Quick Start

### 1. Clone the Repository

```bash
git clone <repository-url>
cd api-tara-app
```

### 2. Start the Services

```bash
# Start all containers
docker-compose up -d

# View logs
docker-compose logs -f
```

### 3. Initial Setup (First Time Only)

```bash
# Install Composer dependencies
docker-compose exec app composer install

# Copy environment configuration
cp src/.env.example src/.env

# Generate application key
docker-compose exec app php artisan key:generate

# Run database migrations
docker-compose exec app php artisan migrate

# Fix Laravel permissions (if needed)
docker-compose exec app chmod -R 775 storage bootstrap/cache
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
```

### 4. Access the Application

- **API**: http://localhost:8080
- **phpMyAdmin (Database UI)**: http://localhost:8081
- **Mailpit (Email Testing)**: http://localhost:8025
- **MySQL**: localhost:3306

## 🏗️ Project Structure

```
api-tara-app/
├── docker-compose.yml          # Docker services configuration
├── Dockerfile                  # PHP-FPM container definition
├── nginx/
│   └── default.conf           # Nginx configuration
├── src/                       # Laravel application (included in repo)
│   ├── app/
│   ├── config/
│   ├── database/
│   ├── public/
│   └── ...
└── README.md
```

## 🐳 Services

### App Container (PHP-FPM)
- **Image**: Custom PHP 8.3-FPM
- **Container**: `laravel_app`
- **Features**:
  - PHP 8.3 with FPM
  - Composer 2
  - Laravel-optimized extensions
  - GD, PDO MySQL, MBString, etc.

### Nginx Container
- **Image**: nginx:stable
- **Container**: `laravel_nginx`
- **Port**: 8080
- **Features**:
  - Static file serving
  - PHP-FPM proxy
  - Gzip compression
  - Security headers

### MySQL Container
- **Image**: mysql:8.0
- **Container**: `laravel_mysql`
- **Port**: 3306
- **Database**: `tara_db`
- **Credentials**:
  - Username: `tara_user`
  - Password: `tara_pass`
  - Root Password: `root`

### Redis Container
- **Image**: redis:7
- **Container**: `laravel_redis`
- **Port**: 6379
- **Features**:
  - Caching
  - Session storage
  - Queue management

### Mailpit Container
- **Image**: axllent/mailpit:latest
- **Container**: `laravel_mailpit`
- **Ports**: 8025 (Web UI), 1025 (SMTP)
- **Features**:
  - Email testing
  - Web interface for email preview

### phpMyAdmin Container
- **Image**: phpmyadmin/phpmyadmin:latest
- **Container**: `laravel_phpmyadmin`
- **Port**: 8081
- **Features**:
  - Web-based MySQL administration
  - Database management interface
  - Query execution and optimization
  - User management

## 🔧 Development Commands

### Container Management

```bash
# Start all services
docker-compose up -d

# Stop all services
docker-compose down

# Restart a specific service
docker-compose restart app

# View logs
docker-compose logs -f app

# Rebuild containers
docker-compose up --build
```

### Laravel Commands

```bash
# Access the app container
docker-compose exec app bash

# Run Artisan commands
docker-compose exec app php artisan migrate
docker-compose exec app php artisan make:controller ApiController
docker-compose exec app php artisan make:model User -m

# Install Composer packages
docker-compose exec app composer install
docker-compose exec app composer require package/name

# Run tests
docker-compose exec app php artisan test
```

### Database Commands

```bash
# Access MySQL container
docker-compose exec mysql mysql -u tara_user -p tara_db

# Run migrations
docker-compose exec app php artisan migrate

# Seed database
docker-compose exec app php artisan db:seed

# Reset database
docker-compose exec app php artisan migrate:fresh --seed
```

## ⚙️ Configuration

### Environment Variables

The application uses the following key environment variables:

```env
# Database
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=tara_db
DB_USERNAME=tara_user
DB_PASSWORD=tara_pass

# Cache
CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

# Mail
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
```

### Nginx Configuration

The Nginx configuration is located in `nginx/default.conf` and includes:
- PHP-FPM proxy configuration
- Static file optimization
- Security headers
- Gzip compression

## 🚀 Deployment

### Production Considerations

1. **Environment Variables**: Update `.env` for production settings
2. **Security**: Change default passwords and keys
3. **SSL**: Configure SSL certificates
4. **Monitoring**: Add logging and monitoring
5. **Backup**: Set up database backups

### Docker Production Build

```bash
# Build production image
docker-compose -f docker-compose.prod.yml build

# Deploy to production
docker-compose -f docker-compose.prod.yml up -d
```

## 🐛 Troubleshooting

### Common Issues

1. **Laravel Permission Errors**
   
   **Error**: `The stream or file "/var/www/html/storage/logs/laravel.log" could not be opened in append mode: Permission denied`
   
   **Solution**:
   ```bash
   # Fix Laravel storage and cache permissions
   docker-compose exec app chmod -R 775 storage bootstrap/cache
   docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
   
   # Alternative: Run as root if needed
   docker-compose exec --user root app chown -R www-data:www-data storage bootstrap/cache
   docker-compose exec --user root app chmod -R 775 storage bootstrap/cache
   ```

2. **Bootstrap Cache Directory Error**
   
   **Error**: `The /var/www/html/bootstrap/cache directory must be present and writable`
   
   **Solution**:
   ```bash
   # Create bootstrap cache directory
   docker-compose exec app mkdir -p bootstrap/cache
   docker-compose exec app chmod 775 bootstrap/cache
   docker-compose exec app chown www-data:www-data bootstrap/cache
   ```

3. **Database Connection Issues**
   ```bash
   # Check if MySQL is running
   docker-compose ps mysql
   
   # View MySQL logs
   docker-compose logs mysql
   
   # Test database connection
   docker-compose exec app php artisan tinker
   # Then run: DB::connection()->getPdo();
   ```

4. **Container Won't Start**
   ```bash
   # Check container logs
   docker-compose logs app
   
   # Rebuild container
   docker-compose up --build app
   
   # Remove and recreate containers
   docker-compose down
   docker-compose up --build
   ```

5. **Port Already in Use**
   ```bash
   # Check what's using the port
   netstat -tulpn | grep :8080
   
   # Change port in docker-compose.yml
   ```

6. **Composer Issues**
   ```bash
   # Clear Composer cache
   docker-compose exec app composer clear-cache
   
   # Reinstall dependencies
   docker-compose exec app composer install --no-cache
   ```

### Debugging

```bash
# Access container shell
docker-compose exec app bash

# Check PHP configuration
docker-compose exec app php -i

# Check Laravel configuration
docker-compose exec app php artisan config:show
```

## 📚 Additional Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Docker Documentation](https://docs.docker.com/)
- [Docker Compose Documentation](https://docs.docker.com/compose/)
- [Nginx Documentation](https://nginx.org/en/docs/)

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🆘 Support

If you encounter any issues or have questions:

1. Check the [troubleshooting section](#-troubleshooting)
2. Search existing [issues](https://github.com/your-repo/issues)
3. Create a new issue with detailed information

---

**Happy Coding! 🎉**
