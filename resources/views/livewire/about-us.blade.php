<div class="mt-5"> 

    <!-- About Section -->
    <section class="py-5" id="about">
        <div class="container">
            <div class="row g-4">
                <!-- Deskripsi Tentang Kami -->
                <div class="col-md-6 fade-up">
                    <h2 class="section-title mb-4">Tentang Kami</h2>
                    <p><b>CacaoCare</b> adalah aplikasi berbasis web yang membantu petani mendiagnosis hama dan penyakit tanaman kakao berdasarkan gejala yang muncul. Dengan dukungan metode Forward Chaining dan Dempster-Shafer, sistem ini memberikan solusi cepat dan akurat, terutama bagi petani yang sulit mengakses penyuluh pertanian. Kami hadir untuk mempermudah perawatan tanaman kakao secara mandiri dan berkelanjutan.</p>
                </div>

                <!-- Form Hubungi Kami -->
                <div class="col-md-6 fade-up" style="animation-delay: 0.2s;">
                    <div class="card rounded-custom shadow-custom p-4">
                        <h3 class="card-title mb-4">Hubungi Kami</h3>
                        <form method="POST" action=""> <!-- Ganti action ke route lu, atau pake Livewire -->
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                            </div>
                            <div class="mb-3">
                                <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Nomor Telepon" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" id="pesan" name="pesan" rows="4" placeholder="Pesan" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
