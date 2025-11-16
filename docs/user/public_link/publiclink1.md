8.1. API: POST /api/public-links
Description: Tạo public link cho file hoặc folder (được truy cập bằng URL mà không cần đăng nhập)

### 8.1. Create public link (folder) - Success
POST {{baseUrl}}/api/public-links
Accept: {{json}}
Authorization: Bearer {{token}}
Content-Type: {{json}}

{
  "shareable_type": "folder",
  "shareable_id": "36",
  "permission": "view",
  "expired_at": null
}

HTTP/1.1 201 Created
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:10:34 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": true,
  "data": {
    "message": "Public link created successfully.",
    "public_link": {
      "public_link_id": 6,
      "shareable_type": "folder",
      "shareable_id": 36,
      "permission": "view",
      "token": "UTZFhIft20tzqTmtezrgL6LheVls1IE1eCInUDb4",
      "url": "http://localhost:8000/api/public-links/UTZFhIft20tzqTmtezrgL6LheVls1IE1eCInUDb4",
      "expired_at": null,
      "created_at": "2025-11-16T10:10:34+00:00"
    }
  },
  "error": null,
  "meta": null
}

### 8.1.a Create public link (folder) - Unauthenticated (failure)
POST {{baseUrl}}/api/public-links
Accept: {{json}}
Content-Type: {{json}}

{
  "shareable_type": "folder",
  "shareable_id": "{{folderId}}",
  "permission": "view",
  "expired_at": null
}

HTTP/1.1 401 Unauthorized
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:10:50 GMT
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

### 8.1.b Create public link (folder) - Invalid permission (422)
POST {{baseUrl}}/api/public-links
Accept: {{json}}
Authorization: Bearer {{token}}
Content-Type: {{json}}

{
  "shareable_type": "folder",
  "shareable_id": "{{folderId}}",
  "permission": "invalid_perm",
  "expired_at": null
}

HTTP/1.1 422 Unprocessable Content
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:11:02 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": false,
  "data": null,
  "error": {
    "message": "Validation failed",
    "code": "VALIDATION_ERROR",
    "errors": {
      "permission": [
        "The selected permission is invalid."
      ]
    }
  },
  "meta": null
}

### 8.1.c Create public link (folder) - Folder not found (404)
POST {{baseUrl}}/api/public-links
Accept: {{json}}
Authorization: Bearer {{token}}
Content-Type: {{json}}

{
  "shareable_type": "folder",
  "shareable_id": "9999999",
  "permission": "view",
  "expired_at": null
}

HTTP/1.1 404 Not Found
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:11:17 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": false,
  "data": null,
  "error": {
    "message": "Folder not found",
    "code": "FOLDER_NOT_FOUND",
    "errors": null
  },
  "meta": null
}

### 8.1.d Create public link (folder) - Forbidden (403)
POST {{baseUrl}}/api/public-links
Accept: {{json}}
Authorization: Bearer {{token}}
Content-Type: {{json}}

{
  "shareable_type": "file",
  "shareable_id": "57",
  "permission": "view",
  "expired_at": null
}

HTTP/1.1 403 Forbidden
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:19:18 GMT
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