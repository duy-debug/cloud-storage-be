8.3. API: GET /api/public-links/{token}
Description: Lấy thông tin chi tiết của public link (không yêu cầu đăng nhập)

### 8.3. Get public link info - Success (use a real token)
GET {{baseUrl}}/api/public-links/{{linkToken}}
Accept: {{json}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:14:03 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": true,
  "data": {
    "public_link_id": 2,
    "shareable_type": "folder",
    "shareable_name": "Folder s\u1ebd \u0111\u01b0\u1ee3c move t\u1edbi",
    "permission": "download",
    "token": "dVc8QtqmNKWEgFhlJIWhoEY6k81y3DrLx87mQb59",
    "expired_at": "2030-11-01T00:00:00+00:00",
    "revoked_at": null,
    "created_at": "2025-11-16T09:38:19+00:00",
    "owner": {
      "user_id": 5,
      "name": "Prof. Abigayle Ward DVM"
    }
  },
  "error": null,
  "meta": null
}

### 8.3.a Get public link info - Invalid token (404)
GET {{baseUrl}}/api/public-links/INVALID_TOKEN_123
Accept: {{json}}

HTTP/1.1 404 Not Found
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:14:38 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": false,
  "data": null,
  "error": {
    "message": "Public link not found",
    "code": "PUBLIC_LINK_NOT_FOUND",
    "errors": null
  },
  "meta": null
}

### 8.3.b Get public link info - Revoked/Expired (403)
### To test: use a revoked or expired token
GET {{baseUrl}}/api/public-links/7qDWsYOE3VQElXoRdS4rbwwQUzzmacGo00UNk8yW
Accept: {{json}}

HTTP/1.1 403 Forbidden
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:15:18 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": false,
  "data": null,
  "error": {
    "message": "Public link revoked",
    "code": "FORBIDDEN",
    "errors": null
  },
  "meta": null
}