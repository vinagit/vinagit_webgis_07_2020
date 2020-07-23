Hi lớp, anh mới update thêm code mẫu phần xuly2geojson.php để trả về geojson phục vụ cho chức năng zoom đến đối tượng và highlight đối tượng trên bản đồ nha.

## Notes:

* File `xuly.php` là file bữa trước chúng ta đã viết để trả về kết quả thuộc tính khi tìm kiếm số tờ số thửa.
* File `xuly2geojson_test.php` chính là file bữa trước chúng ta cùng dùng php, sql để truy vấn trả kết quả về dưới dạng geojson để mở trong QGIS.
* File `xuly2geojson.php` là file chỉnh sửa từ xuly2geojson_test.php, kết quả trả về ngoài phần không gian dưới dạng geojson, chúng ta còn lấy thêm một số thuộc tính để hiển thị danh sách kết quả trả về.

Buổi sau nữa, sau khi Tân dạy mọi người phần hiển thị bản đồ thì sẽ có phần tương tác giữa bản đồ và kết quả tìm kiếm. Lúc đó hàm `timkiem()` trong javascript mọi người sửa service lại là trỏ đến file `xuly2geojson.php` nhé.

Gọi service

http://localhost/vinagit_webgis_07_2020/buoi9_php_sql_js/xuly2geojson.php?soto=14&sothua=2

> Không dùng xuly.php nữa vì xuly.php chỉ trả về thuộc tính thôi.

Mọi người xem code mẫu ở đây nhé.

https://github.com/vinagit/vinagit_webgis_07_2020/tree/master/buoi9_php_sql_js