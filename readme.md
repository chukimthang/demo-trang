## Install bower
- Download and install nodejs
- Mở cmd and chạy lệnh: npm install -g bower
- bower init
- Tạo .bowerrc với nội dung: 
{
  "directory": "public/bower_components"
}
- Copy nội dung những plugin cần dùng vào bower.json
"dependencies": {
  "bootstrap-datepicker": "^1.6.4",
  "datatables.net-dt": "^1.10.13",
  "eonasdan-bootstrap-datetimepicker": "^4.17.43",
  "ckeditor": "#full/4.3.3"
}
- Run comman: bower update

## Create file
- Controller: php artisan make:controller Admin/NewsController --resource
- Request: php artisan make:request NewsAddRequest

## Install Carbon
- composer require nesbot/carbon
- Link: https://github.com/briannesbitt/Carbon
