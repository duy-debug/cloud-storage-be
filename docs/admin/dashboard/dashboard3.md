13.3. API: GET /api/admin/stats/files
Description: Thống kê file trong hệ thống (phân loại theo extension, dung lượng, hoặc thời 

### 13.3. Thống kê files
GET {{base}}/api/admin/stats/files
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 09:18:27 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": true,
  "data": {
    "file_extension_stats": [
      {
        "extension": "pdf",
        "count": 26
      },
      {
        "extension": "txt",
        "count": 5
      },
      {
        "extension": "png",
        "count": 4
      },
      {
        "extension": "mp4",
        "count": 2
      },
      {
        "extension": "jpg",
        "count": 2
      },
      {
        "extension": "docx",
        "count": 2
      }
    ],
    "deleted_files": 0,
    "total_storage_used": 170496687
  },
  "error": null,
  "meta": null
}

### Thống kê files (unauthenticated)
GET {{base}}/api/admin/stats/files
Accept: {{json}}

HTTP/1.1 401 Unauthorized
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 09:18:37 GMT
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