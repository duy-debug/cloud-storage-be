8.5. API: PUT /api/public-links/{id}
Description: Cập nhật quyền hoặc thời hạn hết hạn của public link

### 8.5. Update public link - Success
PUT {{baseUrl}}/api/public-links/2
Accept: {{json}}
Authorization: Bearer {{token}}
Content-Type: {{json}}

{
  "permission": "download",
  "expired_at": "2025-12-31T23:59:59Z"
}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:16:22 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": true,
  "data": {
    "success": true,
    "message": "Public link updated successfully.",
    "public_link": {
      "public_link_id": 2,
      "permission": "download",
      "expired_at": "2025-12-31T23:59:59+00:00"
    }
  },
  "error": null,
  "meta": null
}

### 8.5.a Update public link - Validation error (422)
PUT {{baseUrl}}/api/public-links/{{linkId}}
Accept: {{json}}
Authorization: Bearer {{token}}
Content-Type: {{json}}

{
  "permission": "not_a_valid",
  "expired_at": "not-a-date"
}

HTTP/1.1 422 Unprocessable Content
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:16:35 GMT
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
      ],
      "expired_at": [
        "The expired at field must be a valid date."
      ]
    }
  },
  "meta": null
}

### 8.5.b Update public link - Not found (404)
PUT {{baseUrl}}/api/public-links/9999999
Accept: {{json}}
Authorization: Bearer {{token}}
Content-Type: {{json}}

{
  "permission": "view"
}

HTTP/1.1 404 Not Found
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:16:47 GMT
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