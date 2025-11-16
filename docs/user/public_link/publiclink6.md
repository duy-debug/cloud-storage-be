8.6. API: GET /api/public-links/{token}/preview
Description: Xem trước file qua public link (không cần đăng nhập)
áp dụng khi permission là view và download

### 8.6. Preview via token - Success (permission=view)
GET {{baseUrl}}/api/public-links/OBOnHuWnhJmPbrGOwNRUfBx92UHHR06Jxt01xhjG/preview
Accept: {{json}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:21:54 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": true,
  "data": {
    "shareable_type": "file",
    "file": {
      "file_id": 54,
      "display_name": "BaoCaoTTCS_TranThanhTri_64132989_64CNTT3.pdf",
      "mime_type": "application/pdf",
      "size": 15,
      "url": "http://localhost:8000/storage/files/54/v1/fd4474fd-05b1-471c-a6e3-1e222b9f4f86.pdf?expires=1763292114&signature=16eee13206a3ae18267d2c4d26dc20e2483ab50c076dd789e68c6dbff58e89ff"
    }
  },
  "error": null,
  "meta": null
}

### 8.6.b Preview - Invalid token (404)
GET {{baseUrl}}/api/public-links/INVALID_PREVIEW_TOKEN/preview
Accept: {{json}}

HTTP/1.1 404 Not Found
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:23:53 GMT
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