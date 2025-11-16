8.2. API: GET /api/public-links
Description: Danh sách tất cả public link mà user hiện tại đã tạo

### 8.2. List my public links - Success
GET {{baseUrl}}/api/public-links?page=1&per_page=20
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:12:28 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": true,
  "data": {
    "data": [
      {
        "public_link_id": 3,
        "shareable_type": "file",
        "shareable_name": "BaoCaoBaiTapNhom_Nhom2_CNPM_64CNTT2.docx",
        "permission": "view",
        "token": "ALgUocq5WmftCAAjyves6Rs81rMxMyr20jVbudWn",
        "url": "http://localhost:8000/api/public-links/ALgUocq5WmftCAAjyves6Rs81rMxMyr20jVbudWn",
        "expired_at": null,
        "revoked_at": null,
        "created_at": "2025-11-16T09:41:35+00:00"
      },
      {
        "public_link_id": 2,
        "shareable_type": "folder",
        "shareable_name": "Folder s\u1ebd \u0111\u01b0\u1ee3c move t\u1edbi",
        "permission": "download",
        "token": "dVc8QtqmNKWEgFhlJIWhoEY6k81y3DrLx87mQb59",
        "url": "http://localhost:8000/api/public-links/dVc8QtqmNKWEgFhlJIWhoEY6k81y3DrLx87mQb59",
        "expired_at": "2030-11-01T00:00:00+00:00",
        "revoked_at": null,
        "created_at": "2025-11-16T09:38:19+00:00"
      }
    ],
    "pagination": {
      "current_page": 1,
      "total_pages": 1,
      "total_items": 5
    }
  },
  "error": null,
  "meta": null
}

### 8.2.a List my public links - Unauthenticated (failure)
GET {{baseUrl}}/api/public-links?page=1&per_page=20
Accept: {{json}}

HTTP/1.1 401 Unauthorized
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:13:46 GMT
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