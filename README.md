# Backend API for Online Library
> This project is an online library backend implemented using PHP Lumen. It includes features such as user authentication, book management, favorites, and admin functionalities.

## Getting Started

Run Docker Compose:

```
docker-compose up -d
```

## API Endpoints
### Authentication
```
curl -X POST -H "Content-Type: application/json" \
    -d '{"name": "John Doe", "email": "john.doe@example.com","password":"password"}' \ 
    http://localhost:8000/register
```

### Login:

```bash
curl -X POST -H "Content-Type: application/json" \
    -d '{"email": "john.doe@example.com", "password": "password"}' \
    http://localhost:8000/login
```

### Logout:
```
curl -X POST -H "Authorization: Bearer YOUR_ACCESS_TOKEN" http://localhost:8000/logout
```

## Book Management

### Get All Books:

```
curl http://localhost:8000/books

```

### Get a Specific Book:
```
curl http://localhost:8000/books/1

```

### Add a New Book (Requires Admin Role):
```
curl -X POST -H "Authorization: Bearer YOUR_ACCESS_TOKEN" \
    -H "Content-Type: application/json" \
    -d '{"title": "New Book", "author": "Author Name", "genre": "Fiction"}' \
    http://localhost:8000/books
```

### Delete a Book (Requires Admin Role):

```
curl -X DELETE -H "Authorization: Bearer YOUR_ACCESS_TOKEN" http://localhost:8000/books/1
```

## Favorites
### Add Book to Favorites:

```
curl -X POST -H "Authorization: Bearer YOUR_ACCESS_TOKEN" http://localhost:8000/favorites/1
```

### Remove Book from Favorites:
```
curl -X DELETE -H "Authorization: Bearer YOUR_ACCESS_TOKEN" http://localhost:8000/favorites/1
```

### Get User's Favorite Books:
```
curl -H "Authorization: Bearer YOUR_ACCESS_TOKEN" http://localhost:8000/favorites
```

## Admin
### Assign Role to a User (Requires Admin Role):
```
curl -X POST -H "Authorization: Bearer YOUR_ACCESS_TOKEN" -H "Content-Type: application/json" -d '{"role":"admin"}' http://localhost:8000/admin/assign-role/1
```