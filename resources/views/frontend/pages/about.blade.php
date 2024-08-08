@extends('frontend.layouts.master')
@section('content')

<main id="main">
  <section>
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-12 text-center mb-5">
          <h1 class="page-title">Về Chúng Tôi</h1>
        </div>
      </div>

      <div class="row mb-5">

        <div class="d-md-flex post-entry-2 half">
          <a href="#" class="me-4 thumbnail">
            <img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid">
          </a>
          <div class="ps-md-5 mt-4 mt-md-0">
            <div class="post-meta mt-4">Về Chúng Tôi</div>
            <h2 class="mb-4 display-4">Giới Thiệu Về Blog XuanHong</h2>

            <p>Chào mừng bạn đến với Blog XuanHong, nơi chúng tôi cung cấp những tin tức và thông tin cập nhật nhất về các sự kiện, xu hướng và câu chuyện thú vị từ khắp nơi trên thế giới. Chúng tôi cam kết mang đến cho bạn những bài viết chất lượng, chính xác và kịp thời để bạn không bỏ lỡ bất kỳ thông tin quan trọng nào.</p>
            <p>Chúng tôi không ngừng nỗ lực để cải thiện và mở rộng nội dung của mình, nhằm đáp ứng nhu cầu của độc giả. Với đội ngũ biên tập viên và cộng tác viên giàu kinh nghiệm, chúng tôi hy vọng sẽ mang đến cho bạn những trải nghiệm đọc thú vị và bổ ích.</p>
          </div>
        </div>

        <div class="d-md-flex post-entry-2 half mt-5">
          <a href="#" class="me-4 thumbnail order-2">
            <img src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid">
          </a>
          <div class="pe-md-5 mt-4 mt-md-0">
            <div class="post-meta mt-4">Sứ Mệnh &amp; Tầm Nhìn</div>
            <h2 class="mb-4 display-4">Sứ Mệnh &amp; Tầm Nhìn Của Chúng Tôi</h2>

            <p>Sứ mệnh của chúng tôi là cung cấp thông tin tin cậy và chính xác nhất đến tay độc giả, giúp họ cập nhật kịp thời các sự kiện quan trọng và xu hướng mới. Chúng tôi hướng đến việc xây dựng một cộng đồng đọc giả thông thái và gắn kết thông qua những bài viết chất lượng.</p>
            <p>Tầm nhìn của chúng tôi là trở thành nguồn thông tin hàng đầu trong lĩnh vực tin tức, nơi mà mọi người có thể tìm thấy những bài viết đầy đủ, chi tiết và đáng tin cậy. Chúng tôi mong muốn góp phần vào việc nâng cao nhận thức và kiến thức của độc giả thông qua nội dung của mình.</p>
          </div>
        </div>

      </div>

    </div>
  </section>

  <section class="mb-5 bg-light py-5">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-between align-items-lg-center">
        <div class="col-lg-5 mb-4 mb-lg-0">
          <h2 class="display-4 mb-4">Tin Tức Mới Nhất</h2>
          <p>Khám phá các bài viết mới nhất trên blog của chúng tôi. Chúng tôi cập nhật tin tức hàng ngày để đảm bảo bạn luôn nhận được thông tin mới nhất và quan trọng nhất từ các lĩnh vực khác nhau như chính trị, kinh tế, xã hội và văn hóa.</p>
          <p>Đừng bỏ lỡ các bài viết hấp dẫn và bài phân tích chuyên sâu từ các chuyên gia của chúng tôi. Theo dõi chúng tôi để không bỏ lỡ bất kỳ tin tức quan trọng nào và luôn được cập nhật với những thông tin đáng tin cậy.</p>
          <p><a href="{{ url('all-posts') }}" class="more">Xem Tất Cả Các Bài Viết</a></p>
        </div>
        <div class="col-lg-6">
          <div class="row">
            <div class="col-6">
              <img src="assets/img/post-portrait-3.jpg" alt="" class="img-fluid mb-4">
            </div>
            <div class="col-6 mt-4">
              <img src="assets/img/post-portrait-4.jpg" alt="" class="img-fluid mb-4">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- <section>
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-12 text-center mb-5">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <h2 class="display-4">Đội Ngũ Chúng Tôi</h2>
              <p>Chúng tôi tự hào về đội ngũ biên tập viên và cộng tác viên của mình, những người đã góp phần tạo nên nội dung chất lượng cao và phong phú trên blog. Mỗi thành viên trong đội ngũ đều có sự tận tâm và chuyên môn trong lĩnh vực của mình, mang đến cho bạn những thông tin đáng tin cậy và cập nhật nhất.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 text-center mb-5">
          <img src="assets/img/person-1.jpg" alt="" class="img-fluid rounded-circle w-50 mb-4">
          <h4>Cameron Williamson</h4>
          <span class="d-block mb-3 text-uppercase">Sáng Lập &amp; CEO</span>
          <p>Cameron Williamson là người sáng lập và CEO của chúng tôi, với hơn 10 năm kinh nghiệm trong ngành báo chí và truyền thông. Cameron dẫn dắt đội ngũ của chúng tôi với tầm nhìn chiến lược và sự đam mê với nghề.</p>
        </div>
        <div class="col-lg-4 text-center mb-5">
          <img src="assets/img/person-2.jpg" alt="" class="img-fluid rounded-circle w-50 mb-4">
          <h4>Wade Warren</h4>
          <span class="d-block mb-3 text-uppercase">Sáng Lập &amp; Phó Chủ Tịch</span>
          <p>Wade Warren là đồng sáng lập và Phó Chủ Tịch của chúng tôi. Wade có kinh nghiệm lâu năm trong việc phát triển nội dung và quản lý dự án, và luôn nỗ lực để mang đến những bài viết chất lượng cao cho độc giả.</p>
        </div>
        <div class="col-lg-4 text-center mb-5">
          <img src="assets/img/person-3.jpg" alt="" class="img-fluid rounded-circle w-50 mb-4">
          <h4>Jane Cooper</h4>
          <span class="d-block mb-3 text-uppercase">Nhân Viên Biên Tập</span>
          <p>Jane Cooper là một trong những biên tập viên chính của chúng tôi, với khả năng viết lách và biên tập xuất sắc. Jane đảm bảo rằng mọi nội dung được kiểm tra kỹ lưỡng và phù hợp với tiêu chuẩn chất lượng của chúng tôi.</p>
        </div>
        <div class="col-lg-4 text-center mb-5">
          <img src="assets/img/person-4.jpg" alt="" class="img-fluid rounded-circle w-50 mb-4">
          <h4>Cameron Williamson</h4>
          <span class="d-block mb-3 text-uppercase">Nhân Viên Biên Tập</span>
          <p>Cameron Williamson, với kinh nghiệm phong phú trong ngành báo chí, là một nhân viên biên tập đáng tin cậy. Cameron có sự am hiểu sâu sắc về các chủ đề khác nhau và luôn nỗ lực để mang lại giá trị cho độc giả.</p>
        </div>
        <div class="col-lg-4 text-center mb-5">
          <img src="assets/img/person-5.jpg" alt="" class="img-fluid rounded-circle w-50 mb-4">
          <h4>Cameron Williamson</h4>
          <span class="d-block mb-3 text-uppercase">Nhân Viên Biên Tập</span>
          <p>Cameron Williamson đóng góp vào sự thành công của chúng tôi với khả năng viết và chỉnh sửa bài viết. Cameron có sự cống hiến lớn đối với việc cung cấp nội dung chất lượng cho độc giả.</p>
        </div>
        <div class="col-lg-4 text-center mb-5">
          <img src="assets/img/person-6.jpg" alt="" class="img-fluid rounded-circle w-50 mb-4">
          <h4>Cameron Williamson</h4>
          <span class="d-block mb-3 text-uppercase">Nhân Viên Biên Tập</span>
          <p>Cameron Williamson là một trong những biên tập viên tài năng của chúng tôi. Với sự am hiểu và kinh nghiệm phong phú, Cameron góp phần vào việc duy trì chất lượng nội dung trên blog của chúng tôi.</p>
        </div>
      </div>
    </div>
  </section> --}}

</main><!-- End #main -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

@endsection
