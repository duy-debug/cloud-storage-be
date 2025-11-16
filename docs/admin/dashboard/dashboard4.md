13.4. API: GET /api/admin/stats/storage
Description: Thống kê tổng dung lượng hệ thống (dùng để vẽ biểu đồ cho Admin).

### 13.4. Thống kê dung lượng
GET {{base}}/api/admin/stats/storage
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 09:18:45 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": true,
  "data": {
    "storage_timeline": [
      {
        "date": "2025-10-18",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-19",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-20",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-21",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-22",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-23",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-24",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-25",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-26",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-27",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-28",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-29",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-30",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-31",
        "total_storage_used": 0
      },
      {
        "date": "2025-11-01",
        "total_storage_used": 0
      },
      {
        "date": "2025-11-02",
        "total_storage_used": 0
      },
      {
        "date": "2025-11-03",
        "total_storage_used": 0
      },
      {
        "date": "2025-11-04",
        "total_storage_used": 0
      },
      {
        "date": "2025-11-05",
        "total_storage_used": 0
      },
      {
        "date": "2025-11-06",
        "total_storage_used": 0
      },
      {
        "date": "2025-11-07",
        "total_storage_used": 0
      },
      {
        "date": "2025-11-08",
        "total_storage_used": 0
      },
      {
        "date": "2025-11-09",
        "total_storage_used": 0
      },
      {
        "date": "2025-11-10",
        "total_storage_used": 0
      },
      {
        "date": "2025-11-11",
        "total_storage_used": 0
      },
      {
        "date": "2025-11-12",
        "total_storage_used": 79521940
      },
      {
        "date": "2025-11-13",
        "total_storage_used": 79521940
      },
      {
        "date": "2025-11-14",
        "total_storage_used": 79521940
      },
      {
        "date": "2025-11-15",
        "total_storage_used": 122228791
      },
      {
        "date": "2025-11-16",
        "total_storage_used": 122228791
      }
    ],
    "average_growth_per_day": 16100780
  },
  "error": null,
  "meta": null
}

### Thống kê dung lượng (with date range)
GET {{base}}/api/admin/stats/storage?start_date=2025-10-25&end_date=2025-10-31
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 09:19:36 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": true,
  "data": {
    "storage_timeline": [
      {
        "date": "2025-10-25",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-26",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-27",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-28",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-29",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-30",
        "total_storage_used": 0
      },
      {
        "date": "2025-10-31",
        "total_storage_used": 0
      }
    ],
    "average_growth_per_day": 0
  },
  "error": null,
  "meta": null
}


### Thống kê dung lượng (single day)
GET {{base}}/api/admin/stats/storage?start_date=2025-10-15
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 09:19:49 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": true,
  "data": {
    "storage_timeline": [
      {
        "date": "2025-10-15",
        "total_storage_used": 0
      }
    ],
    "average_growth_per_day": 0
  },
  "error": null,
  "meta": null
}

### Thống kê dung lượng (invalid date -> 500)
GET {{base}}/api/admin/stats/storage?start_date=2025-13-01
Accept: {{json}}
Authorization: Bearer {{token}}

HTTP/1.1 500 Internal Server Error
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 09:19:59 GMT
Content-Type: application/json
Access-Control-Allow-Origin: http://localhost:3000
Access-Control-Allow-Credentials: true
Access-Control-Expose-Headers: Content-Length, Authorization

{
  "success": false,
  "data": null,
  "error": {
    "message": "The start date field must be a valid date. (and 1 more error)",
    "code": "INTERNAL_ERROR",
    "errors": null
  },
  "meta": {
    "exception": "Illuminate\\Validation\\ValidationException",
    "file": "\/var\/www\/html\/cloud-storage-be\/vendor\/laravel\/framework\/src\/Illuminate\/Support\/helpers.php",
    "line": 414
  }
}



### Thống kê dung lượng (unauthenticated)
GET {{base}}/api/admin/stats/storage
Accept: {{json}}

HTTP/1.1 401 Unauthorized
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.2.29
Cache-Control: no-cache, private
Date: Sun, 16 Nov 2025 09:19:07 GMT
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