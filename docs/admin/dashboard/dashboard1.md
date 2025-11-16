13.1. API: GET /api/admin/dashboard
Description: Tổng quan toàn hệ thống (dành cho Admin).

### 13.1. Tổng quan hệ thống (Admin)
GET {{base}}/api/admin/dashboard
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 09:17:28 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": true,
  "data": {
    "total_users": 11,
    "total_files": 41,
    "total_storage_used": 170496687,
    "average_storage_per_user": 15499698,
    "active_public_links": 0,
    "recent_users": [
      {
        "user_id": 16,
        "name": "user 1111",
        "email": "user1111@gmail.com",
        "created_at": "2025-11-15T14:04:48+00:00"
      },
      {
        "user_id": 15,
        "name": "tritt",
        "email": "tritt666666@gmail.com",
        "created_at": "2025-11-14T14:11:46+00:00"
      },
      {
        "user_id": 14,
        "name": "admin 2",
        "email": "admin2@gmail.com",
        "created_at": "2025-11-14T04:06:43+00:00"
      },
      {
        "user_id": 12,
        "name": "Updated Name",
        "email": "testuser3@gmail.com",
        "created_at": "2025-11-14T03:19:38+00:00"
      },
      {
        "user_id": 8,
        "name": "tritt",
        "email": "tritt13579@gmail.com",
        "created_at": "2025-11-14T00:50:10+00:00"
      }
    ]
  },
  "error": null,
  "meta": null
}

### Admin dashboard (unauthenticated)
GET {{base}}/api/admin/dashboard
Accept: {{json}}

HTTP/1.1 401 Unauthorized
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 09:17:38 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": false,
  "data": null,
  "error": {
    "message": "Unauthenticated.",
    "code": "UNAUTHENTICATED",
    "errors": null
  },
  "meta": null
}