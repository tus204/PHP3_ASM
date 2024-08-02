<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ])



        //Thêm dữ liệu người dùng
        DB::table('users')->insert([
            'username' => 'NTH',
            'name' => 'Huy',
            'password' => Hash::make('123456'),  // Mã hóa mật khẩu
            'email' => 'Huy@gmail.com',
            'address' => 'Viet Nam',
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'username' => 'DDAT',
            'name' => 'Tus',
            'password' => Hash::make('123456'),  // Mã hóa mật khẩu
            'email' => 'Tus@mail.com',
            'address' => 'Viet Nam',
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'username' => 'userA',
            'name' => 'Nguyen Van A',
            'password' => Hash::make('123456'),  // Mã hóa mật khẩu
            'email' => 'a@gmail.com',
            'address' => 'Viet Nam',
            'role' => 'user',
        ]);
        DB::table('users')->insert([
            'username' => 'userB',
            'name' => 'Nguyen Van B',
            'password' => Hash::make('123456'),  // Mã hóa mật khẩu
            'email' => 'b@gmail.com',
            'address' => 'Viet Nam',
            'role' => 'user',
            'ban' => '1',
        ]);
        DB::table('users')->insert([
            'username' => 'ban1',
            'name' => 'người bị Ban',
            'password' => Hash::make('123456'),  // Mã hóa mật khẩu
            'email' => 'ban1@gmail.com',
            'address' => 'Viet Nam',
            'role' => 'user',
            'ban' => '1',
        ]);
        // Thêm Dữ liệu cho danh mục:
        // Sách giáo Khoa
        DB::table('books')->insert([
            'name' => 'Sách Giáo Khoa Bộ Lớp 2 - Chân Trời Sáng Tạo - Sách Bài Học (Bộ 10 Cuốn) (Chuẩn)',
            'price' => 150000,
            'photo' => 'bo2.jpg',
            'description' => '
            <div class="product-details">
    <p><strong>Mã hàng:</strong> 3300000026947</p>
    <p><strong>Cấp Độ/ Lớp:</strong> Lớp 2</p>
    <p><strong>Cấp Học:</strong> Cấp 1</p>
    <p><strong>Tên Nhà Cung Cấp:</strong> Nhà xuất bản Giáo Dục</p>
    <p><strong>Tác giả:</strong> Bộ Giáo Dục Và Đào Tạo</p>
    <p><strong>NXB:</strong> Giáo Dục Việt Nam</p>
    <p><strong>Năm XB:</strong> 2023</p>
    <p><strong>Ngôn Ngữ:</strong> Tiếng Việt</p>
    <p><strong>Trọng lượng (gr):</strong> 1990</p>
    <p><strong>Kích Thước Bao Bì:</strong> 24 x 17 x 3.8 cm</p>
    <p><strong>Hình thức:</strong> Bìa Mềm</p>
    <p><strong>Sản phẩm bán chạy nhất:</strong> Top 100 sản phẩm Giáo Khoa Lớp 2 bán chạy của tháng</p>
    <p><strong>Giá sản phẩm trên Fahasa.com:</strong> Đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như Phụ phí đóng gói, phí vận chuyển, phụ phí hàng cồng kềnh,...</p>
    <p><strong>Chính sách khuyến mãi trên Fahasa.com:</strong> Không áp dụng cho Hệ thống Nhà sách Fahasa trên toàn quốc có thể thêm các thẻ div ... để format lại văn bản này đẹp hơn.</p>
</div>',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'name' => 'Sách Giáo Khoa Bộ Lớp 4 - Chân Trời - Sách Bài Học (Bộ 13 Cuốn) (Mỹ Thuật Bản 1) (Chuẩn)',
            'price' => 173000,
            'photo' => 'bo4.jpg',
            'description' => '<div class="product-details">
    <p><strong>Mã hàng:</strong> 3300000028798</p>
    <p><strong>Tên Nhà Cung Cấp:</strong> Nhà xuất bản Giáo Dục</p>
    <p><strong>Tác giả:</strong> Nhiều Tác Giả</p>
    <p><strong>NXB:</strong> Giáo Dục Việt Nam</p>
    <p><strong>Năm XB:</strong> 2023</p>
    <p><strong>Ngôn Ngữ:</strong> Tiếng Việt</p>
    <p><strong>Trọng lượng (gr):</strong> 2330</p>
    <p><strong>Kích Thước Bao Bì:</strong> 26.5 x 19 x 4.3 cm</p>
    <p><strong>Hình thức:</strong> Bìa Mềm</p>
    <p><strong>Sản phẩm bán chạy nhất:</strong> Top 100 sản phẩm Giáo Khoa Lớp 4 bán chạy của tháng</p>
    <p><strong>Giá sản phẩm trên Fahasa.com:</strong> Đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như Phụ phí đóng gói, phí vận chuyển, phụ phí hàng cồng kềnh,...</p>
    <p><strong>Chính sách khuyến mãi trên Fahasa.com:</strong> Không áp dụng cho Hệ thống Nhà sách Fahasa trên toàn quốc</p>
</div>

            ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'name' => 'Sách Giáo Khoa Bộ Lớp 7 - Chân Trời Sáng Tạo - Sách Bài Tập (Bộ 12 Cuốn) (Chuẩn)',
            'price' => 170000,
            'photo' => 'bo7.jpg',
            'description' => '<div class="product-details">
    <p><strong>Mã hàng:</strong> 3300000027357</p>
    <p><strong>Cấp Độ/ Lớp:</strong> Lớp 7</p>
    <p><strong>Cấp Học:</strong> Cấp 2</p>
    <p><strong>Nhà Cung Cấp:</strong> Nhà xuất bản Giáo Dục</p>
    <p><strong>Tác giả:</strong> Bộ Giáo Dục Và Đào Tạo</p>
    <p><strong>NXB:</strong> Giáo Dục Việt Nam</p>
    <p><strong>Năm XB:</strong> 2023</p>
    <p><strong>Ngôn Ngữ:</strong> Tiếng Việt</p>
    <p><strong>Trọng lượng (gr):</strong> 1200</p>
    <p><strong>Kích Thước Bao Bì:</strong> 24 x 17 x 3 cm</p>
    <p><strong>Hình thức:</strong> Bìa Mềm</p>
    <p><strong>Sản phẩm bán chạy nhất:</strong> Top 100 sản phẩm Giáo Khoa Lớp 7 bán chạy của tháng</p>
    <p><strong>Giá sản phẩm trên Fahasa.com:</strong> Đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như Phụ phí đóng gói, phí vận chuyển, phụ phí hàng cồng kềnh,...</p>
    <p><strong>Chính sách khuyến mãi trên Fahasa.com:</strong> Không áp dụng cho Hệ thống Nhà sách Fahasa trên toàn quốc</p>
</div>

            ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'name' => 'Sách Giáo Khoa Bộ Lớp 8 - Phối Bộ - Sách Bài Học (Bộ 12 Cuốn) (Chuẩn)',
            'price' => 184000,
            'photo' => 'bo8.jpg',
            'description' => '<div class="product-details">
    <p><strong>Mã hàng:</strong> 3300000028941</p>
    <p><strong>Cấp Độ/ Lớp:</strong> Lớp 8</p>
    <p><strong>Cấp Học:</strong> Cấp 2</p>
    <p><strong>Nhà Cung Cấp:</strong> Nhà xuất bản Giáo Dục</p>
    <p><strong>Tác giả:</strong> Bộ Giáo Dục Và Đào Tạo</p>
    <p><strong>NXB:</strong> Giáo Dục Việt Nam</p>
    <p><strong>Năm XB:</strong> 2023</p>
    <p><strong>Ngôn Ngữ:</strong> Tiếng Việt</p>
    <p><strong>Trọng lượng (gr):</strong> 2000</p>
    <p><strong>Kích Thước Bao Bì:</strong> 24 x 17 x 4 cm</p>
    <p><strong>Hình thức:</strong> Bìa Mềm</p>
    <p><strong>Sản phẩm bán chạy nhất:</strong> Top 100 sản phẩm Giáo Khoa Lớp 8 bán chạy của tháng</p>
    <p><strong>Giá sản phẩm trên Fahasa.com:</strong> Đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như Phụ phí đóng gói, phí vận chuyển, phụ phí hàng cồng kềnh,...</p>
    <p><strong>Chính sách khuyến mãi trên Fahasa.com:</strong> Không áp dụng cho Hệ thống Nhà sách Fahasa trên toàn quốc</p>
</div>

            ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);


        // Tiểu Thuyết
        DB::table('books')->insert([
            'name' => 'Đảo Giấu Vàng (Tái Bản 2022)',
            'price' => 72000,
            'photo' => '8936067604917.jpg',
            'description' => '<div class="book-details">
    <h2>Đảo Giấu Vàng (Tái Bản 2022)</h2>
    <p>Robert Louis Stevenson (1850-1894) là nhà văn người Scotland. Ông học ngành khoa học, đỗ kỹ sư, được huy chương bạc về một sáng kiến kỹ thuật. Nhưng đó chỉ là vốn kiến thức chung để giúp ông đi vào ngành mà trái tim ông đã chọn: viết văn. Stevenson được nhiều người mến phục vì tinh thần phấn đấu chống lại bệnh tật với sự vui vẻ và lòng can đảm. Ông cho ra đời nhiều tác phẩm NXB Văn Học nổi tiếng, trong đó có tiểu thuyết Đảo giấu vàng.</p>
    <p>Một hòn đảo chơi vơi giữa biển, đêm ngày ầm ầm sóng vỗ, bỗng có một sức lôi cuốn kỳ diệu chỉ vì nó giấu trong lòng một kho vàng do băng cướp của viên thuyền trưởng Flint cất giấu. Ai sẽ đoạt được kho vàng, bọn cướp còn lại trong các băng của Flint hay là những người khác? Việc trước hết, có ý nghĩa quyết định là tìm ra được nơi Flint chôn giấu kho vàng, và tấm bản đồ chỉ nơi cất giấu lại tình cờ rơi vào tay chú thiếu niên nghèo, dũng cảm, thông minh hào hiệp, tên là Jim Haokinx. Câu chuyện phiêu lưu đến Đảo giấu vàng cũng bắt đầu từ đây...</p>
</div>

            ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Khoa học
        DB::table('books')->insert([
            'name' => 'Tuyển Chọn Những Bài Văn Nghị Luận Xã Hội Đạt Điểm Cao Của Học Sinh Giỏi',
            'price' => 216000,
            'photo' => 'nghiluanvanhoc.jpg',
            'description' => '<div class="book">
    <div class="book-description">
        <p>Những bài văn tuyển chọn ở đây có "tầm phủ sóng" khá rộng, đề cập đến rất nhiều phương diện của tồn tại, đề cập đến những câu hỏi gay cấn hoặc nhữ nhối mà mỗi người chúng ta hiện nay phải đối diện. Phần bài làm không dừng ở mục tiêu rèn luyện kĩ năng làm văn hay nói rộng hơn kĩ năng tạo lập văn bản cho học sinh mà còn gợi mở những suy nghĩ chính chắn về các vấn đề mà mộtc on người có trách nhiệm với cộng đồng, một công dân có trách nhiệm với đất nước phải trăn trở.</p>
        <p>Hi vọng những bài văn tuyển chọn trong được trình bày trong sách này sẽ giúp các em có được sự tự tin, chủ động khi bước vào các kì thi - các cuộc thi tất yếu phải vượt qua để tiếp tục đi xa hơn nữa trên con đường học vấn khẳng định nhân cách của bản thân trong cuộc sống.</p>
    </div>
    <div class="book-section">Phần 1: NHỮNG BÀI VĂN BÀN VỀ MỘT SỰ VIỆC, HIỆN TƯỢNG VÀ TƯ TƯỞNG, ĐẠO LÍ</div>
    <div class="book-section">Phần 2: NHỮNG BÀI VĂN BÀN VỀ MỘT SỰ VIỆC, HIỆN TƯỢNG HOẶC TƯ TƯỞNG, ĐẠO LÍ QUA TRÍCH ĐOẠN, TÁC PHẨM VĂN HỌC</div>
    <div class="book-section">Phần 3: NHỮNG BÀI VĂN BÀN VỀ MỘT SỰ VIỆC, HIỆN TƯỢNG HOẶC TƯ TƯỞNG, ĐẠO LÍ QUA MỘT MẨU CHUYỆN, CÂU CHUYỆN</div>
    <div class="book-appendix">Phụ lục: NHỮNG BÀI VĂN ĐẠT ĐIỂM TUYỆT ĐỐI.</div>
</div>
',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'name' => 'Tổng Ôn Ngữ Pháp Tiếng Anh (Tái Bản 2023)',
            'price' => 200000,
            'photo' => '9786043519112_1_1.jpg',
            'description' => '<div class="book-info">
    <h2>Tips Học Sách Tiếng Anh Cô Trang Anh: Tổng Ôn Ngữ Pháp Hiệu Quả</h2>
    <p>Bước 1: Kích hoạt mã ID phía cuối cuốn sách.</p>
    <p>Bước 2: Xem bài giảng lý thuyết trực tuyến đính kèm trên hệ thống qua mã ID.</p>
    <p>Bước 3: Xem ví dụ và bài tập minh họa trong bài giảng Tiếng Anh cô Trang Anh.</p>
    <p>Bước 4: Thực hành làm bài tập trong sách Tổng ôn ngữ pháp.</p>
    <p>Bước 5: Tra cứu đáp án theo chuyên đề ngữ pháp hoặc từng câu hỏi. Để lại bình luận nếu cần hỗ trợ giải đáp.</p>
</div>

                ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'name' => '25 Đề Đánh Giá Năng Lực Đại Học Quốc Gia Tp. Hồ Chí Minh',
            'price' => 250000,
            'photo' => '9786044001197.jpg',
            'description' => '<div class="test">
  <div class="test-details">
    <h2>50 Đề Minh Họa 2024 - Môn Toán Học</h2>
    <p>Sách luyện đề toán THPT Quốc gia 2024, sách ôn thi 50 đề minh họa THPT Quốc gia môn toán:</p>
    <ul>
      <li>Bản luyện đề trắc nghiệm 2024 mới nhất.</li>
      <li>Thầy Lê Văn Tuấn và thầy Nguyễn Thế Duy Livestream chữa toàn bộ đề minh họa.</li>
      <li>100% đề thi được giải chi tiết và có video chữa cụ thể.</li>
      <li>Gồm 50 đề minh họa luyện tập, bám sát với đề thi THPT quốc gia chính thức của Bộ Giáo dục và đào tạo.</li>
    </ul>
  </div>
  <div class="test-description">
    <h3>Nội dung sách: 50 đề minh hoạ môn toán học luyện thi THPT Quốc gia 2024:</h3>
    <p>Về nội dung: mỗi đề đều gồm 50 câu hỏi được phân bố theo các mức độ từ nhận biết, thông hiểu đến vận dụng, vận dụng cao.</p>
    <p>Với các câu ở mức độ thông hiểu: tác giả cài cắm nhiều câu bẫy, dễ mắc sai lầm, đòi hỏi các em không chỉ nắm chắc lí thuyết mà còn phải hết sức cẩn thận, tỉnh táo, không chủ quan mới có thể chọn đúng.</p>
    <p>Với các câu ở mức độ vận dụng và đặc biệt là vận dụng cao: tác giả đã cố gắng sáng tạo thêm để các em chủ động xử lí bài tập HAY - LẠ - KHÓ từ nhiều hướng khác nhau.</p>
    <p>Phân tích đề và hướng ra đề của bộ giáo dục.</p>
    <p>Định hướng làm bài tập và làm đề hiệu quả.</p>
  </div>
</div>
',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'name' => '50 Đề Minh Họa 2024 - Môn Toán Học',
            'price' => 200000,
            'photo' => '9786044008240.jpg',
            'description' => '<div class="book">
  <div class="book-details">
    <h2>50 Đề Minh Họa 2024 - Môn Toán Học</h2>
    <p>Sách luyện đề toán THPT Quốc gia 2024, sách ôn thi 50 đề minh họa THPT Quốc gia môn toán:</p>
    <ul>
      <li>Bản luyện đề trắc nghiệm 2024 mới nhất.</li>
      <li>Thầy Lê Văn Tuấn và thầy Nguyễn Thế Duy Livestream chữa toàn bộ đề minh họa.</li>
      <li>100% đề thi được giải chi tiết và có video chữa cụ thể.</li>
      <li>Gồm 50 đề minh họa luyện tập, bám sát với đề thi THPT quốc gia chính thức của Bộ Giáo dục và đào tạo.</li>
    </ul>
  </div>
  <div class="book-description">
    <h3>Nội dung sách: 50 đề minh hoạ môn toán học luyện thi THPT Quốc gia 2024:</h3>
    <p>Về nội dung: mỗi đề đều gồm 50 câu hỏi được phân bố theo các mức độ từ nhận biết, thông hiểu đến vận dụng, vận dụng cao.</p>
    <p>Với các câu ở mức độ thông hiểu: tác giả cài cắm nhiều câu bẫy, dễ mắc sai lầm, đòi hỏi các em không chỉ nắm chắc lí thuyết mà còn phải hết sức cẩn thận, tỉnh táo, không chủ quan mới có thể chọn đúng.</p>
    <p>Với các câu ở mức độ vận dụng và đặc biệt là vận dụng cao: tác giả đã cố gắng sáng tạo thêm để các em chủ động xử lí bài tập HAY - LẠ - KHÓ từ nhiều hướng khác nhau.</p>
    <p>Phân tích đề và hướng ra đề của bộ giáo dục.</p>
    <p>Định hướng làm bài tập và làm đề hiệu quả.</p>
  </div>
  <div class="book-details">
    <h3>Đối tượng sử dụng:</h3>
    <ul>
      <li>Học sinh lớp 12 chuẩn bị ôn thi cho kì thi tốt nghiệp THPT 2024, ôn thi đánh giá năng lực.</li>
      <li>Học sinh lớp 11 muốn luyện đề thi THPT quốc gia sớm.</li>
      <li>Là nguồn tư liệu cung cấp bộ đề thi thử chất lượng, đầy đủ cho quý thầy giáo, cô giáo ôn luyện thi tham khảo.</li>
    </ul>
  </div>
</div>
',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'name' => '50 Đề Minh Họa 2024 - Môn Vật Lý',
            'price' => 200000,
            'photo' => '9786044008257.jpg',
            'description' => '<div class="book">
  <div class="book-details">
    <h2>50 Đề Minh Họa 2024 - Môn Vật Lý</h2>
    <p>Sách luyện đề vật lý THPT quốc gia 2024, sách id ôn thi 50 đề minh họa THPT quốc gia môn Vật lý:</p>
    <ul>
      <li>Bản luyện đề trắc nghiệm 2024 mới nhất.</li>
      <li>Thầy Lại Đắc Hợp Livestream chữa toàn bộ đề minh họa.</li>
      <li>100% đề thi được giải chi tiết và có video chữa cụ thể.</li>
      <li>Gồm 50 đề minh họa luyện tập, bám sát với đề thi THPT quốc gia chính thức của Bộ Giáo dục và đào tạo.</li>
    </ul>
  </div>
  <div class="book-description">
    <h3>Nội dung sách Bộ đề minh họa môn Vật lý 2023, sách ôn thi THPT quốc gia, luyện đề thi đại học lý lớp 12:</h3>
    <p>Cuốn sách được chia làm 3 phần phù hợp với từng giai đoạn luyện tập:</p>
    <ul>
      <li>Đề 1-10: Các đề giới hạn đến chương dao động điện từ, sóng ánh sáng.</li>
      <li>Đề 11-45: Các đề toàn bộ thi chuẩn cấu trúc toàn bộ chương trình.</li>
      <li>Đề 46-50: Các đề thi chính thức, tham khảo của Bộ Giáo dục trong 2 năm gần đây.</li>
    </ul>
    <p>Về kiến thức: mỗi đề đều gồm 50 câu hỏi được phân bố theo các mức độ từ nhận biết, thông hiểu, VD, VDC. Với các câu hỏi ở mức độ thông hiểu, tác giả gài gắm nhiều câu bẫy, dễ mắc sai lầm, đòi hỏi các em phải nắm chắc lí thuyết mới có thể chọn đúng. Với các câu hỏi ở mức độ VD, VDC, tác giả đã cố gắng sáng tạo thêm để các em chủ động xử lí bài tập từ nhiều hướng khác nhau. Các câu hỏi trong mỗi đề được sắp xếp có ý đồ nhất định: thứ tự của câu tương ứng ở các đề tương ứng với một đơn vị kiến thức trong ma trận đề thi. Vì vậy, các em có thể luyện đề theo chiều dọc, cũng có thể tổng ôn tập, hệ thống hoá từng đơn vị kiến thức theo chiều ngang.</p>
    <p>Về nội dung:</p>
    <ul>
      <li>Phân tích đề và hướng ra đề của bộ giáo dục.</li>
      <li>Định hướng làm bài tập và làm đề hiệu quả.</li>
      <li>50 đề trắc nghiệm ôn thi THPTQG môn lí do nhóm tác giả biên soạn.</li>
      <li>Cập nhật các đề thi chính thức, đề minh hoạ của bộ các năm trước.</li>
      <li>Livestream chữa đề và giải chi tiết các đề.</li>
    </ul>
  </div>
  <div class="book-details">
    <h3>Đối tượng sử dụng:</h3>
    <ul>
      <li>Học sinh lớp 12 chuẩn bị ôn thi cho kì thi tốt nghiệp thpt 2024, ôn thi đánh giá năng lực.</li>
      <li>Học sinh lớp 11 muốn luyện đề thi thpt quốc gia sớm.</li>
      <li>Là nguồn tư liệu cung cấp bộ đề thi thử chất lượng, đầy đủ cho quý thầy giáo, cô giáo ôn luyện thi tham khảo.</li>
    </ul>
  </div>
</div>
',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'name' => '50 Đề Minh Họa 2024 - Môn Địa Lý',
            'price' => 200000,
            'photo' => '9786044008288.jpg',
            'description' => '<div class="book">
  <div class="book-details">
    <h2>50 Đề Minh Họa 2024 - Môn Địa Lý</h2>
    <p>Sách bộ đề minh hoạ môn Địa Lí luyện thi thpt quốc gia 2024:</p>
    <ul>
      <li>Gồm 50 đề thi minh hoạ.</li>
      <li>Chuẩn cấu trúc đề tham khảo và chính thức của Bộ ban hành năm 2024.</li>
      <li>100% có lời giải chi tiết.</li>
    </ul>
  </div>
  <div class="book-description">
    <h3>Nội dung sách: 35 đề minh hoạ môn địa lí luyện thi thpt quốc gia 2024 moonbook:</h3>
    <p>Khác với những cuốn sách khác, để bảo mật phần câu trả lời cho những người sở hữu sách, toàn bộ sách chỉ bao gồm đề thi. Toàn bộ phần đáp án và lời giải chi tiết sẽ có trên hệ thống Moon, học sinh được cấp 1 mã ID và dễ dàng tra cứu.</p>
    <p>Về hình thức, sau mỗi đề, tác giả thiết kế phiếu tô trắc nghiệm để các em ghi lại đáp án cũng như để rèn cách tô sao cho nhanh và đúng. Ngay dưới phiếu tô là bảng đáp án để các em tự đối chiếu, chấm điểm cho mình. Và đừng quên, giữa phiếu tô và bảng đáp án, cuốn sách dành một khoảng trống nhỏ: hãy ghi lại cảm nhận hay những lưu ý, những điều các em còn băn khoăn, suy ngẫm… – sẽ cực kì cần thiết và hữu ích khi các em muốn tổng ôn lại cuốn sách trước kỳ thi chính thức.</p>
  </div>
  <div class="book-details">
    <h3>Đối tượng sử dụng:</h3>
    <ul>
      <li>Học sinh lớp 12 chuẩn bị ôn thi cho kì thi tốt nghiệp THPT 2024.</li>
      <li>Học sinh lớp 11 muốn luyện đề thi thpt quốc gia sớm.</li>
      <li>Là nguồn tư liệu cung cấp bộ đề thi thử chất lượng, đầy đủ cho quý thầy giáo, cô giáo ôn luyện thi tham khảo.</li>
    </ul>
  </div>
</div>
',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'name' => '50 Đề Minh Họa 2024 - Môn Sinh Học',
            'price' => 200000,
            'photo' => '9786044008264.jpg',
            'description' => '<div class="book">
  <div class="book-details">
    <h2>50 Đề Minh Họa 2024 - Môn Sinh Học</h2>
    <p>Sách 50 đề minh hoạ môn Sinh học luyện thi thpt quốc gia 2024:</p>
    <ul>
      <li>Gồm 45 đề thi minh hoạ do thầy Phan Khắc Nghệ biên soạn và 5 đề thi chính thức của bộ GDĐT các năm trước đây.</li>
      <li>Chuẩn cấu trúc đề tham khảo và chính thức của Bộ ban hành.</li>
      <li>100% có lời giải chi tiết.</li>
      <li>Tặng phiếu tô đáp án đề thi tốt nghiệp thpt quốc gia.</li>
    </ul>
  </div>
  <div class="book-description">
    <h3>Nội dung sách: 50 đề minh hoạ môn Sinh học luyện thi thpt quốc gia 2024:</h3>
    <p>Về nội dung: mỗi đề đều gồm 40 câu hỏi được phân bố theo các mức độ từ nhận biết, thông hiểu đến vận dụng, vận dụng cao.</p>
    <p>Với các câu ở mức độ thông hiểu: tác giả cài cắm nhiều câu bẫy, dễ mắc sai lầm, đòi hỏi các em không chỉ nắm chắc lí thuyết mà còn phải hết sức cẩn thận, tỉnh táo, không chủ quan mới có thể chọn đúng.</p>
    <p>Với các câu ở mức độ vận dụng và đặc biệt là vận dụng cao: tác giả đã cố gắng sáng tạo thêm để các em chủ động xử lí bài tập HAY - LẠ - KHÓ từ nhiều hướng khác nhau.</p>
    <p>Phân tích đề và hướng ra đề của bộ giáo dục.</p>
    <p>Định hướng làm bài tập và làm đề hiệu quả.</p>
    <p>Sách gồm 50 đề trắc nghiệm ôn thi THPTQG môn sinh do nhóm tác giả biên soạn.</p>
  </div>
  <div class="book-details">
    <h3>Đối tượng sử dụng sách: 50 đề minh hoạ môn Sinh học luyện thi thpt quốc gia 2024:</h3>
    <ul>
      <li>Học sinh lớp 12 chuẩn bị ôn thi cho kì thi tốt nghiệp thpt 2024.</li>
      <li>Học sinh lớp 11 muốn luyện đề thi thpt quốc gia sớm.</li>
      <li>Là nguồn tư liệu cung cấp bộ đề thi thử chất lượng, đầy đủ cho quý thầy giáo, cô giáo ôn luyện thi tham khảo.</li>
    </ul>
  </div>
</div>
',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'name' => '50 Đề Minh Họa 2024 - Môn Hoá Học',
            'price' => 200000,
            'photo' => '9786044008271.jpg',
            'description' => '<div class="book">
  <div class="book-details">
    <h2>50 Đề Minh Họa 2024 - Môn Hóa Học</h2>
    <p>Sách 50 đề minh hoạ môn Hoá học luyện thi THPT Quốc gia 2024:</p>
    <ul>
      <li>Gồm 45 đề thi minh hoạ do thầy Phạm Hùng Vương biên soạn và 5 đề thi chính thức của bộ GDĐT các năm trước đây.</li>
      <li>Chuẩn cấu trúc đề tham khảo và chính thức của Bộ ban hành giúp 2k5 ôn luyện kiến thức vững vàng và chinh phục kỳ thi THPT quốc gia sắp tới.</li>
    </ul>
  </div>
  <div class="book-description">
    <h3>Nội dung sách: 50 đề minh hoạ môn Hoá học luyện thi THPT Quốc gia 2024:</h3>
    <p>Về nội dung: mỗi đề đều gồm 40 câu hỏi được phân bố theo các mức độ từ nhận biết, thông hiểu đến vận dụng, vận dụng cao. Với các câu ở mức độ thông hiểu: tác giả cài cắm nhiều câu bẫy, dễ mắc sai lầm, đòi hỏi các em không chỉ nắm chắc lí thuyết mà còn phải hết sức cẩn thận, tỉnh táo, không chủ quan mới có thể chọn đúng. Với các câu ở mức độ vận dụng và đặc biệt là vận dụng cao: tác giả đã cố gắng sáng tạo thêm để các em chủ động xử lí bài tập HAY - LẠ - KHÓ.</p>
    <p>Về hình thức: sau mỗi đề, tác giả thiết kế phiếu tô trắc nghiệm để các em ghi lại đáp án cũng như để rèn cách tô sao cho nhanh và đúng. Ngay dưới phiếu tô là bảng đáp án để các em tự đối chiếu, chấm điểm cho mình. Và đừng quên giữa phiếu tô trắc nghiệm và bảng đáp án, cuốn sách dành một khoảng trống nhỏ: hãy ghi lại các lưu ý trong lúc làm bài - sẽ cực kì cần thiết và hữu ích khi các em muốn tổng ôn lại cuốn sách trước kỳ thi chính thức.</p>
  </div>
  <div class="book-details">
    <h3>Đối tượng sử dụng:</h3>
    <ul>
      <li>Học sinh lớp 12 chuẩn bị ôn thi cho kì thi tốt nghiệp thpt 2024.</li>
      <li>Học sinh lớp 11 muốn luyện đề thi thpt quốc gia sớm.</li>
      <li>Là nguồn tư liệu cung cấp bộ đề thi thử chất lượng, đầy đủ cho quý thầy giáo, cô giáo ôn luyện thi tham khảo.</li>
    </ul>
  </div>
</div>
',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'name' => '60 Đề Minh Họa 2024 - Môn Tiếng Anh',
            'price' => 200000,
            'photo' => '9786044008561.jpg',
            'description' => '<div class="book">
  <div class="book-details">
    <h2>60 Đề Minh Họa 2024 - Môn Tiếng Anh</h2>
    <p>Sách 60 đề minh hoạ môn Tiếng Anh cô Trang Anh, sách ôn luyện thi thpt quốc gia:</p>
    <ul>
      <li>Bản luyện đề trắc nghiệm 2024 mới nhất.</li>
      <li>100% đề thi được giải thích chi tiết, rõ ràng, dễ hiểu bằng tiếng việt.</li>
      <li>Định hướng ôn tập ngữ pháp và từ vựng trọng tâm nhất trước khi thi.</li>
    </ul>
  </div>
  <div class="book-description">
    <h3>Nội dung sách Sách bộ đề minh họa 2024:</h3>
    <p>Số lượng lên tới 60 đề minh họa luyện tập, bám sát với đề thi chính thức của Bộ giáo dục và đào tạo.</p>
    <p>Đề thi có sự phân hoá rõ rệt theo 4 mức: nhận biết, thông hiểu, vận dụng và vận dụng cao.</p>
    <p>Phân tích cấu trúc đề thi THPT quốc gia và định hướng ôn tập, làm đề hiệu quả.</p>
    <p>Tổng hợp các kiến thức trọng tâm chắc chắn có trong đề thi THPT quốc gia.</p>
  </div>
  <div class="book-details">
    <h3>Đối tượng sử dụng:</h3>
    <ul>
      <li>Học sinh lớp 12 chuẩn bị ôn thi cho kì thi tốt nghiệp thpt 2024, ôn thi đánh giá năng lực.</li>
      <li>Học sinh lớp 11 muốn luyện đề thi thpt quốc gia sớm.</li>
      <li>Là nguồn tư liệu cung cấp bộ đề thi thử chất lượng, đầy đủ cho quý thầy giáo, cô giáo ôn luyện thi tham khảo.</li>
    </ul>
  </div>
</div>
',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Truyện Tranh
        DB::table('books')->insert([
            'name' => 'Chú Mèo Rụng Lông Không Có Điểm Dừng',
            'price' => 218000,
            'photo' => '8935074127716.jpg',
            'description' => '<div class="story">
  <h2>Đây không phải là truyện bêu xấu mèo.</h2>
  <p>Nếu đọc xong truyện này rồi mà bạn vẫn chịu được thì hãy nuôi mèo đi!</p>
  <p>Đây là lời cảnh cáo cuối cùng mà quản gia của mèo nói với thế gian!</p>
  <p>Chưa từng có cuốn truyện tranh về mèo nào như thế này! Rất thực tế! Truyện tranh về mèo theo phong cách hiện thực khiến bạn đồng cảm 100%!</p>
  <p>Nhờ bản năng hài hước của chú mèo Cho Seung Dal mà tôi đã cười suốt trong khi đọc.</p>
  <p>- Tác giả Ô Giấy của</p>
  <p>“Chú mèo hoang”, “Mềm mại, ấm áp, và uể oải”.</p>
</div>
',

            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'name' => 'Truyện Tranh Đức Phật Thích Ca - Từ Hành Đạo Đến Niết Bàn',
            'price' => 350000,
            'photo' => '9786046176671.jpg',
            'description' => '<div class="story">
    <h2>Truyện Tranh Đức Phật Thích Ca - Từ Hành Đạo Đến Niết Bàn</h2>
    <p>Đức phật Thích ca một trong vài bậc vĩ nhân của loài người, đã nhập diệt hơn 25 thế kỷ, nhưng vẫn ảnh hương mạnh mẽ đến cuộc sống của khoảng một phần tư dân số toàn cầu.</p>
    <p>Trong khi Hán tự xây dựng chữ Phật bằng bộ phận Nhân (người) thêm chữ Phất (phủi); ngầm ý rằng "Phật phủi bỏ, giải thoát khỏi những đau khổ của con người".</p>
    <p>Phật hoàn toàn thoát khỏi những đau khổ của con người là do giải thoát, hiểu được "các khổ đau, nguyên nhân của khổ đau, kết quả an lạc khi giải thoát, con đường thực hành để giải thoát". Giải được thì thoát!</p>
    <p>Bốn sự thật diệu kỳ đã được giãi bày, bốn chân lý tuyệt đối có công năng kỳ diệu có thể giúp mọi người thoát khỏi khổ đau.</p>
    <p>Truyện tranh Từ hành đạo đến Niết Bàn sẽ giúp bạn tìm hiểu sâu hơn về Bậc thầy vĩ đại Thích ca Mâu ni. Bạn cũng sẽ thành Phật, chúng ta sẽ thành Phật. Bây giờ chúng ta hãy lật từng trang sách để tìm hiểu hành trình của Đức phật Thích ca.</p>
</div>',

            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'name' => 'Truyện Tranh - Kinh Pháp Hoa - Tập 1',
            'price' => 550000,
            'photo' => '9786046178125.jpg',
            'description' => '<div class="story">
  <p>Đây là loạt truyện tranh gồm nhiều tập, lấy cảm hứng từ những nội dung được trình bày trong kinh Diệu Pháp Liên Hoa, một bộ kinh Đại thừa nổi tiếng và hết sức quen thuộc với đông đảo Phật tử Việt Nam.</p>

  <p>Đặc biệt là phẩm kinh Phổ Môn trong kinh này nói về hạnh nguyện cứu khổ cứu nạn của đức Bồ Tát Quán Thế Âm đã được rất nhiều người Phật tử trì tụng mỗi ngày.</p>

  <p>Việc sáng tác truyện tranh dựa vào nội dung kinh điển là một ý tưởng khá mới mẻ, qua đó có thể giới thiệu kinh điển đến với đông đảo các tầng lớp độc giả, nhất là các độc giả trẻ tuổi. Mặc</p>

  <p>Dù không có những tình tiết ly kỳ gay cấn như các loại truyện tranh thế tục khác, nhưng ngược lại với sự trích dẫn các nội dung kinh điển nên nội dung loạt truyện Phật giáo này rất sâu sắc, hàm chứa nhiều bài học thiết thực và quý báu đối với mọi người Phật tử.</p>
</div>
',

            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'name' => 'Nếu Có Người Yêu, Em Thích…',
            'price' => 115000,
            'photo' => 'b_a-tr_c_neu-co-nguoi-yeu_-em-thich-_bebooks__1.jpg',
            'description' => '<div class="story">
  <p>“NẾU CÓ NGƯỜI YÊU, EM THÍCH…”- CUỐN SÁCH “RÚT THĂM” HOẠT ĐỘNG HẸN HÒ THÚ VỊ CHO CÁC CẶP ĐÔI GEN Z</p>

  <p>Ăn uống mãi cũng chán, xem phim hoài cũng nhàm,</p>

  <p>Có người yêu thích thật đấy, nhưng làm gì cho hết ngày bây giờ?</p>

  <p>Nếu bạn đang thấy “nhức nhức cái đầu” vì không biết buổi hẹn tiếp theo nên làm gì cho thú vị, thì “cô nàng mỏ hỗn” Quỳnh Aka sẵn sàng đem đến cho bạn 1001 hoạt động hẹn hò thú vị để bạn lựa chọn đây. Cuốn sách “NẾU CÓ NGƯỜI YÊU, EM THÍCH…” không chỉ “tường thuật trực tiếp” chuyện tình của cặp đôi nhí nhố Quỳnh Aka và Củ Cải Trắng, mà còn là “nhà tiên tri” giúp những buổi date của bạn không bao giờ “thiếu muối”.</p>

  <p>Nhắm mắt lại và mở ngẫu nhiên một trang, bạn sẽ nhận được “tín hiệu vũ trụ” từ Quỳnh Aka và anh người yêu Củ Cải Trắng gửi đến:</p>

  <p>- Từ những hoạt động lãng mạn như mặc áo đôi cùng nhau dạo phố, hun nhau dưới trời pháo hoa</p>

  <p>- Đến những ý tưởng “vô tri vô giác” như: ăn cơm tấm khi đã qua 12 giờ đêm hay rủ nhau chép kinh địa tạng</p>

  <p>- Và cả những hoạt động “lầy lội” như đi xem Shark Tank và bàn tính chuyện “khởi nghiệp” nữa!</p>

  <p>Đừng quên bạn cũng có thể sáng tạo ra những hoạt động “độc quyền” cho mối quan hệ của chính mình! Cuối mỗi chương sách đều có một vài trang trắng, bạn hãy tận dụng để ghi lại những ý tưởng hẹn hò “siêu phàm” muốn thử cùng người thương nhé.</p>

  <p>Sở hữu hơn 3,4 triệu lượt theo dõi trên Facebook và 2,3 triệu trên Tiktok, tháng 3 này, Quỳnh Aka sẽ đem đến một “siêu phẩm” comic siêu dễ thương dành cho “bọn yêu nhau” và cả những F.A muốn biết “ngoài kia thế giới yêu nhau kiểu gì”. Nhân danh tình yêu và công lý, cuốn sách này sẽ khiến bạn muốn có người yêu ngay lập tức thôi!</p>
</div>
',

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        //Văn Học
        DB::table('books')->insert([
            'name' => 'Tiếng Việt Ân Tình',
            'price' => 169000,
            'photo' => '8935236430388.jpg',
            'description' => '<div class="story">
  <p>Khi nhắc tới “ngôn ngữ học”, chúng ta dễ hiểu nhầm đến những khái niệm hằng lâm như “hình thái học”, “từ tự”, “âm vị”, “phân tích diễn ngôn”... Có lẽ vì thế mà ngoại trừ giới chuyên môn hoặc những ai có đam mê mãnh liệt, thường người ta sẽ khá ngần ngại khi đọc các bài luận về ngôn ngữ dù nội dung có hay cách mấy. Điều này vô tình trở thành rào cản đối với việc truyền bá những cái hay cái đẹp của tiếng Việt.</p>

  <p>Nhắc đến sự giàu đẹp của tiếng Việt, đa số chúng ta thường chỉ nghĩ đến sáu thanh: sắc, huyền, ngang, hỏi, ngã, nặng - chất liệu khiến “nói nghe như hát”. Thế nhưng khi tìm hiểu sâu hơn, ta mới thấy tiếng Việt còn đẹp vô cùng bởi cách dùng từ, bởi sự vận dụng linh hoạt những từ mượn; bởi các câu tục ngữ, ca dao; bởi tên địa danh, tên món ăn, đồ uống... Đó là những tinh hoa đã được ông cha đúc kết lại trong suốt mấy ngàn năm lịch sử mà chỉ cần lần đọt lại những trang sách ngày xưa, ta sẽ thấy ngay cả một kho tàng. Tiếc rằng vì nhiều lý do khách quan mà với đa số mọi người, kho tàng vô giá kia vẫn còn ẩn hiện sau lớp sương mờ, chỉ những ai hữu duyên mới có cơ may khám phá. Song song với đó là sự phổ biến của mạng xã hội và nhu cầu học ngoại ngữ, tuy có nhiều tác động tích cực nhưng cũng kèm theo nhiều mặt trái, khiến một bộ phận các bạn trẻ yêu thích và ưa chuộng tiếng nước ngoài hơn khi chưa kịp hiểu rõ cái hay, cái đẹp của ngôn ngữ quê nhà. Đây là một hệ quả tất yếu của quá trình hội nhập , và mọi chỉ trích, lên án đều không phải là giải pháp hữu ích, dài lâu.</p>

  <p>Với mong muốn mang cái hay, cái đẹp của tiếng mẹ đẻ đến với cộng đồng một cách thiết thực và hiệu quả nhất, trang Tiếng Việt giàu đẹp đã được ra đời cùng cách tiếp cận mới mẻ, gần gũi, cho mọi người thấy tiếng Việt cũng hay, cũng hấp dẫn không kém bất kỳ ngôn ngữ nào trên thế giới. Cuốn sách này không khai thác quá sâu về một đề tài cũng cũng không đi vào chi tiết với những lý luận chặt chẽ, khô khan, mà chỉ cố gắng trình bày ngắn gọn, súc tích nhất có thể, đủ cho người đọc cảm thấy hứng thú và nếu cần, họ sẽ tự tìm hiểu thêm. May mắn là lối tiếp cận này đã được đông đảo độc giả đón nhận, đưa trang Tiếng Việt giàu đẹp ngày càng phát triển.</p>

  <p>Tiếng Việt ân tình gồm 5 phần:</p>

  <ul>
    <li>Từ Hán Việt</li>
    <li>Chính tả</li>
    <li>Địa danh</li>
    <li>Thành ngữ, tục ngữ, quán ngữ</li>
    <li>Nội dung khác</li>
  </ul>

  <p>Hy vọng, món quà nhỏ này sẽ giúp quý độc giả thêm yêu
',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'name' => 'Thi Nhân Việt Nam (Tái Bản 2023)',
            'price' => 100000,
            'photo' => '8935236431286.jpg',
            'description' => '<div class="story">
  <p>Thi Nhân Việt Nam (Tái Bản 2023)</p>

  <p>Thi Nhân Việt Nam là công trình biên khảo có giá trị tin cậy về phong trào Thơ mới, cả về ba mặt: nghiên cứu, phê bình và tuyển thơ. Cuốn sách ra đời sau khi hành trình thơ mới đã đi được 10 năm và vẫn còn tiếp tục chặng đường, nhưng vẫn có ý nghĩa của một công trình tổng kết cả phong trào.</p>

  <p>Cuốn sách có giá trị nghệ thuật rất cao với giọng văn tâm tình, âm điệu nhẹ nhàng và câu từ duyên dáng, dí dỏm.</p>
</div>
',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'name' => 'Ê Có Khi Nào?',
            'price' => 165000,
            'photo' => 'image_200743_1.jpg',
            'description' => '"<div class="book-info">
    <h2>"Ê có khi nào" (Sói Ăn Chay)</h2>
    <p>"Ê có khi nào" là tổng hợp những suy nghĩ, chiêm nghiệm của Sói Ăn Chay về cuộc sống, đúc kết qua loạt câu hỏi tưởng chừng đơn giản nhưng không dễ tìm được đáp án, tất cả đều bắt đầu bằng cụm từ "ê có khi nào".</p>
    <p>"Ê có khi nào" không đơn thuần là một quyển sách. Đó là tiếp đầu ngữ khuyến khích sự sáng tạo trong mỗi người đọc, trao cho độc giả một chìa khoá để mở ra những góc nhìn mới, nhìn thấy những điều thú vị của cuộc sống tưởng chừng quá mệt mỏi, bận rộn và hối hả này.</p>
    <h3>Ê CÓ KHI NÀO Ý TƯỞNG NÀY LÀ CỦA CHÚNG MÌNH?</h3>
    <p>Sách dày 204 trang, khổ nhỏ gọn cầm vừa tay, in màu toàn bộ với các thiết kế, minh hoạ chỉn chu và đầy màu sắc.</p>
    <p>Đây là sản phẩm ra đời từ sự hợp tác giữa Lan Anh Ng - một graphic designer tài năng thích chơi với nghệ thuật chữ, Vũ Tuấn Anh - chàng hoạ sĩ minh hoạ tài năng, JoiKid - những "phù thuỷ công nghệ" thổi sức sống vào sách với công nghệ AR và Du Bút - những người thích làm sách vì vui.</p>
    <h3>Ê CÓ KHI NÀO? SÁCH KHÔNG CHỈ ĐỂ ĐỌC?</h3>
    <p>Lần đầu tiên, có một quyển sách được sử dụng công nghệ AR để mang đến một tầng ý nghĩa, nội dung mới cho quyển sách. Đúng với tinh thần "thay đổi góc nhìn" của "Ê có khi nà" - chỉ cần 1 chiếc điện thoại thông minh đời mới (từ 2018 trở lên, có hỗ trợ AR) là bạn có thể khám phá những "bí mật" sinh động, ẩn sau những tranh minh hoạ của "Ê có khi nào"</p>
    <h3>Ê CÓ KHI NÀO SÁCH HAY LÀ SÁCH KHÔNG CỐ DẠY TA MỘT ĐIỀU GÌ?</h3>
    <p>Nếu bạn đang tìm kiếm một câu chuyện nhân văn, một chuyện tình đẫm lệ, một bài học làm giàu hay một lời khuyên sáng tạo, có lẽ cuốn sách này không dành cho bạn "Ê có khi nào" không cố dạy bạn một bài học gì. Quyển sách này chỉ trao cho bạn một ý tưởng, một góc nhìn, một cách suy nghĩ mới về cuộc sống. Chính bạn là sẽ người viết nên câu chuyện của quyển sách này. Và tuyệt vời làm sao, khi câu chuyện của bạn là duy nhất.</p>
</div>


            ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'name' => 'Trai Nước Nam Làm Gì',
            'price' => 54000,
            'photo' => 'image_221477.jpg',
            'description' => '“<div>
    Việc quan trọng của một đời ta không phải là ở chỗ nhà cao cửa rộng, vợ đẹp con khôn.
</div>
<div>
    Nếu chúng ta tìm được một việc mà làm, một tôn chỉ mà theo, một mục đích mà đi tới, thì cái đời chúng ta có ý nghĩa, cái đời đáng sống. Như thế trên đời này, ngửa không thẹn với giời, cúi không thẹn với đất, mở mắt nhìn người không phải cúi đầu. Chúng ta để hết lòng, hết chí, ta làm việc ta, rồi ngày mai, hay một hôm nào đó, chết, ta có thể chết mà vẫn mỉm cười một cách thỏa mãn, chết không còn nuối tiếc gì nữa.
</div>
<div>
    Sống đã có nghĩa thì rồi chết cũng có nghĩa.
</div>”',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'name' => 'Cổ Học Tinh Hoa',
            'price' => 129000,
            'photo' => 'image_226914.jpg',
            'description' => '“<div>
    “Cổ học tinh hoa” của Ôn Như Nguyễn Văn Ngọc và Tử An Trần Lê Nhân là một công trình biên khảo có giá trị vượt thời gian. Bởi lẽ, đó chính là tinh hoa của nền văn minh Hán học mà “từ trong cái biển bao la của bách gia chư tử Trung Hoa xưa, hai cụ đã tìm lấy những hạt ngọc của văn chương, triết học và xâu thành một chuỗi ngọc đem hiến cho đời” (Mai Quốc Liên).
</div>
<div>
    Qua 250 mẩu chuyện nhỏ, vô cùng ngắn gọn và súc tích, “Cổ học tinh hoa” đã đưa chúng ta đến với những tư tưởng lớn của Khổng Tử, Mạnh Tử, Lão Tử, Trang Tử, Mặc Tử, Hàn Phi Tử... Chuyện tuy đã xưa, thời đại dù đã đổi khác, nhưng tin rằng tinh thần nhân văn cao đẹp từ hàng nghìn năm trước của cổ nhân thấm đẫm trong từng tích truyện vẫn đủ sức làm rung động bao trái tim của người đọc hôm nay. Bởi lẽ, trước khi những triết lý mà cuốn sách chứa đựng rộng mở tư duy của chúng ta, những đạo lý được gửi gắm trong đó đã âm thầm bồi đắp cho chúng ta một đời sống tình cảm phong phú, vị tha, nhân ái, bao dung.
</div>

            ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'name' => 'Vũ Khoan Tâm Tình Gửi Lại',
            'price' => 260000,
            'photo' => 'z5315083544734_b9aa3bda44df6d3bbcc35163dd74f682.jpg',
            'description' => '<div>
    <p>Vũ Khoan tâm tình gửi lại là cuốn sách tập hợp khoảng 50 bài báo, bài viết và phát biểu của Phó Thủ tướng Vũ Khoan, chủ yếu trong khoảng từ năm 2015 – 2023.</p>
    <p>Sách gồm 2 phần và 1 Phụ lục.</p>
</div>

<div>
    <p>Phần 1 có tiêu đề “Ngoại giao Việt Nam và Thế giới”: tập hợp một số tác phẩm báo chí, bài viết có nội dung về việc thực hiện đường lối chính sách đối ngoại, tình cảm gắn bó tha thiết của Phó Thủ tướng với nghành ngoại giao và công tác đối ngoại của Đảng và Nhà nước, những nhắn gửi chân tình của một người anh, người thủ trưởng tới lớp cán bộ trẻ, những tương lai của đất nước.</p>
</div>

<div>
    <p>Phần 2 có tiêu đề “Khát vọng Việt Nam: cơ hội và thách thức trong cục diện thế giới mới”: tập hợp một số tác phẩm báo chí, bài viết về những vấn đề nóng và được dư luận quan tâm trong công cuộc xây dựng và phát triển đất nước, những kỳ vọng của ông đối với thế hệ trẻ.</p>
</div>

<div>
    <p>Phần phụ lục “Bí thư Trung ương Đảng, Phó Thủ tướng Vũ Khoan trong lòng gia đình, đồng chí, bạn bè” dành những lời tri ân tưởng nhớ ông Vũ Khoan, người “luôn mang hết trí tuệ, tâm huyết, đóng góp nhiều ý kiến quan trọng vào những vấn đề lớn của đất nước, nhất là lĩnh vực ngoại giao, thương mại, hợp tác quốc tế…, là nhà lãnh đạo ngoại giao xuất sắc, đầy bản lĩnh, nhà nghiên cứu và lý luận sâu sắc, có tầm nhìn xa trông rộng, tư duy biện chứng, phương pháp làm việc khoa học, thấu hiểu quy luật vận động của thời cuộc”. (Trích Điếu văn)</p>
</div>

<div>
    <p>Xin trân trọng giới thiệu Vũ Khoan – tâm tình gửi lại với mong muốn chuyển đến bạn đọc những tác phẩm báo chí tâm huyết để khi lật từng trang sách ta không chỉ có thể cảm nhận hơi thở nóng hổi của thời cuộc mà còn như thấy hiển hiện chân dung của một nhà lãnh đạo có tầm nhìn chiến lược, một nhà ngoại giao tài ba, một cây bút sắc sảo, một người bạn lớn chân thành và gần gũi: ông Vũ Khoan.</p>
</div>

<div>
    <p>Kính mời Quý độc giả đón đọc.</p>
</div>

            ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);



        //Sách nói
        DB::table('books')->insert([
            'name' => 'Sách Âm Thanh - 8 Âm Thanh Ngộ Nghĩnh - Những Âm Thanh Hài Hước',
            'price' => 265000,
            'photo' => '9781837958252.jpg',
            'description' => '<p>Sách Âm Thanh - 8 Âm Thanh Ngộ Nghĩnh - Những Âm Thanh Hài Hước</p>

<p>Bé hãy cùng hòa mình vào thế giới âm thanh hài hước và vui nhộn khi những loài động vật trong trang trại thức giấc và nô đùa nhé! Với tiếng hắt hơi của những chú gà, tiếng xì xụp của các chú lợn và vô số tiếng ồn ngộ nghĩnh hơn thế nữa, cuốn sách hứa hẹn sẽ mang đến cho bé niềm vui và những tiếng cười thoải mái trong giờ kể chuyện.</p>',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // //Thiếu Nhi
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // //Ngôn Ngữ
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // //Giả tưởng
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);


        // DB::table('books')->insert([
        //     'name' => '',
        //     'price' => 00,
        //     'photo' => '',
        //     'description' => '',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);


        // Danh mục
        DB::table('categories')->insert([
            //id = 1
            'name' => 'Sách Giáo Khoa',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            //id = 2
            'name' => 'Tiểu Thuyết',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            //id = 3
            'name' => 'Khoa Học',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            //id = 4
            'name' => 'Truyện Tranh',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            //id = 5
            'name' => 'Văn Học',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            //id = 6
            'name' => 'Sách Nói',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            //id = 7
            'name' => 'Thiếu Nhi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            //id = 8
            'name' => 'Ngôn Ngữ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            //id = 9
            'name' => 'Giả Tưởng',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // thêm danh mục cho từng sản phẩm

        // Sách giáo khoa
        DB::table('book_category')->insert([
            'category_id' => '1',
            'book_id' => '1',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '6',
            'book_id' => '1',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '7',
            'book_id' => '1',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '8',
            'book_id' => '1',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '9',
            'book_id' => '1',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '1',
            'book_id' => '2',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '1',
            'book_id' => '3',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '1',
            'book_id' => '4',
        ]);

        // Tiểu thuyết
        DB::table('book_category')->insert([
            'category_id' => '2',
            'book_id' => '5',
        ]);

        // Khoa Học
        DB::table('book_category')->insert([
            'category_id' => '3',
            'book_id' => '6',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '3',
            'book_id' => '7',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '3',
            'book_id' => '8',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '3',
            'book_id' => '9',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '3',
            'book_id' => '10',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '3',
            'book_id' => '11',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '3',
            'book_id' => '12',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '3',
            'book_id' => '13',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '3',
            'book_id' => '14',
        ]);

        // Truyện Tranh
        DB::table('book_category')->insert([
            'category_id' => '4',
            'book_id' => '15',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '4',
            'book_id' => '16',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '4',
            'book_id' => '17',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '4',
            'book_id' => '18',
        ]);
        // Văn Học
        DB::table('book_category')->insert([
            'category_id' => '5',
            'book_id' => '19',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '5',
            'book_id' => '20',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '5',
            'book_id' => '21',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '5',
            'book_id' => '22',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '5',
            'book_id' => '23',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '5',
            'book_id' => '24',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '5',
            'book_id' => '25',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '5',
            'book_id' => '26',
        ]);
        DB::table('book_category')->insert([
            'category_id' => '3',
            'book_id' => '26',
        ]);



        //Đoạn kế ( mở sau)
        /*
        // Sách Nói
        DB::table('book_category')->insert([
            'category_id' => '6',
            'book_id' => '',
        ]);

        //Thiếu Nhi
        DB::table('book_category')->insert([
            'category_id' => '7',
            'book_id' => '',
        ]);

        //Ngôn ngữ
        DB::table('book_category')->insert([
            'category_id' => '8',
            'book_id' => '',
        ]);

        //Giả Tưởng
        DB::table('book_category')->insert([
            'category_id' => '9',
            'book_id' => '',
        ]);
        */



        /*
        DB::table('books')->insert([
            '',
        ]);
        DB::table('books')->insert([
            '',
        ]);
        DB::table('books')->insert([
            '',
        ]);
        DB::table('books')->insert([
            '',
        ]);
        DB::table('books')->insert([
            '',
        ]);
        DB::table('images')->insert([
            '',
        ]);
        DB::table('images')->insert([
            '',
        ]);
        DB::table('images')->insert([
            '',
        ]);
        */
        // DB::table('cart_items')->insert(
        //     [
        //         'user_id' => '2',
        //         'book_id' => '2',
        //         'quantity' => '9',
        //     ]
        // );
        //Them voucher
        DB::table('vouchers')->insert([
            [
                'name' => 'He Sieu sale',
                'code' => 'SUMMER2024',
                'total' => 10,
                'value' => 50000,
                'expired_at' => '2024-07-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mua lanh qua di',
                'code' => 'WINTER2024',
                'total' => 0,
                'value' => 25000,
                'expired_at' => '2024-12-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mua mua sam',
                'code' => 'SPRING2024',
                'total' => 200,
                'value' => 10000,
                'expired_at' => '2024-03-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mua thu vang',
                'code' => 'AUTUMN2024',
                'total' => 150,
                'value' => 15000,
                'expired_at' => '2024-10-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
