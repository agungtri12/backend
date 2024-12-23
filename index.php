<?php
include 'koneksi.php';
include 'function.php';
?>
<?php include 'header.php'; ?>
<main class="main">
	<section id="hero" class="hero section dark-background">

		<div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

			<div class="carousel-item active">
				<img src="assets_home/assets/img/bg1.png" alt="">
				<div class="carousel-container">
					<h2>Clean Batam, Win Rewards
						Hadiah dari Aksi Kebersihanmu</h2>
					<p>Platform interaktif yang mendorong warga Kota Batam
						untuk berpartisipasi aktif dalam menjaga kebersihan
						lingkungan dengan memberikan hadiah sebagai
						insentif atas kontribusi mereka.</p>
				</div>
			</div><!-- End Carousel Item -->

			<div class="carousel-item">
				<img src="assets_home/assets/img/bg1.png" alt="">
				<div class="carousel-container">
					<h2>Clean Batam, Win Rewards
						Hadiah dari Aksi Kebersihanmu</h2>
					<p>Platform interaktif yang mendorong warga Kota Batam
						untuk berpartisipasi aktif dalam menjaga kebersihan
						lingkungan dengan memberikan hadiah sebagai
						insentif atas kontribusi mereka.</p>
				</div>
			</div><!-- End Carousel Item -->

			<div class="carousel-item">
				<img src="assets_home/assets/img/bg1.png" alt="">
				<div class="carousel-container">
					<h2>Clean Batam, Win Rewards
						Hadiah dari Aksi Kebersihanmu</h2>
					<p>Platform interaktif yang mendorong warga Kota Batam
						untuk berpartisipasi aktif dalam menjaga kebersihan
						lingkungan dengan memberikan hadiah sebagai
						insentif atas kontribusi mereka.</p>
				</div>
			</div>

			<a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
				<span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
			</a>

			<a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
				<span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
			</a>

			<ol class="carousel-indicators"></ol>

		</div>

	</section>

	<div style="padding-top: 100px;"></div>
	<section id="about" class="about section">

		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mb-4 mb-lg-0">
						<img width="100%" src="assets_home/assets/img/ttg.png" alt="Image " class="img-fluid img-overlap" data-aos="zoom-out">
					</div>
					<div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
						<h3 class="content-subtitle text-white opacity-50">Tentang Kami</h3>
						<h2 class="content-title mb-4">
							Pakar Terpercaya dalam Pengelolaan Sampah dan Daur Ulang
						</h2>
						<p class="opacity-50">
							Zerotrash bertujuan menciptakan kesadaran dan partisipasi aktif masyarakat Batam dalam pengelolaan sampah yang efisien dan berkelanjutan. Melalui sistem penghargaan berbasis poin, edukasi lingkungan, dan platform yang memudahkan pengelolaan sampah. Zerotrash mendorong perubahan positif menuju kota yang lebih bersih, sehat, dan ramah lingkungan. Bersama, setiap kontribusi kecil menjadi langkah besar untuk membangun masa depan Batam yang lebih hijau dan berkelanjutan.
						</p>

						<div class="row my-5">
							<div class="col-lg-12 d-flex align-items-start mb-4">
								<div>
									<h4 class="m-0 h5 text-white">Pengumpulan Sampah</h4>
								</div>
							</div>
							<div class="col-lg-12 d-flex align-items-start mb-4">
								<div>
									<h4 class="m-0 h5 text-white">Pemilahan Sampah</h4>
								</div>
							</div>
							<div class="col-lg-12 d-flex align-items-start">
								<div>
									<h4 class="m-0 h5 text-white">Penukaran Poin</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="recent-posts" class="recent-posts section">

		<div class="container section-title" data-aos="fade-up">
			<h2>Produk Tukar</h2>
		</div>

		<div class="container">

			<div class="row gy-5">
				<?php $ambil = $koneksi->query("SELECT *FROM produktukar LIMIT 6"); ?>
				<?php while ($produktukar = $ambil->fetch_assoc()) { ?>
					<div class="col-xl-4 col-md-6">
						<div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

							<div class="post-img position-relative overflow-hidden">
								<img src="foto/<?php echo $produktukar['fotoproduk'] ?>" class="img-fluid" alt="">
							</div>

							<div class="post-content d-flex flex-column">

								<h3 class="post-title"><?php echo $produktukar['namaproduk'] ?></h3>
								<h3 class="post-title"><?php echo $produktukar['produkpoin'] ?> Point</h3>
								<hr>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<section id="services-2" class="services-2 section dark-background">
		<div class="container section-title" data-aos="fade-up">
			<h2>Layanan Kami</h2>
			<p>Solusi Pengelolaan Limbah yang Disesuaikan dengan Kebutuhan Anda</p>
		</div>

		<div class="services-carousel-wrap">
			<div class="container">
				<div class="swiper init-swiper">
					<script type="application/json" class="swiper-config">
						{
							"loop": true,
							"speed": 600,
							"autoplay": {
								"delay": 5000
							},
							"slidesPerView": "auto",
							"pagination": {
								"el": ".swiper-pagination",
								"type": "bullets",
								"clickable": true
							},
							"navigation": {
								"nextEl": ".js-custom-next",
								"prevEl": ".js-custom-prev"
							},
							"breakpoints": {
								"320": {
									"slidesPerView": 1,
									"spaceBetween": 40
								},
								"1200": {
									"slidesPerView": 3,
									"spaceBetween": 40
								}
							}
						}
					</script>
					<button class="navigation-prev js-custom-prev">
						<i class="bi bi-arrow-left-short"></i>
					</button>
					<button class="navigation-next js-custom-next">
						<i class="bi bi-arrow-right-short"></i>
					</button>
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="service-item">
								<div class="service-item-contents">
									<a href="#">
										<h2 class="service-item-title">Pengambilan Sampah</h2>
									</a>
								</div>
								<img src="assets_home/assets/img/sr1.png" alt="Image" class="img-fluid">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="service-item">
								<div class="service-item-contents">
									<a href="#">
										<h2 class="service-item-title">Pembuangan Sampah</h2>
									</a>
								</div>
								<img src="assets_home/assets/img/sr2.png" alt="Image" class="img-fluid">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="service-item">
								<div class="service-item-contents">
									<a href="#">
										<h2 class="service-item-title">Daur Ulang Perumahan</h2>
									</a>
								</div>
								<img src="assets_home/assets/img/sr3.png" alt="Image" class="img-fluid">
							</div>
						</div>

						<div class="swiper-slide">
							<div class="service-item">
								<div class="service-item-contents">
									<a href="#">
										<h2 class="service-item-title">Penghancuran Aman</h2>
									</a>
								</div>
								<img src="assets_home/assets/img/sr4.png" alt="Image" class="img-fluid">
							</div>
						</div>

					</div>
					<div class="swiper-pagination"></div>
				</div>
			</div>
		</div>
	</section>

	<section id="about-3" class="about-3 section">

		<div class="container">
			<div class="row gy-4 justify-content-between align-items-center">
				<div class="col-lg-6 order-lg-2 position-relative" data-aos="zoom-out">
					<img src="assets_home/assets/img/bgbawah.png" alt="Image" class="img-fluid">

				</div>
				<div class="col-lg-5 order-lg-1" data-aos="fade-up" data-aos-delay="100">
					<h2 class="content-title mb-4">Dari Tempat Sampah ke Botol, Perjalanan Sampah Melalui Daur Ulang.</h2>
					<ul class="list-unstyled list-check">
						<li>35 Ribu Klien</li>
						<li>350 Industri Lainnya</li>
						<li>210 Pekerja Profesional</li>
					</ul>
				</div>
			</div>
		</div>
	</section><!-- /About 3 Section -->
	<!-- Call To Action Section -->
	<section id="call-to-action" class="call-to-action section light-background">

		<div class="content">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-12">
						<iframe src=https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d107342.61062858338!2d103.9916841379802!3d1.0537024853157937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d9bce8c054ce05%3A0x3039d80b220cbb0!2sBatam%2C%20Kota%20Batam%2C%20Kepulauan%20Riau!5e0!3m2!1sid!2sid!4v1734317520758!5m2!1sid!2sid"	 width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>
<?php
include 'footer.php';
?>