# Tara API Documentation

Welcome to the **Tara API** - a comprehensive social media platform for travel and adventure experiences in the Philippines.

## 🎯 What is Tara?

Tara is a social media platform focused on travel and adventure experiences, particularly highlighting the beautiful destinations and activities in the Philippines. Users can share their travel experiences, discover new adventures, follow other travelers, and book events.

## 🚀 Key Features

- **📱 Social Feed**: Discover posts and events from other travelers
- **🗓️ Event Management**: Create and manage travel events with detailed itineraries
- **👥 Follow System**: Follow other travelers to see their content
- **📝 Content Sharing**: Share text posts, images, and experiences
- **🎫 Booking System**: Book slots for events and adventures
- **🔍 Discovery**: Find trending and popular content

## 📋 API Overview

<aside>
    <strong>Base URL</strong>: <code>http://localhost:8080</code>
</aside>

This API provides endpoints for:
- **Authentication**: User registration, login, and logout
- **Events**: Create, read, update, and delete travel events
- **Posts**: Share and manage travel experiences
- **Bookings**: Handle event reservations
- **Follow System**: Manage user relationships
- **Feed**: Get personalized content feed

## 🔐 Authentication

Most endpoints require authentication using Laravel Sanctum. See the [Authentication](#authentication) section for details.

## 📚 Getting Started

1. **Register** a new account or **login** with existing credentials
2. **Get your token** from the authentication response
3. **Include the token** in the `Authorization` header for protected endpoints
4. **Start exploring** the API endpoints!

## 🌟 Example Workflow

```bash
# 1. Register a new user
POST /api/auth/register
{
    "name": "Adventure Seeker",
    "email": "adventurer@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}

# 2. Use the returned token for authenticated requests
Authorization: Bearer 1|abc123def456ghi789...

# 3. Create a travel event
POST /api/events
{
    "title": "Baguio Mountain Trek",
    "description": "Amazing mountain trekking experience",
    "location": "Baguio, Philippines",
    "start_date": "2024-01-15",
    "price": 1500
}

# 4. Share your experience
POST /api/posts
{
    "content": "Just completed an amazing trek!",
    "type": "text"
}
```

<aside>
    <strong>💡 Pro Tip</strong>: Use the interactive testing feature to try endpoints directly from this documentation!
</aside>

