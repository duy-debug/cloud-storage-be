8.7. API: GET /api/public-links/{token}/download
Description: Tải file qua public link (không cần đăng nhập, chỉ khi permission = download)

### 8.7. Download via token - Get download_url
GET {{baseUrl}}/api/public-links/KYrlWVyFFgyvhtEXiBgFG3ucN3UjHUkIK7ppaYpe/download
Accept: {{json}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:24:28 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": true,
  "data": {
    "success": true,
    "download_url": "http://localhost:8000/api/files/57/download?token=KYrlWVyFFgyvhtEXiBgFG3ucN3UjHUkIK7ppaYpe"
  },
  "error": null,
  "meta": null
}

### 8.7.a Download via token - Permission denied (403)
GET {{baseUrl}}/api/public-links/OBOnHuWnhJmPbrGOwNRUfBx92UHHR06Jxt01xhjG/download
Accept: {{json}}

HTTP/1.1 403 Forbidden
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:25:07 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": false,
  "data": null,
  "error": {
    "message": "Public link does not grant required permission",
    "code": "FORBIDDEN",
    "errors": null
  },
  "meta": null
}

### 8.7.b Download via token - Invalid token (404)
GET {{baseUrl}}/api/public-links/INVALID_DOWNLOAD_TOKEN/download
Accept: {{json}}

HTTP/1.1 404 Not Found
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:25:20 GMT
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