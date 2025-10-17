# Authentication

This API uses **Laravel Sanctum** for authentication. Most endpoints require authentication via Bearer token.

<aside class="notice">
<strong>🔒 Local Access Only</strong>: This documentation is only accessible from localhost and local network IPs for security reasons.
</aside>

## How to Authenticate

### 1. Register or Login
First, you need to register a new user or login with existing credentials:

**Register:**
```bash
POST /api/auth/register
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}
```

**Login:**
```bash
POST /api/auth/login
{
    "email": "john@example.com",
    "password": "password123"
}
```

### 2. Get Your Token
Both registration and login will return a token:
```json
{
    "message": "User registered successfully",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com"
    },
    "token": "1|abc123def456ghi789..."
}
```

### 3. Use the Token
Include the token in the `Authorization` header for protected endpoints:

```bash
Authorization: Bearer 1|abc123def456ghi789...
```

## Protected Endpoints

The following endpoints require authentication:
- All `/api/events/*` endpoints (except public listing)
- All `/api/posts/*` endpoints
- All `/api/bookings/*` endpoints
- All `/api/follow/*` endpoints
- All `/api/feed/*` endpoints
- `/api/auth/user`
- `/api/auth/logout`

## Public Endpoints

These endpoints don't require authentication:
- `GET /api/health`
- `POST /api/auth/register`
- `POST /api/auth/login`
- `GET /api/events` (public listing)

## Token Expiration

Tokens don't expire by default, but you can logout to invalidate them:
```bash
POST /api/auth/logout
Authorization: Bearer your_token_here
```
