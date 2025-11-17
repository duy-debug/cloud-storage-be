11.1. API: GET /api/admin/configs
Description: Lấy danh sách tất cả cấu hình hệ thống.

### 1.1) Đường đi đẹp — lấy danh sách tất cả configs (phân trang mặc định)
GET {{base}}/api/admin/configs
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Mon, 17 Nov 2025 15:46:45 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "data": [
    {
      "config_id": 1,
      "config_key": "default_storage_limit",
      "config_value": "10737418240"
    },
    {
      "config_id": 2,
      "config_key": "max_upload_size",
      "config_value": "52428800"
    }
  ],
  "pagination": {
    "current_page": 1,
    "total_pages": 1,
    "total_items": 2
  }
}

### 1.2) Đường đi đẹp — tìm kiếm theo config_key hoặc config_value
GET {{base}}/api/admin/configs?search=max_upload_size
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Mon, 17 Nov 2025 15:47:06 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "data": [
    {
      "config_id": 2,
      "config_key": "max_upload_size",
      "config_value": "52428800"
    }
  ],
  "pagination": {
    "current_page": 1,
    "total_pages": 1,
    "total_items": 1
  }
}

### 1.3) Đường đi đẹp — phân trang tuỳ chỉnh
GET {{base}}/api/admin/configs?page=1&per_page=2
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Mon, 17 Nov 2025 15:47:16 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "data": [
    {
      "config_id": 1,
      "config_key": "default_storage_limit",
      "config_value": "10737418240"
    },
    {
      "config_id": 2,
      "config_key": "max_upload_size",
      "config_value": "52428800"
    }
  ],
  "pagination": {
    "current_page": 1,
    "total_pages": 1,
    "total_items": 2
  }
}


### 1.4) Chưa đăng nhập — 401
GET {{base}}/api/admin/configs
Accept: {{json}}

HTTP/1.1 401 Unauthorized
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Mon, 17 Nov 2025 15:47:25 GMT
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