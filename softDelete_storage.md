# 1. Soft delete

Xóa mềm (soft delete) là một kỹ thuật xóa mà trường dữ liệu không thực sự bị xóa khỏi database do nhiều lý do:
* Ảnh hưởng đến các dữ liệu quan hệ khác
* Mong muốn có thể restore dữ liệu sau này

### Cách cấu hình
#### Bước 1: Thêm cột deleted_at (timestamp - null)
```php
 public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->softDeletes(); // Thêm cột deleted_at
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropSoftDeletes(); // Xóa cột deleted_at
    });
}
``` 

#### Bước 2: Sử dụng trait SoftDeletes trong Models User
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, SoftDeletes;

    // Các thuộc tính khác của model
}
```

#### Bước 3: Sử dụng các phương thức soft delete

```php
// Soft delete (Xóa mềm)
$user = User::find(1);
$user->delete();
```

```php
// Restore (Khôi phục)
$user = User::withTrashed()->find(1);
$user->restore();
```

```php
// Force Delete (Xóa vĩnh viễn)
$user = User::withTrashed()->find(1);
$user->forceDelete();  // Lưu ý một bản ghi chưa được soft delete thì không thể force delete
```

```php
// Lấy tất cả bản ghi (cả bản ghi thường và bản ghi soft delete)
$users = User::withTrashed()->get();

// Chỉ truy xuất các bản ghi soft delete
$users = User::onlyTrashed()->get();
```



# 2. Lưu dữ liệu vào Storage
Khi lưu các file (image, doc, xlsx,...) trong laravel ta có 2 vị trí lưu là thư mục public và storage

`public`
* Truy cập trực tiếp qua website: Vì public là thư mục gốc của project, nên các file lưu trữ trong public có thể truy cập dễ dàng qua URL
* Không bảo mật: Do là thư mục public, nên các thông tin nhạy cảm không được bảo mật
* Phù hợp với các file tĩnh và có khả năng truy cập nhanh: Phù hợp với các file tĩnh, không nhạy cảm, và có thể tải xuống từ trình duyệt

`storage`
* Không thể truy cập trực tiếp thông qua URL, dẫn đến bảo mật hơn. Chỉ có thể truy cập thông qua ứng dụng
* Sử dụng cho những dữ liệu nhạy cảm: Các file xử lý nội bộ, dữ liệu nhạy cảm, dữ liệu cá nhân của người dùng không có nhu cầu công khai
* Tổ chức tốt hơn với các disk (local, public,...), tổ chức một cách linh hoạt và dễ xử lý hơn
* Có thể thêm các đoạn mã bảo mật nếu muốn truy cập công khai


#### Cấu hình
**Mặc định laravel sẽ lưu trữ file trong thư mục app của storage**
Nếu bạn muốn thay đổi mặc định hay sửa nó trong `config/filesystems.php`

##### Bước 1:
Tạo symbolic link
```cmd
php artisan storage:link
```

Thao tác này sẽ tạo symbolic link từ storage/app/public đến public/storage

##### Bước 2: Xử lý lưu ảnh vào Storage
```php
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller{
    public function upload(Request $req){
        // Lưu ảnh
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time() . '-' . $image->getClientOriginalName();

            $path = $image->storeAs('images', $imageName, 'public'); // true nếu thành công
        }
    }
}
```

##### Bước 3: Truy cập file công khai
Lưu ý phải tạo symbolic link từ storage/app/public đến public/storage
```php
$url = Storage::url($path);
```