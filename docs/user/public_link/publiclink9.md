8.9. API: GET /api/files/{id}/public-links
Description: Lấy danh sách tất cả public link đã tạo cho một file cụ thể

### 8.9. List public links for file - Success
GET {{baseUrl}}/api/files/54/public-links
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:28:02 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": true,
  "data": {
    "file_id": 54,
    "file_name": "BaoCaoTTCS_TranThanhTri_64132989_64CNTT3.pdf",
    "public_links": [
      {
        "public_link_id": 7,
        "permission": "view",
        "token": "OBOnHuWnhJmPbrGOwNRUfBx92UHHR06Jxt01xhjG",
        "url": "http://localhost:8000/api/public-links/OBOnHuWnhJmPbrGOwNRUfBx92UHHR06Jxt01xhjG",
        "expired_at": null,
        "revoked_at": "2025-11-16T10:26:27+00:00"
      }
    ]
  },
  "error": null,
  "meta": null
}

### 8.9.a List public links for file - Unauthenticated (401)
GET {{baseUrl}}/api/files/{{fileId}}/public-links
Accept: {{json}}

HTTP/1.1 401 Unauthorized
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:28:25 GMT
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

### 8.9.b List public links for file - File not found (404)
GET {{baseUrl}}/api/files/9999999/public-links
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 404 Not Found
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:28:33 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": false,
  "data": null,
  "error": {
    "message": "File not found",
    "code": "FILE_NOT_FOUND",
    "errors": null
  },
  "meta": null
}

### 8.9.c List public links for file - Forbidden (403)
### To test: call with token of user who does not own the file
GET {{baseUrl}}/api/files/58/public-links
Accept: {{json}}
Authorization: Bearer {{othertoken}}

HTTP/1.1 403 Forbidden
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:29:00 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": false,
  "data": null,
  "error": {
    "message": "File not owned by user",
    "code": "FORBIDDEN",
    "errors": null
  },
  "meta": null
}