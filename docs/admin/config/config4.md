

### 4.1) Đường đi đẹp — cập nhật config đã tồn tại
PUT {{base}}/api/admin/configs/max_upload_size
Accept: {{json}}
Authorization: Bearer {{token}}
Content-Type: {{json}}

{
  "config_value": "209715200"
}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Mon, 17 Nov 2025 15:48:54 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": true,
  "message": "Configuration updated successfully.",
  "config": {
    "config_id": 2,
    "config_key": "max_upload_size",
    "config_value": "209715200"
  }
}


### 4.2) Lỗi validate — thiếu config_value (500)
PUT {{base}}/api/admin/configs/max_file_size
Accept: {{json}}
Authorization: Bearer {{token}}
Content-Type: {{json}}

{
}

HTTP/1.1 500 Internal Server Error
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Mon, 17 Nov 2025 15:49:17 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": false,
  "data": null,
  "error": {
    "message": "The config value field is required.",
    "code": "INTERNAL_ERROR",
    "errors": null
  },
  "meta": {
    "exception": "Illuminate\\Validation\\ValidationException",
    "file": "\/var\/www\/html\/cloud-storage-be\/vendor\/laravel\/framework\/src\/Illuminate\/Support\/helpers.php",
    "line": 414
  }
}

### 4.3) Không tìm thấy — 404
PUT {{base}}/api/admin/configs/non_existing_key_123
Accept: {{json}}
Authorization: Bearer {{token}}
Content-Type: {{json}}

{
  "config_value": "some_value"
}

HTTP/1.1 404 Not Found
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Mon, 17 Nov 2025 15:49:35 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": false,
  "message": "Configuration key not found."
}


### 4.4) Chưa đăng nhập — 401
PUT {{base}}/api/admin/configs/max_file_size
Accept: {{json}}
Content-Type: {{json}}

{
  "config_value": "209715200"
}

HTTP/1.1 401 Unauthorized
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Mon, 17 Nov 2025 15:49:44 GMT
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