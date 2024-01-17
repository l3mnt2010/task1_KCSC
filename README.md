### Task 1 KCSC
- Technology : php, mysql, xdebug, mysqli

## I. Giới Thiệu : Demo basic vulnerability

# Login:
![Alt text](./image_Readme/image.png)
- Sau khi login sẽ chuyển đến index.php

# Remember user
- Click in remember me : hệ thống sẽ tự ghi nhớ user ghi đăng nhập lần tiếp theo


# Register
![Alt text](./image_Readme/image-1.png)
- Sau khi register sẽ chuyển đến login.php để đăng nhập

# Giao diện chính user

1, View post only by user
![Alt text](./image_Readme/image-2.png)

2, User can comment into post
![Alt text](./image_Readme/image-3.png)
![Alt text](./image_Readme/image-4.png)

3, User can view all of post by admin and click to read post details
![Alt text](./image_Readme/image-5.png)

# Giao diện phụ guest
![Alt text](./image_Readme/image-15.png)

# NavBar
![Alt text](./image_Readme/image-16.png)


# Menu user when click avatar option
If your role is admin, you can see dashboard else you can't
![Alt text](./image_Readme/image-6.png)
1, Dashboard admin only
  1.1, View main dashboard
  ![Alt text](./image_Readme/image-7.png)
  - Click in button  Back to MainPage to redirect index.php
  - Admin can see all of user
  ![Alt text](./image_Readme/image-8.png)

  1.2, Click in User in sidebar admin can see management users table have columns email, role, ...
  ![Alt text](./image_Readme/image-9.png)
  - Click in button Delete admin can delete this user
  - Click in button Edit admin can edit this user
  ![Alt text](./image_Readme/image-10.png)
  - Click in button Add user admin can view dialog add new user and click in add to add new user else close dialog
  ![Alt text](./image_Readme/image-11.png)

  1.3, Click in Post in sidebar admin can see management posts table have columns id, image, ...
  ![Alt text](./image_Readme/image-12.png)
  - Click in button Delete admin can delete this post
  - Click in button Edit admin can edit this post
  ![Alt text](./image_Readme/image-13.png)
  - Click in button Add post admin can view dialog add new post and click in add to add new post else close dialog
  ![Alt text](./image_Readme/image-14.png)
2, Change avatar
   ![Alt text](./image_Readme/image-17.png)
   You can upload file to use this avatar and we resize this avatar to 400x400

## II. Vulnerability in this demo APP

1, Store XSS
![Alt text](./image_Readme/image-18.png)
![Alt text](./image_Readme/image-19.png)
![Alt text](./image_Readme/image-20.png)
- Where edit and add users or port for admin
![Alt text](./image_Readme/image-28.png)

2, Upload file not filter basic
I will update filter for you try hard @@
![Alt text](./image_Readme/image-21.png)
![Alt text](./image_Readme/image-22.png)
![Alt text](./image_Readme/image-23.png) 
Xin được giấu thông tin :<

3, Local file inclusion <basic filter>
![Alt text](./image_Readme/image-24.png)

4, Upload file to rewrite .htaccess
![Alt text](./image_Readme/image-25.png)
Example : I rewrite .htaccess allow run file txt same php
![Alt text](./image_Readme/image-26.png)

5, Deserialize vulnerabilities
Chức năng remember me chứa lỗ hổng này . Khi remember me set remember_data và khi vào lại thì check cookie xem có không deserialize
- Đang phát triển chức năng ghi logs to RCE<Lấy ý tưởng của KCSC recruite ạ>

6. Blind SQL injection
![Alt text](./image_Readme/image-29.png)
Hihi em không biết nên áp dụng blind sqli kiểu chi trong trường hợp product nên làm kiểu này ạ ^^

7, Cmd injection <đang phát triển> tại không biết nhiều ứng dụng khi dùng exec nên em chưa dùng nhiều :<
Trong main_upload_image để convert size image
![Alt text](./image_Readme/image-27.png)
mà tên file mình có thể config được nên có thể Blind Cmd injection mà này em chưa test linux nên chưa thử được ạ :3

8, Disclosure information
- Lộ file .htaccess and /robots.txt ạ:v


