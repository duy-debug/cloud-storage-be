### 1) Unauthenticated - should return 401
GET {{base}}/api/trash/folders/{{folderId}}/contents
Accept: {{json}}

HTTP/1.1 401 Unauthorized
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:36:13 GMT
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

### 2) Get folder contents (authenticated) - success
GET {{base}}/api/trash/folders/34/contents
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:38:11 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": true,
  "data": {
    "folders": [
      {
        "folder_id": 35,
        "folder_name": "Folder s\u1ebd \u0111\u01b0\u1ee3c move t\u1edbi_copy",
        "deleted_at": "2025-11-15T13:13:40+00:00"
      }
    ],
    "folders_pagination": {
      "current_page": 1,
      "total_pages": 1,
      "total_items": 1
    },
    "files": [
      {
        "file_id": 52,
        "display_name": "BaoCaoTTCS_TranThanhTri_64132989_64CNTT3_copy_2_copy.pdf",
        "file_size": 852849,
        "mime_type": "application/pdf",
        "file_extension": "pdf",
        "deleted_at": "2025-11-15T13:13:40+00:00"
      },
      {
        "file_id": 53,
        "display_name": "BaoCaoTTCS_TranThanhTri_64132989_64CNTT3_copy_3_copy.pdf",
        "file_size": 852849,
        "mime_type": "application/pdf",
        "file_extension": "pdf",
        "deleted_at": "2025-11-15T13:13:40+00:00"
      }
    ],
    "files_pagination": {
      "current_page": 1,
      "total_pages": 1,
      "total_items": 2
    }
  },
  "error": null,
  "meta": null
}

### 3) Search within trashed folder
GET {{base}}/api/trash/folders/{{folderId}}/contents?search=b
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:38:49 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": true,
  "data": {
    "folders": [],
    "folders_pagination": {
      "current_page": 1,
      "total_pages": 0,
      "total_items": 0
    },
    "files": [
      {
        "file_id": 52,
        "display_name": "BaoCaoTTCS_TranThanhTri_64132989_64CNTT3_copy_2_copy.pdf",
        "file_size": 852849,
        "mime_type": "application/pdf",
        "file_extension": "pdf",
        "deleted_at": "2025-11-15T13:13:40+00:00"
      },
      {
        "file_id": 53,
        "display_name": "BaoCaoTTCS_TranThanhTri_64132989_64CNTT3_copy_3_copy.pdf",
        "file_size": 852849,
        "mime_type": "application/pdf",
        "file_extension": "pdf",
        "deleted_at": "2025-11-15T13:13:40+00:00"
      }
    ],
    "files_pagination": {
      "current_page": 1,
      "total_pages": 1,
      "total_items": 2
    }
  },
  "error": null,
  "meta": null
}

### 4) Pagination - page 2, 1 item per page
GET {{base}}/api/trash/folders/{{folderId}}/contents?page=1&per_page=3
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:40:18 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": true,
  "data": {
    "folders": [
      {
        "folder_id": 35,
        "folder_name": "Folder s\u1ebd \u0111\u01b0\u1ee3c move t\u1edbi_copy",
        "deleted_at": "2025-11-15T13:13:40+00:00"
      }
    ],
    "folders_pagination": {
      "current_page": 1,
      "total_pages": 1,
      "total_items": 1
    },
    "files": [
      {
        "file_id": 52,
        "display_name": "BaoCaoTTCS_TranThanhTri_64132989_64CNTT3_copy_2_copy.pdf",
        "file_size": 852849,
        "mime_type": "application/pdf",
        "file_extension": "pdf",
        "deleted_at": "2025-11-15T13:13:40+00:00"
      },
      {
        "file_id": 53,
        "display_name": "BaoCaoTTCS_TranThanhTri_64132989_64CNTT3_copy_3_copy.pdf",
        "file_size": 852849,
        "mime_type": "application/pdf",
        "file_extension": "pdf",
        "deleted_at": "2025-11-15T13:13:40+00:00"
      }
    ],
    "files_pagination": {
      "current_page": 1,
      "total_pages": 1,
      "total_items": 2
    }
  },
  "error": null,
  "meta": null
}

### 5) Folder not found in trash (should return 404)
GET {{base}}/api/trash/folders/999999/contents
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 404 Not Found
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 10:40:29 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": false,
  "data": null,
  "error": {
    "message": "Folder not found in trash",
    "code": "FOLDER_NOT_FOUND",
    "errors": null
  },
  "meta": null
}
