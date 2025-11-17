11.2. API: GET /api/admin/configs/{key}
Description: Lấy thông tin cấu hình chi tiết theo config_key.
Output:
{
  "config_id": 1,
  "config_key": "max_file_size",
  "config_value": "104857600"
}
Errors:
{
  "success": false,
  "message": "Configuration key not found."
}


### 2.1) Đường đi đẹp — config_key tồn tại
GET {{base}}/api/admin/configs/max_upload_size
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Mon, 17 Nov 2025 15:47:54 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "config_id": 2,
  "config_key": "max_upload_size",
  "config_value": "52428800"
}

### 2.2) Không tìm thấy — 404
GET {{base}}/api/admin/configs/non_existing_key_123
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 404 Not Found
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Mon, 17 Nov 2025 15:48:06 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": false,
  "message": "Configuration key not found."
}


### 2.3) Chưa đăng nhập — 401
GET {{base}}/api/admin/configs/max_upload_size
Accept: {{json}}

HTTP/1.1 401 Unauthorized
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Mon, 17 Nov 2025 15:48:16 GMT
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