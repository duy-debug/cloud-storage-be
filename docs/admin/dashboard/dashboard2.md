13.2. API: GET /api/admin/stats/users
Description: Thống kê người dùng (theo vai trò, trạng thái sử dụng dung lượng).

### 13.2. Thống kê người dùng
GET {{base}}/api/admin/stats/users
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 09:17:57 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": true,
  "data": {
    "roles": {
      "admin": 3,
      "user": 8
    },
    "storage_usage_distribution": [
      {
        "range": "0\u20131GB",
        "users": 11
      },
      {
        "range": "1\u20135GB",
        "users": 0
      },
      {
        "range": "5GB+",
        "users": 0
      }
    ],
    "new_users_last_7_days": 11
  },
  "error": null,
  "meta": null
}

### Thống kê người dùng (unauthenticated)
GET {{base}}/api/admin/stats/users
Accept: {{json}}

HTTP/1.1 401 Unauthorized
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 09:18:08 GMT
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